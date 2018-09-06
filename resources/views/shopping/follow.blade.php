<html>
<head>
    <title>我的关注</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .a{
            position: absolute;
            top:10%;
        }
    </style>
</head>
<body>
<div class="container a">
    <div class="row" style="margin-top:2%;">
        <div class="col-sm-3 col-sm-offset-3 "><img src="{{$messageRes['shop_image']}}" class="img-circle" style="width:80%;height:30%;"></div>
    <div class="col-sm-6">
        <br/><br/>
        <p><a href="{{url('myshop')}}?shop_id={{$messageRes['shop_id']}}">{{$messageRes['shop_name']}}</a></p>
        <p style="color: #D3D3D3 ;">已有{{$messageRes['number']}}人关注</p>
        <p>{{$messageRes['shop_details']}}</p>
    <p><a href="{{url('followdelete')}}?id={{$messageRes['follow_id']}}" style="color:red;">取消关注</a></p>
    </div>
    </div>
</div>
</body>
</html>