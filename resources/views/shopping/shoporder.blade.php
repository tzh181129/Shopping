<html>
<head>
    <title>店铺订单</title>
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
<body >
<div class="container a">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-5">
            @if(Session::has('message'))
                <h3 style="color:red;">{{Session::get('message')}}</h3>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 col-sm-offset-3"><a href="{{url('delivery')}}">未发货</a></div>
        <div class="col-sm-3"><a href="{{url('shopalready')}}">已发货</a></div>
        <div class="col-sm-3"><a href="{{url('shopfinish')}}">已完成</a></div>
    </div>
    <div class="row">

        @foreach ($messageRes as $message)
            <div class="row">
                <div class="col-sm-4 col-sm-offset-2" ><a href="http://localhost:8000/myshop?shop_id={{$message->shop_id}}"> <p style="color:black;">{{$message->shop_name}}<span class="glyphicon glyphicon-chevron-right" style="color:#636b6f;" aria-hidden="true"></span></p></a>
                </div>
                <div class="col-sm-6" align="center" style="color:indianred;">买家已确认</div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-sm-offset-2">
                    <a href="http://localhost:8000/product?id={{$message->product_id}}">
                        <img src="{{$message->image}}" style="height:30%;width:60%;"></a>
                </div>
                <div class="col-sm-6">
                    <h4>{{$message->name}}</h4>{{$message->title}}<br/><br/>
                    <br/><br/>
                    <p style="color:red;">购买数量:{{$message->num}}总价:￥{{$message->total}}</p>

                    @if($message->finish_time!=0)
                        <p>已收货 &nbsp;&nbsp;&nbsp;&nbsp;<a href="{{url('orderdelete')}}?id={{$message->id}}" > 删除订单</a></p>
                    @else
                        <form name="form" method="post" action="{{url('myorder')}}">
                            <input type="hidden" name="id" value="{{$message->id}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button id="submit">确认收货</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach

    </div>
</div>