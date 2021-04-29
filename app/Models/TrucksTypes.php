<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrucksTypes extends Model
{
    use HasFactory;
    protected $table = 'trucks_types';
    protected $guarded = [];
    public $timestamps = ['created_at'];
    const UPDATED_AT   = null;
    protected $fillable = [
        'name_ar',
        'name_en',
        'image',
        'is_active',
        'trucks_types_id',
        'descriptions_ar',
        'descriptions_en',
        'max_weight',
        'area',
    ];
}
