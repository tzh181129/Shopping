@extends('common.home')

<div class="container " style="position: absolute;top:15%;">
<div id="test"></div>
    <div class="col-sm-7 col-sm-offset-5">
        @if(Session::has('message'))
            <p style="color:red;">{{Session::get('message')}}</p>
        @endif
    </div>
    @foreach($informationRes as $information)
        <div class="row" style="margin-top:2%;">
            <div class="col-sm-4 col-sm-offset-2"><img src="{{$information->register_image}}" class="img-circle"
                                                       style="width:30%;height:15%;"></div>
            <div class="col-sm-4"><br/><h4>{{$information->register_name}}</h4>
                <p style="color:red;">
                    @if($information->business==1)
                        商家
                    @endif</p>
            </div>
            <div class="col-sm-2"><br/><br/><br/><a href="{{url('update')}}">修改密码</a></div>
        </div>
        <div class="row " style="margin-top:5%;">
            <div class="col-sm-3 col-sm-offset-4"><p>我的邮箱</p></div>
            <div class="col-sm-3">{{$information->register_email}}</div>
            <div class="col-sm-3 col-sm-offset-4"><p>我的电话号码</p></div>
            <div class="col-sm-3">{{$information->register_phone}}</div>
            <div class="col-sm-3 col-sm-offset-4"><p>我的密码</p></div>
            <div class="col-sm-3">{{$information->register_pwd}}</div>
        </div>
        <div class="row " style="margin-top:5%;">
            <div class="col-sm-3 col-sm-offset-6">
                @if($information->business==1)
                    <a href="{{url('myshop')}}">我的店铺</a>
                @endif
            </div>
            <div class="col-sm-3 col-sm-offset-6">
                @if($information->business==1)
                    <a href="{{url('released')}}?user_id={{$information->id}}">已发布的商品</a>
                @endif
            </div>

        </div>
        <div class="row" style="margin-top:5%;">
            <div class="col-sm-2  col-sm-offset-3"><a href="{{url('collection')}}">我的收藏</a></div>
            <div class="col-sm-2"><a href="{{url('myfollow')}}">我的关注</a></div>
            <div class="col-sm-2"><a href="{{url('order')}}">我的订单</a></div>
            <div class="col-sm-2"><a href="{{url('evaluateshow')}}">我的评价</a></div>
        </div>

    @endforeach
    <br/>
    <div class="row">
        <div class="login_action col-sm-4  col-sm-offset-5">
            <a role="button" class="btn btn-primary  btn-block">退出登录</a>
        </div>
    </div>
</div>

