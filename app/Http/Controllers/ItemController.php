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
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Item;
use App\Review;
use App\Category;
use App\Comment;
use Image;


class ItemController extends Controller
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
        return view('item.upload', $data);
    }


    /**
     * Show the form for creating a new resource.
     * Item Upload
     * @return \Illuminate\Http\Response
     */
    public function upload($name)
    {
        $data['categories'] = Category::where('cat_type', 1)->get();
        $data['subcategories'] = Category::where('cat_type', 2)->get();
        return view('item.upload', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::where('cat_type', 1)->get();
        $data['subcategories'] = Category::where('cat_type', 2)->get();
        return view('item.upload', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            // 'thumbnails' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            // 'preview' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            // 'mainfile' => 'required',
        ]);

        $item = new Item;

        $thumbnailFile = $_FILES['thumbnail']['tmp_name'];
        $previewFile = $_FILES['preview']['tmp_name'];
        $mainfileFile = $_FILES['mainfile']['tmp_name'];
        $wpthemeFile = $_FILES['wptheme']['tmp_name'];

        if ($thumbnailFile !== "") {
            $thumbnail = $request->file('thumbnail');
            if ($request->file('thumbnail')) {
                $item->thumbnail = time() . '1.' . $thumbnail->getClientOriginalExtension();
                $imagePath = public_path('/images/item');
                $img = Image::make($thumbnail->getRealPath());
                $img->resize(302, 154);
                $img->save($imagePath . '/' . $item->thumbnail);
            }
        }


        if ($previewFile !== "") {
            $preview = $request->file('preview');
            if ($request->file('preview')) {
                $item->preview = time() . '2.' . $preview->getClientOriginalExtension();
                $imagePath = public_path('/images/item');
                $img = Image::make($preview->getRealPath());
                $img->save($imagePath . '/' . $item->preview);
            }
        }


        if ($mainfileFile !== "") {
            if ($request->file('mainfile')) {
                $item->mainfile = $request->file('mainfile')->store('files/item');
            }
        }

        if ($wpthemeFile !== "") {
            if ($request->file('wptheme')) {
                $item->wptheme = $request->file('wptheme')->store('files/item');
            }
        }

        $item->item_name = $request->name;
        $item->keyfeature1 = $request->keyfeature1;
        $item->keyfeature2 = $request->keyfeature2;
        $item->description = $request->description;
        $item->category = $request->category;
        $item->subcategory = $request->subcategory;
        $item->high_resulation = $request->high_resulation;
        $item->widget_ready = $request->widget_ready;
        $compatible_browser = $request->compatible_browser;
        $browsers = '';
        for($x=0; count($compatible_browser) > $x; $x++){
            $browsers .= $compatible_browser[$x] . ",";
        }
        $item->compatible_browser = $browsers;
        $item->compatible_width = $request->compatible_width;
        $item->framework = $request->framework;
        $item->software_version = $request->software_version;
        $item->files_included = $request->files_included;
        $item->columns = $request->columns;
        $item->layout = $request->layout;
        $item->demo_url = $request->demo_url;
        $item->tags = $request->tags;

        $item->item_price = $request->item_price;
        $item->item_buyerfee = $request->item_buyerfee;
        $item->item_purchasefee = $request->item_purchasefee;
        $item->item_ex_price = $request->item_ex_price;
        $item->item_ex_buyerfee = $request->item_ex_buyerfee;
        $item->item_ex_purchasefee = $request->item_ex_purchasefee;
        $item->item_message = $request->item_message;

        $item->user = Auth::id();
        $item->save();

        return redirect('/item')->with('success', 'Successfully Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['item'] = Item::where('item_id', $id)->firstOrFail();
        $data['reviews'] = Review::where('itemID', $id)->get();
        $data['comments'] = Comment::where('itemID', $id)->get();
        return view('item.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['categories'] = Category::where('cat_type', 1)->get();
        $data['subcategories'] = Category::where('cat_type', 2)->get();
        $data['item'] = Item::where('item_id', $id)->first();
        return view('item.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            // 'thumbnails' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            // 'preview' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            // 'mainfile' => 'required',
        ]);

        $item = Item::find($id);

        $thumbnailFile = $_FILES['thumbnail']['tmp_name'];
        $previewFile = $_FILES['preview']['tmp_name'];
        $mainfileFile = $_FILES['mainfile']['tmp_name'];
        $wpthemeFile = $_FILES['wptheme']['tmp_name'];

        if ($thumbnailFile !== "") {
            $thumbnail = $request->file('thumbnail');
            if ($request->file('thumbnail')) {
                $item->thumbnail = time() . '1.' . $thumbnail->getClientOriginalExtension();
                $imagePath = public_path('/images/item');
                $img = Image::make($thumbnail->getRealPath());
                $img->resize(302, 154);
                $img->save($imagePath . '/' . $item->thumbnail);
            }
        }


        if ($previewFile !== "") {
            $preview = $request->file('preview');
            if ($request->file('preview')) {
                $item->preview = time() . '2.' . $preview->getClientOriginalExtension();
                $imagePath = public_path('/images/item');
                $img = Image::make($preview->getRealPath());
                $img->save($imagePath . '/' . $item->preview);
            }
        }


        if ($mainfileFile !== "") {
            if ($request->file('mainfile')) {
                $item->mainfile = $request->file('mainfile')->store('files/item/');
            }
        }

        if ($wpthemeFile !== "") {
            if ($request->file('wptheme')) {
                $item->wptheme = $request->file('wptheme')->store('files/item/');
            }
        }

        $item->item_name = $request->name;
        $item->keyfeature1 = $request->keyfeature1;
        $item->keyfeature2 = $request->keyfeature2;
        $item->description = $request->description;
        $item->category = $request->category;
        $item->high_resulation = $request->high_resulation;
        $item->widget_ready = $request->widget_ready;
        $compatible_browser = $request->compatible_browser;
        $browsers = '';
        for($x=0; count($compatible_browser) > $x; $x++){
            $browsers .= $compatible_browser[$x] . ",";
        }
        $item->compatible_browser = $browsers;
        $item->compatible_width = $request->compatible_width;
        $item->framework = $request->framework;
        $item->software_version = $request->software_version;
        $item->files_included = $request->files_included;
        $item->columns = $request->columns;
        $item->layout = $request->layout;
        $item->demo_url = $request->demo_url;
        $item->tags = $request->tags;

        $item->item_price = $request->item_price;
        $item->item_buyerfee = $request->item_buyerfee;
        $item->item_purchasefee = $request->item_purchasefee;
        $item->item_ex_price = $request->item_ex_price;
        $item->item_ex_buyerfee = $request->item_ex_buyerfee;
        $item->item_ex_purchasefee = $request->item_ex_purchasefee;
        $item->item_message = $request->item_message;
        $item->user = Auth::id();
        $item->save();

        return redirect('/item/' . $id)->with('success', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::find($id)->delete();
        return redirect('/user/portfolio/' . Auth::user()->name)->with('success', 'Successfully Deleted');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dashboardestroy($id)
    {
        Item::find($id)->delete();
        return redirect('/dashboard/allitems/' . Auth::user()->name)->with('success', 'Successfully Deleted');
    }
}
