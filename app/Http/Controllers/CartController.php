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

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Cart;
use App\Item;
use App\Settings;
use HP;

class CartController extends Controller
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
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['carts'] = Cart::where('user_id', Auth::id())->where('status', 'Pending')->get();
        return view('cart.cart', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //$request->session()->forget('carts');
        // $sessions = array();
        // $itemID = array();
        // $sessions[] = session('carts');
        // if(count($sessions) > 0){
        //     foreach($sessions as $session){
        //         if(count($session) > 0){
        //             foreach($session as $sess){
        //                 $itemID[] = $sess['item_id'];
        //             }
        //         }
        //     }
        // }
        //
        //
        // if (Auth::check()) {
        //     $userID = Auth::id();
        // }else{
        //     $userID = '';
        // }
        //
        // if (in_array($request->item_id, $itemID) == FALSE){
        //     $cart = array(
        //         "item_id" => $request->item_id,
        //         "user_id" => $userID,
        //         "qty" => 1,
        //     );
        //     $request->session()->push('carts', $cart);
        // }

        $cart = new Cart;
        $cart->item_id = $request->item_id;
        $cart->user_id = Auth::id();
        $cart->qty = 1;
        $cart->save();
        $request->session()->flash('success', 'Successfully Added To Cart');

        return redirect('/item/' . $request->item_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::find($id)->delete();
        return redirect('/cart/')->with('success', 'Cart Successfully Deleted');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateqty(Request $request, $id)
    {
        $cart = Cart::find($id);
        $cart->qty = $request->itemqty;
        $cart->save();

        $cartObj = Cart::find($id);
        $totalamount = Item::find($cartObj->item_id)->item_purchasefee * $request->itemqty;
        $currency = Settings::find(1)->currency;
        $data =  array();
        $data['totalqty'] = $request->itemqty;
        $data['totalamount'] = $currency . $totalamount;
        $data['subtotal'] = "Subtotal " . $currency . HP::carttotal();

        echo json_encode($data);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function itemcartajax(Request $request)
    {

        $itemID = $request->itemID;
        $cart = new Cart;
        $cart->item_id = $itemID;
        $cart->user_id = Auth::id();
        $cart->qty = 1;
        $cart->save();

        $lastCartID = Cart::all()->last()->id;

        $html = '
        <div class="single-cart-item d-flex justify-content-between align-items-center">
            <a href="' . url('/item/' . HP::item($itemID)[0]->item_id ) . '"><img class="cart-notification-img img-50 mr-20" src="' . asset('images/item/' . HP::item($itemID)[0]->thumbnail) . '" alt=""></a>
            <div class="middle">
                <h5><a href="' . url('/item/' . HP::item($itemID)[0]->item_id ) . '">' . HP::item($itemID)[0]->item_name . '</a></h5>
                <h6><span class="lnr lnr-tag"></span> ' . HP::currency() . ' ' . HP::item($itemID)[0]->item_purchasefee . ' x 1</h6>
            </div>
            <div class="cross"><span class="lnr lnr-cross"></span></div>
            <form id="deleteFrom" action="' . action('CartController@destroy', $lastCartID) . '" method="POST">
                ' . method_field("DELETE") . '
                ' . csrf_field() . '
                <i class="icon icon-close quickCartItems delete-btn"></i>
            </form>
        </div>
        ';

        $data['status'] = 'Success';
        $data['itemHtml'] = $html;
        echo json_encode($data);

    }


}
