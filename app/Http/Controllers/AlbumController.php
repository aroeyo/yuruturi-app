<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlbumImage;
use App\Models\Species;
use App\Models\Lure;
use App\Models\Location;
use App\Models\Favorite;
use App\Models\users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Support\Str;


class AlbumController extends Controller
{
    public function show(Request $request) 
    {
        $userId = Auth::id();

        $albumImagesQuery = AlbumImage::with(['species','location','lure'])
            ->where('user_id', $userId);

        //検索条件：albumimageのnameカラム
        if($request->filled('name')) {
            $name = $request->input('name');
            $albumImagesQuery->whereHas('species', function ($query) use ($name) {
                $query->where('name', 'like', "%{$name}%");
            });
        }
    
        //検索結果を取得
        $albumImages = $albumImagesQuery->simplePaginate(50);
        
        //検索結果をビューに渡す
        return view('album/show', ['albumImages' => $albumImages]);
    }   

    public function albumid($id) 
    {

        $albumImage = AlbumImage::with(['species', 'location', 'lure'])
        ->where('user_id', Auth::id())
        ->findOrFail($id);

        return view('album/albumid', ['albumImage' => $albumImage]);
    }

    public function albumedit($id) 
    {
        $albumImage = AlbumImage::with(['species', 'location', 'lure'])
        ->where('user_id', Auth::id())
        ->where('albumimage_id', $id)
        ->findOrFail($id);
        
        return view('album/albumedit', ['albumImage' => $albumImage]);
    }

    public function albumcreate() 
    {
        Log::info('albumcreate method accessed.');
        return view('album/albumcreate');
    }

    public function store(Request $request) 
    {

        $request->validate(AlbumImage::rules());

        $species = Species::firstOrCreate(['name' => $request->input('species')]);

        $lure = Lure::firstOrCreate(
            ['name' => $request->input('lure'), 'luresize' => $request->input('luresize')]
        );        
        $location = Location::firstOrCreate(['name' => $request->input('location')]);

        //フォームで送信されたイメージファイルの取得、publicディレクトリのuploadsにファイルを保存
        $imagePath = null;

        if ($request->hasFile('image_file')) {
            //ファイル取得
            $file = $request->file('image_file');

            //ユニークファイル名生成
            $ulid = Str::ulid();
            $webpName = $ulid . 'webp';
            $webpPath = 'upload/' . $webpName;

            //Intervention Imageで画像を読み込む
            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);

            //画像をリサイズ
            $image->scaleDown(1024,1024);

            //webpでエンコード
            $webpEncode = $image->encode(new WebpEncoder(quality: 80));

            //ストレージに保存
            Storage::disk('public')->put($webpPath, (string) $webpEncode);

            $imagePath = $webpPath;

        //AlbumImageをインスタンス化して保存する項目の指定
        $AlbumImage = new AlbumImage([
            'image_file' => $imagePath,
            'size' => $request->input('size'),
            'catchtime' => $request->input('catchtime'),
            'notes' => $request->input('notes'),
            'species_id' => $species->species_id,
            'lure_id' => $lure->lure_id,
            'location_id' => $location->location_id,
            'user_id' => Auth::id(), 
        ]);

        $AlbumImage->save();   //モデルにデータを保存

        return redirect()->route('albums.show')->with('success', 'アルバム画像を保存しました。');  //アルバム一覧ページに遷移
        }
    }

    public function createcomplete() 
    {
        return view('album/createcomplete');
    }

    public function update(Request $request, $id)
    {

        try {
        $validatedData = $request->validate(AlbumImage::rules());
        } catch (\Illuminate\Validation\ValidationException $e) {
        dd($e->errors()); // バリデーションエラーの詳細を表示
        }


        $albumImage = AlbumImage::where('user_id', Auth::id())
            ->findOrFail($id);

        $species = Species::firstOrCreate(['name' => $request->input('species')]);

        $lure = Lure::firstOrCreate(
            ['name' => $request->input('lure'), 'luresize' => $request->input('luresize')]
        );        
        $location = Location::firstOrCreate(['name' => $request->input('location')]);

        $albumImage->size = $request->input('size');
        $albumImage->catchtime = $request->input('catchtime');
        $albumImage->notes = $request->input('notes');
        $albumImage->species_id = $species->species_id;
        $albumImage->lure_id = $lure->lure_id;
        $albumImage->location_id = $location->location_id;

        $albumImage->save();

        return redirect()->route('albums.show')->with('success', 'アルバムを更新しました');
    }

    public function destroy($id)
    {
        $albumImage = AlbumImage::where('user_id', Auth::id())
            ->findOrFail($id);

        $albumImage->favorites()->delete();
        $albumImage->delete();

        return redirect()->route('albums.show')->with('success', '削除しました');
    }
}
