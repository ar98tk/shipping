<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodsTypes extends Model
{
    use HasFactory;
    protected $table = 'goods_types';
    protected $guarded = [];

    public $timestamps = ['created_at'];
    const UPDATED_AT   = null;
    protected $fillable = [
        'name_ar',
        'name_en',
    ];
}
