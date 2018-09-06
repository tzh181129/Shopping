<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    public function cart()
    {
        return $this->belongsTo('App\Http\Model\CartModel');
    }
    public function collection()
    {
        return $this->belongsTo('App\Http\Model\CollectionModel');
    }
    public function evaluate()
    {
        return $this->belongsTo('App\Http\Model\EvaluateModel');
    }
    protected $table='products';
    protected $primaryKey='products_id';
    public $timestamps=false;
}
