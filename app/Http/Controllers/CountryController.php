<?php

namespace App\Http\Controllers;

use App\CountryJp as AppCountryJp;
use App\Models\Country;
use App\Models\CountryJp;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiGetController;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $year = [2015,2016,2017,2018];


        $countries = Country::all();
        $countryJp = CountryJp::all();
        
        //$apiGetController = $this->eStartGetData(Request $request);
        


        
        return view('index', compact('countries', 'countryJp', 'year'));
        /*$data = [
            'msg'=>'これはコントローラからのメッセージです'
        ];
        return view('index', $data);*/
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
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
        $statsDataId = "0003280105";
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
        $beanN = array_slice($beanprice, 6, 10);  
        foreach($beanN as $key => $value)
        {
            foreach($value as $key2 => $value2)

            if($key2 == "$")
            {
                array_push($beanTon, $value2);
            }
  
            
        }
        //日本への輸出量ランキング1位~5位までが入ったデータ
        $bean = array_slice($beanTon, 0, 5); 
        
        
        echo "year3:".$year3;

        var_dump($country);
        return [$country, $bean];
        //return view('index', compact('country', 'bean'));
        
        


    }
    
}
