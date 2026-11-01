<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSetting extends Model
{
    protected $fillable = [
        'eyebrow',
        'heading_line_1',
        'heading_line_2',
        'heading_line_3',
        'description',
        'button_text',
        'button_url',
        'feature_one',
        'feature_two',
        'image_path',
        'image_alt',
    ];
}
