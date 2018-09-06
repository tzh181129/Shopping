<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class CollectionModel extends Model
{

    public function product()
    {
        return $this->belongsTo('App\Http\Model\ProductsModel');
    }
    protected $table='collection';
    protected $primaryKey='collection_id';
    public $timestamps=false;
}
