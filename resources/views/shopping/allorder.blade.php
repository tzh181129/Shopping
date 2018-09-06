<html>
<head>
    <title>我的订单</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <link rel="stylesheet" href="{{ URL::asset('/css/order.css') }}">
</head>
<body>
<div class="topmenu">
    <ul>
        <li><a href="{{url('shopping.order')}} " target="tt">全部</a></li>
        <li><a href="{{url('shopping.received')}}" target="tt">待收货</a></li>
        <li><a href="{{url('shopping.evaluate')}}" target="tt">待评价</a></li>
    </ul>
</div>
<div>
<iframe src="{{url('shopping.order')}}"  name="tt" ></iframe>
</div>
</body>
</html>