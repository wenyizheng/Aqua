<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"/usr/local/http2/htdocs/fastadmin/public/../application/chat/view/user_info/test3.html";i:1504839800;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="__YOUPAI__/chat/js/jquery-3.1.1.min (1).js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#t1").click(function(){
                alert('123123');
                $("#t1").attr('disabled','true');
                var i=3;
                var id=setInterval(function(){

                        $("#t1").text(i);

                        if(i=='0'){
                            window.clearInterval(id);
                            i=3;
                            $("#t1").text('test');
                            }
                    i--;
                    },1000);



                window.setTimeout(function(){$("#t1").removeAttr("disabled")},3000);
            });
        });

    </script>
</head>
<body>
<button id="t1"  style="width: 500px;height: 500px;">test</button>
</body>

</html>