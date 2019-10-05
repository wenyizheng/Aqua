<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"/usr/local/http2/htdocs/fastadmin/public/../application/chat/view/bath_info/roominfo2.html";i:1505478056;}*/ ?>
<html>

<head>
    <title>智慧淋浴</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="x5-fullscreen" content="true">
    <link rel="stylesheet" type="text/css" href="__YOUPAI__/chat/css/Bath-main.css">
    <link rel="stylesheet" type="text/css" href="__YOUPAI__/chat/css/left-menu.css">
    <link rel="stylesheet" type="text/css" href="__YOUPAI__/chat/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="__YOUPAI__/chat/css/ripple.css">
    <script src="__YOUPAI__/chat/js/jquery-3.1.1.min (1).js"></script>
    <script src="__YOUPAI__/chat/js/Bath.js"></script>
    <script src="__YOUPAI__/chat/js/roomlist.js"></script>
    <link rel="stylesheet" href="__YOUPAI__/chat/bootstrap/css/bootstrap.min.css">
    <script src="__YOUPAI__/chat/bootstrap/js/bootstrap.min.js"></script>
    <script src="__YOUPAI__/chat/js/userinfo.js"></script>
    <script src="__YOUPAI__/chat/js/roomInfo.js"></script>
    <script src="__YOUPAI__/chat/js/userchange.js"></script>
    <script src="__YOUPAI__/chat/js/money.js"></script>
    <script src="__YOUPAI__/chat/js/orderInfo.js"></script>
    <script src="__YOUPAI__/chat/js/youhui.js"></script>
    <script src="__YOUPAI__/chat/js/promisebind.js"></script>
    <script src="__YOUPAI__/chat/js/order.js"></script>
    <script src="__YOUPAI__/chat/js/problemInfo.js"></script>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
    <script src="__YOUPAI__/chat/js/ripple.js"></script>


    <script type="text/javascript">
        var jsconfig;
        var money; //充值金额
        var senddata={};//发送的数据

        $(function() {
            $(".longok-img").on('click', function() {
                senddata.money=$("#chargemoney").val();
                senddata=JSON.stringify(senddata);

                money=$("div[chargeclick='1']").text();

                //console.log(parseInt(money));
                if(money=='') {
                    money = $("#chargemoney").val();
                }else{
                    money=parseInt(money);
                }
                console.log(typeof(money));
                $.ajax({
                    type: 'get',
                    url: 'http://wenyizheng.cn/fastadmin/public/index.php/chatapi/order_info/rechargeconfig2', //后台提供的配置接口数据
                    dataType: 'json',
                    async: false,
                    data: "data={\"money\":\""+money+"\"}",
                    success: function(data) {
                        jsconfig=data;
                        wx.config({
                            debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
                            appId: jsconfig.appId, // 必填，公众号的唯一标识
                            timestamp: jsconfig.timestamp, // 必填，生成签名的时间戳
                            nonceStr: jsconfig.nonceStr, // 必填，生成签名的随机串
                            signature: jsconfig.signature, // 必填，签名，见附录1
                            jsApiList: [
                                "chooseWXPay"
                            ] // 所有要调用的 API 都要加到这个列表中
                        });
                    }
                });

                wx.ready(function() {
                    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后
                    // ，config是一个客户端的异步操作，所以如果需要在页面加载时就调用相关接口，
                    // 则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，
                    // 则可以直接调用，不需要放在ready函数中。
                    wx.chooseWXPay({
                        appId: jsconfig.appId,
                        timestamp: jsconfig.timestamp, // 支付签名时间戳，注意微信jssdk中的所有使用timestamp字段均为小写。但最新版的支付后台生成签名使用的timeStamp字段名需大写其中的S字符
                        nonceStr: jsconfig.nonceStr, // 支付签名随机串，不长于 32 位
                        package: jsconfig.package, // 统一支付接口返回的prepay_id参数值，提交格式如：prepay_id=***）
                        signType: jsconfig.signType, // 签名方式，默认为'SHA1'，使用新版支付需传入'MD5'
                        paySign: jsconfig.paySign, // 支付签名
                        /*success: function(res) {
                         // 支付成功后的回调函数
                         if (res.errMsg == "chooseWXPay:ok") {
                         //支付成功
                         alert('支付成功');
                         } else {
                         alert(res.errMsg);
                         }
                         },
                         cancel: function(res) {
                         //支付取消
                         alert('支付取消');
                         }
                         */
                    });
                });


            });


        });
    </script>
</head>

<body>
<div class="big-div" id="big-div">
    <!--通知页内容页模版-->
    <div class="notice2-demo" id="notice2-demo">
        <div class="container" style="padding:0%;margin:0%;">
            <div style="margin:0%;padding:0%;background-color: white;font-size:17; border:solid  rgb(240,240,240); border-width:0 0 1 0; color:rgb(72,72,72);" class="row">
                <div align="center" style="padding:0%;margin:5% 0% 0% 0%;" class="col-xs-2">
                    <img class="turn-img"  src="__YOUPAI__/chat/bath-img/turn.png" />
                </div>
                <div align="center"  style="padding:0%;margin:4% 0% 4% 0%;" class="col-xs-8"><b>详细内容</b></div>
                <div  class="col-xs-2"></div>
            </div>
            <div style="margin:10%;padding:0%;font-size: medium;font-weight:400;" class="row">
                <p style="text-indent: 2em"></p>
            </div>
        </div>
    </div>
    <!--个人资料--信息查看栏目-->
    <div class="message-column" id="message-column">
        <div class="container"  style="padding:0%;margin:0%;width:100%;background-color:white;">
            <div style="margin:0%;padding:0%;background-color:RGB(27,130,210);font-size:17; border:solid  rgb(240,240,240); border-width:0 0 1 0; color:white;" class="row">
                <div align="center" id="column-mturn" style="padding:0%;margin:5% 0% 0% 0%;" class="col-xs-2">
                    <img class="turn-img" src="__YOUPAI__/chat/bath-img/turn-change.png" />
                </div>
                <div align="center"  style="padding:0%;margin:4% 0% 4% 0%;" class="col-xs-8"><b>个人资料</b></div>
                <div id="edit"><div align="center" id="column-editor" style="padding:0%;margin:4% 0% 4% 0%;" class="col-xs-2"><b>编辑</b></div></div>
            </div>
            <div style="margin:0% 5% 0% 5%;padding:0%;" class="row" id="column-mhead">
                <div align="center" style="padding:0% 0% 0% 0%;margin:3% 0% 3% 0%;" class="col-xs-12">
                    <div align="center" ><img style="border:1px solid rgb(208,208,208);" class="column-mimg" src="__YOUPAI__/chat/bath-img/head.jpg"/>
                    </div>
                </div>
            </div>
            <div style="margin:0% 5% 0% 5%;padding:0%; border:solid  rgb(232,232,232); border-width:0 0 1 0;" class="row">
                <div style="padding:0% 0% 0% 11%;margin:4% 0% 4% 0%;" class="col-xs-4">昵称</div>
                <div  style="padding:0% 0% 0% 11%;margin:4% 0% 4% 0%;" class="col-xs-8" id="show_nickname">同学1</div>
            </div>
            <div style="margin:0% 5% 0% 5%;padding:0%; border:solid  rgb(232,232,232); border-width:0 0 1px 0;" class="row">
                <div style="padding:0% 0% 0% 11%;margin:4% 0% 4% 0%;" class="col-xs-4">性别</div>
                <div  style="padding:0% 0% 0% 11%;margin:4% 0% 4% 0%;" class="col-xs-8" id="show_sex">男</div>
            </div>
            <div style="margin:0% 5% 0% 5%;padding:0%; border:solid  rgb(232,232,232); border-width:0 0 1px 0;" class="row">
                <div style="padding:0% 0% 0% 11%;margin:4% 0% 4% 0%;" class="col-xs-4">位置</div>
                <div  style="padding:0% 0% 0% 11%;margin:4% 0% 4% 0%;" class="col-xs-8" id="show_position">山东省</div>
            </div>
            <div style="margin:0% 5% 0% 5%;padding:0%; border:solid  rgb(232,232,232); border-width:0 0 1px 0;" class="row">
                <div style="padding:0% 0% 0% 11%;margin:4% 0% 4% 0%;" class="col-xs-4">学校</div>
                <div  style="padding:0% 0% 0% 11%;margin:4% 0% 4% 0%;" class="col-xs-8" id="show_block">山东电子职业技术学院</div>
            </div>
            <div style="margin:0% 5% 0% 5%;padding:0%; border:solid  rgb(232,232,232); border-width:0 0 1px 0;" class="row">
                <div style="padding:0% 0% 0% 11%;margin:4% 0% 4% 0%;" class="col-xs-4">常用浴室</div>
                <div  style="padding:0% 0% 0% 11%;margin:4% 0% 4% 0%;" class="col-xs-8" id="show_room">一号楼一层女</div>
            </div>
            <div style="margin:0% 5% 0% 5%;padding:0%; border:solid  rgb(232,232,232); border-width:0 0 1px 0;" class="row">
                <div style="padding:0% 0% 0% 11%;margin:4% 0% 4% 0%;" class="col-xs-4">手机号</div>
                <div  style="padding:0% 0% 0% 11%;margin:4% 0% 4% 0%;" class="col-xs-8" id="show_tel">5565562556</div>
            </div>
            <div style="margin:0% 5% 0% 5%;padding:0%;" class="row" >
                <div style="padding:0% 0% 0% 11%;margin:4% 0% 4% 0%;" class="col-xs-4">支付密码</div>
                <div  style="padding:0% 0% 0% 11%;margin:4% 0% 4% 0%;" class="col-xs-8">--</div>
            </div>
        </div>
    </div>
    <!--信息修改栏目-->
    <div class="message-revise"  id="message-revise">
        <div class="container" style="padding:0%;margin:0%;width:100%;background-color:white;">
            <div style="margin:0%;padding:0%;font-size:17; background-color: RGB(27,130,210);border:solid  rgb(240,240,240); border-width:0 0 1 0; color: white;" class="row">
                <div align="center" id="column-mturn2" style="padding:0%;margin:5% 0% 0% 0%;" class="col-xs-2">
                    <img class="turn-img" src="__YOUPAI__/chat/bath-img/turn-change.png" />
                </div>
                <div align="center"  style="padding:0%;margin:4% 0% 4% 0%;" class="col-xs-8"><b>信息修改</b></div>
                <div align="center" id="message-revise-ok" style="padding:0%;margin:4% 0% 4% 0%;" class="col-xs-2"><b>完成</b></div>
            </div>
            <div style="margin:0% 5% 0% 5%;padding:0%; border:solid  rgb(232,232,232); border-width:0 0 1px 0;" class="row">
                <div align="center" style="padding:0% 0% 0% 0%;margin:3% 0% 3% 0%;" class="col-xs-12">
                    <div align="center" ><img style="border:1px solid rgb(208,208,208);" class="column-mimg" src="__YOUPAI__/chat/bath-img/head.jpg"/>
                    </div>
                </div>
            </div>
            <form>
                <div style="margin:0% 5% 0% 5%;padding:0%; border:solid  rgb(232,232,232); border-width:0 0 1px 0;" class="row">
                    <div style="padding:0% 0% 0% 11%;margin:4% 0% 4% 0%;" class="col-xs-4">昵称</div>
                    <div  style="padding:0% 0% 0% 8%;margin:3.5% 0% 3.5% 0%;" class="col-xs-8" id="change_nickname">
                        <input  type="text"  name="" value="" class="Inpt" placeholder="请输入昵称"/>
                    </div>
                </div>
                <div style="margin:0% 5% 0% 5%;padding:0%; border:solid  rgb(232,232,232); border-width:0 0 1px 0;" class="row">
                    <div style="padding:0% 0% 0% 11%;margin:4% 0% 4% 0%;" class="col-xs-4">性别</div>
                    <div  style="padding:0% 0% 0% 8%;margin:4% 0% 4% 0%;" class="col-xs-8">
                        <select class="select1" name="" id="change_sex">
                            <option value="0"  selected>男</option>
                            <option value="1">女</option>
                        </select>
                    </div>
                </div>
                <div style="margin:0% 5% 0% 5%;padding:0%; border:solid  rgb(232,232,232); border-width:0 0 1px 0;" class="row">
                    <div style="padding:0% 0% 0% 11%;margin:4% 0% 4% 0%;" class="col-xs-4">位置</div>
                    <div  style="padding:0% 0% 0% 8%;margin:4% 0% 4% 0%;" class="col-xs-8">
                        <select class="select2" name="" id="change_province">
                            <optgroup label='选择省'></optgroup>
                        </select>
                        <select class="select2" name="" id="change_city">
                            <optgroup label='选择市' ></optgroup>
                        </select>
                        <select class="select2" name="" id="change_country">
                            <optgroup label='选择区'></optgroup>
                        </select>
                    </div>
                </div>
                <div style="margin:0% 5% 0% 5%;padding:0%; border:solid  rgb(232,232,232); border-width:0 0 1px 0;" class="row">
                    <div style="padding:0% 0% 0% 11%;margin:4% 0% 4% 0%;" class="col-xs-4">学校</div>
                    <div  style="padding:0% 0% 0% 8%;margin:4% 0% 4% 0%;" class="col-xs-8">
                        <select class="select1" name="" id="change_block">

                        </select>
                    </div>
                </div>
                <div style="margin:0% 5% 0% 5%;padding:0%; border:solid  rgb(232,232,232); border-width:0 0 1px 0;" class="row">
                    <div style="padding:0% 0% 0% 11%;margin:4% 0% 4% 0%;" class="col-xs-4">常用浴室</div>
                    <div  style="padding:0% 0% 0% 8%;margin:4% 0% 4% 0%;" class="col-xs-8">
                        <select class="select1" name="" id="change_room">
                        </select>
                    </div>
                </div>
                <div style="margin:0% 5% 0% 5%;padding:0%;border:solid  rgb(232,232,232);border-width:0 0 1 0;" class="row" id="changeid-in">
                    <div style="padding:0% 0% 0% 11%;margin:4% 0% 4% 0%;" class="col-xs-4">手机号</div>
                    <div  style="padding:0% 0% 0% 8%;margin:4% 0% 4% 0%;" class="col-xs-6" id="change_tel"></div>
                    <div  style="padding:0% 0% 0% 10%;margin:5% 0% 3.5% 0%;" class="col-xs-2">
                        <img class="go-in" src="__YOUPAI__/chat/bath-img/in.png" />
                    </div>
                </div>
                <div style="margin:0% 5% 0% 5%;padding:0%;" class="row"  id="changepassword-in" >
                    <div style="padding:0% 0% 0% 11%;margin:4% 0% 0% 0%;" class="col-xs-4">支付密码</div>
                    <div  style="padding:0% 0% 0% 8%;margin:4% 0% 0% 0%;" class="col-xs-6">--</div>
                    <div  style="padding:0% 0% 0% 10%;margin:5% 0% 0% 0%;" class="col-xs-2">
                        <img class="go-in"  src="__YOUPAI__/chat/bath-img/in.png" />
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--号码更改--手机号更换页-->
    <div class="telephone-change">
        <div class="container" style="padding:0%;margin:0%;width:100%;background-color:white;">
            <div style="margin:0%;padding:0%;font-size:17;background-color: RGB(27,130,210); border:solid  rgb(240,240,240); border-width:0 0 1 0; color:white;" class="row">
                <div align="center" id="telechange-turn" style="padding:0%;margin:5% 0% 0% 0%;" class="col-xs-2">
                    <img class="turn-img" id="telechange-turnback" src="__YOUPAI__/chat/bath-img/turn-change.png" />
                </div>
                <div align="center"  style="padding:0%;margin:4% 0% 4% 0%;" class="col-xs-8"><b>号码更改</b></div>
                <div align="center" id="telechange-over" style="padding:0%;margin:3% 0% 3% 0%;" class="col-xs-2"></div>
            </div>
            <form>
                <div style="margin:10% 5% 0% 5%;padding:0%; border:solid  rgb(232,232,232); border-width:0 0 1px 0;" class="row">
                    <div style="padding:0% 0% 0% 8%;margin:5% 0% 4% 0%;" class="col-xs-4">新手机号：</div>
                    <div  style="padding:0% 0% 0% 4%;margin:4% 0% 4% 0%;" class="col-xs-8"><input type="text" name="" value="" class="Inpt"  placeholder="请输入手机号码"/></div>
                </div>
                <div style="margin:0% 5% 0% 5%;padding:0%; border:solid  rgb(232,232,232); border-width:0 0 1px 0;" class="row">
                    <div style="padding:0% 0% 0% 8%;margin:5% 0% 4% 0%;" class="col-xs-4">验证码：</div>
                    <div  style="padding:0% 0% 0% 4%;margin:4% 0% 4% 0%;" class="col-xs-5"><input type="text" name="" value="" class="Inpt"  placeholder="请输入验证码"/></div>
                    <div style="padding:1.3% 2% 1.3% 2%;margin:3.5% 0% 3.5% 0%;" id="getvalidate" class="col-xs-3">获取验证码</div>
                </div>
                <div style="margin:0% 0% 0% 0%;padding:0%;" class="row">
                    <div style="padding:0% 0% 0% 0%;margin:80% 0% 10% 0%;" class="col-xs-12">
                        <div align="center" style="color: white;">
                            <!--<img class="yes" src="__YOUPAI__/chat/bath-img/longok.png" />-->
                            <button data-ripple style="width: 60%">
                                确定
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--重置密码--支付密码重置页-->
    <div class="password-change">
        <div class="container" style="padding:0%;margin:0%;width:100%;background-color:white;">
            <div style="margin:0%;padding:0%;font-size:17;background-color: RGB(27,130,210); border:solid  rgb(240,240,240); border-width:0 0 1 0; color:white;" class="row">
                <div align="center" id="passwordchange-turn" style="padding:0%;margin:5% 0% 0% 0%;" class="col-xs-2">
                    <img class="turn-img" id="passwordchange-turnback" src="__YOUPAI__/chat/bath-img/turn-change.png" />
                </div>
                <div align="center"  style="padding:0%;margin:4% 0% 4% 0%;" class="col-xs-8"><b>重置密码</b></div>
                <div align="center" id="passwordchange-over" style="padding:0%;margin:3% 0% 3% 0%;" class="col-xs-2"></div>
            </div>
            <form>
                <div style="margin:10% 5% 0% 5%;padding:0%; border:solid  rgb(232,232,232); border-width:0 0 1px 0;" class="row">
                    <div style="padding:0% 0% 0% 8%;margin:5% 0% 4% 0%;" class="col-xs-4">原密码：</div>
                    <div  style="padding:0% 0% 0% 4%;margin:4% 0% 4% 0%;" class="col-xs-8"><input type="text" name="" value="" class="Inpt"  placeholder="请输入原支付密码"/></div>
                </div>
                <div style="margin:0% 5% 0% 5%;padding:0%; border:solid  rgb(232,232,232); border-width:0 0 1px 0;" class="row">
                    <div style="padding:0% 0% 0% 8%;margin:5% 0% 4% 0%;" class="col-xs-4">新密码：</div>
                    <div  style="padding:0% 0% 0% 4%;margin:4% 0% 4% 0%;" class="col-xs-5"><input type="password" name="" value="" class="Inpt"  placeholder="请输入新密码"/></div>
                </div>
                <div style="margin:0% 5% 0% 5%;padding:0%; border:solid  rgb(232,232,232); border-width:0 0 1px 0;" class="row">
                    <div style="padding:0% 0% 0% 8%;margin:5% 0% 4% 0%;" class="col-xs-4">确认密码：</div>
                    <div  style="padding:0% 0% 0% 4%;margin:4% 0% 4% 0%;" class="col-xs-5"><input type="password" name="" value="" class="Inpt"  placeholder="请输入新密码"/></div>
                </div>
                <div style="margin:0% 0% 0% 0%;padding:0%;" class="row">
                    <div style="padding:0% 0% 0% 0%;margin:66% 0% 10% 0%;" class="col-xs-12">
                        <div align="center" style="color: white">
                            <!--<img class="yes" src="__YOUPAI__/chat/bath-img/longok.png" />-->
                            <button data-ripple style="width: 60%">
                                确定
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--预订情况--浴头详细信息页-->
    <div class="bath-info">
        <div class="container" style="padding:0%;margin:0%;width:100%;">
            <div style="margin:0%;padding:0%;background-color: RGB(27,130,210);font-size:17; border:solid  rgb(240,240,240); border-width:0 0 1 0; color: white;" class="row">
                <div align="center" id="bathinfo-turn" style="padding:0%;margin:5% 0% 0% 0%;" class="col-xs-2">
                    <img class="turn-img" id="bathinfo-back" src="__YOUPAI__/chat/bath-img/turn-change.png" />
                </div>
                <div align="center"  style="padding:0%;margin:4% 0% 4% 0%;" class="col-xs-8"><b>预订情况</b></div>
                <div align="center" id="bathinfo-over" style="padding:0%;margin:3% 0% 3% 0%;" class="col-xs-2"></div>
            </div>
            <div style="margin:0%;padding:0%;" class="row" id="">
                <form>
                <div style="padding:0% 0% 0% 3%;margin:0% 0% 0% 0%;" class="col-xs-2">
                    <div class="date-select">
                        <select class="select2" name="">
                            <option value="0" selected>今天</option>
                            <option value="1">明天</option>
                        </select>
                    </div>
                </div>
                <div style="padding:0% 0% 0% 1.5%;margin:0.5% 0% 0% 0%;" class="col-xs-9" id="datetime">
                    <div class="datatime">8月21日</div>
                </div>
                </form>
            </div>
            <div style="margin:0%;padding:0%;" class="row">
                <div align="center" style="padding:0%;margin:0% 0% 0% 0%;" class="col-xs-12">
                    <div align="center" class="time-range">8:00</div>
                </div>
            </div>
            <div style="margin:0%;padding:0%;" class="row">
                <div align="center" style="padding:0%;margin:0% 0% 0% 0%;" class="col-xs-12">
                    <div align="left" class="slip-top"></div>
                </div>
            </div>
            <div style="margin:0%;padding:0%;" class="row">
                <div style="padding:0%;margin:0% 0% 0% 0%;" class="col-xs-12" align="center">
                    <div class="bath-slip" id="bath-slip"></div>
                </div>
            </div>
            <div style="margin:0%;padding:0%;" class="row">
                <div align="center" style="padding:0%;margin:0% 0% 0% 0%;" class="col-xs-12">
                    <div class="slip-top"></div>
                </div>
            </div>
            <div style="margin:0%;padding:0%;" class="row">
                <div align="center" style="padding:0%;margin:0% 0% 0% 0%;" class="col-xs-12">
                    <div align="center" class="time-range">22:00</div>
                </div>
            </div>
            <div style="margin:0%;padding:0%;" class="row">
                <div align="center" style="padding:0%;margin:4% 0% 0% 0%;" class="col-xs-12">
                    <div class="slip-intro">
                        <b>注：橙色为已预订时间段，不可预订；浴室可用时间为早8点至晚10点，请在规定时间内使用。</b>
                    </div>
                </div>
            </div>
            <div style="margin:0%;padding:0%;" class="row">
                <form>
                <div style="padding:5% 3% 5% 3%;margin:5% 0% 0% 0%;background-color:rgb(224,224,224);font-size:15;color:rgb(100,100,100);" class="col-xs-12">
                    <span><b>时间&nbsp;&nbsp;</b></span>
                    <span>
                        <select class="time-select" id="times1" name="">
                            <option value="08" selected>8</option>
                            <option value="09">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                        </select>
                    </span>
                    <span><b>:</b></span>
                        <span>
                        <select class="time-select" id="time-select2" name="">
                            <option value="00" selected>00</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                        </select>
                    </span>
                    <span>&nbsp;<b>至</b>&nbsp;</span>
                        <span>
                        <select class="time-select" id="times2" name="">
                            <option value="08" selected>8</option>
                            <option value="09">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                        </select>
                    </span>
                    <span><b>:</b></span>
                        <span>
                        <select class="time-select" id="time-select1"  name="">
                            <option value="00" selected>00</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                        </select>
                    </span>
                </div>
                </form>
                <div style="margin:0%;padding:0%;" class="row">
                    <div style="padding:0%;margin:5% 0% 2% 0%;" class="col-xs-12">
                        <div align="center" class="slip-ok"style="color: white;">
                            <button data-ripple style="width: 60%">
                                确定
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--金额-->
    <div class="amount" id="amount">
        <div class="container" style="padding:0%;margin:0%;">
            <div style="margin:0%;padding:0%;background-color: RGB(27,130,210);font-size:17px; border:solid  rgb(240,240,240); border-width:0 0 0 0; color:white;" class="row">
                <div align="center" style="padding:0%;margin:5% 0% 0% 0%;" class="col-xs-2">
                    <img class="turn-img" id="amount-turn" src="__YOUPAI__/chat/bath-img/turn-change.png" />
                </div>
                <div align="center"  style="padding:0%;margin:4% 0% 4% 0%;" class="col-xs-8"><b>金额</b></div>
                <div  class="col-xs-2"></div>
            </div>
            <div style="margin:0 0 0 0;padding:0% 0% 2% 0; background-color: RGB(27,130,210); color:white"  class="row" >
                <div style="padding:0% 0% 0% 3%;margin:3% 0% 0% 0%;" class="col-xs-12" id="amount-title">
                    <b>账户余额</b>
                </div>
            </div>
            <div style="margin:0%;padding:0%; background-color: RGB(27,130,210);color:white"  class="row" >
                <div align="center" style="padding:0 0 0 0;margin:0% 0% 0% 0%;font-size:110;" class="col-xs-12" id="amount-show"></div>
            </div>
            <div style="margin:0 0 0 0;padding:0% 0% 0 0; background-color: RGB(27,130,210); color:white"  class="row" >
                <div align="right" style="padding:0% 6% 3% 0%;margin:0% 0% 0% 0%;font-size: 17; color:white;" class="col-xs-12" >
                    <b>元</b>
                </div>
            </div>
            <div style="margin:10% 0% 0% 0%;padding:0%; background-color:RGB(220,220,220);" id="in-recharge" class="row" >
                <div align="center" style="padding:0%;margin:3% 0% 3% 0%;" class="col-xs-2">
                    <img class="recharge-img" src="__YOUPAI__/chat/bath-img/recharge.png"/>
                </div>
                <div  style="padding:0%;margin:3% 0% 3% 0%;font-size:20;" class="col-xs-2">充值</div>
                <div class="col-xs-6"></div>
                <div align="center"  style="padding:0%;margin:4.5% 0% 4.5% 0%;" class="col-xs-2">
                    <img style="width:16%" src="__YOUPAI__/chat/bath-img/in.png" />
                </div>
            </div>
        </div>
    </div>
    <!--充值页-->
    <div class="recharge" id="recharge">
        <div class="container" style="padding:0%;margin:0%;">
            <div style="margin:0%;padding:0%;background-color: RGB(27,130,210);font-size:17; border:solid  rgb(240,240,240); border-width:0 0 1 0; color:white;" class="row">
                <div align="center" style="padding:0%;margin:5% 0% 0% 0%;" class="col-xs-2">
                    <img class="turn-img" id="recharge-turn" src="__YOUPAI__/chat/bath-img/turn-change.png" />
                </div>
                <div align="center" style="padding:0%;margin:4% 0% 4% 0%;" class="col-xs-8"><b>充值</b></div>
                <div style="padding:0%;margin:3% 0% 3% 0%;" class="col-xs-2"></div>
            </div>
            <div style="margin:6% 3% 0% 3%;padding:0% 0% 2% 0%; border:solid  rgb(180,180,180);border-width:0 0 1 0;" class="row">
                <div align="center" style="padding:0%;margin:0% 0% 0% 0%;" class="col-xs-2">
                    <img class="people-img" src="__YOUPAI__/chat/bath-img/people.png" />
                </div>
                <div style="padding:0%;margin:0% 0% 0% 0%;font-size:20" class="col-xs-10">文艺政</div>
            </div>
            <div style="padding:4% 0% 0% 0%;margin:0;color:#7c7cf2;font-size: 18;" class="row" id="chargeblock">
                <div align="center" id="sum1" style="padding:3.5%;margin:2% 2% 0% 8%;border-radius:7px;border: solid 1px #7c7cf2;" class="col-xs-3">10元</div>
                <div align="center" id="sum2" style="padding:3.5%;margin:2%;border-radius:7px;border: solid 1px #7c7cf2;" class="col-xs-3">20元</div>
                <div align="center" id="sum3" style="padding:3.5%;margin:2%;border-radius:7px;border: solid 1px #7c7cf2;" class="col-xs-3">30元</div>
                <div align="center" id="sum4" style="padding:3.5%;margin:2% 2% 0% 8%;border-radius:7px;border: solid 1px #7c7cf2;" class="col-xs-3">50元</div>
                <div align="center" id="sum5" style="padding:3.5%;margin:2%;border-radius:7px;border: solid 1px #7c7cf2;" class="col-xs-3">100元</div>
                <div align="center" id="sum6" style="padding:3.5%;margin:2%;border-radius:7px;border: solid 1px #7c7cf2;" class="col-xs-3">200元</div>
                <div align="center" id="sum7" style="padding:3.5%;margin:2% 2% 0% 8%;border-radius:7px;border: solid 1px #7c7cf2;" class="col-xs-3">300元</div>
                <div align="center" id="sum8" style="padding:3.5%;margin:2%;border-radius:7px;border: solid 1px #7c7cf2;" class="col-xs-3">500元</div>
            </div>
            <div style="margin:12% 8% 0% 8%;padding: 1% 0 1% 0; border:solid 1px #7c7cf2;border-radius:4px;color:#5757e7;" class="row">
                <div align="center" style="padding:1.2% 0 0 0;margin:0% 0% 0% 0%;font-size: 18;" class="col-xs-4">其它金额</div>
                <div align="center" style="padding:0%;margin:0% 0% 0% 0%;font-size: 18;border:solid  #7c7cf2;border-width:0 1px 0 1px;" class="col-xs-4"><input  type="text" name="" value="" id="chargemoney" class="recharge-input"/></div>
                <div align="center" style="padding:1.2% 0 0 0;margin:0% 0% 0% 0%;font-size: 18;" class="col-xs-4">元</div>
            </div>
            <div align="center" style="margin:15% 0% 0% 0%;padding:0%;color: white;"class="row">
                <!--<img class="longok-img" src="__YOUPAI__/chat/bath-img/longok.png" />-->
                <button data-ripple style="width: 60%">
                    确定
                </button>
            </div>
        </div>
    </div>
    <!--查看订单-->
    <div class="indent" id="indent">
        <div class="container" style="padding:0%;margin:0%;background-color: white">
            <div style="margin:0%;padding:0%;font-size:17; background-color: RGB(27,130,210);border:solid  rgb(240,240,240); border-width:0 0 1 0; color:white;" class="row">
                <div align="center" style="padding:0%;margin:5% 0% 0% 0%;" class="col-xs-2">
                    <img class="turn-img" id="indent-turn" src="__YOUPAI__/chat/bath-img/turn-change.png" />
                </div>
                <div align="center"  style="padding:0%;margin:4% 0% 4% 0%;" class="col-xs-8"><b>查看订单</b></div>
                <div align="center" id="indent-ok" style="padding:0%;margin:3% 0% 3% 0%;" class="col-xs-2"></div>
            </div>
            <div class="container" style="padding:0% 5% 0% 5%;margin:3% 0% 0% 0%;background-color: white;color:rgb(100,100,100);" id="demo-div">
                <div style="margin:0%;padding:0%;" class="row">
                    <div  style="padding:0%;margin:3% 0% 0% 0%;font-weight:500; " class="col-xs-12" ></div>
                </div>
                <div style="margin:0%;padding:0%;" class="row">
                    <div  style="padding:0%;margin:3% 0% 3% 0%;font-size: 12;" class="col-xs-12" ></div>
                </div>
                <div style="margin:3% 0% 3% 0%;padding:0%;" class="row">
                    <div style="padding:0%;margin:0% 0% 0% 0%;" class="col-xs-3"></div>
                    <div align="center" style="padding:0%;margin:0% 0% 0% 0%;" class="col-xs-6"></div>
                    <div align="center" style="padding:0%;margin:0% 0% 0% 0%;" class="col-xs-3"></div>
                </div>
            </div>
        </div>
    </div>
    <!--意见反馈-->
    <div class="feedback" id="feedback">
        <div class="container" style="padding:0%;margin:0%;">
            <div style="margin:0%;padding:0%;background-color: white;font-size:17; border:solid  rgb(240,240,240); border-width:0 0 1 0; color:rgb(72,72,72);" class="row">
                <div align="center" style="padding:0%;margin:5% 0% 0% 0%;" class="col-xs-2">
                    <img class="turn-img" id="feedback-turn" src="__YOUPAI__/chat/bath-img/turn.png" />
                </div>
                <div align="center" style="padding:0%;margin:4% 0% 4% 0%;" class="col-xs-8"><b>意见反馈</b></div>
                <div style="padding:0%;margin:3% 0% 3% 0%;" class="col-xs-2"></div>
            </div>
            <form>
                <div style="margin:11% 7% 0% 7%;padding:0%;font-size:17;color: rgb(120,120,120);font-family:仿宋;" class="row" id="option">
                    <div align="center" style="padding:0%;margin:7% 0% 0% 0%;" class="col-xs-6" id="feedback-demo">
                        <label><div></div></label>
                    </div>
                </div>
                <div style="margin:10% 0% 0% 0%;padding:0%; " class="row">
                    <div align="center" style="padding:0%;margin:0% 0% 0% 0%;" class="col-xs-12">
                        <textarea style="width:77%;height:25%;background-color: transparent;border-color: cadetblue;border-style: dotted;" placeholder="请在此写下您的建议"></textarea>
                    </div>
                    <div align="right" style="padding:1% 9% 0% 0%;;margin:0% 0% 0% 0%;" class="col-xs-12">
                        <img class="write-img" src="__YOUPAI__/chat/bath-img/write.png" />
                    </div>
                    <div align="center" style="padding:0;margin:13% 0% 3% 0%;" class="col-xs-12">
                        <img class="yes2-img" src="__YOUPAI__/chat/bath-img/longok.png" />
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--常见问题-->
    <div class="faq" id="faq">
        <div class="container" style="padding:0%;margin:0%;background-color: white">
            <div style="margin:0%;padding:0%;font-size:17;background-color: RGB(27,130,210); border:solid  rgb(240,240,240); border-width:0 0 1 0; color:white;" class="row">
                <div align="center" style="padding:0%;margin:5% 0% 0% 0%;" class="col-xs-2">
                    <img class="turn-img" id="faq-turn" src="__YOUPAI__/chat/bath-img/turn-change.png" />
                </div>
                <div align="center" style="padding:0%;margin:4% 0% 4% 0%;" class="col-xs-8"><b>常见问题</b></div>
                <div style="padding:0%;margin:3% 0% 3% 0%;" class="col-xs-2"></div>
            </div>
            <div class="container" style="padding:0% 0% 0% 0%;margin:0% 0% 0% 0%;" id="faq-title">
                <div style="margin:0%;padding:0%;" class="row">
                    <div style="padding:0% 0% 0% 3%;margin:2% 0% 3% 0%;" class="col-xs-12" ><b>热点问题</b></div>
                </div>
            </div>
            <div class="container" style="padding:0% 0% 0% 0%;margin:0% 0% 0% 0%;color:rgb(90,90,90); border:solid  rgb(232,232,232);border-width:0 0 1 0;" id="faq-demo">
                <div style="margin:0%;padding:0%;" class="row">
                    <div  style="padding:3% 0% 2% 8%;margin:0%;" class="col-xs-11" ></div>
                    <div  style="padding:0%;margin:3.5% 0%;" class="col-xs-1" >
                        <img style="width:24%" src="__YOUPAI__/chat/bath-img/in.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--优惠劵-->
    <div class="coupons" id="coupons">
        <div class="container" style="padding:0%;margin:0%;">
            <div style="margin:0%;padding:0%;background-color: RGB(27,130,210);font-size:17; border:solid  rgb(240,240,240); border-width:0 0 1 0; color:white;" class="row">
                <div align="center" style="padding:0%;margin:5% 0% 0% 0%;" class="col-xs-2">
                    <img class="turn-img" id="coupons-turn" src="__YOUPAI__/chat/bath-img/turn-change.png" />
                </div>
                <div align="center"  style="padding:0%;margin:4% 0% 4% 0%;" class="col-xs-8"><b>优惠劵</b></div>
                <div align="center" id="coupons-ok" style="padding:0%;margin:3% 0% 3% 0%;" class="col-xs-2"></div>
            </div>
            <div class="container" style="padding:0% 5% 0% 5%;margin:5% 0% 0% 0%;" id="coupons-demo">
                <div style="margin:0%;padding:0%;background-color: darkseagreen" class="row">
                    <div style="padding:0%;margin:0% 0% 0% 0%;color:rgb(100,100,100)" class="col-xs-8" >
                        <div class="container" style="padding:0% 0% 0% 0%;margin:0% 0% 0% 0%;background-color: white">
                            <div style="margin:0%;padding:0%;" class="row">
                                <div  style="padding:0% 5% 0% 0%;margin:3% 0% 20% 0%;" class="row" >
                                    <div  class="col-xs-6" >888</div>
                                    <div align="right" class="col-xs-6" ></div>
                                </div>
                                <div style="padding:0%;margin:0% 0% 2% 0%;font-size: 12" class="row" >
                                        <div  align="left" class="col-xs-8" ></div>
                                        <div class="col-xs-4" >888</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div align="center" style="padding:0%;margin:2.5% 0% 0% 0%; background-color: darkseagreen" class="col-xs-4" >
                        <span class="amount-sign"><b>￥</b></span>
                        <span class="amount-figure"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--执行完成提示框-->
    <div class="OkLogin" id="OkLogin">
        <div class="container" style="padding:0%;margin:0%;">
            <div style="margin:45% 18%;padding:0;" class="row" id="point">
                <div align="center" style="padding:0%;margin:0;" class="col-xs-12" >
                    <img style="padding:0%;margin:10% 0 5% 0;" class="true" src="__YOUPAI__/chat/bath-img/true.png" />
                </div>
                <div align="center" style="padding:0%;margin:0;" class="col-xs-12" id="point-text">完成</div>
            </div>
        </div>
    </div>
    <!--表单验证错误提示框-->
    <div class="error" id="error">
        <div class="container" style="padding:0%;margin:0%;">
            <div style="margin:45% 18%;padding:0;" class="row" id="mistake">
                <div align="center" style="padding:0%;margin:0;" class="col-xs-12" >
                    <img style="padding:0%;margin:10% 0 5% 0;" class="error-img" src="__YOUPAI__/chat/bath-img/true.png" />
                </div>
                <div align="center" style="padding:0%;margin:0;" class="col-xs-12" id="error-text">格式错误！</div>
            </div>
        </div>
    </div>
    <!--右侧通知页面-->
    <div class="notice" id="notice">
        <div class="container" style="padding:0%;margin:0%;background-color: white;">
            <div style="margin:0%;padding:0%;font-size:17; border:solid  rgb(240,240,240); border-width:0 0 1 0; color:rgb(72,72,72);" class="row">
                <div align="center" style="padding:0%;margin:5% 0% 0% 0%;" class="col-xs-2">
                    <img class="turn-img" id="notice-turn" src="__YOUPAI__/chat/bath-img/turn.png" />
                </div>
                <div align="center"  style="padding:0%;margin:4% 0% 4% 0%;" class="col-xs-8"><b>通知</b></div>
                <div align="center" id="notice-ok" style="padding:0%;margin:3% 0% 3% 0%;" class="col-xs-2"></div>
            </div>
            <div class="container" style="padding:0% 0% 0% 0%;margin:0% 0% 0% 0%;color:rgb(90,90,90); border:solid  rgb(232,232,232);border-width:0 0 1 0;" id="notice-demo">
                <div style="margin:0%;padding:0%;" class="row">
                    <div align="right" style="padding:2% 6% 0% 4%;margin:0%;" class="col-xs-12" ></div>
                </div>
                <div style="margin:0%;padding:0%;font-family: 微软雅黑;" class="row">
                    <div  style="padding:0% 0% 2% 4%;margin:0% 0% 0% 0%;" class="col-xs-11" ></div>
                    <div  style="padding:0%;margin:3% 0% 2% 0%;" class="col-xs-1" >
                        <img style="width:24%" src="__YOUPAI__/chat/bath-img/in.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--主界面-->
    <div class="main-div" id="main-div">
        <div class="container" style="padding:0%;margin:0%;width:100%;background-color:rgb(240,240,240);position: absolute" id="main-container">
            <div style="padding:0%;margin:0%;background-color:RGB(27,130,210);" class="row" id="mtop-row">
                <div style="padding:0%;margin:0%;" class="col-xs-4">
                    <div align="left"><img class="mtop-img" id="left-menubutton" src="__YOUPAI__/chat/bath-img/left-menu-write.png" /></div>
                </div>
                <div style="padding:0%;margin:0%;" class="col-xs-4">
                    <div align="center"><img class="mtopcenterr-img" src="__YOUPAI__/chat/bath-img/zao-write.png" /></div>
                </div>
                <div style="padding:0%;margin:0%;" class="col-xs-4">
                    <div align="right" id="to-notice"><img class="mtop-img" src="__YOUPAI__/chat/bath-img/message-write.png" /></div>
                </div>
            </div>
                <div style="padding:0%;margin:0%;background-color:white;" class="row" id="mtop2-row">
                    <div style="padding:0% 0% 0% 3%;margin:0%;" class="col-xs-2">
                        <!--<img class="mtop2-img" src="__YOUPAI__/chat/bath-img/position.png" />-->
                    </div>
                    <div style="padding:0% 0% 0% 23%;margin:3% 0% 0% 0%;" class="col-xs-10">
                        <form action="" method="get" class="mtop2-form">
                            <select class="mtop2-select" name="" id = "showroomlist">
                                <optgroup label='选择常用浴室'></optgroup>
                            </select>
                        </form>
                    </div>
                </div>
                <div style="padding:0%;margin:0%;" class="row">
                    <div style="padding:0%;margin:0%;" class="col-xs-12">
                        <div align="center"><img class="bath-intro" src="__YOUPAI__/chat/bath-img/bathintro.png" /></div>
                    </div>
                </div>
            <div>
                <button data-ripple style="width: 60%">
                    确定
                </button>
            </div>
                <div style="padding:0% 0%;margin:5% 7% 0% 7%" class="row" id="bath-menu">
                    <div align="center" style="padding:0%;margin:6% 0% 0% 0%;" class="col-xs-3" >
                        <img class="bath-img" prs-click="0" id='img_status_1' src="__YOUPAI__/chat/bath-img/yes01.png" />
                    </div>
                    <div align="center" style="padding:0%;margin:6% 0% 0% 0%;" class="col-xs-3" >
                        <img class="bath-img" prs-click="0" id='img_status_2' src="__YOUPAI__/chat/bath-img/yes02.png" />
                    </div>
                    <div align="center" style="padding:0%;margin:6% 0% 0% 0%;" class="col-xs-3" >
                        <img class="bath-img" prs-click="0" id='img_status_3' src="__YOUPAI__/chat/bath-img/yes03.png" />
                    </div>
                    <div align="center" style="padding:0%;margin:6% 0% 0% 0%;" class="col-xs-3" >
                        <img class="bath-img" prs-click="0" id='img_status_4' src="__YOUPAI__/chat/bath-img/yes04.png" />
                    </div>
                    <div align="center" style="padding:0%;margin:6% 0% 0% 0%;" class="col-xs-3" >
                        <img class="bath-img" prs-click="0" id='img_status_5' src="__YOUPAI__/chat/bath-img/yes05.png" />
                    </div>
                    <div align="center" style="padding:0%;margin:6% 0% 0% 0%;" class="col-xs-3" >
                        <img class="bath-img" prs-click="0" id='img_status_6' src="__YOUPAI__/chat/bath-img/yes06.png" />
                    </div>
                    <div align="center" style="padding:0%;margin:6% 0% 0% 0%;" class="col-xs-3" >
                        <img class="bath-img" prs-click="0" id='img_status_7' src="__YOUPAI__/chat/bath-img/yes07.png" />
                    </div>
                    <div align="center" style="padding:0%;margin:6% 0% 0% 0%;" class="col-xs-3" >
                        <img class="bath-img" prs-click="0" id='img_status_8' src="__YOUPAI__/chat/bath-img/yes08.png" />
                    </div>
                </div>
                <div align="center" style="padding:0%;margin:50% 0% 10% 0%;color:#c5c7cb;" class="col-xs-12" >
                    <div style="font-size: 18;font-family: 华文细黑">注：请点击可用浴位进行预约<br>若无可用浴位，软件将自动排队</div>
                </div>
           </div>
    </div>
    <!--左侧菜单-->
    <div class="left-menu" id="left-menu">
        <div class="container" id="left-container" style="padding:0%;margin:0%;width:100%;height:100%;">
            <div style="margin:0%;padding:0%;height:100%;" class="row">
                <div style="padding:0%;margin:0% 0% 0% 0%;background-color:rgba(0,0,0,0.8);height:100%;" class="col-xs-8" id="left-color-menu">
                    <div class="container" style="padding:0%;margin:0%;width:100%;">
                        <div style="margin:10% 0% 0% 0%;padding:0%;" id="left-head" class="row">
                            <div style="padding:0%;margin:20% 0% 0% 0%;" class="col-xs-6">
                                <div align="right"><img style="border:6px solid rgba(0,0,0,0.3);" class="left-head" src="__YOUPAI__/chat/bath-img/head.jpg"/></div>
                            </div>
                            <div style="padding:0% 0% 0% 5%;margin:35% 0% 0% 0%;" class="col-xs-6">
                                <div class="left-name" id="left_name">名字</div>
                            </div>
                        </div>
                        <div style="margin:25% 0% 0% 0%;padding:0%;background-color:rgba(0,0,0,0.8);" id="amount-menu" class="row">
                            <div style="padding:0%;margin:6% 0% 6% 0%;" class="col-xs-4">
                                <div align="center"><img class="left-sumMoney" src="__YOUPAI__/chat/bath-img/money-change.png" /></div>
                            </div>
                            <div style="padding:0% 0% 0% 5%;margin:6.5% 0% 6% 0%;" class="col-xs-8">
                                <div class="left-sum-name" id="left-sum-name" >金额</div>
                            </div>
                        </div>
                        <div style="margin:0% 0% 0% 0%;padding:0%;" class="row"  id="indent-menu">
                            <div style="padding:0%;margin:6% 0% 6% 0%;" class="col-xs-4">
                                <div align="center"><img class="left-sum" src="__YOUPAI__/chat/bath-img/order form-change.png" /></div>
                            </div>
                            <div style="padding:0%;margin:6.5% 0% 6% 0%;" class="col-xs-8">
                                <div align="left" class="left-sum-name">&emsp;查看订单</div>
                            </div>
                        </div>
                        <div style="margin:0% 0% 0% 0%;padding:0%;background-color: rgba(0,0,0,0.8);" class="row"   id="faq-menu">
                            <div style="padding:0%;margin:6% 0% 6% 0%;" class="col-xs-4">
                                <div align="center"><img class="left-sum" src="__YOUPAI__/chat/bath-img/question-change.png" /></div>
                            </div>
                            <div style="padding:0%;margin:6.5% 0% 6% 0%;" class="col-xs-8" >
                                <div align="left" class="left-sum-name">&emsp;常见问题</div>
                            </div>
                        </div>
                        <div style="margin:0% 0% 0% 0%;padding:0%;" class="row"  id="coupons-menu">
                            <div style="padding:0%;margin:6% 0% 6% 0%;" class="col-xs-4">
                                <div align="center"><img class="left-sum" src="__YOUPAI__/chat/bath-img/coupon-change.png" /></div>
                            </div>
                            <div style="padding:0%;margin:6.5% 0% 6% 0%;" class="col-xs-8">
                                <div align="left" class="left-sum-name">&emsp;优惠券</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="padding:0%;margin:0% 0% 0% 0%;height:100%;" id="left-shelter" class="col-xs-4"></div>
            </div>
        </div>
    </div>



</div>
<script type="text/javascript">
    // just add effect to elements
    Array.prototype.forEach.call(document.querySelectorAll('[data-ripple]'), function(element){
        // find all elements and attach effect
        new RippleEffect(element); // element is instance of javascript element node
    });
</script>
</body>
</html>