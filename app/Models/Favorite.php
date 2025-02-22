<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $primaryKey = 'favorite_id';
    protected $fillable = ['user_id', 'albumimage_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function albumImage()
    {
        return $this->belongsTo(AlbumImage::class, 'albumimage_id');
    }
}
