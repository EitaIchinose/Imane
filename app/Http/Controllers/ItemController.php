<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * アイテム一覧を表示する
     * 
     * @return view
     */
    public function index() {
        return view('layout');
    }
}
