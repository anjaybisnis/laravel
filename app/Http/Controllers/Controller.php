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

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
