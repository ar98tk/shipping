<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $guarded = [];
    public function scopeStatus(){
        if($this->status = 'awaitingPayment'){
        return $this->status == 'في انتظار الدفع';
        }
        elseif($this->status = 'cancelledByUser'){
            return $this->status == 'ملغي بواسطة المشترك';
        }
        elseif($this->status = 'awaitingDriver'){
            return $this->status == 'في انتظار سائق';
        }
        elseif($this->status = 'acceptedByDriver'){
            return $this->status == 'مقبول بواسطة السائق';
        }
        elseif($this->status = 'cancelledByDriver'){
            return $this->status == 'ملغي بواسطة السائق';
        }
        elseif($this->status = 'arrivedPickUpLocation'){
            return $this->status == 'السائق وصل لموقع التحميل';
        }
        elseif($this->status = 'goodsLoading'){
            return $this->status == 'جاري تحميل البضائع';
        }
        elseif($this->status = 'startMoving'){
            return $this->status == 'تحرك السائق لوجهته';
        }
        elseif($this->status = 'arrivedToDestinationLocation'){
            return $this->status == 'وصل السائق لوجهته';
        }
        elseif($this->status = 'finishedTripByDriver'){
            return $this->status == 'السائق انهي الرحلة';
        }
        elseif($this->status = 'fininshedTripByUser'){
            return $this->status == 'المستخدم انهي الرحلة';
        }
        elseif($this->status = 'closed'){
            return $this->status == 'مغلقة';
        }
        elseif($this->status = 'acceptedByCompany'){
            return $this->status == 'مقبولة بواسطة الشركة';
        }

    }
    public $timestamps = ['created_at'];
    const UPDATED_AT   = null;

}
