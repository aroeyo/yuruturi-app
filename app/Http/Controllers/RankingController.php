<?php

namespace App\Http\Controllers;
use App\Models\AlbumImage;
use App\Models\Species;
use App\Models\Lure;
use App\Models\Location;
use App\Models\users;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function show() {
    
        $userId = Auth::id();

        //ルアーの集計結果を取得
        $lureRanks = Lure::whereHas('albumImage',function ($query) use ($userId){
            $query->where('user_id', $userId);
        })
        ->withCount('albumImage')
        ->orderByDesc('album_image_count')
        ->limit(5)
        ->get();

        //釣れた魚の大きさ順に取得
        $sizeRanks = AlbumImage::where('albumimages.user_id', $userId)
        ->select('albumimages.size', 'species.name as species_name')
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
