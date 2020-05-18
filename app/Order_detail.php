<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['order_id', 'product_id', 'product_name', 'product_price', 'product_quantity'];
    
    protected $primaryKey = 'order_detail_id';

    protected $table = 'order_detail';

    public function order(){
        return $this->belongsTo('App\Order');
    }
}
