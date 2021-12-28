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

namespace App\Envato;

class Envato {
    // Bearer, no need for OAUTH token, change this to your bearer string
    // https://build.envato.com/api/#token
    //private static $bearer = "hTl89YLIDJqra1orJvkasA5ojJg9GUgg";
    //private static $bearer = "Ui2Tiq2JyKNh7nNRb1uBrEKYujKyBBhv";
    //private static $bearer = "TWw4qSHF0lKdvOrwtdzfEEbWe6Y7f0fz";

    static function getPurchaseData($code) {

        $personal_token = "TWw4qSHF0lKdvOrwtdzfEEbWe6Y7f0fz";
        $header = array();
        $header[] = 'Authorization: Bearer '.$personal_token;
        $header[] = 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:41.0) Gecko/20100101 Firefox/41.0';
        $header[] = 'timeout: 20';

        $product_code = $code;
        $url = "https://api.envato.com/v3/market/author/sale?code=".$product_code;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER,$header);

        $envatoRes = curl_exec($curl);
        curl_close($curl);
        $envatoRes = json_decode($envatoRes, true);
        return $envatoRes;

    }

    static function verifyPurchase($code) {
      $verify_obj = self::getPurchaseData($code);
      return $verify_obj;
    }
  }

?>
