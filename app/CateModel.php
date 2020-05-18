<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CateModel extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['category_name', 'category_desc', 'category_status'];
    
    protected $primaryKey = 'category_id';

    protected $table = 'category_product';

    public function product_cate(){
        return $this->hasMany('App\Product');
    }
    
}
