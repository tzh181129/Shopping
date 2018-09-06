<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>哈哈商城登录</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        function re_captcha() {

            $url = "{{ URL('code') }}";
            $url = $url + "/" + Math.random();
            document.getElementById('code').src = $url;
        }

    </script>
</head>
<body>
<div class="logo col-sm-5 col-sm-offset-5">
    <a href="" class="logo_text">
        <img src="image/p.gif" alt="logo" style="width:30%; margin-top:10%;"/>
    </a>
</div>
<div class="input_ico col-sm-4 col-md-offset-5">
    @if(Session::has('message'))
        <h3 style="color:red;">{{Session::get('message')}}</h3>
    @endif
</div>
<form class="form-horizontal" method="post" name="form" action="http://localhost:8000/login">
    <div class="form-group has-feedback">
        <div class="input_ico col-sm-4 col-sm-offset-4">
            <div class="input-group ">
                <span class="glyphicon glyphicon-user input-group-addon input-lg" ></span>
                <input type="text" name="login_name" class="form-control input-lg" placeholder="用户名" style="margin-top:1px;">
            </div>
        </div>
    </div>
    <div class="form-group has-feedback">

            <div class="input_ico col-sm-4 col-sm-offset-4">
                <div class="input-group ">
                    <span class="glyphicon glyphicon-lock input-group-addon input-lg"></span>
                    <input type="password" name="login_pwd" class="form-control input-lg" placeholder="密码" style="margin-top:1px;">
                </div>
            </div>

    </div>
    <div class="form-group">
        <div class="input_ico col-sm-2 col-sm-offset-4">
            <a onclick="javascript:re_captcha();"><img src="{{url('code/1')}}" id="code"/></a>
        </div>
        <div class="input_ico col-sm-2 ">
            <input class="form-control placeholder-no-fix input-lg" type="text" maxlength="5" autocomplete="off"
                   placeholder="请输入验证码" name="code">
        </div>
    </div>
    <div class="form-group">
        <div class="input_ico  col-sm-4 col-sm-offset-4 ">
            <input class="form-control placeholder-no-fix password" type="hidden" name="_token"
                   value="<?php echo csrf_token(); ?>">
        </div>
    </div>
    <div class="login_action col-sm-4  col-sm-offset-4">
        <button id="submit" class="btn btn-primary btn-lg btn-block">登录</button>
    </div>
    <div class="login_action col-sm-4  col-sm-offset-6">
        没有账号?
        <a href="{{url('register')}}">注册</a>
    </div>

</form>
</body>
</html>