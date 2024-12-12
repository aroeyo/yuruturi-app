<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function show() {
        return view('album/show');
    }

    public function albumid() {
        return view('album/albumid');
    }

    public function albumedit() {
        return view('album/albumedit');
    }

    public function albumcreate() {
        return view('album/albumcreate');
    }
    public function createcomplete() {
        return view('album/createcomplete');
    }
}
