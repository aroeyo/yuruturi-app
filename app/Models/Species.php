<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    protected $primaryKey = 'species_id';

    protected $fillable = ['name'];
}
