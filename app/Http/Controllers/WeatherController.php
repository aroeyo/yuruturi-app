<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class WeatherController extends Controller
{
    public function show(Request $request)
    {
        $locationData = $this->getLocationData();

        // ユーザーからの入力を取得
        $pc = $request->input('prefecture_code');
        $hc = $request->input('port_code');
        $yr = $request->input('year');
        $mn = $request->input('month');
        $dy = $request->input('day');
        $rg = $request->input('range');

        if (!$pc || !$hc || !$yr || !$mn || !$dy || !$rg) {
            return view('weather.show', [
                'locationData' => $locationData,  // locationDataをビューに渡す
                'tideData' => null, 
                'imageUrl' => null,
                'error' => null 
            ]);
        }

        $tideData = [];
        $imageUrls = [];

        for ($i = 0; $i < 3; $i++) {
            $date = Carbon::create($yr, $mn, $dy)->addDays($i); // 指定日、翌日、翌々日
        
            // APIリクエスト用パラメータ
            $params = [
                'pc' => $pc,
                'hc' => $hc,
                'yr' => $date->year,
                'mn' => $date->month,
                'dy' => $date->day,
                'rg' => $rg,
            ];

            // 画像URLの生成
            $imageUrls[$date->toDateString()] = "https://api.tide736.net/tide_image.php?pc={$pc}&hc={$hc}&yr={$date->year}&mn={$date->month}&dy={$date->day}&rg={$rg}&w=768&h=512&lc=blue&gcs=cyan&gcf=blue&ld=on&ttd=on&tsmd=on";
            
            // APIからデータを取得
            $response = Http::get('https://api.tide736.net/get_tide.php', $params);

            // レスポンスが成功した場合のみデータを格納
            if ($response->successful()) {
                $data = $response->json();
                $tideData[$date->toDateString()] = $data['tide'] ?? null;
            } else {
                $tideData[$date->toDateString()] = null;
            }
        }
        
        // ビューにデータを渡す
        return view('weather.show', [
        'locationData' => $locationData,
        'tideData' => $tideData, // 3日分のデータを渡す
        'imageUrls' => $imageUrls, // 3日分の画像URLを渡す
        'error' => null
        ]);
    }

    private function getLocationData()
    {
        $filePath = storage_path('app/tide.csv');
        
        // ファイルが存在しない場合は空の配列を返す
        if (!file_exists($filePath)) {
            return [];
        }
    
        $handle = fopen($filePath, 'r');
        if (!$handle) {
            // ファイルが開けなかった場合は空の配列を返す
            return [];
        }

        $locationData = [];
    
        while (($data = fgetcsv($handle)) !== false) {
            $prefectureCode = $data[0];
            $portCode = $data[1];
            $prefectureName = $data[2];
            $portName = $data[3];
        
    
            if(!isset($locationData[$prefectureCode])) {
                $locationData[$prefectureCode] = [
                    'prefecture_name' => $prefectureName,
                    'ports' => []
                ];
            }
    
            $locationData[$prefectureCode]['ports'][] = [
                'port_code' => $portCode,
                'port_name' => $portName
            ];
        }
    
        fclose($handle);

        return $locationData;
    }
}
