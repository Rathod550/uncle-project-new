<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FrontSetting extends Model
{
    protected $table = 'front_settings';

    protected $fillable = [
        'name',
        'slug',
        'value',
        'page_name',
    ];
}
