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
    public function ranking() {

        $albumImageRank = AlbumImage::with(['species','location','lure']);

        return view('rankings/ranking');
    }
}
