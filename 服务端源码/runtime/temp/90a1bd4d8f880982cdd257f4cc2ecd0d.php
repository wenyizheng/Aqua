<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"/usr/local/http2/htdocs/fastadmin/public/../application/chat/view/bath_info/showeropen.html";i:1505539586;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>打开柜子</title>
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
    <div style="margin:30% 5% 0 5%;padding:15% 0 15% 0;border: solid #81bcbf;border-width:1px;border-radius:5px;background-color: #fbffff" class="row">
        <div align="center"  style="padding:0%;margin:0% 0% 15% 0%;font-size:25px;color:#81bcbf" class="col-xs-12"><b>是否打开柜子？</b></div>
        <div align="center"  style="padding:0%;margin:0% 0% 0% 0%;" class="col-xs-12">
            <button id="openbox" class="button"><b>打开柜子</b></button>
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
    $("#openbox").click(function(){
        $.ajax({
            'type':'get',
            'url':'http://wenyizheng.cn/fastadmin/public/index.php/chatapi/user_info/userscanboxopen',
            'data':'room_id='+roomid,
            'async':true,
            'dataType':'json',
            success:function(data){
                if(data.res=='1'){
                    layer.open({
                        content: '开柜成功！'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                }else{
                    layer.open({
                        content: '开柜失败！'
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