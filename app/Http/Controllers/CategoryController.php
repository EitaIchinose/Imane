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

        if (Auth::check()) {
            return view('/item/index/index_tops', ['items' => $items]);
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

        if (Auth::check()) {
            return view('/item/index/index_outer', ['items' => $items]);
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

        if (Auth::check()) {
            return view('/item/index/index_inner', ['items' => $items]);
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

        if (Auth::check()) {
            return view('/item/index/index_bottoms', ['items' => $items]);
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

        if (Auth::check()) {
            return view('/item/index/index_shoes', ['items' => $items]);
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

        if (Auth::check()) {
            return view('/item/index/index_business', ['items' => $items]);
        } else {
            return redirect('login');
        }
    }

}
