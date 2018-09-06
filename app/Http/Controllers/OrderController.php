<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Model\OrderModel;

class OrderController extends Controller
{
    public function form(){
        $data=['product_id'=>$_POST['id'],'shop_id'=>$_POST['shop_id'],'shop_name'=>$_POST['shop_name'],
            'name'=>$_POST['name'],'title'=>$_POST['title'],'price'=>$_POST['price'],'discount'=>$_POST['discount'],
            'address'=>$_POST['address'],'color'=>$_POST['color'],'image'=>$_POST['image']];
        session(['data' => $data]);
       return view('shopping.form');

    }
    public function orderpost(){
        $num=1;
        $user_id=session('user_id');
        $product_id=$_GET['product_id'];
        $shop_id = $_GET['shop_id'];
        $login= new \App\Http\Model\LoginModel();
        $arr=$login::where('id',$user_id)->first();
        $products = new \App\Http\Model\ProductsModel();
        $data=$products::where('id',$product_id)->first();
        $total=$num*$data['discount'];
        $order_number=time().rand();
        date_default_timezone_set("Asia/Shanghai");
        $create_time = date("Y-m-d h:i:s A l");
        $delivery_time=0;
        $finish_time=0;
        $order = new \App\Http\Model\OrderModel();
        $order->user_id=$user_id;
        $order->shop_id=$shop_id;
        $order->product_id=$product_id;
        $order->name = $data['name'];
        $order->image = $data['image'];
        $order->title = $data['title'];
        $order->price = $data['price'];
        $order->discount = $data['discount'];
        $order->user_name=$arr['register_name'];
        $order->user_address='上海';
        $order->user_phone = $arr['register_phone'];
        $order->shop_name= $data['shop_name'];
        $order->address= $data['address'];
        $order->color= $data['color'];
        $order->num= $num;
        $order->total=$total;
        $order->delivery_time= $delivery_time;
        $order->order_number= $order_number;
        $order->create_time= $create_time;
        $order->finish_time= $finish_time;
        $bool = $order->save();
        if ($bool==1) {
            $result = array('msg' => 'aaaa');
            return json_encode($result);
        } else {
            return false;
        }

    }
    public function allorder(){
        return view('shopping.allorder');
    }

    public function order(){
           $user_id=session('user_id');
        $order = new \App\Http\Model\OrderModel();
           $data=$order::where('user_id',$user_id)->get();
           return json_encode($data);
    }

    public function myorder(){
          $id=$_GET['id'];
          //session(['order_id'=>$id]);
        date_default_timezone_set("Asia/Shanghai");
        $finish_time = date("Y-m-d h:i:s A l");
        $order = new \App\Http\Model\OrderModel();
          $res=$order::where('id',$id)->update(['finish_time'=>$finish_time]);
          if($res) {
              $result = array('msg' => 'aaaa');
              return json_encode($result);
          }else{
              return false;
          }
    }
    public function unshipped(){
        $order = new \App\Http\Model\OrderModel();
        $data=$order::where('delivery_time',0)->get();
        return json_encode($data);
    }
    public function already(){
        $order = new \App\Http\Model\OrderModel();
        $data=$order::where('delivery_time','!=',0)->where('finish_time',0)->get();
        return json_encode($data);
    }
    public function orderfinish(){
        $order = new \App\Http\Model\OrderModel();
        $data=$order::where('finish_time','!=',0)->get();
        return json_encode($data);
    }
    public function orderdel()
    {
         $id=$_GET['id'];
        $order = new \App\Http\Model\OrderModel();
        $delete =$order::where('id', $id)->delete();
        if($delete){
            $result = array('msg' => 'aaaa');
            return json_encode($result);
        }else{
            return false;
        }
    }
    public function shoporder(){

        $shop_id=$_GET['shop_id'];
        $order = new \App\Http\Model\OrderModel();
        $data=$order::where('shop_id',$shop_id)->get();
        if($data->count()==0){
            $result = array('msg' => 'aaaa');
            return json_encode($result);
        }else {
            return json_encode($data);
        }
    }
    public function shoporderpost(){
        $id=$_POST['id'];
        date_default_timezone_set("Asia/Shanghai");
        $delivery_time = date("Y-m-d h:i:s A l");
        $order = new \App\Http\Model\OrderModel();
        $res=$order::where('id',$id)->update(['delivery_time'=>$delivery_time]);
        if ($res) {
            return redirect('shoporder')->with('message','已发货');
        }
    }
    public function delivery(){
        $order = new \App\Http\Model\OrderModel();
        $data=$order::where('delivery_time',0)->where('finish_time',0)->get();
       return json_encode($data);
    }
    public function shopalready(){
        $order = new \App\Http\Model\OrderModel();
        $data=$order::where('delivery_time','!=',0)->where('finish_time',0)->get();
        return json_encode($data);
    }
    public function shopfinish(){
        $order = new \App\Http\Model\OrderModel();
        $data=$order::where('finish_time','!=',0)->get();
       return json_encode($data);
    }

}
