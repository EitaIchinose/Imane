<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * アイテム一覧を表示する
     * 
     * @return view
     */
    public function index() {
        $data = Item::all();
        if (Auth::check()) {
            return view('layout', compact('data'));
        } else {
            return redirect('login');
        }
    }

    /**
     * アイテム登録画面を表示する
     * 
     * @return view
     */
    public function newCreate() {
        if (Auth::check()) {
            return view('item.form');
        } else {
            return redirect('login');
        }
    }

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


        if($file = $request->path){
            //保存するファイルに名前をつける
            $fileName = time().'.'.$file->getClientOriginalExtension();
            // publicディレクトリにuploadsフォルダを作り保存する
            $target_path = public_path('/uploads/');
            $file->move($target_path,$fileName);
            }else{
            //画像が登録されなかった時は空文字をいれる
            $name = "";
        }

        // 情報を保存
        $item = new Item();

        \DB::beginTransaction();

        try {
        $item->image_name = $request->image_name;
        $item->path       = $request->path;
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

        // ログイン状態ではない場合、ログイン画面へ遷移する
        if(!Auth::check()) {
            return redirect('login');
        }
    }

}
