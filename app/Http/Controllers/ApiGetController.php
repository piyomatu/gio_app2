<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

use SebastianBergmann\Environment\Console;
use App\Http\Middleware\PrettyPrintMiddleware;


class ApiGetController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('PrettyPrintMiddleware');
    }




    public function eStartGetData(Request $request)
    {
        /*
        2015 = 0003280105
        2016 = 0003280145
        2017 = 0003280187
        2018 = 0001723388
        */ 
        $year = ['2015'=>"0003280105",'2016'=>"0003280145",'2017'=>"0003280187",'2018'=>"0001723388"];
        
        
        $year2 = $request->year;
        $year3 = $year[$year2];
        //$year_select = $year[$year2];
        


        
        $lang = "J";
        $statsDataId = $year3;
        $metaGetFlg = "Y" ;
        $cntGetFlg = "N";
        $explanationGetFlg = "Y";
        $annotationGetFlg = "Y";
        $sectionHeaderFlg = "1";
        
        $appId = "5fcbef9a955e60f97f52adb5c5ef620f9bdcf398";  
        
        $url = "https://api.e-stat.go.jp/rest/2.1/app/json/getStatsData";
        $url .= "?appId=".urlencode($appId);
        $url .= "&lang=".$lang;
        $url .= "&statsDataId=".urlencode($statsDataId);
        $url .= "&metaGetFlg=".$metaGetFlg."&cntGetFlg=".$cntGetFlg."&explanationGetFlg".$explanationGetFlg."&annotationGetFlg".$annotationGetFlg."&sectionHeaderFlg=".$sectionHeaderFlg;



        
        $handle = curl_init();
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_URL,$url);
        $result = curl_exec($handle);
        curl_close($handle);
        
        $result = file_get_contents($url);
        //jsonから日本への輸出量ランキング1位~5位の国名を絞り込む
        $res = json_decode($result, true)['GET_STATS_DATA']['STATISTICAL_DATA']['CLASS_INF']['CLASS_OBJ'][1]['CLASS'];
        //jsonから日本への輸出量ランキング1位~5位のデータを絞り込む
        $beanprice = json_decode($result, true)['GET_STATS_DATA']['STATISTICAL_DATA']['DATA_INF']['VALUE'];

        
        //日本への輸出量ランキング1位~5位の国名が入ったデータ
        $country = array();
        foreach($res as $key => $value)
        {
            foreach($value as $key2 => $value2)
            if($key2 == "@name" && $key2 != "合計" && $key2 != "上位５カ国以外計")
            {
                
                array_push($country, $value2);
            }
            
        }

        $beanTon = array();
        $beanN = array_slice($beanprice, 6, 11);  
        foreach($beanN as $key => $value)
        {
            foreach($value as $key2 => $value2)

            if($key2 == "$")
            {
                array_push($beanTon, $value2);
            }
  
            
        }
        //日本への輸出量ランキング1位~5位までが入ったデータ
        $bean = array_slice($beanTon, 0, 6); 
        
        
        echo "year3:".$year3;

        //var_dump($bean);
        return view('api', compact('country', 'bean'));
        
        


    }


    
}
