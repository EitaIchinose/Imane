<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // テーブル名
    protected $table = 'items';

    // 可変項目
    protected $fillable = 
    [
        'image_name',
        'color',
        'size',
        'brand',
        'frequency',
        'category'
    ];
    
}
