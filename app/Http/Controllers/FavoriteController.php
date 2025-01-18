<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\AlbumImage;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{

    public function show() {
        $favoriteImages = 
    }


    public function toggle(Request $request)
    {
        $albumImageId = $request->input('albumimage_id');

        //お気に入り済みか確認
        $favorite = Favorite::where('user_id', Auth::id())
                            ->where('albumimage_id', $albumImageId)
                            ->first();

        if($favorite) {
            //お気に入り登録済みなら解除
            $favorite->delete();
            return response()->json(['message'=> 'Favorite remove', 'isFavorited' => false], 200);
        } else {
            //登録されていなければお気に入り登録
            Favorite::create([
                'user_id' => Auth::id(),
                'albumimage_id' => $albumImageId,
            ]);
            return response()->json(['message' => 'Favorite added', 'isFavorited' => true], 201);
        }
    }
}
