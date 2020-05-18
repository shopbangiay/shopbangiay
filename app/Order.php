<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['customer_id', 'shipping_id', 'payment_id', 'order_total', 'order_status'];
    
    protected $primaryKey = 'order_id';

    protected $table = 'order';

    public function customer(){
        return $this->belongsTo('App\Customer');
    }

    public function shipping(){
        return $this->belongsTo('App\shipping');
    }

    public function order_detail(){
        return $this->hasMany('App\Order_detail');
    }

    public function payment(){
        return $this->hasOne('App\Payment');
    }
}
