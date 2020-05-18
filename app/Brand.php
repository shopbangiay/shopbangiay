<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['brand_name', 'category_desc', 'category_status'];
    
    protected $primaryKey = 'brand_id';

    protected $table = 'brand_product';

    public function product_brand(){
        return $this->hasMany('App\Product');
    }
}
