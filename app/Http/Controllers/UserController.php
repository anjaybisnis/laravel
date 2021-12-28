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
use App\User;
use App\Item;
use App\Cart;
use App\Review;
use App\Comment;
use Image;
use HP;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('checkverify');
        //$this->middleware('auth');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePersonal(Request $request, $id)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'town' => 'required',
            'district' => 'required',
        ]);

        // $user = new User;
        $user = User::find($id);

        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->companyname = $request->companyname;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->address1 = $request->address1;
        $user->address2 = $request->address2;
        $user->town = $request->town;
        $user->district = $request->district;
        $user->postcode = $request->postcode;
        $user->role = $request->role;
        $user->description = $request->description;

        $user->save();
        return redirect('/user/settings/' . Auth::user()->name)->with('success', 'Information Updated Successfully');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProfileDescription(Request $request, $id)
    {
        $user = User::find($id);
        $user->description = $request->description;
        $user->save();
        return redirect('/user/' . Auth::user()->name)->with('success', 'Description Updated Successfully');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEmail(Request $request, $id)
    {

        $user = User::find($id);

        $user->noti_rating = $request->noti_rating;
        $user->noti_itemupdate = $request->noti_itemupdate;
        $user->noti_itemcomment = $request->noti_itemcomment;
        $user->noti_teamcomment = $request->noti_teamcomment;
        $user->noti_dailysummary = $request->noti_dailysummary;
        $user->noti_itemreview = $request->noti_itemreview;
        $user->noti_buyerreview = $request->noti_buyerreview;
        $user->noti_expiring = $request->noti_expiring;

        $user->save();
        return redirect('/user/settings/' . Auth::user()->name)->with('success', 'Information Updated Successfully');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function storeCard(Request $request, $id)
     {
         $user = User::find($id);
         $user->card_number = $request->card_number;
         $user->card_holder = $request->card_holder;
         $user->card_expire = $request->card_expire;
         $user->card_cvv = $request->card_cvv;
         $user->save();
         return redirect('/user/settings/' . Auth::user()->name)->with('success', 'Information Updated Successfully');
     }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function storeSocial(Request $request, $id)
     {
         $user = User::find($id);
         $user->social_behance = $request->social_behance;
         $user->social_digg = $request->social_digg;
         $user->social_facebook = $request->social_facebook;
         $user->social_github = $request->social_github;
         $user->social_lastfm = $request->social_lastfm;
         $user->social_reddit = $request->social_reddit;
         $user->social_thumblr = $request->social_thumblr;
         $user->social_vimeo = $request->social_vimeo;
         $user->social_devianart = $request->social_devianart;
         $user->social_dribble = $request->social_dribble;
         $user->social_flickr = $request->social_flickr;
         $user->social_google = $request->social_google;
         $user->social_linkedin = $request->social_linkedin;
         $user->social_soundcloud = $request->social_soundcloud;
         $user->social_twitter = $request->social_twitter;
         $user->social_youtube = $request->social_youtube;
         $user->save();
         return redirect('/user/settings/' . Auth::user()->name)->with('success', 'Information Updated Successfully');
     }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function storeAvatar(Request $request, $id) {
         $this->validate($request, [
             'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
         ]);

         $user = User::find($id);

         $image = $request->file('avatar');
         if ($request->file('avatar')) {
             $user->avatar = time() . '.' . $image->getClientOriginalExtension();
             $imagePath = public_path('/images/profile');
             $img = Image::make($image->getRealPath());
             $img->resize(150, 150, function ($constraint) {
                 $constraint->aspectRatio();
             })->save($imagePath . '/' . $user->avatar);
         }

         $user->save();
         return redirect('/user/settings/' . Auth::user()->name)->with('success', 'Information Updated Successfully');

     }


     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
      public function storeCover(Request $request, $id) {
          $this->validate($request, [
              'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
          ]);

          $user = User::find($id);

          $image = $request->file('cover');
          if ($request->file('cover')) {
              $user->cover = time() . '.' . $image->getClientOriginalExtension();
              $imagePath = public_path('/images/profile');
              $img = Image::make($image->getRealPath());
              $img->resize(910, 450, function ($constraint) {
                  $constraint->aspectRatio();
              })->save($imagePath . '/' . $user->cover);
          }

          $user->save();
          return redirect('/user/settings/' . Auth::user()->name)->with('success', 'Information Updated Successfully');

      }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $user = User::where('name', $name)->first();
        if($user){
            return view('user.show')->with('userinfo', $user);
        }else{
            return view('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function settings($name)
    {
        //dd(Auth::id());
        $user = User::where('name', $name)->first();
        // dd($user->id);
        if(Auth::user()->role != 1 &&  Auth::id() != $user->id){
            return view('nopermission');
        }
        if($user){
            return view('user.settings')->with('userinfo', $user);
        }else{
            return view('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloads($name)
    {
        $userID = User::where('name', $name)->value('id');
        if(Auth::user()->role != 1 &&  Auth::id() != $userID){
            return view('nopermission');
        }
        if($userID){

            $data['userinfo'] = User::where('name', $name)->first();
            $data['items'] = Cart::where('user_id', $userID)
            ->leftJoin('items', 'items.item_id', '=', 'carts.item_id')
            ->orderBy('status', 'Paid')
            ->paginate(10);

            return view('user.downloads', $data);

        }else{
            return view('error');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function portfolio($name)
    {

        $userID = User::where('name', $name)->value('id');
        // if(Auth::user()->role != 1 &&  Auth::id() != $userID){
        //     return view('nopermission');
        // }

        if($userID){
            $data['userinfo'] = User::where('name', $name)->first();
            $data['items'] = Item::where('user', $userID)
            ->leftJoin('users', 'users.id', '=', 'items.user')
            ->orderBy('item_id', 'desc')
            ->paginate(10);
            return view('user.portfolio', $data);
        }else{
            return view('error');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reviews($name)
    {
        $userID = User::where('name', $name)->value('id');
        if($userID){

            $data['userinfo'] = User::where('name', $name)->first();
            $data['reviews'] = Review::where('userID', $userID)
            ->orderBy('id', 'desc')
            ->paginate(10);
            return view('user.reviews', $data);

        }else{
            return view('error');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function earnings($name)
    {
        $userID = User::where('name', $name)->value('id');
        if(Auth::user()->role != 1 &&  Auth::id() != $userID){
            return view('nopermission');
        }
        if($userID){

            $data['userinfo'] = User::where('name', $name)->first();
            $data['reviews'] = Review::where('userID', $userID)
            ->orderBy('id', 'desc')
            ->paginate(10);

            // Author Item IDs
            $itemIDs = Item::where('user', $userID)->pluck('item_id');

            //Total Sale
            $carts = Cart::whereIn('item_id', $itemIDs)->where('status', 'Paid')->get();
            $totalSale = array();
            foreach ($carts as $cart) {
                $itemID = $cart->item_id;
                $qty = $cart->qty;
                $totalSale[] = Item::find($itemID)->item_purchasefee * $qty;
            }

            //Total Sale After Author Associated
            $carts = Cart::whereIn('item_id', $itemIDs)->where('status', 'Paid')->whereMonth('created_at', date('m'))->get();
            $totalSaleFee = array();
            foreach ($carts as $cart) {
                $itemID = $cart->item_id;
                $qty = $cart->qty;
                $totalSaleFee[] = Item::find($itemID)->item_price * $qty;
            }

            //Total Sale This Month
            $carts = Cart::whereIn('item_id', $itemIDs)->where('status', 'Paid')->whereMonth('created_at', date('m'))->get();
            $totalSaleMonth = array();
            foreach ($carts as $cart) {
                $itemID = $cart->item_id;
                $qty = $cart->qty;
                $totalSaleMonth[] = Item::find($itemID)->item_price * $qty;
            }

            //Total Sale This Month
            $data['topCountriesSale'] = Cart::whereIn('item_id', $itemIDs)->where('status', 'Paid')->whereMonth('created_at', date('m'))->get();
            $data['totalSale'] = array_sum($totalSale); // total sale without any fee calculation
            $data['totalSaleFee'] = array_sum($totalSaleFee); // total sale with author fee calculation
            $data['totalSaleMonth'] = array_sum($totalSaleMonth); // total sale with author fee calculation of current month
            $data['allSales'] = Cart::whereIn('item_id', $itemIDs)->where('status', 'Paid')->orderBy('id', 'desc')->get();
            $data['allSalesMonth'] = Cart::whereIn('item_id', $itemIDs)->where('status', 'Paid')->orderBy('id', 'desc')->whereMonth('created_at', date('m'))->get();
            return view('user.earnings', $data);

        }else{
            return view('error');
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function statement($name)
    {
        $userID = User::where('name', $name)->value('id');
        if(Auth::user()->role != 1 &&  Auth::id() != $userID){
            return view('nopermission');
        }
        if($userID){

            $data['userinfo'] = User::where('name', $name)->first();
            $data['reviews'] = Review::where('userID', $userID)
            ->orderBy('id', 'desc')
            ->paginate(10);

            // Author Item IDs
            $itemIDs = Item::where('user', $userID)->pluck('item_id');

            //Total Sale
            $carts = Cart::whereIn('item_id', $itemIDs)->where('status', 'Paid')->get();
            $totalSale = array();
            foreach ($carts as $cart) {
                $itemID = $cart->item_id;
                $qty = $cart->qty;
                $totalSale[] = Item::find($itemID)->item_purchasefee * $qty;
            }

            //Total Sale After Author Associated
            $carts = Cart::whereIn('item_id', $itemIDs)->where('status', 'Paid')->get();
            $totalSaleFee = array();
            foreach ($carts as $cart) {
                $itemID = $cart->item_id;
                $qty = $cart->qty;
                $totalSaleFee[] = Item::find($itemID)->item_price * $qty;
            }

            //Total Sale This Month
            $carts = Cart::whereIn('item_id', $itemIDs)->where('status', 'Paid')->whereMonth('created_at', date('m'))->get();
            $totalSaleMonth = array();
            foreach ($carts as $cart) {
                $itemID = $cart->item_id;
                $qty = $cart->qty;
                $totalSaleMonth[] = Item::find($itemID)->item_price * $qty;
            }

            //Total Sale This Month
            $data['topCountriesSale'] = Cart::whereIn('item_id', $itemIDs)->where('status', 'Paid')->whereMonth('created_at', date('m'))->get();
            $data['totalSale'] = array_sum($totalSale); // total sale without any fee calculation
            $data['totalSaleFee'] = array_sum($totalSaleFee); // total sale with author fee calculation
            $data['totalSaleMonth'] = array_sum($totalSaleMonth); // total sale with author fee calculation of current month
            $data['allSales'] = Cart::whereIn('item_id', $itemIDs)->where('status', 'Paid')->orderBy('id', 'desc')->get();
            $data['allSalesMonth'] = Cart::whereIn('item_id', $itemIDs)->where('status', 'Paid')->orderBy('id', 'desc')->whereMonth('created_at', date('m'))->get();
            return view('user.statement', $data);

        }else{
            return view('error');
        }
    }



    /**
     * Return Data
     *
     * @return \Illuminate\Http\Response
     */
     public function monthlysalereport($name)
     {
         $data['d1'] = HP::tsbyday(1);
         $data['d2'] = HP::tsbyday(2);
         $data['d3'] = HP::tsbyday(3);
         $data['d4'] = HP::tsbyday(4);
         $data['d5'] = HP::tsbyday(5);
         $data['d6'] = HP::tsbyday(6);
         $data['d7'] = HP::tsbyday(7);
         $data['d8'] = HP::tsbyday(8);
         $data['d9'] = HP::tsbyday(9);
         $data['d10'] = HP::tsbyday(10);
         $data['d11'] = HP::tsbyday(11);
         $data['d12'] = HP::tsbyday(12);
         $data['d13'] = HP::tsbyday(13);
         $data['d14'] = HP::tsbyday(14);
         $data['d15'] = HP::tsbyday(15);
         $data['d16'] = HP::tsbyday(16);
         $data['d17'] = HP::tsbyday(17);
         $data['d18'] = HP::tsbyday(18);
         $data['d19'] = HP::tsbyday(19);
         $data['d20'] = HP::tsbyday(20);
         $data['d21'] = HP::tsbyday(21);
         $data['d22'] = HP::tsbyday(22);
         $data['d23'] = HP::tsbyday(23);
         $data['d24'] = HP::tsbyday(24);
         $data['d25'] = HP::tsbyday(25);
         $data['d26'] = HP::tsbyday(26);
         $data['d27'] = HP::tsbyday(27);
         $data['d28'] = HP::tsbyday(28);
         $data['d29'] = HP::tsbyday(29);
         $data['d30'] = HP::tsbyday(30);
         $data['d31'] = HP::tsbyday(31);
        echo json_encode($data);

     }



    /**
     * Return Data
     *
     * @return \Illuminate\Http\Response
     */
     public function allsalereport($name)
     {
        // Author Item IDs
        $itemIDs = Item::where('user', Auth::id())->pluck('item_id');

        //Total Sale
        $carts = Cart::whereIn('item_id', $itemIDs)->where('status', 'Paid')->get();
        $totalSale = array();
        $i=0;
        $bar = array();
        foreach ($carts as $cart) {
        $bar[] = $i++;
         $itemID = $cart->item_id;
         $qty = $cart->qty;
         $totalSale[] = Item::find($itemID)->item_price * $qty;
        }
        $data['bar'] = $bar;
        $data['sale'] = $totalSale;
        //$totalSale = sort($totalSale);
        echo json_encode($data);

     }


    /**
     * Return Data
     *
     * @return \Illuminate\Http\Response
     */
     public function yearlysalereport($name)
     {
         $data['jan'] = HP::tsbymonth(1);
         $data['feb'] = HP::tsbymonth(2);
         $data['mar'] = HP::tsbymonth(3);
         $data['apr'] = HP::tsbymonth(4);
         $data['may'] = HP::tsbymonth(5);
         $data['jun'] = HP::tsbymonth(6);
         $data['jul'] = HP::tsbymonth(7);
         $data['aug'] = HP::tsbymonth(8);
         $data['sep'] = HP::tsbymonth(9);
         $data['oct'] = HP::tsbymonth(10);
         $data['nov'] = HP::tsbymonth(11);
         $data['dec'] = HP::tsbymonth(12);
        echo json_encode($data);

     }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        // Item::where('user', $id)->delete();
        // Review::where('userID', $id)->delete();
        // Comment::where('userID', $id)->delete();
        return redirect('/dashboard/allusers/')->with('success', 'User Successfully Deleted');
    }
}
