<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlbumImage extends Model
{
    protected $guarded = array('id');

    public static $rules = [
        'image' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        'species' => ['required', 'string', 'max:50'],
        'size' => ['required', 'numeric', 'min:0', 'max:500'],
        'catchtime' => ['required', 'date', 'before_or_equal:now'],
        'lure' => ['required', 'string', 'max:50'],
        'lureweight' => ['required', 'in:10,15,20,25,30,35,40,45,50'],
        'location' => ['required', 'string', 'max:100'],
        'notes' => ['nullable', 'string', 'max:500'],
    ];
}
