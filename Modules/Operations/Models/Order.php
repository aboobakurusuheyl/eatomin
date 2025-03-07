<?php

namespace Modules\Operations\Models;

use App\Models\Profile;
use Modules\Finance\Models\Payment;
use Modules\Vendors\Models\Restaurant;
use Modules\Fleet\Models\DeliveryTracking;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_profile_id', 'restaurant_id', 'delivery_profile_id', 'order_status', 'total_price', 'delivery_address'];
    
    public function customer() {
        return $this->belongsTo(Profile::class, 'customer_profile_id');
    }
    
    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }
    
    public function deliveryPerson() {
        return $this->belongsTo(Profile::class, 'delivery_profile_id');
    }
    
    public function items() {
        return $this->hasMany(OrderItem::class);
    }
    
    public function payment() {
        return $this->hasOne(Payment::class);
    }
    
    public function tracking() {
        return $this->hasOne(Delivery::class);
    }
}