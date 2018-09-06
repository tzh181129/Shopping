@extends('common.home')

<div class="container " style="position: absolute;top:15%;">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-5">
            @if(Session::has('message'))
                <h3 style="color:red;">{{Session::get('message')}}</h3>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <img src="{{$messageRes['array']['image'] }}" alt="product" class="img-responsive" style="width:95%;height:38%;">
        </div>
        <div class="col-sm-8">
            <h3 style="color:red;">￥{{ $messageRes['array']['discount'] }}</h3>
            <p>原价:<s>￥{{$messageRes['array']['price']}}</s></p>
            <h4>{{$messageRes['array']['name']}}</h4>
            <p>{{$messageRes['array']['title']}}</p>
            <p>{{$messageRes['array']['description']}}</p>

        </div>
    </div>
  <h4 align="center">--------推荐---------</h4>

</div>

