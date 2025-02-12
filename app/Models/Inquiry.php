<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $primaryKey = 'Inquiry_id';
    protected $table = 'inquiries';
    protected $guarded = ['inquiry_id'];

    public static function rules()
    {
        return[
            'messagetitle' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ];
    }
}
