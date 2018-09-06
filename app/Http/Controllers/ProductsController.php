<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Model\ProductsModel;

class ProductsController extends Controller
{
    public function getshop()
    {
        $products = new \App\Http\Model\ProductsModel();
        $data = $products::all();
        return json_encode($data);

        /*if ($data->count() == 0) {
            return '暂无商品';
        } else {
            return view('shopping.shop', ['messageRes' => $data]);
        }*/
    }

    public function shop()
    {
        return view('shopping.shop');
    }

    public function descend()
    {

        $products = new \App\Http\Model\ProductsModel();
        if ($_GET['name'] == 'desc') {
            $data = $products::orderBy('discount', 'DESC')->get();
        } elseif ($_GET['name'] == 'asc') {
            $data = $products::orderBy('discount', 'ASC')->get();
        }
        return json_encode($data);
    }


    public function screenpost()
    {
        $products = new \App\Http\Model\ProductsModel();
        $product_type = $_POST['product_type'];
        $minprice = $_POST['minprice'];
        $maxprice = $_POST['maxprice'];
        $data = $products::where('product_type', $product_type)->get();
        $arr = $products::where([['discount', '>=', $minprice], ['discount', '<=', $maxprice]])->get();
        if ($data->count() == 0) {
            return redirect('hh')->with('message', '暂无此类商品');
        } elseif ($arr->count() == 0) {
            return redirect('hh')->with('message', '暂无此价格区间商品');
        } else {
            $array = $products::where([['product_type', '=', $product_type], ['discount', '>=', $minprice], ['discount', '<=', $maxprice]])->get();
            return json_encode($array);
        }
    }

    public function product(){
        $id=$_GET['id'];
        session(['id'=>$id]);
        $collections = new \App\Http\Model\CollectionModel();
        $evaluates = new \App\Http\Model\EvaluateModel();
        $collection = $collections::where('product_id', $id)->count();
        $evaluate = $evaluates::where('product_id', $id)->where('evaluate_grade', '>=', 4)->count();
        $already = $collections::where('product_id', $id)->where('user_id', session('user_id'))->count();
        $products = new \App\Http\Model\ProductsModel();
        $maylike = $products::inRandomOrder()->take(4)->get();
        $array = $products::where('id', $id)->first();
        $arr = ['collection' => $collection, 'evaluate' => $evaluate, 'already' => $already];
        $data = ['array' => $array,'arr'=>$arr,'maylike'=>$maylike];
          return json_encode($data);
        //return view('shopping.product', ['messageRes' => $data]);
    }
    public function common(){
        $products = new \App\Http\Model\ProductsModel();
        $maylike = $products::inRandomOrder()->take(4)->get();
        return json_encode($maylike);
    }

    public function productpost()
    {
        $num = 1;
       $product_id=$_GET['id'];
       $shop_id=$_GET['shop_id'];
       $user_id=session('user_id');
        $products = new \App\Http\Model\ProductsModel();
        $arr = $products::where('id', $product_id)->first();
        $cart = new \App\Http\Model\CartModel();
        $count=$cart::where('user_id',$user_id)->where('product_id',$product_id)->count();
        if ($count == 0) {
            $cart->product_id = $product_id;
            $cart->user_id = $user_id;
            $cart->shop_id = $shop_id;
            $cart->shop_name = $arr['shop_name'];
            $cart->name = $arr['name'];
            $cart->image = $arr['image'];
            $cart->num= $num;
            $cart->price = $arr['price'];
            $cart->discount = $arr['discount'];
            $cart->description = $arr['description'];
            $bool = $cart->save();
            if ($bool == 1) {
                $result = array('msg' => 'aaaa');
                return json_encode($result);
            }
        } else {
            $number = $num + 1;
            $update = $cart::where('user_id',$user_id)->where('product_id', $product_id)->update(['num' => $number]);
            if ($update) {
                $result = array('msg' => 'aaaa');
                return json_encode($result);
            }
        }
    }

    public function getcart()
    {
        $user_id = session('user_id');
        $cart = new \App\Http\Model\CartModel();
        $data = $cart::where('user_id', $user_id)->get();
        echo json_encode($data);
    }


    public function delete()
    {
        $id = $_GET['id'];
        $cart = new \App\Http\Model\CartModel();
        $res=$cart::where('id',$id)->delete();
        if($res){
            $result = array('msg' => 'aaaa');
            return json_encode($result);
        }else{
            return false;
        }
    }

    public function alldel()
    {
        $j = count($_COOKIE) - 7;
        for ($i = 1; $i < $j; $i++) {
            setcookie($i, '');
        }
        return view('shopping.cart')->with('message', '已将商品从购物车上删除');
    }

    public function cartcount()
    {
        $user_id = session('user_id');
        $cart = new \App\Http\Model\CartModel();
        $j = $cart::where('user_id', $user_id)->count();
        echo json_encode($j);
    }

    public function home()
    {
        return view('shopping.home');
    }

    public function released()
    {
        $user_id = $_GET['user_id'];
        $products = new \App\Http\Model\ProductsModel();
        $data = $products::where('user_id', $user_id)->get();
        return view('shopping.released', ['messageRes' => $data]);
    }

    public function recommend()
    {
        $products = new \App\Http\Model\ProductsModel();
        $maylike = $products::inRandomOrder()->take(4)->get();
        return view('shopping.recommend', ['maylike' => $maylike]);
    }

    public function search()
    {

        if ($_POST['name'] == '') {
            $name = 'iphone';
        } else {
            $name = $_POST['name'];
        }
        $products = new \App\Http\Model\ProductsModel();
        $data = $products::where('name', 'like', '%' . $name . '%')->get();
        if ($data->count() == 0) {
            $data = array("msg" => "aaaa");
            return $data;
        } else {
            return $data;
        }
    }
}
