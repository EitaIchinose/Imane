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
        return view('item.form');
    }

    public function store() {
        // $request->imgはformのinputのname='img'の値です
        $path = $request->img->store('public/images');
        // パスから、最後の「ファイル名.拡張子」の部分だけ取得します 例)sample.jpg
        $filename = basename($path);

        $data = new Item;
        // 登録する項目に必要な値を代入します
        $data->filename = $filename;
        // データベースに保存します
        $data->save;

        return redirect('/');
    }

}
