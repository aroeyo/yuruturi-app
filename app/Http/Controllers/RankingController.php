<?php

namespace App\Http\Controllers;
use App\Models\AlbumImage;
use App\Models\Species;
use App\Models\Lure;
use App\Models\Location;
use App\Models\users;

use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function show() {
    
        //ルアーの集計結果を取得
        $lureRanks = Lure::withCount('albumImage')
        ->orderByDesc('album_image_count')
        ->limit(5)
        ->get();

        //釣れた魚の大きさ順に取得
        $sizeRanks = AlbumImage::select('albumimages.size', 'Species.name as species_name')
        ->join('species', 'albumimages.species_id' , '=', 'species.species_id')
        ->orderByDesc('albumimages.size')
        ->limit(5)
        ->get();

        return view('rankings/show', [
            'lureRanks' => $lureRanks,
            'sizeRanks' => $sizeRanks
        ]);
    }
}
