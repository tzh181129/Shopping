<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .a {
            position: absolute;
            top: 15%;
        }
    </style>
</head>
<body >
<div class="container a">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-4">
            @if(Session::has('message'))
                <h3>{{Session::get('message')}}</h3>
            @endif
        </div>
    </div>
    <h4 align="center" style="margin-top:5%;">--------推荐---------</h4>
    @foreach ($maylike->chunk(4) as $items)
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
</body>
</html>