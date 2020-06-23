<?php

namespace App\Order;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
		'order_id',
        'amount',
        'nama',
        'email',
        'address',
        'city_id',
        'phone',
	];

    /**
     * Set status to Pending
     *
     * @return void
     */
    public function setPending()
    {
        $this->attributes['status'] = 'pending';
        self::save();
    }
 
    /**
     * Set status to Success
     *
     * @return void
     */
    public function setSuccess()
    {
        $this->attributes['status'] = 'success';
        self::save();
    }
 
    /**
     * Set status to Failed
     *
     * @return void
     */
    public function setFailed()
    {
        $this->attributes['status'] = 'failed';
        self::save();
    }
 
    /**
     * Set status to Expired
     *
     * @return void
     */
    public function setExpired()
    {
        $this->attributes['status'] = 'expired';
        self::save();
    }

    public function user()
    {
        return $this->belongsTo(App\User::class, 'user_id')->withTrashed();
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'order_id')->withTrashed();
    }
}
