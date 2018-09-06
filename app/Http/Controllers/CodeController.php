<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Gregwar\Captcha\CaptchaBuilder;
use Session;
class CodeController extends Controller{
    public function code($tmp)
    {
        $builder = new CaptchaBuilder();
        $builder->build(150,40);
        $phrase = $builder->getPhrase();
        //把内容存入session
        Session::flash('milkcaptcha', $phrase); //存储验证码
        ob_clean();
        return response($builder->output())->header('Content-type','image/jpeg');
    }

}