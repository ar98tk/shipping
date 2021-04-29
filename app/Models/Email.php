<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $table = 'emails';
    protected $guarded = [];

    public $timestamps = ['created_at'];
    const UPDATED_AT   = null;
    protected $fillable = [
        'is_active',
        'email',
    ];
}
