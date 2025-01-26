<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lure extends Model
{
    protected $primaryKey = 'lure_id';

    protected $fillable = ['name','luresize'];

    public function albumImage()
    {
        return $this->hasMany(AlbumImage::class, 'lure_id');
    }
}
