<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <title>哈哈商城注册</title>
    <link rel="stylesheet" href="{{ URL::asset('/css/register.css') }}">
    <script type="text/javascript"  src="{{ URL::asset('js/register.js') }}"></script>
</head>
<body>
<div>
    <img id="img" src="image/4.jpg" style="width:100%;height:500px;">
    <a href="" target="_self"><img src="image/p.gif" class="a"></a>
</div>
<table border="0" align="center">
    <form id="form" name="form" method="post" action="http://localhost:8000/register">
        <tr>
            <td colspan="2" align="center"><h2>欢迎注册哈哈</h2></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><h3>每一天，乐在购物</h3></td>

        </tr>
        <tr><td>@if(Session::has('message'))
            <h3 style="color:red;">{{Session::get('message')}}</h3>
                @endif</td></tr>
        <tr>
            <td></td>
            <td align="right"><img src="image/user.jpg" width="70" height="50"/></td>
            <td align="left"><input name="register_name" id="register_name" type="text" placeholder="请输入用户名"/></td>
        </tr>

        <tr>
            <td></td>
            <td style="float: right;">
                <img src="image/a.jpg" id="picture" height="50px" width="50px" border="1px solid red">
            </td>
            <td>
                <select name="register_image" id="image" onchange="document.images['picture'].src=options[selectedIndex].value;"
                        style="width:100px;">
                    <option value="image/a.jpg" selected>头像一</option>
                    <option value="image/e.jpg">头像二</option>
                    <option value="image/f.jpg">头像三</option>
                    <option value="image/h.jpg">头像四</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td align="right"><img src="image/13.jpg" width="50" height="50"/></td>
            <td align="left" id="wrap"><input type="radio" name="business"  value="1"  >我是商家
                <input type="radio" name="business"  value="0" checked>我不是商家
            </td>
        </tr>
        <tr>
            <td></td>
            <td align="right"><img src="image/email.jpg" width="50" height="50"/></td>
            <td><input name="register_email" type="email" id="register_email" placeholder="请输入邮箱"/></td>

        </tr>
        <tr>
            <td></td>
            <td align="right"><img src="image/phone.jpg" width="50" height="50"/></td>
            <td><input name="register_phone" type="text" id="register_phone" placeholder="请输入电话号码"/></td>

        </tr>

        <tr>
            <td></td>
            <td align="right"><img src="image/pwd.jpg" width="50" height="50"/></td>
            <td><input name="register_pwd" type="password" id="register_pwd" placeholder="请输入密码"/></td>
        </tr>
        <tr>
            <td></td>
            <td align="right"><img src="image/pwd.jpg" width="50" height="50"/></td>
            <td><input name="confirmpwd" type="password" id="confirmpwd" placeholder="请再次输入密码"/></td>
        </tr>
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <tr>
            <td colspan="3">
                <button id="submit" class="button" >注册</button>
                <a href="http://localhost:8000/login" class="login">登录</a>
            </td>
        </tr>
    </form>
</table>

</body>
</html>