<?php

/*
| -----------------------------------------------------
| PRODUCT NAME: Codeclub Marketplace - Toko Online Produk Digital Multiseller
| -----------------------------------------------------
| AUTHORS: CODETHEMES & ONEZEROART TEAM
| -----------------------------------------------------
| EMAIL: mycoding@401xd.com
| -----------------------------------------------------
| COPYRIGHT: RESERVED BY PIXELCODER.NET & ONEZEROART.COM
| -----------------------------------------------------
| DESIGNED BY: https://401xd.com
| -----------------------------------------------------
| DEVELOPED BY: https://mycoding.id
| -----------------------------------------------------
| WEBSITE: PIXELCODER.NET & ONEZEROART.COM
| -----------------------------------------------------
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;

class BrowseController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('checkverify');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::where('cat_type', 1)->get();
        $data['subcategories'] = Category::where('cat_type', 2)->get();
        $data['tfItems'] = Item::whereMonth('featured', date('m'))->get(); // total featured items
        $data['tfreeItems'] = Item::whereMonth('free', date('m'))->get(); // total free items
        $data['allItems'] = Item::all();
        $data['items'] = Item::paginate(12);
        return view('browse.index', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($id)
    {
        $data['categories'] = Category::where('cat_type', 1)->get();
        $data['subcategories'] = Category::where('cat_type', 2)->get();
        $data['tfItems'] = Item::whereMonth('featured', date('m'))->get(); // total featured items
        $data['tfreeItems'] = Item::whereMonth('free', date('m'))->get(); // total free items
        $data['allItems'] = Item::all();
        $data['items'] = Item::where('category', $id)->paginate(12);
        return view('browse.index', $data);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function featured()
    {
        $data['categories'] = Category::where('cat_type', 1)->get();
        $data['subcategories'] = Category::where('cat_type', 2)->get();
        $data['allItems'] = Item::all();
        $data['tfItems'] = Item::whereMonth('featured', date('m'))->get(); // total featured items
        $data['tfreeItems'] = Item::whereMonth('free', date('m'))->get(); // total free items
        $data['items'] = Item::whereMonth('featured', date('m'))->paginate(12);
        return view('browse.featured', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function free()
    {
        $data['categories'] = Category::where('cat_type', 1)->get();
        $data['subcategories'] = Category::where('cat_type', 2)->get();
        $data['allItems'] = Item::all();
        $data['tfItems'] = Item::whereMonth('featured', date('m'))->get(); // total featured items
        $data['tfreeItems'] = Item::whereMonth('free', date('m'))->get(); // total free items
        $data['items'] = Item::whereMonth('free', date('m'))->paginate(12);
        return view('browse.freeitems', $data);
    }


    /**
     * Browse By Searching
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tags($tags)
    {
        // $search = $request->search;
        $data['search'] = $tags;
        $data['items'] = Item::where('tags','LIKE',"%{$tags}%")->paginate(12);
        return view('browse.tags', $data);

    }


}
