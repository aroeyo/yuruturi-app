<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\AlbumImage;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{

    public function show()
    {
        $favorites = Favorite::with([
            'albumImage',
            'albumImage.species',
            'albumImage.location',
            'albumImage.lure',
        ])->where('user_id', Auth::id())->simplePaginate(50);

        return view('favorite/show', ['favorites' => $favorites]);
    }

    public function favoriteid($id)
    {
        $favorites = Favorite::with([
            'albumImage',
            'albumImage.species',
            'albumImage.location',
            'albumImage.lure',
        ])->where('user_id', Auth::id())
          ->where('albumimage_id', $id)
          ->firstOrFail();

        return view('favorite/favoriteid', ['favorite' => $favorites]);
    }

    public function test()
    {
        return view('favorite/test');
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
