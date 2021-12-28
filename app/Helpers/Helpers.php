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

//app/Helpers/Envato/User.php

namespace App\Helpers;

use App\Envato\Envato;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Helper {

    /***************************************************/
    /************* Settings Functions Goes Here ************/
    /***************************************************/

    //get value from settings
    public static function set() {
        $data = DB::table('settings')->where('id', 1)->get();
        return $data[0];
    }

    //get currency
    public static function currency() {
        $data = DB::table('settings')->where('id', 1)->get();
        return $data[0]->currency;
    }

    //redirect users if not eligible to view pages
    public static function eligibleYN($userID) {

        if (Auth::check()) {
            if(Auth::user()->role == 1 ||  Auth::id() == $userID){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
        
    }

    //check if current user bought this item or not
    public static function isBoughtorNot($itemID, $userID) {
        $data = DB::table('carts')->where('status', 'Paid')->where('item_id', $itemID)->where('user_id', $userID)->get();
        if(count($data) > 0){
            return true;
        }else{
            return false;
        }
    }

    /***************************************************/
    /************* Cat Functions Goes Here ************/
    /***************************************************/

    //Count Items By Category
    public static function countItemByCat($id) {
        $data = DB::table('items')->where('category', $id)->count();
        if (isset($data)) {
            return $data;
        } else {
            return 0;
        }
    }

    //Get Category Data By ID
    public static function getCatByID($id) {
        $data = DB::table('categories')->where('id', $id)->first();
        if (isset($data)) {
            return $data;
        } else {
            return false;
        }
    }

    /***************************************************/
    /************* User Functions Goes Here ************/
    /***************************************************/

    //get currency
    public static function user($id) {
        $data = DB::table('users')->where('id', $id)->first();
        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
    }

    /***************************************************/
    /************* Item Functions Goes Here ************/
    /***************************************************/

    //Count Items By Table or Table Fields
    public static function countTableItems($table, $field, $value) {

        if(isset($field) && !empty($field)){
            $data = DB::table($table)->where($field, $value)->count();
        }else{
            $data = DB::table($table)->count();
        }
        if (isset($data)) {
            return $data;
        } else {
            return 0;
        }
    }

    //get items by ID
    public static function item($id) {
        $data = DB::table('items')->where('item_id', $id)->get();
        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
    }

    //is item featured or not
    public static function isfeatured($id) {

        $item = DB::table('items')->where('item_id', $id)->get();
        if(isset($item) && !empty($item)){
            $featuredMonth = date('m', strtotime($item[0]->featured));
            $thisMonth = date('m');
            if(!empty($item[0]->featured) && $featuredMonth == $thisMonth){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    //is item featured or not
    public static function isfree($id) {

        $item = DB::table('items')->where('item_id', $id)->get();
        if(isset($item) && !empty($item)){
            $featuredMonth = date('m', strtotime($item[0]->free));
            $thisMonth = date('m');
            if(!empty($item[0]->free) && $featuredMonth == $thisMonth){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }


    /***************************************************/
    /************* Cart Functions Goes Here ************/
    /***************************************************/

    //get cart items
    public static function allcarts() {
        $data = DB::table('carts')->get();
        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
    }

    //get current logged in user cart items
    public static function cucart() {
        $data = DB::table('carts')->where('user_id', Auth::id())->where('status', 'Pending')->get();
        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
    }


    // Retrive Total Cart Price
    public static function carttotal() {
        $cucarts = self::cucart();
        $totalCart = array();
        $totalCart[] = 0;
        foreach ($cucarts as $row) {
            $totalCart[] = self::item($row->item_id)[0]->item_purchasefee * $row->qty;
        }
        return number_format(array_sum($totalCart), 2);
    }


    //get current logged in user total sale
    public static function totalsale() {
        $itemIDs = DB::table('items')->where('user', Auth::id())->pluck('item_id');
        $data = DB::table('carts')->whereIn('item_id', $itemIDs)->where('status', 'Paid')->get();
        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
    }

    //get total sale by item id
    public static function tsbyitem($id) {
        $data = DB::table('carts')->where('item_id', $id)->where('status', 'Paid')->get();
        if(isset($data) && !empty($data)){
            return $data;
        }else{
            return false;
        }
    }

    //get total sale by day
    public static function tsbyday($day) {
        $itemIDs = DB::table('items')->where('user', Auth::id())->pluck('item_id');
        $carts = DB::table('carts')->whereIn('item_id', $itemIDs)->where('status', 'Paid')->whereDay('created_at', $day)->whereMonth('created_at', date('m'))->get();
        $totalSale = array();
        foreach ($carts as $cart) {
            $itemID = $cart->item_id;
            $qty = $cart->qty;
            $totalSale[] = self::item($itemID)[0]->item_price * $qty;
        }
        if(isset($carts) && !empty($carts)){
            return array_sum($totalSale);
        }else{
            return 0;
        }
    }


    //get total sale by day
    public static function tsbymonth($month) {
        $itemIDs = DB::table('items')->where('user', Auth::id())->pluck('item_id');
        $carts = DB::table('carts')->whereIn('item_id', $itemIDs)->where('status', 'Paid')->whereMonth('created_at', $month)->get();
        $totalSale = array();
        foreach ($carts as $cart) {
            $itemID = $cart->item_id;
            $qty = $cart->qty;
            $totalSale[] = self::item($itemID)[0]->item_price * $qty;
        }
        if(isset($carts) && !empty($carts)){
            return array_sum($totalSale);
        }else{
            return 0;
        }
    }


}
