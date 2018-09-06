@extends('common.businesshome')
<script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/shop.js') }}"></script>
<div class="container " style="position: absolute;top:12%;">
    <form class="form-horizontal" name="form" id="form" >
        <div class="form-group ">
            <div class="col-sm-offset-4">
                <label for="inputEmail3" class="col-sm-2 control-label">商品名</label>
                <div class="col-sm-5 ">
                    <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="请输入商品名">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4">
                <label for="inputPassword3" class="col-sm-2 control-label">商品标题</label>
                <div class="col-sm-5">
                    <input name="title" class="form-control" type="text" placeholder="请输入商品标题">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4">
                <label for="inputPassword3" class="col-sm-2 control-label">商品类别</label>
                <div class="col-sm-5">
                    <input name="product_type" type="text" class="form-control" placeholder="请输入商品类别"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4">
                <label for="inputPassword3" class="col-sm-2 control-label">商品图像</label>
                <div class="col-sm-5">
                    <input name="image" type="file" accept="image/gif, image/jpeg"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4">
                <label for="inputPassword3" class="col-sm-2 control-label">商品颜色</label>
                <div class="col-sm-5">
                    <input name="color" type="text" class="form-control" placeholder="请输入商品颜色"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4">
                <label for="inputPassword3" class="col-sm-2 control-label">商品价格</label>
                <div class="col-sm-5">
                    <input name="price" type="text" class="form-control" placeholder="请输入商品价格"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4">
                <label for="inputPassword3" class="col-sm-2 control-label">商品折扣价</label>
                <div class="col-sm-5">
                    <input name="discount" type="text" class="form-control" placeholder="请输入商品折扣后的价格"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4">
                <label for="inputPassword3" class="col-sm-2 control-label">商品地址</label>
                <div class="col-sm-5">
                    <input name="address" type="text" class="form-control" placeholder="请输入商品地址"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4">
                <label for="inputPassword3" class="col-sm-2 control-label">商品说明</label>
                <div class="col-sm-5">
                    <textarea name="description" class="form-control" rows="2" placeholder="请输入商品说明"></textarea>
                </div>
            </div>
        </div>
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <div class="form-group">
            <div class="col-sm-offset-6">
                <div class="col-sm-3">
                    <input type="submit" class="btn btn-success btn-block" onclick="publishPost()"  value="发布商品">
                </div>
                    <div class="col-sm-3">
                        <a href="{{url('shop')}}" ><p style="margin-top:12%;">商品列表</p></a>
                </div>

            </div>
        </div>

    </form>
</div>

