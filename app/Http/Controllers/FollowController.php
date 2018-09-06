<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Model\followModel;

class FollowController extends Controller
{
    public function follow()
    {
        $follow = new \App\Http\Model\followModel();
        $shop_id = $_GET['id'];
        $user_id = session('user_id');
        $shop = new \App\Http\Model\ShopModel();
        $arr = $shop::where('id', $shop_id)->first();
        $follow->shop_id = $shop_id;
        $follow->shop_name = $arr->shop_name;
        $follow->user_id= $user_id;
        $follow->shop_details = $arr->shop_details;
        $follow->shop_image= $arr->shop_image;
            $bool = $follow->save();
            if ($bool) {
                $result = array('msg' => 'mmm');
                return json_encode($result);
            } else {
                return false;
            }
    }

    public function myfollow()
    {
        $user_id = session('user_id');
        $follow = new \App\Http\Model\followModel();
        $arr = $follow::where('user_id', $user_id)->get();
        return json_encode($arr);

    }

    public function followdel()
    {
        $id = $_GET['id'];
        $follow = new \App\Http\Model\followModel();
        $delete = $follow::where('id', $id)->delete();
        if ($delete) {
            $result = array('msg' => 'mmm');
            return json_encode($result);
        } else {
            return false;
        }
    }
}
