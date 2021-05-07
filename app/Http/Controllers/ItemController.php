<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Storage;

class ItemController extends Controller
{
    /**
     * アイテム一覧を表示する
     * 
     * @return view
     */
    public function index() {

        $items = Item::all();
        return view('/item/index/index', ['items' => $items]);

    }

    /**
     * アイテム登録画面を表示する
     * 
     * @return view
     */
    public function newCreate() {

        return view('item.form');

    }

    /**
     * アイテムを登録する
     * 
     * @return view
     */
    public function store(Request $request) {

        // バリデーション
        $inputs = $request->all();

        $rules =[
            'image_name' => 'required',
            'path'       => 'required|image',
            'color'      => 'required',
            'size'       => 'required',
            'brand'      => 'required',
            'frequency'  => 'required',
            'category'   => 'required'
        ];

        $validation = \Validator::make($inputs, $rules);

        // バリデーションエラーの場合、元のページへ戻る
        if($validation->fails())
        {
            return redirect()->back()->withErrors($validation->errors())->withInput();
        }

        // if($file = $request->path){
        //     //保存するファイルに名前をつける
        //     $fileName = time().'.'.$file->getClientOriginalExtension();
        //     // publicディレクトリにuploadsフォルダを作り保存する
        //     $target_path = public_path('/uploads/');
        //     $file->move($target_path,$fileName);
        //     }else{
        //     //画像が登録されなかった時は空文字をいれる
        //     $name = "";
        // }

        // 情報を保存
        $item = new Item();
         //s3アップロード開始
        $image = $request->file('path');
        // バケットへアップロード
        $path = Storage::disk('s3')->putFile('/', $image, 'public');

        \DB::beginTransaction();

        try {
        // アップロードした画像のフルパスを取得
        $item->path       = $path; 
        $item->image_name = $request->image_name;
        $item->color      = $request->color;
        $item->size       = $request->size;
        $item->brand      = $request->brand;
        $item->frequency  = $request->frequency;
        $item->category   = $request->category;
        $item->user_id    = Auth::user()->id;
        $item->save();
        \DB::commit();
        } catch(Exception $e) {
            \DB::rollback();
            abort(500);
        }

        return redirect('/');

    }

    /**
     * カテゴリー名を表示する
     * 
     * @return view
     */
    public function setCategoryName($category) {
        if ($category == 1) {
            return 'トップス';
          } elseif ($category == 2) {
            return 'アウター';
          } elseif ($category == 3) {
            return 'インナー';
          } elseif ($category == 4) {
            return 'ボトムス';
          } elseif ($category == 5) {
            return 'シューズ';
          } elseif ($category == 6) {
            return 'ビジネス';
          } else {
            return 'カテゴリーが存在しません';
          }
    }

    /**
     * 着用頻度を表示する
     * 
     * @return view
     */
    public function setFrequencyName($frequency) {
        if ($frequency == 1) {
            return 'よく着る';
          } elseif ($frequency == 2) {
            return 'たまに着る';
          } elseif ($frequency == 3) {
            return 'あまり着ない';
          } elseif ($frequency == 4) {
            return '全然着ない';
          } else {
            return '存在しない値です。';
          }
    }

    /**
     * アイテム詳細画面を表示する
     * 
     * @return view
     */
    public function show($id){
        $item      = Item::find($id);
        $category  = $item->category;
        $frequency = $item->frequency;

        // もしデータが空の場合
        if(is_null($item)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect('/');
        }
        return view('item.show', ['item' => $item])
        ->with('category', $this->setCategoryName($category))
        ->with('frequency', $this->setFrequencyName($frequency));
    }

    /**
     * アイテム編集画面を表示する
     * 
     * @return view
     */
    public function edit($id){
        $item      = Item::find($id);
        $category  = $item->category;
        $frequency = $item->frequency;

        // もしデータが空の場合
        if(is_null($item)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect('/');
        }
        return view('item.edit', ['item' => $item])
        ->with('category', $this->setCategoryName($category))
        ->with('frequency', $this->setFrequencyName($frequency));
    }

        /**
     * アイテム情報を更新する
     * 
     * @return view
     */
    public function update(Request $request) {

        // バリデーション
        $input = $request->all();

        $rules =[
            'image_name' => 'required',
            'color'      => 'required',
            'size'       => 'required',
            'brand'      => 'required',
            'frequency'  => 'required',
            'category'   => 'required'
        ];

        $validation = \Validator::make($input, $rules);

        // バリデーションエラーの場合、元のページへ戻る
        if($validation->fails())
        {
            return redirect()->back()->withErrors($validation->errors())->withInput();
        }

        $item = Item::find($input['id']);
        // 情報を保存
        \DB::beginTransaction();

        try {
        $item->fill([
            'image_name' => $input['image_name'],
            // 'path'       => $input['path'],
            'color'      => $input['color'],
            'size'       => $input['size'],
            'brand'      => $input['brand'],
            'frequency'  => $input['frequency'],
            'category'   => $input['category'],
            // 'user_id'    => $input['user_id']
        ]);
        $item->save();
        \DB::commit();
        } catch(Exception $e) {
            \DB::rollback();
            abort(500);
        }

        return redirect('/');

    }

    /**
     * アイテム削除
     * 
     * @return view
     */
    public function delete(Request $request) {
 
        $item = Item::find($request->id);
        $id = $item->id;
        $image = $item->path;

        if(empty($id)){
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('edit'));
        }
        try {
            // S3データも一緒に削除
            $disk = Storage::disk('s3');
            $disk->delete($image);
            Item::destroy($id);
        } catch(Exception $e) {
            abort(500);
        }

        return redirect('/');
    }
}
