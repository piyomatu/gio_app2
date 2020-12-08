<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Json\c2;
use Illuminate\Support\Facades\Storage;

class JsonController extends Controller
{
    /*
    public function jsonGet()
    {
        $file = Storage::url('country.json');
        //$file = public_path() ."/storage/app/public/json/country.json";
        if ($file) {
            //$file = '/var/www//app/Json/c2.json';
            echo "true";
            var_dump($file);
            $json = file_get_contents($file);
        //$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
            $countryName = json_decode($json, true);
            $code = json_decode($json, true)['alpha2'];
            $countryN = array();
            foreach($countryName as $key => $value)
            {
                array_push($countryN, $value);
            }

            var_dump($countryN);
            //return view('api', compact('countryName'));
        
        }else {
            echo "データがありません";
        }
            //$file = file_exists(app_path('/app/Json/c2.json'));

        

    }
    */

    
}
