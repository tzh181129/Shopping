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
        <form action="{{url('shopsearch')}}" method="post" class="form-group">
            <div class="col-sm-5 col-sm-offset-6">
                <div class="input-group ">
                    <input type="hidden" name="shop_id" value="{{$messageRes['shop_id']}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="text" class="form-control" name="name" placeholder="搜索店铺内商品" >
                    <p  class="input-group-addon" style="background: white;border:0;"><button id="submit" class="btn" style="color:black;margin-top:-10%;">搜索</button></p>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-2">
            <img src="{{$messageRes['shop_image']}}" style="width:50%;height:30%;">
        </div>
        <div class="col-sm-3"><br/><br/><br/>{{$messageRes['shop_name']}}<br/>关注量：{{$messageRes['num']}}</div>
        <div class="col-sm-3"><br/><br/><br/><br/>
            @if($messageRes['alery']==0)
                <a href="{{url('follow')}}?shop_id={{$messageRes['shop_id']}}">关注</a></p>
            @else
                <p>已关注</p>
            @endif
        </div>
    </div>
    <div class="row" style="margin-top:3%;">
        <div class=" col-sm-offset-3">
            <div class="col-sm-4">
                <p>店铺详情:</p></div>
            <div><p>{{$messageRes['shop_details']}}</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class=" col-sm-offset-3">
            <div class="col-sm-4">
                <p>店铺广告:</p></div>
            <div><p>{{$messageRes['shop_advert']}}</p>
            </div>
        </div>
    </div>
    <h4 align="center">--------店铺宝贝---------</h4>
    @foreach ($array->chunk(4) as $items)
        <div class="row">
            @foreach ($items as $product)
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="caption text-center">
                            <a href="http://localhost:8000/product?id={{$product->id}}">
                                <img src="{{ $product->image}} " style="height:30%;"></a>
                            <a href="http://localhost:8000/product?id={{$product->id}}">
                                <h3>{{ $product->name}}</h3></a>
                            @if(session('business')==1)
                                <a href="http://localhost:8000/myshop?shop_id={{$product->shop_id}}">
                                    @else
                                        <a href="http://localhost:8000/shopshow?shop_id={{$product->shop_id}}">
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


</div>

</body>
</html>