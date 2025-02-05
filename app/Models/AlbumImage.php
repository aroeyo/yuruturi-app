<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AlbumImage extends Model
{
    protected $primaryKey = 'albumimage_id';
    protected $table = 'albumimages';
    protected $guarded = array('id');

    public static function rules()
    { 
        return [
        'image_file' => request()->isMethod('post')
        ? ['required', 'file', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        : ['nullable', 'image', 'max:2048'],
        'species' => ['required', 'string', 'max:50'],
        'size' => ['required', 'numeric', 'min:0', 'max:500'],
        'catchtime' => ['required', 'date', 'before_or_equal:now'],
        'lure' => ['required', 'string', 'max:50'],
        'luresize' => ['required', 'in:10,15,20,25,30,35,40,45,50'],
        'location' => ['required', 'string', 'max:100'],
        'notes' => ['nullable', 'string', 'max:500'],
        ];
    }

    public function species()
    {
        return $this->belongsTo(Species::class, 'species_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function lure()
    {
        return $this->belongsTo(Lure::class, 'lure_id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'albumImage_id');
    }
}
