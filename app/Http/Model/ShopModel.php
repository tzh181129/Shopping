<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class ShopModel extends Model
{
    public function dossiers()
    {
        return $this->belongsTo('App\Http\Model\LoginModel');

    }
    public function follow()
    {
        return $this->belongsTo('App\Http\Model\followModel');

    }

    protected $table='shop';
    protected $primaryKey='shop_id';
    public $timestamps=false;
}
