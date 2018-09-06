<html>
<head>
    <title>筛选</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/shop.js') }}"></script>

    <style>
        .a {
            position: absolute;
            top: 15%;
        }

    </style>
</head>
<body>
<div class="container a">
    <div id="test">
    <form class="form-horizontal" method="post" >
        <div class="form-group ">
            <div class="col-sm-offset-4">
                <label for="inputEmail3" class="col-sm-2 control-label">商品分类</label>
                <div class="col-sm-5 ">
                    <input type="text" class="form-control" name="product_type" placeholder="请输入商品分类">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4">
                <label for="inputPassword3" class="col-sm-2 control-label">价格区间</label>
                <div class="col-sm-9">
                    <div class="col-sm-3" style="margin-left:-3%;">
                    <input type="text" class="form-control" name="minprice" placeholder="最低价">
                    </div>
                    <div class="col-sm-1">
                        <p>——</p>
                    </div>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="maxprice" placeholder="最高价">
                     </div>
            </div>
        </div>
        </div>
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <div class="form-group">
            <div class="col-sm-offset-6">
                <div class="col-sm-4">
                    <button id="submit" onclick="screen()" class="btn btn-primary btn-lg btn-block" >筛选</button>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</body>
</html>