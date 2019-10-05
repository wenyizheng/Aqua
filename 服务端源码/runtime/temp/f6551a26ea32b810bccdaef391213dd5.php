<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:94:"/usr/local/http2/htdocs/fastadmin/public/../application/chat/view/bath_info/showerpromise.html";i:1505546809;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <script src="__YOUPAI__/chat/js/jquery-3.1.1.min (1).js"></script>
    <script src="__PUBLIC__chat/js/layer.js"></script>
    <link rel="stylesheet" href="__PUBLIC__/chat/css/layer.css">
    <link rel="stylesheet" type="text/css" href="__YOUPAI__/chat/css/normalize.css">
    <link rel="stylesheet" href="__YOUPAI__/chat/bootstrap/css/bootstrap.min.css">
    <script src="__YOUPAI__/chat/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container"  style="padding:0%;margin:0%;">
    <div style="margin:30% 5% 0 5%;padding:15% 0 10% 0;border: solid #81bcbf;border-width:1px;border-radius:5px;background-color: #fbffff" class="row">
        <div align="center"  style="padding:0%;margin:0% 0% 7% 0%;font-size:25px;color:#81bcbf" class="col-xs-12"><b>是否进行现场预约？</b></div>
        <div align="right"  style="padding:0%;margin:0% 0% 0% 0%;color:rgb(180,180,180)" class="col-xs-6">请选择浴室</div>
        <div align="left"  style="padding:0 0 0 3%;margin:0% 0% 15% 0%;" class="col-xs-6">
            <select id="cell" class="selecta"></select>
        </div>
        <div align="center"  style="padding:0%;margin:0% 0% 0% 0%;" class="col-xs-12">
            <button id="openbox" class="button"><b>现场预约</b></button>
        </div>
    </div>
</div>
<script type="application/javascript">
    var $_GET = (function(){
        var url = window.document.location.href.toString();
        var u = url.split("?");
        if(typeof(u[1]) == "string"){
            u = u[1].split("&");
            var get = {};
            for(var i in u){
                var j = u[i].split("=");
                get[j[0]] = j[1];
            }
            return get;
        } else {
            return {};
        }
    })();
    var roomid=$_GET['room_id'];
    $.ajax({
        'type':'get',
        'url':'https://wenyizheng.cn/fastadmin/public/index.php/chatapi/room_info/roomcell',
        'data':'data={\"room_id\"\:\"'+roomid+"\"}",
        'async':false,
        'dataType':'json',
        success:function(data){
            $.each(data,function(i,value){
                $("#cell").append("<option value="+value.cell_id+">"+value.cell_name+"<\option>");
            });
        }
    });

    $("#openbox").click(function(){
        var cell_id=$("#cell").val();
        $.ajax({
            'type':'get',
            'url':'https://wenyizheng.cn/fastadmin/public/index.php/chatapi/user_info/userscanpromisebind',
            'data':'room_id='+roomid+"&cell_id=1",
            'async':true,
            'dataType':'json',
            success:function(data){
                if(data.res=='1'){
                    layer.open({
                        content: '现场预约成功！'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                }else{
                    layer.open({
                        content: '现场预约失败！'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                }
            }
        });
    });
</script>
</body>
</html>