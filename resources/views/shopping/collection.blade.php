<html>
<head>
    <title>我的收藏</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    @foreach ($messageRes as $data)
    <div class="row" style="margin-top:2%;">
        <div class="col-sm-5 col-sm-offset-2" >
            <img src="{{$data->image}}" alt="product" class="img-responsive" style="width:80%;height:40%">
        </div>
        <div class="col-sm-5">
            <h4><a href="{{url('product')}}?id={{$data->product_id}}" style="color:black;"><p>{{$data->name}}</p>
                    <p>{{ $data->title}}</p>

                    <p>{{$array['collection']}}人收藏</p></a></h4>

            <br/><br/><br/>
            <div class="col-sm-3">
            <h3 style="color:red;">￥{{ $data->discount}}</h3>
            </div>
                <div class="col-sm-3">
                    <br/><a href="{{url('collectiondelete')}}?id={{$data->id}}" style="color:red;">删除收藏</a>
            </div>
        </div>
    </div>
        @endforeach
</div>
</body>
</html>