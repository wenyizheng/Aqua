<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"/usr/local/http2/htdocs/fastadmin/public/../application/chat/view/user_info/test4.html";i:1504945113;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="__PUBLIC__chat/js/iscroll.js"></script>
    <script src="__YOUPAI__/chat/js/jquery-3.1.1.min (1).js"></script>
    <link rel="stylesheet" href="__PUBLIC__chat/css/datetime.min.css">
    <script src="__PUBLIC__chat/js/datetime.min.js"></script>

    <script src="__PUBLIC__chat/js/JQuery.datetime.min.js"></script>
</head>
<body>

<div class="ui-datetime" id="datetime3"></div>
</body>
<script>
    $("#datetime3").datetime({
        type: 'diy',//date,time,diy
        date: new Date(),
        minDate: new Date(),
        maxDate: new Date(),
        gap: false,
        demotion: false,
        data: [{
            key: 'day',
            resource: [""],
            value: "",
            unit: ''
        }, {
            key: 'hour',
            resource: ["21时", "22时", "23时", "01时", "02时", "03时", "04时", "05时", "06时", "07时"],
            value: "22时",
            unit: ''
        }, {
            key: 'minute',
            resource: ["00分", "30分"],
            value: "00分",
            unit: ''
        },{
            key: 'fen',
            resource: ["|"],
            value: "|",
            unit: ''
        },
            {
            key: 'hour2',
            resource: ["21时", "22时", "23时", "01时", "02时", "03时", "04时", "05时", "06时", "07时"],
            value: "22时",
            unit: ''
        }, {
            key: 'minute2',
            resource: ["00分", "30分"],
            value: "00分",
            unit: ''
        }],
        onChange: function (data) {
            console.log("call back", data);
        }
    });

</script>
</html>