<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"/usr/local/http2/htdocs/fastadmin/public/../application/chat/view/user_info/test2.html";i:1504708324;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <script src="__YOUPAI__/chat/js/jquery-3.1.1.min (1).js"></script>
        <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
        <script type="text/javascript">
            var jsconfig;
                                    $(function() {
                                        $.ajax({
                                            type: 'get',
                                            url: 'http://shower.peakjs.top/fastadmin/public/index.php/chatapi/order_info/rechargeconfig2', //后台提供的配置接口数据
                                            dataType: 'json',
                                            async: false,
                                            data: {
                                                url: '' //传入要微信注册的地址
                                            },
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




                $(pay).on('click', function() {
                    wx.ready(function() { // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready函数中。
                        wx.chooseWXPay({
                            appId: jsconfig.appId,
                            timestamp: jsconfig.timestamp, // 支付签名时间戳，注意微信jssdk中的所有使用timestamp字段均为小写。但最新版的支付后台生成签名使用的timeStamp字段名需大写其中的S字符
                            nonceStr: jsconfig.nonceStr, // 支付签名随机串，不长于 32 位
                            package: jsconfig.package, // 统一支付接口返回的prepay_id参数值，提交格式如：prepay_id=***）
                            signType: jsconfig.signType, // 签名方式，默认为'SHA1'，使用新版支付需传入'MD5'
                            paySign: jsconfig.paySign, // 支付签名
                            success: function(res) {
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
                        });
                    });


                });


            });
        </script>
    </head>

    <body>
    <button id="pay">123</button>
    </body>

</html>