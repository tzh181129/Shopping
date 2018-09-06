<html>
<head>
    <title>修改密码</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .a {
            position: absolute;
            top: 25%;
        }

    </style>
</head>
<body>
<div class="container a">
    <div class="col-sm-7 col-sm-offset-6">
        @if(Session::has('message'))
            <p style="color:red;">{{Session::get('message')}}</p>
        @endif
    </div>
    <form class="form-horizontal" method="post" action="">
        <div class="form-group ">
            <div class="col-sm-offset-4">
                <label for="inputEmail3" class="col-sm-2 control-label">原密码</label>
                <div class="col-sm-5 ">
                    <input name="userpwd" type="password" class="form-control"  id="userpwd" placeholder="请输入原密码"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4">
                <label for="inputPassword3" class="col-sm-2 control-label">新密码</label>
                <div class="col-sm-5">
                        <input name="newpwd" type="password" class="form-control" id="newpwd" placeholder="请输入新密码"/>
                </div>
            </div>
        </div>
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <div class="form-group">
            <div class="col-sm-offset-5">
                <div class="col-sm-6">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="修改">
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>
