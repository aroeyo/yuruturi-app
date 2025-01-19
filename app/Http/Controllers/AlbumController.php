<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlbumImage;
use App\Models\Species;
use App\Models\Lure;
use App\Models\Location;
use App\Models\users;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;



class AlbumController extends Controller
{
    public function show() 
    {

        $albumImages = AlbumImage::with(['species','location','lure'])->get();
        
        return view('album/show', ['albumImages' => $albumImages]);
    }

    public function albumid($id) 
    {

        $albumImage = AlbumImage::with(['species', 'location', 'lure'])->findOrFail($id);

        return view('album/albumid', ['albumImage' => $albumImage]);
    }

    public function albumedit() 
    {
        return view('album/albumedit');
    }

    public function albumcreate() 
    {
        Log::info('albumcreate method accessed.');
        return view('album/albumcreate');
    }

    public function store(Request $request) 
    {

        $request->validate(AlbumImage::$rules);

        $species = Species::firstOrCreate(['name' => $request->input('species')]);

        $lure = Lure::firstOrCreate(
            ['name' => $request->input('lure'), 'luresize' => $request->input('lureweight')]
        );        
        $location = Location::firstOrCreate(['name' => $request->input('location')]);

        //フォームで送信されたイメージファイルの取得、publicディレクトリのuploadsにファイルを保存
        $imagePath = null;
        $imagePath = $request->file('image_file')->store('uploads', 'public');

        //AlbumImageをインスタンス化して保存する項目の指定
        $AlbumImage = new AlbumImage([
            'image_file' => $imagePath,
            'size' => $request->input('size'),
            'catchtime' => $request->input('catchtime'),
            'notes' => $request->input('notes'),
            'species_id' => $species->species_id,
            'lure_id' => $lure->lure_id,
            'location_id' => $location->location_id,
            'user_id' => auth()->id(), 
        ]);

        $AlbumImage->save();   //モデルにデータを保存

        return redirect()->route('albums.show')->with('success', 'アルバム画像を保存しました。');  //アルバム一覧ページに遷移
    }

    public function test(Request $request)
    {
        

        $species = Species::firstOrCreate(['name' => $request->input('species')]);
        dd($species->species_id);
        

        
    }

    public function createcomplete() 
    {
        return view('album/createcomplete');
    }
}
