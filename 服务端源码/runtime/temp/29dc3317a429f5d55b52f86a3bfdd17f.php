<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"/usr/local/http2/htdocs/fastadmin/public/../application/chat/view/bath_info/feedback.html";i:1505180094;}*/ ?>
<html>

<head>
    <title>意见反馈</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__chat/css/feedback.css">
    <link rel="stylesheet" type="text/css" href="__YOUPAI__/chat/css/normalize.css">
    <script src="__YOUPAI__/chat/js/jquery-3.1.1.min (1).js"></script>
    <link rel="stylesheet" href="__YOUPAI__/chat/bootstrap/css/bootstrap.min.css">
    <script src="__YOUPAI__/chat/bootstrap/js/bootstrap.min.js"></script>
    <script src="__PUBLIC__chat/js/layer.js"></script>
    <script src="__PUBLIC__chat/js/opinionsubmit.js"></script>
</head>

<body>
<div class="feedback" id="feedback">
    <div class="container" style="padding:0%;margin:0%;background-color:#eaeeef;">
        <div style="margin:0%;padding:0%;background-color: white; border:solid  rgb(230,230,230); border-width:0 0 1 0;" class="row" id="column-mtop">
            <div align="center" style="padding:0%;margin:4% 0% 0% 0%;" class="col-xs-2"></div>
            <div align="center" style="padding:0%;margin:4% 0% 4% 0%;font-size:17;" class="col-xs-8"><b>意见反馈</b></div>
            <div style="padding:0%;margin:3% 0% 3% 0%;" class="col-xs-2"></div>
        </div>
        <form>
            <div style="margin:5% 0% 2% 0%;padding:0%;" class="row">
                <div style="padding:0% 0% 0% 3%;margin:0;font-size:13px;color:rgb(100,100,100);" class="col-xs-12">（必选）你想选择的问题类型</div>
            </div>
            <div style="margin:0% 0% 0% 0%;padding:0%; background-color:white;border:solid  rgb(215,215,215); border-width:0.5px 0 0  0;" class="row">
                <div style="padding:0% 0% 0% 11%;margin:4% 0% 4% 0%;" class="col-xs-12"><input type="radio" id="opinionop1" name="0" value="功能问题">&emsp;&emsp;功能问题：功能故障或不可用</div>
            </div>
            <hr width="93%"  style="margin: 0;position: absolute;right:0;border:none;border-top:0.5px solid rgb(215,215,215);"/>
            <div style="margin:0% 0% 0% 0%;padding:0%;background-color:white; " class="row">
                <div style="padding:0% 0% 0% 11%;margin:4% 0% 4% 0%;" class="col-xs-12"><input type="radio" id="opinionop2" name="0" value="预约问题">&emsp;&emsp;预约问题：预约有疑问</div>
            </div>
            <hr width="93%"  style="margin: 0;position: absolute;right:0;border:none;border-top:0.5px solid rgb(215,215,215);"/>
            <div style="margin:0% 0% 0% 0%;padding:0%;background-color:white; " class="row">
                <div style="padding:0% 0% 0% 11%;margin:4% 0% 4% 0%;" class="col-xs-12"><input type="radio" id="opinionop3" name="0" value="产品建议">&emsp;&emsp;产品建议：用的不爽，我有建议</div>
            </div>
            <hr width="93%"  style="margin: 0;position: absolute;right:0;border:none;border-top:0.5px solid rgb(215,215,215);"/>
            <div style="margin:0% 0% 0% 0%;padding:0%;background-color:white;border:solid  rgb(215,215,215); border-width:0 0 0.5px 0" class="row" >
                <div style="padding:0% 0% 0% 11%;margin:4% 0% 4% 0%;" class="col-xs-12"><input type="radio" id="opinionop4" name="0" value="其他问题">&emsp;&emsp;其他问题</div>
            </div>
            <div style="margin:5% 0% 2% 0%;padding:0%;" class="row">
                <div style="padding:0% 0% 0% 3%;margin:0;font-size:13px;color:rgb(100,100,100);" class="col-xs-12">请补充详细问题和建议</div>
            </div>
            <div style="margin:0% 0% 0% 0%;padding:0%; " class="row">
                <div align="center" style="padding:0%;margin:0% 0% 0% 0%;border:solid  rgb(215,215,215); border-width:1px 0 1px 0;background-color: white;" class="col-xs-12">
                    <textarea style="width:100%;height:23%;background-color: white;border: none;"  id="opiniontext"></textarea>
                </div>
                <div align="center" style="padding:0;margin:8% 0% 2% 0%;" class="col-xs-12">
                    <button type="button" class="yes2-img" id="sub2">确定</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>