
$(document).ready(function () {
    window.wechatinfo='';
    window.userinfo='';
    window.blocklist='';
    window.roomlist='';




    GetRoomList();

    SetRoomList(window.userinfo.room_name,true);

    GetCellList(window.userinfo.room_name,true);

    SetUserInfo();

    SetProblemList();

    SetBlockList();

    SetIntegral();

    GetCouponList();




    $("#showroomlist").change(function() {
        GetCellList($("#showroomlist").find("option:selected").text(),true);
    });
    $("#change_block").change(function(){
        SetRoomList();
    });

    $("#sendbasic").click(function(){
        ChangeUserInfo();
    });


    $("#change_sex").change(function(){
        SetRoomList(window.userinfo.room_name);
    });

    $("#gettelvalidate").click(function(){
        var tel=$("#change_tel2").val();
        var regtel=new RegExp(/\d{11}/);
        if(!regtel.test($("#change_tel2").val())){
            layer.open({
                content: '手机号格式错误！'
                ,skin: 'msg'
                ,time: 2
            });
            return '';
        }

        GetTelCode(tel);
    });

    $("#gettelvalidate2").click(function(){
        var tel=$("#forget-tel").val();
        var regtel=new RegExp(/\d{11}/);
        if(!regtel.test($("#forget-tel").val())){
            layer.open({
                content: '手机号格式错误！'
                ,skin: 'msg'
                ,time: 2
            });
            return '';
        }

        GetTelCode(tel);
    });

    $("#recharge-turn").click(function(){
        SetMoneyInfo();
    });
    $("#filter").click(function(){
        FilterCell();
    });

    $("#sendtel1").click(function(){

        $('#sendtel1').click(function () {
            $('#sendtel1').attr('disabled',true);
            setTimeout(function(){$('#sendtel1').attr('disabled',false);},1000);
        });

        var regtel=new RegExp(/\d{11}/);
        if(!regtel.test($("#change_tel2").val())){
            layer.open({
                content: '手机号格式错误！'
                ,skin: 'msg'
                ,time: 2
            });
            return '';
        }
        var regcode=new RegExp(/\d{5}/);
        if(!regcode.test(parseInt($("#change_verify").val()))){
            layer.open({
                content: '验证码格式错误！'
                ,skin: 'msg'
                ,time: 2
            });
            return '';
        }

        ChangeUserTel();
    });

    $("#sendpwd1").click(function(){

        $('#sendpwd1').click(function () {
            $('#sendpwd1').attr('disabled',true);
            setTimeout(function(){$('#sendpwd1').attr('disabled',false);},1000);
        });

        var regpwd=new RegExp(/\d{6}/);
        if(!regpwd.test(parseInt($("#oldpwd").val()))||!regpwd.test(parseInt($("#newpwd1").val()))||!regpwd.test(parseInt($("#newpwd2").val()))){
            layer.open({
                content: '密码格式有误！'
                ,skin: 'msg'
                ,time: 2
            });
            return '';
        }
        if($("#newpwd1").val()!=$("#newpwd2").val()){
            layer.open({
                content: '两次密码不一致！'
                ,skin: 'msg'
                ,time: 2
            });
            return '';
        }
        ChangeUserPwd();
    });

    $("#forget-pwd").click(function(){

        $('#forget-pwd').click(function () {
            $('#forget-pwd').attr('disabled',true);
            setTimeout(function(){$('#forget-pwd').attr('disabled',false);},1000);
        var regpwd=new RegExp(/\d{6}/);
        if(!regpwd.test(parseInt($("#forget-pwd1").val()))||!regpwd.test(parseInt($("#forget-pwd2").val()))){
            //alert("密码格式有误！");
            layer.open({
                content: '密码格式有误！'
                ,skin: 'msg'
                ,time: 2
            });
            return '';
        }
        if($("#newpwd1").val()!=$("#newpwd2").val()){
            layer.open({
                content: '两次密码不一致！'
                ,skin: 'msg'
                ,time: 2
            });
            return '';
        }
        ForgetPwd();
    });

    $(".menu5").click(function(){
        SetPromiseList();
    });



    $(".menu3").click(function(){
        SetCouponList();
    });


    $("#sub").click(function(){

        $('#sub').attr('disabled',true);
        setTimeout(function(){$('#sub').attr('disabled',false);},1000);


        var type;
        for(var i=0;i<9;i++){
            if($("#opinionop" + i).prop("checked")){
                type=$("#opinionop"+i).val();
            }
        }
        if(!type){
            layer.open({
                content: '请选择意见反馈类型！'
                ,skin: 'msg'
                ,time: 2
            });
            return '';
        }
        if(!$("#problemtext").val()){
            layer.open({
                content: '意见反馈内容未空!'
                ,skin: 'msg'
                ,time: 2
            });
            return '';
        }
        SendProblemInfo();
    });

    $("#operate_cancel").click(function(e){
        layer.open({
            content: '取消订单?'
            ,btn: ['确定', '取消']
            ,yes: function(index){
                var promise_id=$(e.target).attr('promise_id');
                SendPromiseCancel(promise_id);
                SetPromiseList();
                layer.close(index);
            }
            ,no:function(index){
                layer.close(index);
            }
        });

    });

    $("#demo_faq_name").click(function(e){
        var contentid=$(e.target).attr('content');
        $(".demo_problem").hide();
        $("#"+contentid).show();
    });
    $("#notice_out").click(function(){
        $(".notice2-demo").hide();
        $(".demo_problem").show();
    });

    $(".bath-img").click(function(e){
        var cell_id=$(e.target).attr("cell_id");
        $(".datetime").attr('cell_id',cell_id);
        var date=new Date();
        var maxday=new Date(date.getFullYear(),date.getDate(),0).toLocaleDateString();
        maxday=maxday.slice(-2);
        var day;    /
        var month;
        if($("#day_select").val()=='0'){
            day=date.getDate();
            month=parseInt(date.getMonth())+1;
        }else{
            day=parseInt(date.getDate())+1;
            month=parseInt(date.getMonth())+1;
            if(day>maxday){
                day=1;
                month=parseInt(date.getMonth())+2;
            }
        }
        if(day<10){
            day='0'+day;
        }



        $(".datetime").text(month+"月"+day+"日");

        SetCellInfo(cell_id,day);

    });
    $("#day_select").change(function(){
        var cell_id=$(".datetime").attr('cell_id');
        var date=new Date();
        var maxday=new Date(date.getFullYear(),date.getDate(),0).toLocaleDateString();
        maxday=maxday.slice(-2);
        var day;
        var month;
        if($("#day_select").val()=='0'){
            day=date.getDate();
            month=parseInt(date.getMonth())+1;
        }else{
            day=parseInt(date.getDate())+1;
            month=parseInt(date.getMonth())+1;
            if(day>maxday){
                day=1;
                month=parseInt(date.getMonth())+2;
            }
        }
        if(day<10){
            day='0'+day;
        }
        $(".datetime").text(month+"月"+day+"日");
        SetCellInfo(cell_id,day);
    });


    $("#slip-ok").click(function(){

        $('#slip-ok').attr('disabled',true);
        setTimeout(function(){$('#slip-ok').attr('disabled',false);},1000);

        var begin_time=parseInt($("#times1").find("option:selected").text())*60+parseInt($("#time-select1").find("option:selected").text());
        var end_time=parseInt($("#times2").find("option:selected").text())*60+parseInt($("#time-select2").find("option:selected").text());

            layer.open({
                content: '预约时间顺序错误!'
                ,skin: 'msg'
                ,time: 2 //2秒后自动关闭
            });
            return '';
        }
        if((end_time-begin_time)>60){
            layer.open({
                content: '预约时间大于60分钟!'
                ,skin: 'msg'
                ,time: 2
            });
            return '';

        var date=new Date();
        var nowtime=parseInt(date.getHours())*60+parseInt(date.getMinutes());
        if(begin_time<nowtime){
            layer.open({
                content: '请选择正确的预约时间!'
                ,skin: 'msg'
                ,time: 2
            });
            return '';
        }

        SendPromiseInfo();
    });


    $(".menu2").click(function(){
        SetMoneyInfo();
    });

    $(".menu5").click(function(){
        SetPromiseList();
    });

    $("#exchange_coupon").click(function(){
        $("#exchange_coupon").attr('disabled','true');
        //setTimeout(function(){$('#exchange_coupon').removeAttr('disabled');},1000);

        var scene_id=$(this).attr('scene_id');
        var user_id=window.userinfo.user_id;



        ExchangeCoupon(user_id,scene_id);
    });
});


function GetRoomList(){
    $.ajax({
        'type':'post',
        'url':'https://wenyizheng.cn/fastadmin/public/index.php\',
        'dataType':'json',
        'async':false,
        //'data':'data='+senddata,
        success:function(data){
            window.roomlist=data;
        }
    });
}


function SetRoomList(room_name,showlist){
    if(showlist){
        $("#showroomlist").empty();
        $("#change_room").empty();
        var senddata={};
        senddata.room_name=room_name;
        senddata=JSON.stringify(senddata);
        $.ajax({
            'type':'get',
            'url':'https://wenyizheng.cn/fastadmin/public/index.php/',
            'dataType':'json',
            'async':true,
            'data':'data='+senddata,
            success:function(data){
                $.each(window.roomlist,function(i,value){
                    if (data.room_id == value.room_id) {
                        $("#showroomlist").append("<option value='" + value.room_id + "' selected>" + value.room_name + "</option>");
                        $("#change_room").append("<option value='" + value.room_id + "' selected>" + value.room_name + "</option>");
                    } else if(data.block_id==value.block_id&&window.userinfo.sex==value.available_sex) {
                        $("#showroomlist").append("<option value='" + value.room_id + "'>" + value.room_name + "</option>");
                        $("#change_room").append("<option value='" + value.room_id + "'>" + value.room_name + "</option>");
                    }
                });
            }

        });
        $("#change_room").empty();
        $.each(window.roomlist,function(i,value){
            if ($("#change_block").find("option:selected").val() == value.block_id&&$("#change_sex").find("option:selected").val()==value.available_sex) {
                $("#change_room").append("<option value='" + value.room_id + "' selected>" + value.room_name + "</option>>");
            }
        });
    }
}
function GetCellList(room_name,setcelllist){
    var usecell;
    var senddata={};
    senddata.room_name=room_name;
    senddata=JSON.stringify(senddata);
    $.ajax({
        'type':'get',
        'url':'https://wenyizheng.cn/fastadmin/public/index.php',
        'dataType':'json',
        'async':true,
        'data':'data='+senddata,
        success:function(data){
            if(setcelllist){
                for(i=1;i<=8;i++){
                    $("#img_status_"+i).hide();
                }
                usecell=GetCellStatus(data['0'].room_id);

                for(var i=0;i<8;i++){
                    $("#img_status_"+i).attr('src',"https://shower.b0.upaiyun.com/public/chat/bath-img/yes-zero.png");
                }
                    $.each(data,function(i2,value2){
                        if(value.cell_id==value2.cell_id){
                            var site=value2.cell_name.substr(6);
                            $("#img_status_"+site).attr('src',"https://shower.b0.upaiyun.com/public/chat/bath-img/no-zero.png");
                        }
                    });
                });
                $.each(data,function(i,value){
                    site=value.cell_name.substr(6);
                    $("#img_status_"+site).attr('cell_id',value.cell_id);
                    $("#img_status_"+site).show();
                });

            }else{
                return data;
            }
        }
    });
}

function GetCellStatus(room_id,setroomstatus){
    var senddata={};
    senddata.room_id=room_id;
    senddata=JSON.stringify(senddata);
    var usecell='';
    $.ajax({
        'type':'get',
        'url':'https://wenyizheng.cn/fastadmin/public/index.php/chatapi/room_info/roomlistcheck',
        'dataType':'json',
        'async':false,
        'data':'data='+senddata,
        success:function(data){
            usecell=data;
        }
    });
    return usecell;
}

function SetCellInfo(cell_id,day){
    var senddata={};
    senddata.cell_id=cell_id;
    senddata=JSON.stringify(senddata);
    var begin_time;
    var end_time;
    var begin_time_minute;
    var perce;

    $("#bath-slip").children().remove();
    $.ajax({
        'type':'post',
        'url':'https://wenyizheng.cn/fastadmin/public',
        'dataType':'json',
        'async':true,
        'data':'data='+senddata,
        success:function(data){
            $.each(data,function(i,value){
                begin_time=String(value.begin_time);
                end_time=String(value.end_time);
                if(day==begin_time.substr(4,2)) {
                    begin_time = begin_time.substr(6, 2) + ':' + begin_time.substr(8, 2);
                    end_time = end_time.substr(6, 2) + ':' + end_time.substr(8, 2);
                    begin_time_minute = Number(60 * (String(value.begin_time).substr(6, 2))) + Number((String(value.begin_time).substr(8, 2)));
                    perce = 100 * parseFloat(begin_time_minute / (24 * 60));
                    if ((i / 2) == parseInt(i / 2)) {
                        $("#bath-slip").append("<div class='append-time' style='right:2.5%;top:" + perce + "%;'>—" + begin_time + "--" + end_time + "</div>");
                    } else {
                        $("#bath-slip").append("<div class='append-time' style='left:3%; top:" + perce + "%;'>" + begin_time + "--" + end_time + "—</div>");
                    }
                }
            });
        }
    });
}

function SetUserInfo(change){

    if(change){
        $.ajax({
            'type':'get',
            'url':'https://wenyizheng.cn/fastadmin/public/index.php',
            'dataType':'json',
            'async':false,
            'data':'data={\"openid\":\"'+window.wechatinfo.id+'\"}',
            success:function(data){
                window.userinfo=data;
            }
        });
    }
    //侧滑栏名称
    $("#left_name").text(window.userinfo.nickname);

    //信息查看页
    $("#show_nickname").text(window.userinfo.nickname);
    if(window.userinfo.sex=='1') {
        $("#show_sex").text('男');
    }else{
        $("#show_sex").text('女');
    }
    $("#show_position").text(window.userinfo.province+window.userinfo.city+window.userinfo.country);
    $("#show_block").text(window.userinfo.block_name);
    $("#show_room").text(window.userinfo.room_name);
    $("#show_tel").text(window.userinfo.tel);

    $("#left-headimg").attr('src',window.userinfo.headimgurl);
    $("#head-img").attr('src',window.userinfo.headimgurl);
    $("#head-img2").attr('src',window.userinfo.headimgurl);

    $("#change_nickname").val(window.userinfo.nickname);
    $("#change_sex").find("value:"+window.userinfo.sex).attr('selected');
    $("#change_tel").text(window.userinfo.tel);
}
function SetBlockList(){
    $.ajax({
        'type':'get',
        'url':'https://wenyizheng.cn/fastadmin/public/index.php/chatapi/room_info/blocklist',
        'dataType':'json',
        'async':true,
        success:function(data){
            window.blocklist=data;

            $("#change_block").empty();
            $.each(data,function(i,value){
                if(value.block_name==window.userinfo.block_name){
                    $("#change_block").append("<option value='"+value.block_id+"' selected>"+value.block_name+"</option>");
                }else{
                    $("#change_block").append("<option value='"+value.block_id+"'>"+value.block_name+"</option>");
                }
            });
        }
    });
}

function ChangeUserInfo(){
    var senddata={};
    senddata.openid=window.userinfo.openid;
    senddata.nickname=$("#change_nickname").val();
    senddata.sex=$("#change_sex").find("option:selected").val();
    senddata.room_name=$("#change_room").find("option:selected").text();
    senddata.block_name=$("#change_block").find("option:selected").text();
    senddata=JSON.stringify(senddata);

    $.ajax({
        'type':'post',
        'url':'https://wenyizheng.cn/fastadmin/public/index.php/chatapi/user_info/userchange',
        'dataType':'json',
        'async':true,
        'data':'data='+senddata,
        success:function(data){
            $.ajax({
                'type':'get',
                'url':'https://wenyizheng.cn/fastadmin/public/index.php/chatapi/user_info/userobtain',
                'dataType':'json',
                'async':false,
                'data':'data={\"openid\":\"'+window.wechatinfo.id+'\"}',
                success:function(data){
                    window.userinfo=data;
                    SetRoomList(window.userinfo.room_name,true);
                    SetUserInfo();
                    GetCellList(window.userinfo.room_name,true);
                }
            });

        }

    });
}

function ChangeUserTel(){
    var senddata={};
    senddata.openid=window.userinfo.openid;
    senddata.tel=$("#change_tel2").val();
    senddata.validate=$("#change_verify").val();
    senddata=JSON.stringify(senddata);

    $.ajax({
        'type':'post',
        'url':'https://wenyizheng.cn/fastadmin/public/index.php/chatapi',
        'dataType':'json',
        'async':true,
        'data':'data='+senddata,
        success:function(data){
            if(data.res=='1'){

                layer.open({
                    content: '手机号修改成功！'
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                });
                $(".telephone-change").hide();
                $(".message-revise").show();
            }else{
                layer.open({
                    content: '手机号修改失败！'
                    ,skin: 'msg'
                    ,time: 2
                });
            }

        }
    });
}

function GetTelCode(tel){

    var senddata={};
    senddata.tel=tel;
    senddata=JSON.stringify(senddata);

    $.ajax({
        'type':'get',
        'url':'https://wenyizheng.cn/fastadmin/public/index.php/',
        'dataType':'json',
        'async':true,
        'data':'data='+senddata,
        success:function(data){
            if(data.res=='1'){
                layer.open({
                    content: '已发送手机验证码！'
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                });
            }else{

                layer.open({
                    content: '验证码发送失败！'
                    ,skin: 'msg'
                    ,time: 2
            }
        }
    });
}

function ChangeUserPwd(){
    var senddata={};
    senddata.oldpassword=$("#oldpwd").val();
    senddata.password1=$("#newpwd1").val();
    senddata.password2=$("#newpwd2").val();
    senddata=JSON.stringify(senddata);

    $.ajax({
        'type':'post',
        'url':'https://wenyizheng.cn/fastadmin/public/index.php',
        'dataType':'json',
        'async':true,
        'data':'data='+senddata,
        success:function(data){
            if(data.res=='1'){
                layer.open({
                    content: '密码修改成功！'
                    ,skin: 'msg'
                    ,time: 2
                });

                $('#oldpwd').val('');
                $('#newpwd1').val('');
                $('#newpwd2').val('');

                $(".password-change").hide();
                $(".message-revise").show();
            }else{
                layer.open({
                    content: '密码修改失败！'
                    ,skin: 'msg'
                    ,time: 2 /
                });
            }

        }
    });
}

function SetPromiseList(){
    var senddata={};
    senddata.user_id=window.userinfo.user_id;
    senddata=JSON.stringify(senddata);

    var use;
    var unuse;

    var indent='';
    var begin_time;
    var end_time;
    $.ajax({
        'type':'post',
        'url':'https://wenyizheng.cn/fastadmin/public/index.php/',
        'dataType':'json',
        'async':false,
        'data':'data='+senddata,
        success:function(data){
            use = data.use;
            unuse = data.unuse;


        }
    });
}

function SendProblemInfo(){
    var problemtype;
    for(var i=0;i<9;i++){
        if($("#opinionop" + i).prop("checked")){
            problemtype=$("#opinionop"+i).val();
        }
    }
    var senddata={};
    senddata.type=problemtype;
    senddata.desc=$("#problemtext").val();
    senddata.user_id=window.userinfo.user_id;
    senddata.order_id=$("#sub").attr('order_id');
    senddata.cell_id=$("#sub").attr('cell_id');
    senddata=JSON.stringify(senddata);

    $.ajax({
        'type':'post',
        'url':'https://wenyizheng.cn/fastadmin/public/index.php/chatapi/',
        'dataType':'json',
        'async':true,
        'data':'data='+senddata,
        success:function(data){
            if(data.res=='1'){
                layer.open({
                    content: '意见反馈成功!'
                    ,skin: 'msg'
                    ,time: 2

                $('#feedback').hide();
                $(".indent").show();
            }else{
;
                layer.open({
                    content: '意见反馈失败!'
                    ,skin: 'msg'
                    ,time: 2
                });
            }

        }
    });
}


function SetProblemList(){

    var clo1;
    var clo2;
    $.ajax({
        'type':'get',
        'url':'https://wenyizheng.cn/fastadmin/public/index.php/chatapi/problem_in',
        'dataType':'json',
        'async':true,

    });
}


function SetCouponList() {
    var senddata = {};
    senddata.user_id = window.userinfo.user_id;
    senddata = JSON.stringify(senddata);
    var clo;
    var expire_time;


                clo.attr("id",'couponlist');
                $("#coupons-container").append(clo);
            });
        }
    });
}

function ExchangeCoupon(user_id,scene_id){
    var senddata={};
    senddata.user_id=user_id;
    senddata.scene_id=scene_id;
    senddata=JSON.stringify(senddata);

    $.ajax({
        'type':'post',
        'url':'https://wenyizheng.cn/fastadmin/public/index.php/',
        'dataType':'json',
        'data':'data='+senddata,
        'async':true,
        success:function(data){
            if(data.res=='1'){
                //alert('意见反馈成功！');
                layer.open({
                    content: '兑换优惠券成功!'
                    ,skin: 'msg'
                    ,time: 2
                });
                GetCouponList();
                SetCouponList();
                SetIntegral(true);
                $('#feedback').hide();
                $(".indent").show();
            }else{
                layer.open({
                    content: '兑换优惠券失败!'
                    ,skin: 'msg'
                    ,time: 2
                });
            }
        }
    });
}

function FilterCell(){
    var date=new Date();
    var year=String(date.getYear()).substr(1);
    var month;
    var day;

    var celllist;
    var confliccell;

    if($("#day_select").val()=='0'){
        day=date.getDate();
        month=parseInt(date.getMonth())+1;
    }else{
        day=parseInt(date.getDate())+1;
        month=parseInt(date.getMonth())+1;
        if(day>maxday){
            day=1;
            month=parseInt(date.getMonth())+2;
        }
    }
    if(day<10){
        day='0'+day;
    }
    if(month<10){
        month='0'+month;
    }

    var senddata={};

    $.ajax({
        'type':'post',
        'url':'https://wenyizheng.cn/fastadmin/public/index.php',
        'dataType':'json',
        'async':false,
        'data':'data='+senddata,
        success:function(data){
            confliccell=data;
        }
    });

    var senddata2={};
    senddata2.room_name=$("#showroomlist").find("option:selected").text();
    $.ajax({
        'type':'get',
        'url':'https://wenyizheng.cn/fastadmin/public/index.php/',
        'dataType':'json',
        'async':false,
        'data':'data='+senddata,
        success:function(data) {
        }
    });

    $.each(confliccell,function(i,value){
        $.each(celllist,function(i2,value2){
            if(value.cell_id!=value2.cell_id){
                var site=value2.cell_name.substr(6);
                $("#img_status_"+site).attr('src',"https://wenyizheng.cn/fastadmin/public/chat/
                setTimeout(function(){
                    var room_name=$("#showroomlist").find("option:selected").text();
                    GetCellList(room_name,true);},3000);
            }
        });
    });

    if(JSON.stringify(confliccell)=='[]'){

        $.each(celllist,function(i2,value2){

                var site=value2.cell_name.substr(6);
                $("#img_status_"+site).attr('src',"https://wenyizheng.cn/fastadmin/public/
                setTimeout(function(){
                    var room_name=$("#showroomlist").find("option:selected").text();
                    GetCellList(room_name,true);},3000);

        });
    }
}


function SetIntegral(change){

    if(change) {

        $.ajax({
            'type': 'get',
            'url': 'https://wenyizheng.cn/fastadmin/public/index.php/cha',
            'dataType': 'json',
            'async': false,
            'data': 'data={\"openid\":\"' + window.wechatinfo.id + '\"}',
            success: function (data) {
                window.userinfo = data;
            }
        });
    }
    $("#user-integral").text(window.userinfo.integral);
}

function GetCouponList(){
    $.ajax({
        'type':'get',
        'url':'https://wenyizheng.cn/fastadmin/public/index.php/chatapi/u',
        'dataType':'json',
        'async':true,

                }
            });
        }

    });
}

function ForgetPwd(){
    var senddata={};
    senddata.tel=$("#forget-tel").val();
    senddata=JSON.stringify(senddata);

    $.ajax({
        'type':'post',
        'url':'https://wenyizheng.cn/fastadmin/public/index',
        'dataType':'json',
        'data':'data='+senddata,
        'async':true,
        success:function(data) {
            if (data.res == '1') {
                layer.open({
                    content: '密码重置成功!'
                    , skin: 'msg'
                    , time: 2 //2秒后自动关闭
                });

                $(".password-forget").hide();
                $(".message-revise").show();
            } else {
                layer.open({
                    content: '密码重置失败!'
                    , skin: 'msg'
                    , time: 2
                });
            }
        }
    });
}

function SendPromiseCancel(promise_id){
    var senddata={};
    senddata.user_id=window.userinfo.user_id;
    senddata.promise_id=promise_id;
    senddata=JSON.stringify(senddata);

    $.ajax({
        'type':'get',
        'url':'https://wenyizheng.cn/fastadmin/public/index.php/chatapi/room_info/promisecancel',
        'dataType':'json',
        'async':true,
        'data':'data='+senddata,
        success:function(data){
            if(data.res=='1'){
                layer.open({
                    content: '取消订单成功!'
                    ,skin: 'msg'
                    ,time: 2
                });
            }else{
                layer.open({
                    content: '取消订单失败!'
                    ,skin: 'msg'
                    ,time: 2
                });
            }
        }
    });

}

function SendPromiseInfo(){
    var date=new Date();
    var year=String(date.getYear()).substr(1);
    var month;
    var day;

    if($("#day_select").val()=='0'){
        day=date.getDate();
        month=parseInt(date.getMonth())+1;
    }else{
        day=parseInt(date.getDate())+1;
        month=parseInt(date.getMonth())+1;
        if(day>maxday){
            day=1;
            month=parseInt(date.getMonth())+2;
        }
    }
    if(day<10){
        day='0'+day;
    }
    if(month<10){
        month='0'+month;
    }

    var senddata={};
    senddata.cell_id=$(".datetime").attr('cell_id');
    senddata=JSON.stringify(senddata);

    $.ajax({
        'type':'post',
        'url':'https://wenyizheng.cn/fastadmin/public/index.php/chatapi',
        'dataType':'json',
        'async':true,
        'data':'data='+senddata,
        success:function(data){
            console.log(data);
            if(data.res=='1'){
                //alert("预约成功！");
                layer.open({
                    content: '预约成功!'
                    ,skin: 'msg'
                    ,time: 2
                });
            }else{
                //alert("预约失败！");
                layer.open({
                    content: '预约失败!'
                    ,skin: 'msg'
                    ,time: 2
                });
            }
        }
    });
}

function SetMoneyInfo(){
    var senddata={};
    senddata.user_id=window.userinfo.user_id;
    senddata=JSON.stringify(senddata);

    $.ajax({
        'type':'get',
        'url':'https://wenyizheng.cn/fastadmin/public/index.phpmoneyget',
        'dataType':'json',
        'async':true,
        'data':'data='+senddata,
        success:function(data){
        }
    });
}
