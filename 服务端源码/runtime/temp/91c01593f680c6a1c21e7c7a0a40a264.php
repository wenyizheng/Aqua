<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"/usr/local/http2/htdocs/fastadmin/public/../application/chat/view/user_info/infobind.html";i:1505545747;}*/ ?>
<html>

<head>
    <title>智慧淋浴</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/chat/css/message-complete.css">
    <link rel="stylesheet" type="text/css" href="__YOUPAI__/chat/css/normalize.css">
    <script src="__YOUPAI__/chat/js/jquery-3.1.1.min (1).js"></script>
    <script src="__YOUPAI__/chat/js/message-complete.js"></script>
    <link rel="stylesheet" href="__YOUPAI__/chat/bootstrap/css/bootstrap.min.css">
    <script src="__YOUPAI__/chat/bootstrap/js/bootstrap.min.js"></script>
    <script src="__PUBLIC__/chat/js/userbind.js"></script>
    <script src="__PUBLIC__chat/js/layer.js"></script>
</head>

<body>
<div class="message-complete"  id="message-complete">
    <div class="container" style="padding:0%;margin:0%;width:100%;background-color:#eaeeef;">
        <div style="margin:0%;padding:0%;background-color:white;" class="row" id="column-mtop">
            <div align="center"  style="padding:0%;margin:3.5% 0% 3.5% 0%;" class="col-xs-12"><b>信息完善</b></div>
        </div>
        <div style="margin:0% 5% 0% 5%;padding:0%;" class="row" id="column-mhead">
            <div align="center" style="padding:0% 0% 0% 0%;margin:2% 0% 2% 0%;" class="col-xs-12">
                <div align="center" ><img style="border:1px solid rgb(208,208,208);" class="column-mimg" src="__YOUPAI__/chat/bath-img/head.jpg"/>
                </div>
            </div>
        </div>
        <form>
            <div style="margin:0% 0% 0% 0%;padding:0%;background-color: white;border:solid  rgb(215,215,215); border-width:0.5px 0 0 0;" class="row" id="column-mhead">
                <div style="padding:0% 0% 0% 11%;margin:3.5% 0% 3.5% 0%;" class="col-xs-4">昵称</div>
                <div  style="padding:0% 0% 0% 8%;margin:3% 0% 2% 0%;" class="col-xs-8"><input type="text" id="nickname_bind" name="" value="" class="Inpt" placeholder="请输入昵称"/></div>
            </div>
            <hr width="93%"  style="margin: 0;position: absolute;right:0;border:none;border-top:0.5px solid rgb(215,215,215);"/>
            <div style="margin:0% 0% 0% 0%;padding:0%;background-color: white;border:solid  rgb(215,215,215); border-width:0 0 0.5px 0;" class="row" id="column-mhead">
                <div style="padding:0% 0% 0% 11%;margin:3.5% 0% 3.5% 0%;" class="col-xs-4">性别</div>
                <div  style="padding:0% 0% 0% 8%;margin:3.5% 0% 3.5% 0%;" class="col-xs-8">
                    <select class="select1" name="" id="sex_bind">
                        <option ></option>
                        <option value="1">男</option>
                        <option value="0">女</option>
                    </select>
                </div>
            </div>
            <div style="margin:3% 0% 0% 0%;padding:0%;background-color: white;border:solid  rgb(215,215,215); border-width:0.5px 0 0 0;" class="row" id="column-mhead">
                <div style="padding:0% 0% 0% 11%;margin:3.5% 0% 3.5% 0%;" class="col-xs-4">学校</div>
                <div  style="padding:0% 0% 0% 8%;margin:3.5% 0% 3.5% 0%;" class="col-xs-8">
                    <select class="select1" name="" id="block_bind">
                        <optgroup label='选择学校'></optgroup>
                        <option ></option>
                    </select>
                </div>
            </div>
            <hr width="93%"  style="margin: 0;position: absolute;right:0;border:none;border-top:0.5px solid rgb(215,215,215);"/>
            <div style="margin:0% 0% 0% 0%;padding:0%;background-color: white;border:solid  rgb(215,215,215); border-width:0 0 0.5px 0;" class="row" id="column-mhead">
                <div style="padding:0% 0% 0% 11%;margin:3.5% 0% 3.5% 0%;" class="col-xs-4">常用浴室</div>
                <div  style="padding:0% 0% 0% 8%;margin:3.5% 0% 3.5% 0%;" class="col-xs-8">
                    <select class="select1" name="" id="room_bind">
                        <optgroup label='选择浴室'></optgroup>
                    </select>
                </div>
            </div>
            <div style="margin:3% 0% 0% 0%;padding:0%;background-color: white;border:solid  rgb(215,215,215); border-width:0.5px 0 0 0;" class="row" id="column-mhead">
                <div style="padding:0% 0% 0% 11%;margin:3.5% 0% 3.5% 0%;" class="col-xs-4">手机号</div>
                <div  style="padding:0% 0% 0% 8%;margin:3% 0% 2% 0%;" class="col-xs-8"><input type="text" id="tel_bind" name="" value="" class="Inpt"  placeholder="请输入11位手机号码"/></div>
            </div>
            <hr width="93%"  style="margin: 0;position: absolute;right:0;border:none;border-top:0.5px solid rgb(215,215,215);"/>
            <div style="margin:0% 0% 0% 0%;padding:0%;background-color: white;" class="row" id="column-mhead">
                <div style="padding:0% 0% 0% 11%;margin:3.5% 0% 3.5% 0%;" class="col-xs-4">验证码</div>
                <div  style="padding:0% 0% 0% 8%;margin:3% 0% 2% 0%;" class="col-xs-5"><input type="text" id="vali_bind" name=""  class="Inpt"  placeholder="请输入验证码"/></div>
                <div style="padding:1.3% 0% 1.3% 0%;margin:2.5% 0% 0% 0%;"  class="col-xs-3" id="telcode2"><button style="border:none;outline:none;background-color:transparent;color:cornflowerblue;font-size: 13px;" id="getvalidate">获取验证码</button></div>
            </div>
            <hr width="93%"  style="margin: 0;position: absolute;right:0;border:none;border-top:0.5px solid rgb(215,215,215);"/>
            <div style="margin:0% 0% 0% 0%;padding:0%;background-color: white;" class="row" id="column-mhead">
                <div style="padding:0% 0% 0% 11%;margin:3.5% 0% 3.5% 0%;" class="col-xs-4">支付密码</div>
                <div  style="padding:0% 0% 0% 8%;margin:3% 0% 2% 0%;" class="col-xs-5"><input type="password" id="password1_bind" name="" value="" class="Inpt"  placeholder="请输入6位数字的支付密码"/></div>
            </div>
            <hr width="93%"  style="margin: 0;position: absolute;right:0;border:none;border-top:0.5px solid rgb(215,215,215);"/>
            <div style="margin:0% 0% 0% 0%;padding:0%;background-color: white;border:solid  rgb(215,215,215); border-width:0 0 0.5px 0;" class="row" id="column-mhead">
                <div style="padding:0% 0% 0% 11%;margin:3.5% 0% 3.5% 0%;" class="col-xs-4">确认密码</div>
                <div  style="padding:0% 0% 0% 8%;margin:3% 0% 2% 0%;" class="col-xs-5"><input type="password" id="password2_bind" name="" value="" class="Inpt"  placeholder="请重新输入密码"/></div>
            </div>
            <div style="margin:3% 0% 0% 0%;padding:0%;" class="row" id="MessageComplete-yes">
                <div style="padding:0% 0% 0% 0%;margin:3% 0% 0% 0%;" class="col-xs-12">
                    <div align="center" >
                        <button type="button"  class="yes" id="send_bind">确定</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>

</body>
</html>