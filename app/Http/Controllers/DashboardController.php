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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Item;
use App\User;
use App\Settings;
use App\Category;
use Image;

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('checkverify');
        $this->middleware('auth');
        $this->middleware('checkrole');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['userinfo'] = User::where('name', Auth::user()->name)->first();
        $data['settings'] = Settings::where('id', 1)->first();
        $data['items'] = Item::all();
        $data['categories'] = Category::all();
        $data['primaryCategories'] = Category::where('cat_type', 1)->get();
        if ($data['userinfo']) {
            return view('dashboard.dashboard', $data);
        } else {
            return view('error');
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allitems($name)
    {
        $data['userinfo'] = User::where('name', Auth::user()->name)->first();
        $data['items'] = Item::paginate(10);
        if ($data['userinfo']) {
            return view('dashboard.allitems', $data);
        } else {
            return view('error');
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function makeFeatured($id)
    {

        $item = Item::find($id);
        $freeTime = $item->featured;
        if(date('m', strtotime($freeTime)) == date('m')){ // featured time month is equal current month
            $item->featured = NULL;
        }else{
            $item->featured = date('Y-m-d H:i:s');
        }

        $item->save();
        return redirect('/dashboard/allitems/' . Auth::user()->name)->with('success', 'Item Featured Status Successfully Changed.');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function makeFree($id)
    {
        $item = Item::find($id);
        $freeTime = $item->free;
        if(date('m', strtotime($freeTime)) == date('m')){ // free time month is equal current month
            $item->free = NULL;
        }else{
            $item->free = date('Y-m-d H:i:s');
        }
        $item->save();
        return redirect('/dashboard/allitems/' . Auth::user()->name)->with('success', 'Item Fee Status Successfully Changed.');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allusers()
    {
        $data['userinfo'] = User::where('name', Auth::user()->name)->first();
        $data['users'] = User::paginate(10);
        if ($data['userinfo']) {
            return view('dashboard.allusers', $data);
        } else {
            return view('error');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeGeneral(Request $request, $id)
    {
        $this->validate($request, [
             'title' => 'required',
             'slogan' => 'required',
             'currency' => 'required',
         ]);

        // $user = new User;
        $settings = Settings::find($id);

        $logoFile = $_FILES['logo']['tmp_name'];
        $faviconFile = $_FILES['favicon']['tmp_name'];

        if ($logoFile !== "") {
            $logo = $request->file('logo');
            if ($request->file('logo')) {
                $settings->logo = time() . '.' . $logo->getClientOriginalExtension();
                $imagePath = public_path('/images/');
                $img = Image::make($logo->getRealPath());
                $img->save($imagePath . '/' . $settings->logo);            }
        }

        if ($faviconFile !== "") {
            $favicon = $request->file('favicon');
            if ($request->file('favicon')) {
                $settings->favicon = time() . '2.' . $favicon->getClientOriginalExtension();
                $imagePath = public_path('/images/');
                $img = Image::make($favicon->getRealPath());
                $img->save($imagePath . '/' . $settings->favicon);            }
        }

        $settings->title = $request->title;
        $settings->slogan = $request->slogan;
        $settings->currency = $request->currency;
        $settings->buyerfee = $request->buyerfee;
        $settings->authorfee = $request->authorfee;
        $settings->fcopyright = $request->fcopyright;
        $settings->mailchimpurl = $request->mailchimpurl;

        $settings->save();
        return redirect('/dashboard/')->with('success', 'Information Updated Successfully');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeHomepage(Request $request, $id)
    {

        $settings = Settings::find($id);
        $hphbimageFile = $_FILES['hphbimage']['tmp_name'];
        $hpfbimageFile = $_FILES['hpfbimage']['tmp_name'];

        if ($hphbimageFile !== "") {
            $hphbimage = $request->file('hphbimage');
            if ($request->file('hphbimage')) {
                $settings->hphbimage = time() . '.' . $hphbimage->getClientOriginalExtension();
                $imagePath = public_path('/images/');
                $img = Image::make($hphbimage->getRealPath());
                $img->save($imagePath . '/' . $settings->hphbimage);            }
        }

        if ($hpfbimageFile !== "") {
            $hpfbimage = $request->file('hpfbimage');
            if ($request->file('hpfbimage')) {
                $settings->hpfbimage = time() . '2.' . $hpfbimage->getClientOriginalExtension();
                $imagePath = public_path('/images/');
                $img = Image::make($hpfbimage->getRealPath());
                $img->save($imagePath . '/' . $settings->hpfbimage);            }
        }


        $settings->hppbheading = $request->hppbheading;
        $settings->hpbstext = $request->hpbstext;
        $settings->hpbbtext = $request->hpbbtext;
        $settings->hpburl = $request->hpburl;
        $settings->hpbfiadis = $request->hpbfiadis;
        $settings->hpbliadis = $request->hpbliadis;
        $settings->hpbfreeiadis = $request->hpbfreeiadis;
        $settings->hpbatadis = $request->hpbatadis;
        $settings->hpfbhtext = $request->hpfbhtext;
        $settings->hpfbstext = $request->hpfbstext;
        $settings->hpfbbtext = $request->hpfbbtext;
        $settings->hpfbburl = $request->hpfbburl;

        $settings->save();
        return redirect('/dashboard/')->with('success', 'Information Updated Successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSocial(Request $request, $id)
    {

        $settings = Settings::find($id);
        $settings->social_behance = $request->social_behance;
        $settings->social_digg = $request->social_digg;
        $settings->social_facebook = $request->social_facebook;
        $settings->social_github = $request->social_github;
        $settings->social_lastfm = $request->social_lastfm;
        $settings->social_reddit = $request->social_reddit;
        $settings->social_thumblr = $request->social_thumblr;
        $settings->social_vimeo = $request->social_vimeo;
        $settings->social_devianart = $request->social_devianart;
        $settings->social_dribble = $request->social_dribble;
        $settings->social_flickr = $request->social_flickr;
        $settings->social_google = $request->social_google;
        $settings->social_linkedin = $request->social_linkedin;
        $settings->social_soundcloud = $request->social_soundcloud;
        $settings->social_twitter = $request->social_twitter;
        $settings->social_youtube = $request->social_youtube;

        $settings->save();
        return redirect('/dashboard/')->with('success', 'Information Updated Successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeLogingpage(Request $request, $id)
    {

        $settings = Settings::find($id);
        $settings->lpheading = $request->lpheading;
        $settings->lptext = $request->lptext;
        $settings->lpbtext = $request->lpbtext;
        $settings->lpburl = $request->lpburl;
        $settings->save();
        return redirect('/dashboard/')->with('success', 'Information Updated Successfully');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeWidget(Request $request, $id)
    {
        $settings = Settings::find($id);
        $widgetNumber = $request->widget;
        if($widgetNumber == 1){
          $settings->fwtitle1 = $request->fwtitle1;
          $settings->fwcon1 = $request->fwcon1;
        }else if($widgetNumber == 2){
          $settings->fwtitle2 = $request->fwtitle2;
          $settings->fwcon2 = $request->fwcon2;
        }else if($widgetNumber == 3){
          $settings->fwtitle3 = $request->fwtitle3;
          $settings->fwcon3 = $request->fwcon3;
        }else if($widgetNumber == 4){
          $settings->fwtitle4 = $request->fwtitle4;
          $settings->fwcon4 = $request->fwcon4;
        }else if($widgetNumber == 5){
          $settings->fwtitle5 = $request->fwtitle5;
          $settings->fwcon5 = $request->fwcon5;
        }
        $settings->save();
        return redirect('/dashboard/')->with('success', 'Information Updated Successfully');
    }


    /**
     * Return Data
     *
     * @return \Illuminate\Http\Response
     */
     public function getCategory($id)
     {
        $category = Category::where('id', $id)->first();

        $data =  array();
        $data['id'] = $category->id;
        $data['cat_title'] = $category->cat_title;
        $data['cat_type'] = $category->cat_type;

        if($category->cat_type == 1){
            $data['selected_cat'] =
            "<option selected value=" . $category->cat_type . ">Primary *</option>
            <option value='1'>Primary</option>
            <option value='2'>Subkategori</option>
            ";

        }else{
            $data['selected_cat'] = "
            <option selected value=" . $category->cat_type . ">Subkategori *</option>
            <option value='1'>Primary</option>
            <option value='2'>Subkategori</option>
            ";
        }

        echo json_encode($data);

     }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCategory(Request $request)
    {
        $this->validate($request, [
             'cat_title' => 'required',
             'cat_type' => 'required',
         ]);

        $category = new Category;

        $category->cat_title = $request->cat_title;
        $category->cat_type = $request->cat_type;
        $category->cat_parent = $request->cat_parent;
        $category->save();

        return redirect('/dashboard/')->with('success', 'Cagegory Added Successfully');
    }


    /**
     * Update Category
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateCategory(Request $request, $id)
    {
        $this->validate($request, [
             'cat_title' => 'required',
             'cat_type' => 'required',
         ]);

        $category = Category::find($request->id);

        $category->cat_title = $request->cat_title;
        $category->cat_type = $request->cat_type;
        $category->save();

        return redirect('/dashboard/')->with('success', 'Cagegory Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCategory($id)
    {
        Category::find($id)->delete();
        return redirect('/dashboard/#tabs-5')->with('success', 'Successfully Deleted');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkusername(Request $request)
    {
        $requestUserName = $request->username;
        $userByName = User::where('name', $requestUserName)->first();
        if(count($userByName) > 0){ //similar username found
            $userByID = User::where('id', $request->userID)->first();
            $currentUserName = $userByID->name;
            if($requestUserName == $currentUserName){ // if requested username == current username then its ok
                echo json_encode(1);
            }else{
                echo json_encode(0);
            }
        }else{ // username available
            echo json_encode(1);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkemail(Request $request)
    {
        $requestEmail = $request->email;
        $userByEmail = User::where('email', $requestEmail)->first();
        if(count($userByEmail) > 0){ //similar email found
            $userByID = User::where('id', $request->userID)->first();
            $currentEmail = $userByID->email;
            if($requestEmail == $currentEmail){ // if requested email == current email then its ok
                echo json_encode(1);
            }else{
                echo json_encode(0);
            }
        }else{ // email available
            echo json_encode(1);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, $id)
    {

        $id = $request->id;
        $user = User::find($id);
        if(!empty($request->username)){
            $userByUsername = User::where('name', $request->username)->find($id);
            if(count($userByUsername) > 0){
                if($userByUsername->id == $id){
                    $user->name = str_replace(' ','', $request->username);
                }else{
                    return redirect('/dashboard/allusers/' . Auth::user()->name)->with('error', 'Username Already Exist.');
                }
            }else{
                $user->name = str_replace(' ','', $request->username);
            }
        }
        if(!empty($request->email)){
            $userByEmail = User::where('email', $request->email)->find($id);
            if(count($userByEmail) > 0){
                if($userByEmail->id == $id){
                    $user->email = $request->email;
                }else{
                    return redirect('/dashboard/allusers/' . Auth::user()->name)->with('error', 'Email Already Exist.');
                }
            }else{
                $user->email = $request->email;
            }
        }
        if(!empty($request->password)){
            $user->password =  Hash::make($request->password);
        }
        if(!empty($request->role)){
            $user->role = $request->role;
        }
        $user->save();
        return redirect('/dashboard/allusers/' . Auth::user()->name)->with('success', 'User Information Update.');

    }


}
