<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Envato\Envato;
use App\Settings;
use HP;

class VerifyController extends Controller
{
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $o = Envato::verifyPurchase(HP::set()->purchasecode);
        //dd($o);
        //isset($o['item']['id']) && $o['item']['id'] == "21551447 21834231"
        if(isset($o['item']) && $o['item']['id'] == "21551447" && $o['buyer'] == HP::set()->envatouser){
            return redirect('/');
        }else{
			return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePurchasecode(Request $request, $id)
    {
        $settings = Settings::find($id);
        $settings->envatouser = $request->envatouser;
        $settings->purchasecode = $request->purchasecode;
        $settings->save();
        return redirect('/dashboard/')->with('success', 'Purchase Code Successfully Inserted...');
    }

}
