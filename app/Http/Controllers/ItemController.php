<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Storage;
use Image;
use Functions;

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

        // 情報を保存
        $item = new Item();
         //画像を編集
        $image = $request->file('path');
        $resized_image = Image::make($image)->resize(500, 760, function ($constraint) {
            $constraint->aspectRatio();
        });
        $resized_image->encode('jpg');
        $resized_image->orientate()->save();
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
        ->with('category', Functions::setCategoryName($category))
        ->with('frequency', Functions::setFrequencyName($frequency));
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
        ->with('category', Functions::setCategoryName($category))
        ->with('frequency', Functions::setFrequencyName($frequency));
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
