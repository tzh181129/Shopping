<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Model\CollectionModel;

class CollectionController extends Controller
{
    public function collectionpost()
    {
        $user_id = session('user_id');
        $product_id = $_GET['id'];
        $shop_id = $_GET['shop_id'];
        $products = new \App\Http\Model\ProductsModel();
        $arr = $products::where('id', $product_id)->first();
        $collection = new \App\Http\Model\CollectionModel();
        $collection->product_id = $product_id;
        $collection->user_id = $user_id;
        $collection->shop_id = $shop_id;
        $collection->name = $arr['name'];
        $collection->image = $arr['image'];
        $collection->title = $arr['title'];
        $collection->price = $arr['price'];
        $collection->discount = $arr['discount'];
        $bool = $collection->save();
        if ($bool == 1) {
            $result = array('msg' => 'aaaa');
            return json_encode($result);
        } else {
            return false;
        }


    }

    public function collectionshow()
    {
        $user_id = session('user_id');
        $collection = new \App\Http\Model\CollectionModel();
        $num = $collection::where('user_id', $user_id)->count();
        if ($num == 0) {
            $result = array('msg' => 'aaaa');
            return json_encode($result);
        } else {
            $data = $collection::where('user_id', $user_id)->get();
            return json_encode($data);
        }
    }

    public function collectiondel()
    {
        $id = $_GET['id'];
        $collection = new \App\Http\Model\CollectionModel();
        $delete = $collection::where('id', $id)->delete();
        if ($delete == 1) {
            $result = array('msg' => 'aaaa');
            echo json_encode($result);
        } else {
            return false;
        }
    }
}
