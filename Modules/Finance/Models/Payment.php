<?php

namespace Modules\Finance\Models;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    // Payment Methods
    static $PAYMENT_METHOD_CREDIT_CARD = 'credit_card';
    static $PAYMENT_METHOD_PAYPAL = 'paypal';
    static $PAYMENT_METHOD_CASH = 'cash';

    // Statuses
    static $PAYMENT_STATUS_PENDING = 'pending';
    static $PAYMENT_STATUS_COMPLETED = 'completed';
    static $PAYMENT_STATUS_FAILED = 'failed';

    protected $fillable = [
        'order_id',
        'payee_profile_id',
        'payment_method',
        'payment_status',
        'transaction_details',
        'amount',
    ];

    protected $casts = [
        'transaction_details' => 'json',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function payeeProfile()
    {
        return $this->belongsTo(Profile::class, 'payee_profile_id');
    }
}