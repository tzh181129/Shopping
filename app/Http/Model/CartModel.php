<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    public function products()
    {
        return $this->belongsTo('App\Http\Model\ProductsModel');
    }
    protected $table='cart';
    protected $primaryKey='cart_id';
    public $timestamps=false;
}
