@extends('common.businesshome')
<div class="container " style="position: absolute;top:20%;">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-5">
            @if(Session::has('message'))
                <h3 style="color:red;">{{Session::get('message')}}</h3>
            @endif
        </div>
    </div>
    <form class="form-horizontal" method="post" action="">
        <div class="form-group ">
            <div class="col-sm-offset-4">
                <label for="inputEmail3" class="col-sm-2 control-label">店铺名</label>
                <div class="col-sm-5 ">
                    <input type="text" name="shop_name" class="form-control" id="inputEmail3" placeholder="请输入店铺名">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4">
                <label for="inputPassword3" class="col-sm-2 control-label">店铺头像</label>
                <div class="col-sm-5">
                    <input name="shop_image" id="shop_image" type="file" accept="image/gif, image/jpeg"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4">
                <label for="inputPassword3" class="col-sm-2 control-label">店铺广告</label>
                <div class="col-sm-5">
                    <textarea name="shop_advert" class="form-control" rows="3" placeholder="请输入店铺广告"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4">
                <label for="inputPassword3" class="col-sm-2 control-label">店铺详情</label>
                <div class="col-sm-5">
                    <textarea name="shop_details" class="form-control" rows="3" placeholder="请输入店铺详情"></textarea>
                </div>
            </div>
        </div>
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <div class="form-group">
            <div class="col-sm-offset-5">
                <div class="col-sm-6">
                    <input type="submit" class="btn btn-success btn-block" value="创建店铺">
                </div>
            </div>
        </div>
        <div class="login_action col-sm-4  col-sm-offset-7">
            已创建?
            <a href="{{url('shop')}}">商品列表</a>
        </div>
    </form>
</div>

</body>
</html>