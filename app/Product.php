<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['product_name', 'product_desc', 'product_content', 'product_price', 'product_image', 'product_status', 'category_id', 'brand_id'];
    
    protected $primaryKey = 'product_id';

    protected $table = 'product';

    public function category(){
        return $this->belongsTo('App\CateModel');
    }

    public function brand(){
        return $this->belongsTo('App\Brand');
    }
}
