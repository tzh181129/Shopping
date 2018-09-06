function publishPost() {
    var form = document.getElementById("form");
    var obj = new Object();

    for (var i = 0; i < form.length; i++) {
        obj[form.elements[i].name] = form.elements[i].value;
    }
    $.ajax({
        url: "releasepost",
        type: "post",
        data: obj,
        dataType: 'json',
        success: function (msg) {
            document.location.href = "shop";
        },
        error: function () {
            alert("发布商品失败");
        }
    });
}

function product(msg) {
    var id=msg;

        $.ajax({
            type: "GET",
            url: "product?id="+id,
            success: function (data) {
                var obj =JSON.parse(data);
                if(obj['arr'].already==0){
                    var mess="<a href='javascript:void(0)' class='btn btn-primary' onclick='collection("+obj['array'].id+","+obj['array'].shop_id+")'>收藏</a>";
                }else{
                    var mess='<h4>已收藏</h4>';
                }
                var str = "";
                var html="<div class='col-sm-6 col-sm-offset-4'><h3>---------可能喜欢的宝贝--------</h3></div> ";
                str += "<div class='col-sm-4'><img src="+obj['array'].image+" style='height:38%;width:95%'></div>" ;
                str += "<div class='col-sm-8'><h3 style='color:red;'>￥"+obj['array'].discount+"</h3><p>原价:<s>￥"+obj['array'].price+"</s></p><h4>"+obj['array'].name+"</h4><p>"+obj['array'].title+"</p><p>"+obj['array'].description+"</p>";
                str += "<div class='col-sm-2'><a href='javascript:void(0)' onclick='shopshow(" +obj['array'].shop_id + ")' class='btn btn-primary'>店铺</a></div><div class='col-sm-2'><a href='tencent://message/?uin=3086341958&Site=&Menu=yes' class='btn btn-primary'>客服</a></div><div class='col-sm-2'>"+mess+"</div><div class='col-sm-3'><a href='javascript:void(0)' class='btn btn-primary' onclick='cart("+obj['array'].id+","+obj['array'].shop_id+")'>加入购物车</a></div><div class='col-sm-3'><a href='javascript:void(0)' class='btn btn-primary' onclick='order("+obj['array'].id+","+obj['array'].shop_id+")'>立即购买</a></div> ";
                str +="</div>";
                str += "";
                $.each(obj['maylike'], function (i, n) {
                    html += "<div class='col-sm-3 '><div class='thumbnail'><div class='caption text-center'>";
                    html += "<img src=" + n.image + " style='height:30%;width:90%'><a href='javascript:void(0)' onclick='product(" + n.id + ")'><h3>" + n.name + "</h3></a>" +
                        "<a href='javascript:void(0)' onclick='shopshow(" + n.shop_id + ")'><h5>" + n.shop_name + "</h5></a> <p style='color:red;'>￥" + n.discount + "</p>";
                    html += "</div></div></div>";
                })
                html += "";
                $("#text").html(str);
                $("#maylike").html(html);
            }
        });

}



function search() {
    var form = document.getElementById("form");
    var obj = new Object();

    for (var i = 0; i < form.length; i++) {
        obj[form.elements[i].name] = form.elements[i].value;
    }
    $.ajax({
        type: "POST",
        url: "search",
        data: obj,
        async: false,
        dataType: 'json',
        success: function (data) {
            var dta = JSON.stringify(data);
            var arr = JSON.parse(dta);
            if (arr.msg) {
                var html = "<div class='col-sm-4 col-sm-offset-5'><h3>暂无您查找的商品</h3></div>";
                $("#test").html(html);
            } else {
                var str = "";
                $.each(arr, function (m, n) {
                    str += "<div class='col-sm-3 '><div class='thumbnail'><div class='caption text-center'>";
                    str += "<a href='product?id=" + n.id + "'><img src=" + n.image + " style='height:30%;'></a>";
                    str += "<a href='product?id=" + n.id + "' style='text-decoration:none'><h3>" + n.name + "</h3></a>";
                    str += "<a href='shopshow?shop_id=" + n.shop_id + "' style='text-decoration:none'>" + n.shop_name + "</a>";
                    str += "<p style='color:red;'>￥" + n.price + "</p></div></div></div>";
                });
                str += "";
                $("#test").html(str);
            }
        },

    })
}

function information() {
    $.ajax({
        type: "GET",
        url: "information",
        success: function (data) {
            var obj = JSON.parse(data);
            var str = "";
            if(obj['business']==1){
                var mess='商家';
                var business="<a href='javascript:void(0)' onclick='myshop()'>我的店铺</a>"
            }else{
                var mess='';
                var business='';
            }

                str += "<div class='row' style='margin-top:2%;'><div class='col-sm-4 col-sm-offset-2'><img src='"+obj['register_image']+"' class='img-circle' style='width:30%;height:15%;'></div><div class='col-sm-4'><br/><h4>"+obj['register_name']+"</h4><p style='color:red;'>"+mess+"</p></div><div class='col-sm-2'><br/><br/><br/><a href='{{url('update')}}'>修改密码</a></div></div>";
                str += "<div class='row' style='margin-top:5%;'><div class='col-sm-3 col-sm-offset-4'><p>我的邮箱：</p></div><div class='col-sm-3'>"+obj['register_email']+"</div>";
                str += "<div class='col-sm-3 col-sm-offset-4'><p>我的电话号码：</p></div><div class='col-sm-3'>"+obj['register_phone']+"</div>";
                str += "<div class='col-sm-3 col-sm-offset-4'><p>我的密码：</p></div><div class='col-sm-3'>"+obj['register_pwd']+"</div></div>";
                str += "<div class='row' style='margin-top:5%;'><div class='col-sm-3 col-sm-offset-6'>"+business+"</div></div>";
                str += "<div class='row' style='margin-top:5%;'><div class='col-sm-2 col-sm-offset-4'><a href='javascript:void(0)' onclick='collectionshow()' >我的收藏</a></div><div class='col-sm-2'><a href='javascript:void(0)' onclick='followshow()' >我的关注</a></div><div class='col-sm-2'><a href='javascript:void(0)' onclick='ordershow()'>我的订单</a></div></div>";

            str += "";
            $("#text").html(str);


        }
    });
}

function descendasc() {
    $.ajax({
        type: "GET",
        url: "descend?name=asc",
        success: function (data) {

            var obj = JSON.parse(data);
            var str = "";
            $.each(obj, function (i, n) {
                str += "<div class='col-sm-3 '><div class='thumbnail'><div class='caption text-center'>";
                str += "<a href='{{url('product')}}?id=" + n.id + "'><img src=" + n.image + " style='height:30%;'></a>";
                str += "<a href='{{url('product')}}?id=" + n.id + "' style='text-decoration:none'><h3>" + n.name + "</h3></a>";
                str += "<a href='{{url('shopshow')}}?shop_id=" + n.shop_id + "' style='text-decoration:none'>" + n.shop_name + "</a>";
                str += "<p style='color:red;'>￥" + n.price + "</p></div></div></div>";
            });
            str += "";
            $("#test").html(str);

        },

    })
}

function descenddesc() {
    $.ajax({
        type: "GET",
        url: "descend?name=desc",
        success: function (data) {

            var obj = JSON.parse(data);
            var str = "";
            $.each(obj, function (i, n) {
                str += "<div class='col-sm-3 '><div class='thumbnail'><div class='caption text-center'>";
                str += "<a href='{{url('product')}}?id=" + n.id + "'><img src=" + n.image + " style='height:30%;'></a>";
                str += "<a href='{{url('product')}}?id=" + n.id + "' style='text-decoration:none'><h3>" + n.name + "</h3></a>";
                str += "<a href='{{url('shopshow')}}?shop_id=" + n.shop_id + "' style='text-decoration:none'>" + n.shop_name + "</a>";
                str += "<p style='color:red;'>￥" + n.price + "</p></div></div></div>";
            });
            str += "";
            $("#test").html(str);

        },

    })
}

function shan() {
    var form = document.getElementById("formscreen");
    var obj = new Object();

    for (var i = 0; i < form.length; i++) {
        obj[form.elements[i].name] = form.elements[i].value;
    }
    $.ajax({
        url: "screen",
        type: "post",
        data: obj,
        async: false,
        dataType: 'json',
        success: function (data) {
            var arr = JSON.stringify(data);
            var json = JSON.parse(arr);
            var str = "";
            $.each(json, function (m, n) {
                str += "<div class='col-sm-3 '><div class='thumbnail'><div class='caption text-center'>";
                str += "<a href='product?id=" + n.id + "'><img src=" + n.image + " style='height:30%;'></a>";
                str += "<a href='product?id=" + n.id + "' style='text-decoration:none'><h3>" + n.name + "</h3></a>";
                str += "<a href='shopshow?shop_id=" + n.shop_id + "' style='text-decoration:none'>" + n.shop_name + "</a>";
                str += "<p style='color:red;'>￥" + n.price + "</p></div></div></div>";

            });
            str += "";
            $("#test").html(str);
        },
    });
}

function shopshow(msg) {
    var shop_id=msg;
    $.ajax({
        url: "shopshow?shop_id="+shop_id,
        type: "GET",
        success: function (data) {
            var obj =JSON.parse(data);
            if(obj['data'].alery==0){
                var mess="<a href='javascript:void(0)' onclick='follow("+obj['data'].shop_id+")' class='btn btn-primary'>关注</a>";
            }else{
                var mess='<h4>已关注</h4>';
            }
            var str = "";
            var html="<div class='col-sm-6 col-sm-offset-4'><h3>---------店铺宝贝--------</h3></div> ";
            str += "<div class='col-sm-4 col-sm-offset-2'><img src="+obj['data'].shop_image+" style='height:30%;width:50%'></div>" ;
            str += "<div class='col-sm-3'><br/><br/><br/><br/>"+obj['data'].shop_name+"<br/><p>关注量:"+obj['data'].num+"</p></div>";
            str += "<div class='col-sm-3'><br/><br/><br/><br/>"+mess+"</div> ";
            str +="<div class='col-sm-7 col-sm-offset-4' style='margin-top:3%;'><p>店铺详情："+obj['data'].shop_details+"</div><div class='col-sm-7 col-sm-offset-4'><p>店铺广告："+obj['data'].shop_advert+"</div>";
            str += "";
            $.each(obj['array'], function (i, n) {
                html += "<div class='col-sm-3 '><div class='thumbnail'><div class='caption text-center'>";
                html += "<img src=" + n.image + " style='height:30%;width:90%'><a href='javascript:void(0)' onclick='product(" + n.id + ")'><h3>" + n.name + "</h3></a>" +
                    "<a href='javascript:void(0)' onclick='shopshow(" + n.shop_id + ")'><h5>" + n.shop_name + "</h5></a> <p style='color:red;'>￥" + n.discount + "</p>";
                html += "</div></div></div>";
            })
            html += "";
            $("#text").html(str);
            $("#maylike").html(html);
        },
    });
}

function collection(id,shop_id) {
  var id=id;
  var shop_id=shop_id;
    $.ajax({
        type: "GET",
        url: "collection?id="+id+"&&shop_id="+shop_id,
        success: function (data) {
            alert('成功收藏');
        },
    })
}

function collectionshow(){
    $.ajax({
        type: "GET",
        url: "collectionshow",
        success: function (data) {
            var obj = JSON.parse(data);
            var str = "";
            if(obj['msg']) {
               alert('暂无收藏');
            }else{
                $.each(obj, function (i, n) {
                    str += "<div class='row' style='margin-top:2%;'>";
                    str += "<div class='col-sm-5 col-sm-offset-2'><img src='" + n.image + "' class='img-responsive' style='height:40%;width:80%'></div><div class='col-sm-5'><a href='javascript:void(0)' onclick='product(" + n.product_id + ")' style='color:black;'><h3>" + n.name + "</h3><p>"+n.title+"</p></a>" +
                        "<br/><br/><br/><div class='col-sm-3'><h3 style='color:red;'>￥"+n.discount+"</h3></div><div class='col-sm-3'><br/><a href='javascript:void(0)'  onclick='collectiondel("+n.id+")'><h4>删除</h4></a></div></div>";
                    str += "</div>";
                });
                str += "";
                $("#text").html(str);
            }
        }
    });
}

function collectiondel(id){
    var id=id;
    $.ajax({
        type: "GET",
        url: "collectiondel?id="+id,
        success: function (data) {
            alert('已取消关注');
        },
    })
}

function follow(id){
    var id=id;
    $.ajax({
        type: "GET",
        url: "follow?id="+id,
        success: function (data) {
           alert('店铺关注成功');
        },
    })
}
function followshow(){
    $.ajax({
        type: "GET",
        url: "myfollow",
        success: function (data) {
            var obj = JSON.parse(data);
            var str = "";
            if(obj!='') {
                $.each(obj, function (i, n) {
                    str += "<div class='row'>";
                    str += "<div class='col-sm-3 col-sm-offset-3'><img src='" + n.shop_image + "' class='img-circle' style='width:80%;height:30%;'></div>";
                    str += "<div class='col-sm-6'><a href='javascript:void(0)' onclick='shopshow(" + n.shop_id + ")'><p style='margin-top:5%;'>" + n.shop_name + "</p></a><p>" + n.shop_details + "</p><br/><br/><p><a href='javascript:void(0)' onclick='followdel("+n.id+")' style='color:red;'>取消关注</a></p></div></div>";
                });
                str += "";
                $("#text").html(str);
            }else{
                alert('暂无关注');
            }
        }
    });
}

function followdel(id){
    var id=id;
    $.ajax({
        type: "GET",
        url: "followdel?id="+id,
        success: function (data) {
            alert('已取消关注');
        },
    })
}

function cart(id,shop_id) {
    var id=id;
    var shop_id=shop_id;
    $.ajax({
        type: "GET",
        url: "cart?id="+id+"&&shop_id="+shop_id,
        success: function (data) {
            alert('成功加入购物车');
        },
    })
}

function cartshow(){
    $.ajax({
        type: "GET",
        url: "getcart",
        success: function (data) {
            var obj = JSON.parse(data);
            var str = "";
            if(obj!='') {
                $.each(obj, function (i, n) {
                    str += "<div class='row'>";
                    str += "<div class='col-sm-5 col-sm-offset-2'><img src='" + n.image + "' style='width:80%;height:40%'></div>";
                    str += "<div class='col-sm-5'><h3>" + n.name + "</h3><br/><h4>x"+n.num
                        + "</h4><br/><br/><h4 style='color:red'>￥" + n.price + "</h4><br/>" + "<div class='col-sm-3'><a href='javascript:void(0)' onclick='order("+n.product_id+","+n.shop_id+")'><h4>立即购买</h4></a></div><div class='col-sm-3'>" + "<a href='javascript:void(0)' onclick='cartdelete("+n.id+")'><h4>删除</h4></a></div>" + "</div></div>";
                });
                str += "";
                $("#text").html(str);
            }else{
                alert('购物车内暂无商品');
            }
        }
    });
}

function order(product_id,shop_id) {
    var product_id=product_id;
    var shop_id=shop_id;
    $.ajax({
        type: "GET",
        url: "orderpost?product_id="+product_id+"&&shop_id="+shop_id,
        success: function (data) {
            alert('购买成功，已创建订单');
        },
    })
}

function ordershow(){
    $.ajax({
        type: "GET",
        url: "order",
        success: function (data) {
            var obj = JSON.parse(data);
            var str = "";
            var html="<div class='row'><div class='col-sm-2 col-sm-offset-3'><a href='javascript:void(0)' onclick='ordershow()'>全部</a></div><div class='col-sm-2'><a href='javascript:void(0)' onclick='unshipped()'>未发货</a></div> <div class='col-sm-2'><a href='javascript:void(0)' onclick='already()'>已发货</a></div> <div class='col-sm-2'><a href='javascript:void(0)' onclick='orderfinish()'>已收货</a></div> </div>";
            if(obj!='') {
                $.each(obj, function (i, n) {
                    if(n.finish_time==0){
                        var mess="<a href='javascript:void(0)' onclick='myorder(" + n.id + ")'>确认收货</a>";
                    }else{
                        var mess="<p>已收货 &nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)' onclick='orderdel("+n.id+")'>  删除订单</a></p>";
                    }
                    str +="<div class='row'><div class='col-sm-4 col-sm-offset-2'><a href='javascript:void(0)' onclick='shopshow(" + n.shop_id + ")'><h5>" + n.shop_name +"</h5></a></div><div class='col-sm-6' align=center style='color:indianred;'>买家已确认</div></div>";
                    str +="<div class='row'><div class='col-sm-4 col-sm-offset-2'><img src='"+n.image+"' style='height:30%;width:60%;'></div><div class='col-sm-6'><h4>"+n.name+"</h4><p>"+n.title+"</p><br/><br/><br/><p style='color:red;'>购买数量："+n.num+"&nbsp;&nbsp;总价："+n.total+"</p><p>"+mess+"</p></div></div>";
                });
                str += "";
                $("#text").html(str);
                $("#txt").html(html);
            }else{
                alert('暂无订单');
            }
        }
    });
}

function unshipped(){
    $.ajax({
        type: "GET",
        url: "unshipped",
        success: function (data) {
            var obj = JSON.parse(data);
            var str = "";
                $.each(obj, function (i, n) {
                    if(n.finish_time==0){
                        var mess="<a href='javascript:void(0)' onclick='myorder(" + n.id + ")'>确认收货</a>";
                    }else{
                        var mess="<p>已收货 &nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)' onclick='orderdel("+n.id+")'>  删除订单</a></p>";
                    }
                    str +="<div class='row'><div class='col-sm-4 col-sm-offset-2'><a href='javascript:void(0)' onclick='shopshow(" + n.shop_id + ")'><h5>" + n.shop_name +"</h5></a></div><div class='col-sm-6' align=center style='color:indianred;'>买家已确认</div></div>";
                    str +="<div class='row'><div class='col-sm-4 col-sm-offset-2'><img src='"+n.image+"' style='height:30%;width:60%;'></div><div class='col-sm-6'><h4>"+n.name+"</h4><p>"+n.title+"</p><br/><br/><br/><br/><p style='color:red;'>购买数量："+n.num+"&nbsp;&nbsp;总价："+n.total+"</p><p>"+mess+"</p></div></div>";
                });
                str += "";
                $("#text").html(str);
        }
    });
}

function already(){
    $.ajax({
        type: "GET",
        url: "already",
        success: function (data) {
            var obj = JSON.parse(data);
            var str = "";
            if(obj!='') {
                $.each(obj, function (i, n) {
                    if (n.finish_time == 0) {
                        var mess = "<a href='javascript:void(0)' onclick='myorder(" + n.id + ")'>确认收货</a>";
                    } else {
                        var mess = "<p>已收货 &nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)' onclick='orderdel("+n.id+")'> 删除订单</a></p>";
                    }
                    str += "<div class='row'><div class='col-sm-4 col-sm-offset-2'><a href='javascript:void(0)' onclick='shopshow(" + n.shop_id + ")'><h5>" + n.shop_name + "</h5></a></div><div class='col-sm-6' align=center style='color:indianred;'>买家已确认</div></div>";
                    str += "<div class='row'><div class='col-sm-4 col-sm-offset-2'><img src='" + n.image + "' style='height:30%;width:60%;'></div><div class='col-sm-6'><h4>" + n.name + "</h4><p>" + n.title + "</p><br/><br/><br/><br/><p style='color:red;'>购买数量：" + n.num + "&nbsp;&nbsp;总价：" + n.total + "</p><p>" + mess + "</p></div></div>";
                });
                str += "";
                $("#text").html(str);
            }else{
                alert('无已发货商品');
            }
        }
    });
}

function orderfinish(){
    $.ajax({
        type: "GET",
        url: "orderfinish",
        success: function (data) {
            var obj = JSON.parse(data);
            var str ="";
            if(obj!='') {
                $.each(obj, function (i, n) {
                    if (n.finish_time == 0) {
                        var mess = "<a href='javascript:void(0)' onclick='myorder(" + n.id + ")'>确认收货</a>";
                    } else {
                        var mess = "<p>已收货 &nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)' onclick='orderdel("+n.id+")'> 删除订单</a></p>";
                    }
                    str += "<div class='row' style='margin-top:5%;'><div class='col-sm-4 col-sm-offset-2'><a href='javascript:void(0)' onclick='shopshow(" + n.shop_id + ")'><h5>" + n.shop_name + "</h5></a></div><div class='col-sm-6' align=center style='color:indianred;'>买家已确认</div></div>";
                    str += "<div class='row'><div class='col-sm-4 col-sm-offset-2'><img src='" + n.image + "' style='height:30%;width:60%;'></div><div class='col-sm-6'><h4>" + n.name + "</h4><p>" + n.title + "</p><br/><br/><br/><br/><p style='color:red;'>购买数量：" + n.num + "&nbsp;&nbsp;总价：" + n.total + "</p><p>" + mess + "</p></div></div>";
                });
                str += "";
                $("#text").html(str);
            }else{
                alert('无已收货商品');
            }
        }
    });
}
 function myorder(id){
    var id=id;
     $.ajax({
         type: "GET",
         url: "myorder?id="+id,
         success: function (data) {
             alert('已确认收货');
         },
     })
 }

 function orderdel(id){
     var id=id;
     $.ajax({
         type: "GET",
         url: "orderdel?id="+id,
         success: function (data) {
             alert('已删除订单');
         },
     })
 }

function cartdelete(id){
    var id=id;
    $.ajax({
        type: "GET",
        url: "delete?id="+id,
        success: function (data) {
            alert('已删除购物车上的商品');
        },
    })
}

function myshop() {

    $.ajax({
        url: "myshop",
        type: "GET",
        success: function (data) {
            var obj =JSON.parse(data);
            var str = "";
            str += "<div class='col-sm-4 col-sm-offset-2'><img src="+obj.shop_image+" style='height:30%;width:50%'></div>" ;
            str += "<div class='col-sm-3'><br/><br/><br/>"+obj.shop_name+"</div><div class='col-sm-3'><br/><br/><br/><p>关注量:"+obj.num+"</p></div>";
            str += "<div class='col-sm-4 col-sm-offset-0' ><br/><br/><br/><a href='javascript:void(0)' onclick='ordershop(" + obj.shop_id + ")' style='float:left;'>店铺订单</a> <a style='float:right;'>发布商品</a></div>";
            str +="<div class='col-sm-7 col-sm-offset-4' style='margin-top:3%;'><p>店铺详情："+obj.shop_details+"</div><div class='col-sm-7 col-sm-offset-4'><p>店铺广告："+obj.shop_advert+"</div>";
            str += "";

            $("#text").html(str);
        },
    });
}

function ordershop(shop_id){
     var shop_id=shop_id;
    $.ajax({
        type: "GET",
        url: "ordershop?shop_id="+shop_id,
        success: function (data) {
            var obj = JSON.parse(data);
            var str = "";
            var html="<div class='row'><div class='col-sm-3 col-sm-offset-3'><a href='javascript:void(0)' onclick='delivery()'>未发货</a></div><div class='col-sm-3'><a href='javascript:void(0)' onclick='shopalready()'>已发货</a></div> <div class='col-sm-3'><a href='javascript:void(0)' onclick='shopfinish()'>已完成</a></div>  </div>";
            if(obj.mess=='aaaa') {
               alert('店铺暂无订单');
            }else{
                $.each(obj, function (i, n) {
                    if(n.delivery_time==0&&n.finish_time==0){
                        var mess="<a href='javascript:void(0)' onclick='shopdelivery(" + n.id + ")'>发货</a>";
                    }else if(n.delivery_time!=0){
                        var mess="<p>已发货&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)' onclick='orderdel("+n.id+")'>  删除订单</a></p>";
                    }else if(n.finish_time!=0){
                        var mess="<p>已完成&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)' onclick='orderdel("+n.id+")'>  删除订单</a></p>";
                    }
                    str +="<div class='row'><div class='col-sm-4 col-sm-offset-2'><a href='javascript:void(0)' onclick='shopshow(" + n.shop_id + ")'><h5>" + n.shop_name +"</h5></a></div><div class='col-sm-6' align=center style='color:indianred;'>买家已确认</div></div>";
                    str +="<div class='row'><div class='col-sm-4 col-sm-offset-2'><img src='"+n.image+"' style='height:30%;width:60%;'></div><div class='col-sm-6'><h4>"+n.name+"</h4><p>"+n.title+"</p><br/><br/><br/><p style='color:red;'>购买数量："+n.num+"&nbsp;&nbsp;总价："+n.total+"</p><p>"+mess+"</p></div></div>";
                });
                str += "";
                $("#text").html(str);
                $("#txt").html(html);
            }
        }
    });
}

function delivery(){
    $.ajax({
        type: "GET",
        url: "delivery",
        success: function (data) {
            var obj = JSON.parse(data);
            var str = "";
            if(obj!='') {
                $.each(obj, function (i, n) {
                    if(n.delivery_time==0&&n.finish_time==0){
                        var mess="<a href='javascript:void(0)' onclick='shopdelivery(" + n.id + ")'>发货</a>";
                    }else if(n.delivery_time!=0){
                        var mess="<p>已发货&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)' onclick='orderdel("+n.id+")'>  删除订单</a></p>";
                    }else if(n.finish_time!=0){
                        var mess="<p>已完成&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)' onclick='orderdel("+n.id+")'>  删除订单</a></p>";
                    }
                    str += "<div class='row'><div class='col-sm-4 col-sm-offset-2'><a href='javascript:void(0)' onclick='shopshow(" + n.shop_id + ")'><h5>" + n.shop_name + "</h5></a></div><div class='col-sm-6' align=center style='color:indianred;'>买家已确认</div></div>";
                    str += "<div class='row'><div class='col-sm-4 col-sm-offset-2'><img src='" + n.image + "' style='height:30%;width:60%;'></div><div class='col-sm-6'><h4>" + n.name + "</h4><p>" + n.title + "</p><br/><br/><br/><p style='color:red;'>购买数量：" + n.num + "&nbsp;&nbsp;总价：" + n.total + "</p><p>" + mess + "</p></div></div>";
                });
                str += "";
                $("#text").html(str);
            }else{
                alert('无未发货订单');
            }
        }
    });
}

function shopalready(){
    $.ajax({
        type: "GET",
        url: "shopalready",
        success: function (data) {
            var obj = JSON.parse(data);
            var str = "";
            if(obj!='') {
                $.each(obj, function (i, n) {
                    if(n.delivery_time==0&&n.finish_time==0){
                        var mess="<a href='javascript:void(0)' onclick='shopdelivery(" + n.id + ")'>发货</a>";
                    }else if(n.delivery_time!=0){
                        var mess="<p>已发货&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)' onclick='orderdel("+n.id+")'>  删除订单</a></p>";
                    }else if(n.finish_time!=0){
                        var mess="<p>已完成&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)' onclick='orderdel("+n.id+")'>  删除订单</a></p>";
                    }
                    str += "<div class='row'><div class='col-sm-4 col-sm-offset-2'><a href='javascript:void(0)' onclick='shopshow(" + n.shop_id + ")'><h5>" + n.shop_name + "</h5></a></div><div class='col-sm-6' align=center style='color:indianred;'>买家已确认</div></div>";
                    str += "<div class='row'><div class='col-sm-4 col-sm-offset-2'><img src='" + n.image + "' style='height:30%;width:60%;'></div><div class='col-sm-6'><h4>" + n.name + "</h4><p>" + n.title + "</p><br/><br/><br/><p style='color:red;'>购买数量：" + n.num + "&nbsp;&nbsp;总价：" + n.total + "</p><p>" + mess + "</p></div></div>";
                });
                str += "";
                $("#text").html(str);
            }else{
                alert('无已发货订单');
            }
        }
    });
}

function shopfinish(){
    $.ajax({
        type: "GET",
        url: "shopfinish",
        success: function (data) {
            var obj = JSON.parse(data);
            var str = "";
            if(obj!='') {
                $.each(obj, function (i, n) {
                    if(n.delivery_time==0&&n.finish_time==0){
                        var mess="<a href='javascript:void(0)' onclick='shopdelivery(" + n.id + ")'>发货</a>";
                    }else if(n.delivery_time!=0){
                        var mess="<p>已发货&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)' onclick='orderdel("+n.id+")'>  删除订单</a></p>";
                    }else if(n.finish_time!=0){
                        var mess="<p>已完成&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)' onclick='orderdel("+n.id+")'>  删除订单</a></p>";
                    }
                    str += "<div class='row'><div class='col-sm-4 col-sm-offset-2'><a href='javascript:void(0)' onclick='shopshow(" + n.shop_id + ")'><h5>" + n.shop_name + "</h5></a></div><div class='col-sm-6' align=center style='color:indianred;'>买家已确认</div></div>";
                    str += "<div class='row'><div class='col-sm-4 col-sm-offset-2'><img src='" + n.image + "' style='height:30%;width:60%;'></div><div class='col-sm-6'><h4>" + n.name + "</h4><p>" + n.title + "</p><br/><br/><br/><p style='color:red;'>购买数量：" + n.num + "&nbsp;&nbsp;总价：" + n.total + "</p><p>" + mess + "</p></div></div>";
                });
                str += "";
                $("#text").html(str);
            }else{
                alert('无已完成订单');
            }
        }
    });
}




