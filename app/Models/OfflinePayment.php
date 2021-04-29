<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfflinePayment extends Model
{
    use HasFactory;
    protected $table = 'offline_payment';
    protected $guarded = [];
    public $timestamps = ['created_at'];
    const UPDATED_AT   = null;
}
