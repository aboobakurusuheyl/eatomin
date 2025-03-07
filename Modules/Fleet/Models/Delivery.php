<?php

namespace Modules\Fleet\Models;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    static $STATUS_WAITING_FOR_RESTAURANT = 'waiting-for-restaurant';
    static $STATUS_PICKING_UP = 'picking-up';
    static $STATUS_IN_TRANSIT = 'in-transit';
    static $STATUS_DELIVERED = 'delivered';

    protected $fillable = [
        'order_id',
        'delivery_profile_id',
        'current_latitude',
        'current_longitude',
        'status',
        'updated_at',
    ];

    public function deliveryProfile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function isWaitingForRestaurant()
    {
        return $this->status === self::$STATUS_WAITING_FOR_RESTAURANT;
    }

    public function isPickingUp()
    {
        return $this->status === self::$STATUS_PICKING_UP;
    }

    public function isInTransit()
    {
        return $this->status === self::$STATUS_IN_TRANSIT;
    }

    public function isDelivered()
    {
        return $this->status === self::$STATUS_DELIVERED;
    }
}