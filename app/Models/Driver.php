<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $table = 'drivers';
    protected $guarded = [];
    public function scopeLanguage(){
        return $this->language == 'en' ? 'الأنجليزية' : 'العربية';
    }
    public $timestamps = ['created_at'];
    const UPDATED_AT   = null;
    protected $fillable = [
        'image',
        'name',
        'country_code',
        'phone',
        'car_name',
        'car_model',
        'password',
        'language',
        'car_photo',
        'car_license_number',
        'driving_license_image',
        'car_license_image',
        'language',
        'trucks_types_id',
        'id_image',
        'api_token'
    ];
}
