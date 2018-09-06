<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\LoginModel;

class LoginController extends Controller
{

    public function test3()
    {

        $studnets = Student::all();
        dd($studnets);
        $student = Student::find(5);  //主键为5的记录
        var_dump($student['attributes']);
        $student = Student::get();
        var_dump($student);
    }

    public function register()
    {
        return view('shopping.register');
    }

    public function registerpost()
    {
        $user = new \App\Http\Model\LoginModel();
        $num = $user::where('register_name', $_POST['register_name'])->count();
        if ($num > 0) {
            return redirect('register')->with('message', '用户名重复');
        } else {
            if ($_POST['register_pwd'] != $_POST['confirmpwd']) {
                return redirect('register')->with('message', '密码确认错误');
            } else {
                $user = new \App\Http\Model\LoginModel();
                $user->register_name = $_POST['register_name'];
                $user->register_image = $_POST['register_image'];
                $user->register_email = $_POST['register_email'];
                $user->register_phone = $_POST['register_phone'];
                $user->business = $_POST['business'];
                $user->register_pwd = $_POST['register_pwd'];
                $bool = $user->save();
                if ($bool == 1) {
                    return redirect('login')->with('message', '注册成功，请登录');
                } else {
                    return redirect('register')->with('message', '注册失败，请重新注册');
                }
            }
        }
    }


    public function login()
    {
        return view('shopping.login');
    }

    public function loginpost()
    {

        $code = $_POST['code'];
        if (session('milkcaptcha') == $code) {
            $login_name = $_POST['login_name'];
            $login_pwd = $_POST['login_pwd'];
            $user = new \App\Http\Model\LoginModel();
            $data = $user::where('register_name', $login_name)->first();
            if (!$data) {
                return redirect('login')->with('message', '用户名错误');
            } else {
                if ($data['register_pwd'] == $login_pwd) {
                    session(['user_id' => $data['id']]);
                    session(['register_name' => $data['register_name']]);
                    session(['business' => $data['business']]);
                    if ($data['business'] == 0) {
                        return redirect('shop');
                    } else {
                        return redirect('business');
                    }
                } else {
                    return redirect('login')->with('message', '密码错误');
                }
            }
        } else {
            return redirect('login')->with('message', '验证码错误');
        }

    }

    public function loginout()
    {
        session()->flush();
        $sessions = session()->all();
        if (empty($sessions)) {
            return redirect('login')->with('message', '已退出登录');
        }

    }

    public function information()
    {
        $user = new \App\Http\Model\LoginModel();
        $user_id = session('user_id');
        $data = $user::where('id', $user_id)->first();
        return json_encode($data);

    }

    public function update()
    {
        return view('shopping.update');
    }

    public function updatepost()
    {
        $userpwd = $_POST['userpwd'];
        $newpwd = $_POST['newpwd'];
        $register_name = session('register_name');
        $user = new \App\Http\Model\LoginModel();
        $data = $user->where('register_name', $register_name)->first();
        if ($userpwd != $data['register_pwd']) {
            return redirect('update')->with('message', '原密码错误');
        } else {
            $update = $user->where('register_name', $register_name)->update(['register_pwd' => $newpwd]);
            if ($update) {
                return redirect('login')->with('message', '密码已修改，请重新登录');
            } else {
                return redirect('update')->with('message', '修改失败');
            }
        }
    }
}
