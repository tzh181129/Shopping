
<html>
<head>
    <title>商品评价</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .a {
            position: absolute;
            top: 10%;
        }

    </style>
</head>
<body>
<div class="container a">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            @if(Session::has('message'))
                <p style="color:red;">{{Session::get('message')}}</p>
            @endif
        </div>
    </div>
    <form class="form-horizontal" method="post" action="">
        @foreach ($messageRes as $message)
        <div class="form-group ">
            <div class="col-sm-offset-4">
                <input type="hidden" name="product_id" value="{{ $message->product_id}}">
                <input type="hidden" name="name" value="{{ $message->name}}">
                <input type="hidden" name="color" value="{{ $message->color}}">
                <input type="hidden" name="discount" value="{{ $message->discount}}">
                <label for="inputEmail3" class="col-sm-2 control-label" style="margin-top:10%;">商品图像</label>
                <div class="col-sm-5 ">
                    <img src="{{ $message->image}}" class="img-rounded" name="image" style="width:80%;height:30%;">
                </div>
            </div>
        </div>
        @endforeach
        <div class="form-group">
            <div class="col-sm-offset-4">
                <label for="inputPassword3" class="col-sm-2 control-label">评价内容</label>
                <div class="col-sm-4">
                        <textarea name="evaluate_text" class="form-control" rows="3" placeholder="请输入评价"></textarea>
                </div>
            </div>
        </div>
            <div class="form-group">
                <div class="col-sm-offset-4">
                    <label for="inputPassword3" class="col-sm-2 control-label">服务等级</label>
                    <div class="col-sm-6" style="margin-top:1%;">
                        <input type="radio" value="0"  name="evaluate_grade">差&nbsp;&nbsp;<input type="radio" value="1" name="evaluate_grade">一般&nbsp;&nbsp;
                        <input type="radio" value="2"  name="evaluate_grade">好&nbsp;&nbsp;<input type="radio" value="3" name="evaluate_grade" checked>很好&nbsp;&nbsp;
                        <input type="radio" value="4"  name="evaluate_grade">非常好
                    </div>
                </div>
            </div>
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <div class="form-group">
            <div class="col-sm-offset-5">
                <div class="col-sm-5">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="评价">
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>