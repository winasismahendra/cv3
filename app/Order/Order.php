<?php

namespace App\Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	'product_qty',
    	'user_id',
       'order_id',
       'product_id',
        'product_name',
        'product_image',
        'product_price',
        'total'
    ];

    public function user()
    {
        return $this->belongsTo(App\User::class, 'user_id')->withTrashed();
    }

    public function payments()
    {
        return $this->belongsTo(Payment::class, 'payment_id')->withTrashed();
    }
}
