<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    public function products()
    {
        return $this->belongsTo('App\Http\Model\ProductsModel');
    }
    public function login()
    {
        return $this->belongsTo('App\Http\Model\LoginModel');
    }
    protected $table='order';
    protected $primaryKey='order_id';
    public $timestamps=false;
}
