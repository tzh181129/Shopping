<html>
<head>
    <title>店铺</title>
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
        <div class="col-sm-4 col-sm-offset-2">
            <img src="{{$messageRes['shop_image']}}" style="width:50%;height:30%;">
        </div>
        <div class="col-sm-3"><br/><br/><br/>{{$messageRes['shop_name']}}</div>
        <div class="col-sm-3"><br/><br/><br/><p>关注量：{{$messageRes['num']}}</p></div>

        <div class="col-sm-4 col-sm-offset-0" >
            <br/><br/><br/>
            <a href="{{url('shoporder')}}?id={{ $messageRes['shop_id']}}" style="float:left;">店铺订单</a>
            <a href="{{url('release')}}" style="float:right;">发布商品</a>
    </div>

    </div>
    <div class="row" style="margin-top:3%;">
        <div class=" col-sm-offset-3">
            <div class="col-sm-4">
                <p>店铺详情:</p></div><div><p>{{$messageRes['shop_details']}}</p>
        </div>
    </div>
    </div>
    <div class="row">
        <div class=" col-sm-offset-3">
            <div class="col-sm-4">
                <p>店铺广告:</p></div><div><p>{{$messageRes['shop_advert']}}</p>
            </div>
        </div>
    </div>
    <h4 align="center">-----全部宝贝-----</h4>
    @foreach ($array->chunk(4) as $items)
        <div class="row">
            @foreach ($items as $product)
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="caption text-center">
                            <a href="http://localhost:8000/product?id={{$product->id}}">
                                <img src="{{ $product->image}} " style="height:30%;"></a>
                            <a href="http://localhost:8000/product?id={{$product->id}}" style="text-decoration:none">
                                <h3>{{ $product->name}}</h3></a>
                            @if(session('business')==1)
                                <a href="http://localhost:8000/myshop?shop_id={{$product->shop_id}}" style="text-decoration:none">
                                    @else
                                        <a href="http://localhost:8000/shopshow?shop_id={{$product->shop_id}}" style="text-decoration:none">
                                            @endif
                                            {{$product->shop_name}}</a></a>
                                <p style="color:red;">￥{{ $product->discount }}</p>
                        </div> <!-- end caption -->
                    </div> <!-- end thumbnail -->
                </div> <!-- end col-md-3 -->
            @endforeach
        </div> <!-- end row -->
    @endforeach

</div>
</body>
</html>