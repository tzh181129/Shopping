
<html>
<head>
    <title>订单确定</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .a{
            position: absolute;
            top:20%;
        }
    </style>
</head>
<body>
<div class="container a">
    <form class="form-horizontal" method="post" action="{{url('orderpost')}}">
        <div class="form-group ">
            <div class="col-sm-offset-4">
            <label for="inputEmail3" class="col-sm-2 control-label">收货人</label>
            <div class="col-sm-5 ">
                <input type="text" name="user_name" class="form-control" id="inputEmail3" placeholder="请输入收货人">
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4">
            <label for="inputPassword3" class="col-sm-2 control-label">电话号码</label>
            <div class="col-sm-5">
                <input type="text" name="user_phone" class="form-control" id="inputPassword3" placeholder="请输入电话号码">
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4">
                <label for="inputPassword3" class="col-sm-2 control-label">数量</label>
                <div class="col-sm-5">
                    <input type="text" name="num" class="form-control" id="inputPassword3" placeholder="请输入购买数量">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4">
                <label for="inputPassword3" class="col-sm-2 control-label">收货地址</label>
                <div class="col-sm-5">
                    <input type="text" name="user_address" class="form-control" id="inputPassword3" placeholder="请输入正确的收货地址">
                </div>
            </div>
        </div>
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <div class="form-group">
            <div class="col-sm-offset-5">
                <div class="col-sm-6">
                    <input type="submit" class="btn btn-success btn-block" value="确认">
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>