<html>
<head>
    <title>哈哈网主页</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/shop.js') }}"></script>
    <script language="JavaScript" type="text/javascript">

        $(function () {
            $.ajax({
                type: "GET",
                url: "{{ url('cartcount') }}",
                success: function (data) {
                    var html="购物车("+data+")";
                    $("#cart").html(html);
                }
            });
        })

    </script>

</head>
<body>
@section('content')
<nav class="navbar navbar-default" style="background:#d6d8db;font-weight: bold;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <img src="image/p.gif" style="width:50px; height:50px;">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{url('shop')}}">商品总寨 <span class="sr-only">(current)</span></a></li>
                <li><a href='javascript:void(0)' onclick='cartshow()'><p id="cart"></p></a></li>
                <li><a href='javascript:void(0)' onclick='information()'>个人中心</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span>
                               @if(Session::has('register_name'))
                                {{ Session::get('register_name') }}
                            @endif
                        </span> <span  class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li><a href="{{url('loginout')}}">退出登录</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>
    @show
</body>
</html>