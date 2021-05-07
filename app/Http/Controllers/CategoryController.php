<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * アイテム表示をトップスのみに切り替え
     * 
     * @return view
     */
    public function index_tops(Request $request) {

        $items = Item::all();
        $category = 1;

        if (Auth::check()) {
            return view('/item/index/index_category', ['items' => $items])
            ->with(['category' => $category]);
        } else {
            return redirect('login');
        }
    }
    
    /**
     * アイテム表示をトップスのみに切り替え
     * 
     * @return view
     */
    public function index_outer(Request $request) {

        $items = Item::all();
        $category = 2;

        if (Auth::check()) {
            return view('/item/index/index_category', ['items' => $items])->with(['category' => $category]);
        } else {
            return redirect('login');
        }
    }
    /**
     * アイテム表示をトップスのみに切り替え
     * 
     * @return view
     */
    public function index_inner(Request $request) {

        $items = Item::all();
        $category = 3;

        if (Auth::check()) {
            return view('/item/index/index_category', ['items' => $items])->with(['category' => $category]);
        } else {
            return redirect('login');
        }
    }
    /**
     * アイテム表示をトップスのみに切り替え
     * 
     * @return view
     */
    public function index_bottoms(Request $request) {

        $items = Item::all();
        $category = 4;

        if (Auth::check()) {
            return view('/item/index/index_category', ['items' => $items])->with(['category' => $category]);
        } else {
            return redirect('login');
        }
    }
    /**
     * アイテム表示をトップスのみに切り替え
     * 
     * @return view
     */
    public function index_shoes(Request $request) {

        $items = Item::all();
        $category = 5;

        if (Auth::check()) {
            return view('/item/index/index_category', ['items' => $items])->with(['category' => $category]);
        } else {
            return redirect('login');
        }
    }
    /**
     * アイテム表示をトップスのみに切り替え
     * 
     * @return view
     */
    public function index_business(Request $request) {

        $items = Item::all();
        $category = 6;

        if (Auth::check()) {
            return view('/item/index/index_category', ['items' => $items])->with(['category' => $category]);
        } else {
            return redirect('login');
        }
    }

}
