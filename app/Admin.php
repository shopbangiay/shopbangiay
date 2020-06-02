<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['admin_name', 'admin_email', 'admin_password'];
    
    protected $primaryKey = 'admin_id';

    protected $table = 'admin';
}
