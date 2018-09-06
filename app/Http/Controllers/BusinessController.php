<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Model\ShopModel;

class BusinessController extends Controller
{

    public function business()
    {
        return view('shopping.business');
    }

    public function businesshome()
    {
        return view('shopping.businesshome');
    }

    public function businesspost()
    {
        $shop = new \App\Http\Model\ShopModel();
        $num = $shop::where('shop_name', $_POST['shop_name'])->count();
        if ($num > 0) {
            return redirect('business')->with('message', '店铺名重复');
        } else {
            $img = $_POST['shop_image'];
            $image = 'image/' . $img;
            $user_name = session('register_name');
            $user_id = session('user_id');
            $shop->shop_name = $_POST['shop_name'];
            $shop->user_id = $user_id;
            $shop->register_name = $user_name;
            $shop->shop_image = $image;
            $shop->shop_details = $_POST['shop_details'];
            $shop->shop_advert = $_POST['shop_advert'];
            $bool = $shop->save();
            if ($bool == 1) {
                return redirect('release')->with('message', '店铺创建成功');
            } else {
                return redirect('business')->with('message', ' 店铺创建失败，请重新创建');
            }
        }
    }


    public function release()
    {
        if(session('business')==1) {
            return view('shopping.release');
        }else{
            return redirect('business')->with('message','您不是商家，无权发布商品');
        }
    }

    public function releasepost()
    {
        header('Content-type:application/json');
        $img = $_POST['image'];
        $image = 'image/' .substr($img, 12) ;
        $user_id = session('user_id');
        $shop = new \App\Http\Model\ShopModel();
        $arr = $shop::where('user_id', $user_id)->first();
        $shop_id = $arr->id;
        $shop_name = $arr->shop_name;
        session(['shop_id' => $shop_id]);
        $products = new \App\Http\Model\ProductsModel();
        $products->shop_id = $shop_id;
        $products->shop_name = $shop_name;
        $products->user_id = $user_id;
        $products->name = $_POST['name'];
        $products->image = $image;
        $products->title = $_POST['title'];
        $products->discount = $_POST['discount'];
        $products->description = $_POST['description'];
        $products->address = $_POST['address'];
        $products->color= $_POST['color'];
        $products->product_type = $_POST['product_type'];
        $products->price= $_POST['price'];
        $bool = $products->save();
        if ($bool ==1) {
            $result = array('msg' => 'aaaa');
            echo json_encode($result);
        } else {
            return false;
        }
    }

    public function myshop()
    {
        $user_id=session('user_id');
        $shop = new \App\Http\Model\ShopModel();
        $arr = $shop::where('user_id', $user_id)->first();
        $shop_id=$arr->id;
        session(['shop_id' => $shop_id]);
        $follow = new \App\Http\Model\followModel();
        $num = $follow::where('shop_id', $shop_id)->count();
        $data = ['num' => $num, 'shop_id' => $shop_id, 'shop_image' => $arr->shop_image, 'shop_name' => $arr->shop_name,
            'shop_details' => $arr->shop_details, 'shop_advert' => $arr->shop_advert];
       return json_encode($data);
    }

    public function shopshow()
    {
        $shop_id = $_GET['shop_id'];
        session(['shop_id'=>$shop_id]);
        $follow = new \App\Http\Model\followModel();
        $shop = new \App\Http\Model\ShopModel();
        $products = new \App\Http\Model\ProductsModel();
        $num = $follow::where('shop_id', $shop_id)->count();
        $alery=$follow::where('shop_id',$shop_id)->where('user_id',session('user_id'))->count();
        $arr = $shop::where('id', $shop_id)->first();
       $array=$products::where('shop_id',$shop_id)->get();
        $data = ['num' => $num,'alery'=>$alery,'shop_id' => $shop_id, 'shop_image' => $arr->shop_image, 'shop_name' => $arr->shop_name,
            'shop_details' => $arr->shop_details, 'shop_advert' => $arr->shop_advert];
        $result=['data'=>$data,'array'=>$array];
        return json_encode($result);
    }
    public function shopsearch(){
            $name = $_POST['name'];
            $shop_id=$_POST['shop_id'];
        $products = new \App\Http\Model\ProductsModel();
        $data = $products::where('shop_id',$shop_id)->where('name', 'like','%'.$name.'%')->get();
        if($data->count()==0){
            return view('shopping.shop')->with('message', '无搜索的商品');
        }else {
            return view('shopping.shop', ['messageRes' => $data]);
        }
    }
}
