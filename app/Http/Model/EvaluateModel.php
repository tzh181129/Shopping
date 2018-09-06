<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class EvaluateModel extends Model
{
    public function order()
    {
        return $this->belongsTo('App\Http\Model\OrderModel');
    }
    protected $table='evaluate';
    protected $primaryKey='evaluate_id';
    public $timestamps=false;
}
