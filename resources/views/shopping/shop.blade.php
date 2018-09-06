@extends('common.home')

<script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/shop.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $.ajax({
            type: "GET",
            url: "{{ url('getshop') }}",
            success: function (data) {
                var obj = JSON.parse(data);
                var str = "";
                $.each(obj, function (i, n) {
                    str += "<div class='col-sm-3 '><div class='thumbnail'><div class='caption text-center'>";
                    str += "<img src=" + n.image + " style='height:30%;width:90%'><a href='javascript:void(0)' onclick='product(" + n.id + ")'><h3>" + n.name + "</h3></a>" +
                        "<a href='javascript:void(0)' onclick='shopshow(" + n.shop_id + ")'><h5>" + n.shop_name + "</h5></a> <p style='color:red;'>￥" + n.discount + "</p>";
                    str += "</div></div></div>";
                });
                str += "";
                $("#test").html(str);


            }
        });
    })
</script>

<div class="container " style="position: absolute;top:15%;">
    <div id="txt"></div>
    <div id="text">
        <div class="row">
            <form id="form" class="form-group">
                <div class="col-sm-5 col-sm-offset-4">
                    <div class="input-group ">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="text" class="form-control" name="name" placeholder="iphone">
                        <p class="input-group-addon" style="background: white;border:0;">
                            <input type="button" class="btn" onclick="search()" style="color:black;margin-top:-10%;"
                                   value="搜索">
                        </p>
                    </div>
                </div>
            </form>
        </div>
        <ul class="nav nav-pills  col-sm-offset-4">

            <li><a href="{{url('shop')}}" onclick="shop();return false;">综合排序</a></li>
            <li><a href="{{url('descend')}}?name=asc" onclick="descendasc();return false;">价格升序</a></li>
            <li><a href="{{url('descend')}}?name=desc" onclick="descenddesc();return false;">价格降序</a></li>
            <li><a class="btn " data-toggle="modal" data-target="#myModal">筛选
                </a></li>
        </ul>
        <div class="col-sm-7 col-sm-offset-5">
            @if(Session::has('message'))
                <p style="color:red;">{{Session::get('message')}}</p>
            @endif
        </div>
        <div id="test"></div>
        <div class="row" style="margin-top:1%;">
            <div class="col-sm-10 col-sm-offset-2" style="background: #d6d8db;">
                <h4 align="center">于2018年8月25日由哈哈哈设计完成</h4>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" id="formscreen" name="form">
                    <div class="form-group ">

                        <label for="inputEmail3" class="col-sm-4 control-label">商品分类</label>
                        <div class="col-sm-5 ">
                            <input type="text" class="form-control" name="product_type" placeholder="请输入商品分类">
                        </div>

                    </div>
                    <div class="form-group">

                        <label for="inputPassword3" class="col-sm-4 control-label">价格区间</label>
                        <div class="col-sm-8">
                            <div class="col-sm-3" style="margin-left:-3%;">
                                <input type="text" class="form-control" name="minprice" placeholder="最低价">
                            </div>
                            <div class="col-sm-1">
                                <p>——</p>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="maxprice" placeholder="最高价">
                            </div>
                        </div>

                    </div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <div class="col-sm-offset-6">
                            <div class="col-sm-4">
                                <input type="button" onclick="shan()" value="筛选">
                            </div>
                        </div>
                    </div>
                </form>

            </div><!-- /.modal-content -->
        </div>
    </div>
    <div id="maylike"></div>
</div>


