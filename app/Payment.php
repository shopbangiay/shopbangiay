<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['payment_method', 'payment_status'];
    
    protected $primaryKey = 'payment_id';

    protected $table = 'payment';

    public function order(){
        return $this->hasOne('App\Order');
    }
}
