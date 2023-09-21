<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_desktop',
        'title',
        'description',
        'button_label',
        'button_link',
        'image_mobile',
    ];
}