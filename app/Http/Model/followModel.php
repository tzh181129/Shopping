<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class followModel extends Model
{
    public function shop()
    {
        return $this->belongsTo('App\Http\Model\ShopModel');
    }
    protected $table='follow';
    protected $primaryKey='follow_id';
    public $timestamps=false;
}
