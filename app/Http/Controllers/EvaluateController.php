<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Model\EvaluateModel;

class EvaluateController extends Controller
{
    public function evaluate()
    {
        $order_id = session('order_id');
        $evaluate= new \App\Http\Model\EvaluateModel();
        $data = $evaluate::where('id', $order_id)->get();
        return view('shopping.evaluate', ['messageRes' => $data]);
    }

    public function evaluatepost()
    {
        $register_name = session('register_name');
       $product_id=$_POST['product_id'];
        session(['product_id' => $product_id]);
        $user_id = session('user_id');
        date_default_timezone_set("Asia/Shanghai");
        $evaluate_time = date("Y-m-d h:i:s");
        $review_text=0;
        $review_time=0;
        $evaluate = new \App\Http\Model\EvaluateModel();
        $evaluate->product_id = $_POST['product_id'];
        $evaluate->user_id = $user_id;
        $evaluate->name = $_POST['name'];
        $evaluate->image = $_POST['image'];
        $evaluate->title = $_POST['title'];
        $evaluate->color = $_POST['color'];
        $evaluate->discount = $_POST['discount'];
        $evaluate->review_text = $review_text;
        $evaluate->review_time = $review_time;
        $evaluate->register_name = $register_name;
        $evaluate->evaluate_time = $evaluate_time;
        $evaluate->evaluate_text = $_POST['evaluate_text'];
        $evaluate->evaluate_grade = $_POST['evaluate_grade'];
        $bool = $evaluate->save();
        if ($bool ==1) {
            $result = array('msg' => 'aaaa');
            echo json_encode($result);
        } else {
            return false;
        }

    }

    public function evaluateshow()
    {
        $user_id = session('user_id');
        $evaluate = new \App\Http\Model\EvaluateModel();
        $num = $evaluate::where('user_id', $user_id)->count();
        if ($num == 0) {
            return redirect('recommend')->with('message', '暂无评价,可以看看有哪些想买的');
        } else {
            $data = $evaluate::where('user_id', $user_id)->get();
            return view('shopping.evaluateshow', ['messageRes' => $data]);
        }

    }
    public function evaluatedel(){
        $id=$_GET['id'];
        $evaluate = new \App\Http\Model\EvaluateModel();
        $del= $evaluate::where('id', $id)->delete();
        if ($del) {
            return redirect('evaluateshow')->with('message','评价删除成功');
        } else {
            return redirect('evaluateshow')->with('message','评价删除失败');
        }
    }

    public function review(){
        $id=$_GET['id'];
        $evaluate = new \App\Http\Model\EvaluateModel();
        $data=$evaluate::where('id', $id)->get();
        return view('shopping.review')->with(['messageRes'=>$data]);
    }
    public function reviewpost(){
        $id=$_POST['id'];
        $review_text=$_POST['review_text'];
        date_default_timezone_set("Asia/Shanghai");
        $review_time = date("Y-m-d h:i:s A l");
        $evaluate = new \App\Http\Model\EvaluateModel();
        $res = $evaluate::where('id',$id)->update(['review_text'=>$review_text,'review_time'=>$review_time]);
        if ($res) {
            return redirect('evaluateshow')->with('message','追评成功');
        } else {
            return redirect('evaluateshow')->with('message', '评价失败');

        }
    }

}



