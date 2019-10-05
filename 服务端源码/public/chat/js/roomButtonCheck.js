$(document).ready(function() {

        $('.longok-img').click(function () {
            $('.longok-img').attr('disabled',false);
            setTimeout(function(){$('.longok-img').attr('disabled',true);},1000);
        });


    //change tel
    $('#exchange_coupon').click(function () {
        $('#exchange_coupon').attr('disabled',true);
        setTimeout(function(){$('#exchange_coupon').attr('disabled',false);},1000);
    });

    $("#gettelvalidate").click(function(){
        var tel=$("#change_tel2").val();
        //验证
        var regtel=new RegExp(/\d{11}/);
        if(!regtel.test($("#change_tel2").val())){
            //alert("手机号格式错误！");
            layer.open({
                content: '手机号格式错误！'
                ,skin: 'msg'
                ,time: 2 //2秒后自动关闭
            });
            return false;
        }

        $('#gettelvalidate').attr('disabled',true);
        var i=60;
        var id=setInterval(function(){
            $("#gettelvalidate").text(i);
            if(i=='0'){
                window.clearInterval(id);
                i=60;
                $("#gettelvalidate").text('确定');
            }
            i--;
        },1000);
        setTimeout(function(){$('#gettelvalidate').attr('disabled',false);},60000);
    });


    $("#gettelvalidate2").click(function(){

        var tel=$("#forget-tel").val();
        //验证
        var regtel=new RegExp(/\d{11}/);
        if(!regtel.test($("#forget-tel").val())){
            //alert("手机号格式错误！");
            layer.open({
                content: '手机号格式错误！'
                ,skin: 'msg'
                ,time: 2 //2秒后自动关闭
            });
            return false;
        }

        $('#gettelvalidate2').attr('disabled',true);
        var i=60;
        var id=setInterval(function(){
            $("#gettelvalidate2").text(i);
            if(i=='0'){
                window.clearInterval(id);
                i=60;
                $("#gettelvalidate2").text('确定');
            }
            i--;
        },1000);
        setTimeout(function(){$('#gettelvalidate2').attr('disabled',false);},60000);
    });


});

