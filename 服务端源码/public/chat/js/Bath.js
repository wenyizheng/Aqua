
//除主页外其他页面初始隐藏
$(document).ready(function () {
    $(".message-revise").hide();
    $(".message-column").hide();
    $('.telephone-change').hide();
    $('.password-change').hide();
    $('.password-forget').hide();
    $('.bath-info').hide();
    $('.notice').hide();
    $('.amount').hide();
    $('.indent').hide();
    $('.faq').hide();
    $('.coupons').hide();
    $('.getcoupons').hide();
    $('.feedback').hide();
    $('.recharge').hide();
    $('.OkLogin').hide();
    $('.error').hide();
});
//左侧菜单的隐藏方法
function leftmenuhide() {
    $('.left-menu').animate({left: "-100%"});
    $('.main-div').css({
        "-webkit-filter": "blur(0px)",
        "-moz-filter": "blur(0px)",
        "-ms-filter": "blur(0px)",
        "filter": "blur(0px)"
    });
}
//主页隐藏显示方法
function mainhide() {
    $('.main-div').hide();
}
function mainshow() {
    $('.main-div').show();
}
var color;
//主页菜单点击效果
function menucolor() {
    if(color==0){
        $(".menu1").css("color","black");
        $(".menu2").css("color","black");
        $(".menu3").css("color","black");
        $(".menu4").css("color","black");
        $(".menu5").css("color","black");
        $(".main-menu1").attr("src","/fastadmin/public/chat/bath-img/menu1.png");
        $(".main-menu2").attr("src","/fastadmin/public/chat/bath-img/menu2.png");
        $(".main-menu3").attr("src","/fastadmin/public/chat/bath-img/menu3.png");
        $(".main-menu4").attr("src","/fastadmin/public/chat/bath-img/menu4.png");
        $(".main-menu5").attr("src","/fastadmin/public/chat/bath-img/menu5.png");
    }else if(color==1){
        $(".menu1").css("color","#4d90c8");
        $(".menu2").css("color","black");
        $(".menu3").css("color","black");
        $(".menu4").css("color","black");
        $(".menu5").css("color","black");
        $(".main-menu1").attr("src","/fastadmin/public/chat/bath-img/menua.png");
        $(".main-menu2").attr("src","/fastadmin/public/chat/bath-img/menu2.png");
        $(".main-menu3").attr("src","/fastadmin/public/chat/bath-img/menu3.png");
        $(".main-menu4").attr("src","/fastadmin/public/chat/bath-img/menu4.png");
        $(".main-menu5").attr("src","/fastadmin/public/chat/bath-img/menu5.png");
    }else if(color==2){
        $(".menu2").css("color","#4d90c8");
        $(".menu1").css("color","black");
        $(".menu3").css("color","black");
        $(".menu4").css("color","black");
        $(".menu5").css("color","black");
        $(".main-menu1").attr("src","/fastadmin/public/chat/bath-img/menu1.png");
        $(".main-menu2").attr("src","/fastadmin/public/chat/bath-img/menub.png");
        $(".main-menu3").attr("src","/fastadmin/public/chat/bath-img/menu3.png");
        $(".main-menu4").attr("src","/fastadmin/public/chat/bath-img/menu4.png");
        $(".main-menu5").attr("src","/fastadmin/public/chat/bath-img/menu5.png");
    }else if(color==3){
        $(".menu3").css("color","#4d90c8");
        $(".menu1").css("color","black");
        $(".menu2").css("color","black");
        $(".menu4").css("color","black");
        $(".menu5").css("color","black");
        $(".main-menu1").attr("src","/fastadmin/public/chat/bath-img/menu1.png");
        $(".main-menu2").attr("src","/fastadmin/public/chat/bath-img/menu2.png");
        $(".main-menu3").attr("src","/fastadmin/public/chat/bath-img/menuc.png");
        $(".main-menu4").attr("src","/fastadmin/public/chat/bath-img/menu4.png");
        $(".main-menu5").attr("src","/fastadmin/public/chat/bath-img/menu5.png");
    }else if(color==4){
        $(".menu4").css("color","#4d90c8");
        $(".menu1").css("color","black");
        $(".menu2").css("color","black");
        $(".menu3").css("color","black");
        $(".menu5").css("color","black");
        $(".main-menu1").attr("src","/fastadmin/public/chat/bath-img/menu1.png");
        $(".main-menu2").attr("src","/fastadmin/public/chat/bath-img/menu2.png");
        $(".main-menu3").attr("src","/fastadmin/public/chat/bath-img/menu3.png");
        $(".main-menu4").attr("src","/fastadmin/public/chat/bath-img/menud.png");
        $(".main-menu5").attr("src","/fastadmin/public/chat/bath-img/menu5.png");
    }else if(color==5){
        $(".menu5").css("color","#4d90c8");
        $(".menu1").css("color","black");
        $(".menu2").css("color","black");
        $(".menu3").css("color","black");
        $(".menu4").css("color","black");
        $(".main-menu1").attr("src","/fastadmin/public/chat/bath-img/menu1.png");
        $(".main-menu2").attr("src","/fastadmin/public/chat/bath-img/menu2.png");
        $(".main-menu3").attr("src","/fastadmin/public/chat/bath-img/menu3.png");
        $(".main-menu4").attr("src","/fastadmin/public/chat/bath-img/menu4.png");
        $(".main-menu5").attr("src","/fastadmin/public/chat/bath-img/menue.png");
    }else{}
}

$(document).ready(function () {
  color=0;
  menucolor();
  console.log(color);
});
//离开和进入左侧菜单
$(document).ready(function () {
    $("#left-menubutton").click(function () {
        $('.left-menu').animate({left: "0%"});
        $('.main-div').css({
            "-webkit-filter": "blur(4px)",
            "-moz-filter": "blur(4px)",
            "-ms-filter": "blur(4px)",
            "filter": "blur(4px)"
        });
    });
});
$(document).ready(function () {
    $("#left-shelter").click(function () {
        $('.left-menu').animate({left: "-100%"});
        $('.main-div').css({
            "-webkit-filter": "blur(0px)",
            "-moz-filter": "blur(0px)",
            "-ms-filter": "blur(0px)",
            "filter": "blur(0px)"
        });
    });
});
//离开和进入个人资料显示页
$(document).ready(function () {
    $(".menu1").click(function () {
        $(".message-column").show();
        mainhide();
        $('.amount').hide();
        $('.indent').hide();
        $('.faq').hide();
        $('.coupons').hide();
        $('.getcoupons').hide();
        color=1;
        menucolor();
    });
    $("#column-mturn").click(function () {
        $(".message-column").hide();
        mainshow();
        color=0;
        console.log(color);
        $(".menu1").css("background-color","transparent");
        menucolor();
    });
});
//离开和进入个人资料编辑页
$(document).ready(function () {
    $("#column-editor").click(function () {
        $(".message-revise").show();
        $(".message-column").hide();
       /* $.get('http://wenyizheng.cn/fastadmin/public/index.php/chatapi/user_info/userchat', function (result) {
            var id = JSON.parse(result).id;
            var data = 'data=' + JSON.stringify({"openid": id});
            getUserInfo2(data)
        });*/
        $("#message-revise-ok").click(function () {
            $(".message-revise").hide();
            $(".message-column").show();
        });
        $("#column-mturn2").click(function () {
            $(".message-revise").hide();
            $(".message-column").show();
        });
    });
});
function getUserInfo2(data) {
    $.get('http://wenyizheng.cn/fastadmin/public/index.php/chatapi/user_info/userobtain' + data,
        function (user_info) {
            var data = JSON.parse(user_info);
            // console.log(data);
            $('#change_nickname').html("<input  type='text'  value=" + data.nickname + " class='Inpt' placeholder='请输入昵称'/>");
            var sex = data.sex;
            if (sex == '1') {
                $('#change_sex').html("<option value='0' selected>男</option>");
            }
            else {
                $('#change_sex').html("<option value='1' selected>女</option>");
            }
            $('change_province').html("<option value=" + data.province + " selected>" + data.province + "</option>");
            //<option value="+data.province+" selected>"+data.province+"</option>
            $('change_city').html("<option value=" + data.city + " selected>" + data.city + "</option>");
            $('change_country').html("<option value=" + data.country + " selected>" + data.country + "</option>");
            $('change_blcok').html("<option value=" + data.block_name + " selected>" + data.blcok_name + "</option>");
            $('change_room_name').html("<option value=" + data.room_name + " selected>" + data.room_name + "</option>");
            $('change_tel').text(data.tel);
        })
}
//离开和进入手机号码更换页
$(document).ready(function () {
    $("#changeid-in").click(function () {
        $(".telephone-change").show();
        $(".message-revise").hide();
    });
    $("#telechange-turnback").click(function () {
        $(".telephone-change").hide();
        $(".message-revise").show();
    });
    $("#telechange-over").click(function () {
        $(".telephone-change").hide();
        $(".message-revise").show();
    });
});
//离开和进入支付密码更换页
$(document).ready(function () {
    $("#changepassword-in").click(function () {
        $(".password-change").show();
        $(".message-revise").hide();
    });
    $("#passwordchange-turnback").click(function () {
        $(".password-change").hide();
        $(".message-revise").show();
    });
    $("#passwordchange-over").click(function () {
        $(".password-change").hide();
        $(".message-revise").show();
    });
});
//离开和进入忘记密码页
$(document).ready(function () {
    $("#forget").click(function () {
        $(".password-forget").show();
        $(".password-change").hide();
    });
    $("#passwordforget-turnback").click(function () {
        $(".password-forget").hide();
        $(".password-change").show();
    });
});
//离开和进入浴头详细信息页
$(document).ready(function () {
    $(".bath-img").click(function () {
        //点击则修改其属性为1
        //$(".bath-img").attr('prs-click','1');

         $(".bath-info").show();
        mainhide();
    });
    $("#bathinfo-back").click(function () {
        $(".bath-info").hide();
        mainshow();
    });
    // $("#bathinfo-over").click(function () {
    //     $(".bath-info").hide();
    //     mainshow();
    // });
});
//进入和离开“金额”页面
$(document).ready(function () {
    $(".menu2").click(function () {
        $("#amount").show();
        mainhide();
        amount();
        $(".message-column").hide();
        $('.indent').hide();
        $('.faq').hide();
        $('.coupons').hide();
        $('.getcoupons').hide();
        color=2;
        menucolor();
    });
    $("#amount-turn").click(function () {
        $('.amount').hide();
        mainshow();
        color=0;
        menucolor();
    });
});
//金额获取
function amount() {
    var amount;
}
//进入和离开“充值”页面
$(document).ready(function () {
    $("#in-recharge").click(function () {
        $("#recharge").show();
        $('#amount').hide();
    });
    $("#recharge-turn").click(function () {
        $('#recharge').hide();
        $('#amount').show();
    });
});
//充值页页面效果
function colorchange(i) {
    $("#sum"+i).click(function () {
        for(var t=1;t<9;t++){
            $("#sum"+t).css("border-color","#7c7cf2");
            $("#sum"+t).css("color","#7c7cf2");
            $("#sum"+t).css("background-color","transparent");
            $("#sum"+t).attr('chargeclick','0');
        }
        $("#sum"+i).css("border-color","#fb5503");
        $("#sum"+i).css("color","#fb5503");
        $("#sum"+i).css("background-color","#fff0e9");
        $("#sum"+i).attr("chargeclick",'1');
    });
    $(".recharge-input").click(function () {
        for(var t=1;t<9;t++){
            $("#sum"+t).css("border-color","#7c7cf2");
            $("#sum"+t).css("color","#7c7cf2");
            $("#sum"+t).css("background-color","transparent");
            $("#sum"+t).attr("chargeclick",'0');
        }
    });
}
$(document).ready(function () {
    for(var t=1;t<9;t++){
        colorchange(t);
    }
});
//进入和离开“查看订单”页面
$(document).ready(function () {
    $(".menu5").click(function () {
        $("#indent").show();
        mainhide();
        $("#amount").hide();
        $(".message-column").hide();
        $('.faq').hide();
        $('.coupons').hide();
        $('.getcoupons').hide();
        color=5;
        menucolor();
        //$('#demo-div').hide();
    });
    $("#indent-turn").click(function () {
        $('#indent').hide();
        mainshow();
        color=0;
        menucolor();
    });

    //进入和离开“意见反馈”页面
    $("#operate_feedback").click(function (e) {
        // console.log(window.subCellid);
        $("#sub").attr('order_id',($(e.target).attr('order_id')));
        $("#sub").attr('cell_id',($(e.target).attr('cell_id')));
        $("#feedback").show();
        $(".indent").hide();
        feedback();
    });
    $("#feedback-turn").click(function () {
        $('#feedback').hide();
        $(".indent").show();
    });
//意见反馈页面内容添加方法
    function feedback() {
        var option=[];
        var text=[];text[0]="卫生问题";text[1]="浴头问题";text[2]="水温问题";text[3]="管理问题";text[4]="预约问题";text[5]="钱款问题";
        for (var i = 0; i < 6; i++) {
            option[i] = document.getElementById("feedback-demo").cloneNode(true);
            option[i].id = "newoption" + i;
            document.getElementById("option").appendChild(option[i]);
            document.getElementById("newoption" + i).children[0].children[0].innerHTML="<input value='"+text[i]+"' name='0' type='radio' id='opinionop"+i+"' >"+text[i];
        }
        $('#feedback-demo').hide();
    }
});
//查看订单页信息获取添加
function indent() {
    var indent = [];
    var bathroom = [];
    var period = [];
    var date = [];
    var use_status = [];
    var begin_time = [];
    var end_time = [];
    var userNum;
    window.OrderId = [];
    OrderShow();


    $("#indent").find("#promise").parent().parent().remove();
    $("#indent").find("[orderid]").parent().parent().remove();


    function OrderShow(){
            /*$.get('http://wenyizheng.cn/fastadmin/public/index.php/chatapi/user_info/userchat', function (result) {
                var id = JSON.parse(result).id;
                getUserId(id)
            });
            function getUserId(id) {
                $.get("http://wenyizheng.cn/fastadmin/public/index.php/chatapi/user_info/userobtain?data={\"openid\":\"" + id + "\"}",
                    function (result) {
                        var user = JSON.parse(result);
                        var user_id = user.user_id;
                        getOrderInfo(String(user_id));
                    })
            }*/
            /*function getOrderInfo(user_id) {
                var userid = {
                    "user_id": user_id
                };
                $.post("http://wenyizheng.cn/fastadmin/public/index.php/chatapi/room_info/orderlist","data=" + JSON.stringify(userid),
                    function (result) {
                        console.log(result);
                        var orderInfo = JSON.parse(result);
                        console.log(orderInfo);
                        var use = orderInfo.use;
                        var unuse = orderInfo.unuse;
                        console.log(unuse);
                        console.log(use.room_name);
                        unuseNum = unuse.length;
                        useNum = use.length;
                        //添加未使用的
                        for(i=0;i<unuseNum;i++) {
                            window.OrderId.push(unuse[i].promise_id);
                            indent[i] = document.getElementById("demo-div").cloneNode(true);
                            indent[i].id = "newindent" + i;
                            $("#newindent" + i).css("display", "inline");
                            document.getElementById("indent").appendChild(indent[i]);
                            indent[i].style.display = "block";
                            // console.log(orderInfo.length);
                            bathroom.push(unuse[i].room_name);
                            begin_time.push(String(unuse[i].begin_time));
                            end_time.push(String(unuse[i].end_time));
                            // date.push(orderInfo[i].begin_time);
                            //use_status.push(orderInfo[i].status);   判断状态的
                            room = bathroom[i].split('-');
                            document.getElementById("newindent" + i).children[0].children[0].innerHTML = room[0] + '号楼' + room[1] + '层' + room[2] + '号';
                            document.getElementById("newindent" + i).children[1].children[0].innerHTML = '20' + begin_time[i].substring(0, 2) + '-' +
                                begin_time[i].substring(2, 4) + '-' + begin_time[i].substring(4, 6) + '  ' + begin_time[i].substring(6, 8) + ':' + begin_time[i].substring(8, 10)
                                + '~' + end_time[i].substring(6, 8) + ':' + end_time[i].substring(8, 10);
                            document.getElementById("newindent" + i).children[2].children[0].innerHTML = "未使用";
                            document.getElementById("newindent" + i).children[2].children[2].innerHTML = "取消订单";
                            document.getElementById("newindent" + i).children[2].children[2].setAttribute("promise", unuse[i].promise_id);
                            document.getElementById("newindent" + i).children[2].children[2].setAttribute("id", "promise");
                        }
                            //添加已使用的
                        var room = [];
                            for(i=0;i<useNum;i++) {
                                indent[i+unuseNum] = document.getElementById("demo-div").cloneNode(true);
                                indent[i+unuseNum].id = "newindent" + i+unuseNum;
                                $("#newindent" + i+unuseNum).css("display", "inline");
                                document.getElementById("indent").appendChild(indent[i+unuseNum]);
                                indent[i+unuseNum].style.display = "block";
                                // console.log(orderInfo.length);
                                room.push(use[i].room_name);
                                begin_time.push(String(use[i].begin_time));
                                end_time.push(String(use[i].end_time));
                                // date.push(orderInfo[i].begin_time);
                                //use_status.push(orderInfo[i].status);   判断状态的
                                roomName = room[i].split('-');
                                document.getElementById("newindent" + i+unuseNum).children[0].children[0].innerHTML = roomName[0] + '号楼' + roomName[1] + '层' + roomName[2] + '号';
                                document.getElementById("newindent" + i+unuseNum).children[1].children[0].innerHTML = '20' + begin_time[i].substring(0, 2) + '-' +
                                    begin_time[i].substring(2, 4) + '-' + begin_time[i].substring(4, 6) + '  ' + begin_time[i].substring(6, 8) + ':' + begin_time[i].substring(8, 10)
                                    + '~' + end_time[i].substring(6, 8) + ':' + end_time[i].substring(8, 10);
                                document.getElementById("newindent" + i+unuseNum).children[2].children[0].innerHTML = "已使用";
                                document.getElementById("newindent" + i+unuseNum).children[2].children[2].innerHTML = "意见反馈";
                                document.getElementById("newindent" + i+unuseNum).children[2].children[2].id = "feedback" + i+unuseNum;
                                document.getElementById("newindent" + i+unuseNum).children[2].children[2].setAttribute("cellid", use[i].cell_id);
                                document.getElementById("newindent" + i+unuseNum).children[2].children[2].setAttribute("orderid", use[i].order_id);




                        }
                    })
            }*/

    }
}

//进入和离开“常见问题”页面
$(document).ready(function () {
    $(".menu4").click(function () {
        $("#faq").show();
        mainhide();
        $("#amount").hide();
        $(".message-column").hide();
        $('.indent').hide();
        $('.coupons').hide();
        $('.getcoupons').hide();
        color=4;
        menucolor();
        //faq();
        //$('#faq-demo').hide();
        //$('#notice2-demo').hide();
    });
    $("#faq-turn").click(function () {
        $('#faq').hide();
        mainshow();
        color=0;
        menucolor();
    });
});
//常见问题页信息获取添加
// function faq() {
//     var faqtitle = new Array();
//     faqtitle[0] = "澡堂卫生问题";
//     faqtitle[1] = "澡堂热水供应问题";
//     var faqtitlediv = new Array();
//     var faq2 = new Array();
//     var faqcontent=[];
//     faqcontent[0]="浴室管理人员要随时检查水管、通风、淋浴器、冷热水阀等供水设施是否完好，人员洗浴时电源是否切断，如有问题应及时报告、及时解决，避免危险事故的发生。浴室管理人员应每天检查浴室的线路及照明灯的使用情况，发现灯熄、电线裸露、供电设施损坏的情况及时报告、维修。没有消除安全隐患前不得开放浴室，坚决杜绝漏电伤人事故的发生。以上制度希望各位员工认真学习，执行并做到，互相监督，真正成为一名有素质有道德的猎风公司员工。";
//     faqcontent[1]="浴室管理人员应每天检查浴室的线路及照明灯的使用情况，发现灯熄、电线裸露、供电设施损坏的情况及时报告、维修。没有消除安全隐患前不得开放浴室，坚决杜绝漏电伤人事故的发生。以上制度希望各位员工认真学习，执行并做到，互相监督，真正成为一名有素质有道德的猎风公司员工。";
//     for (var i = 0; i < 2; i++) {
//         faqtitlediv[i] = document.getElementById("faq-demo").cloneNode(true);
//         faqtitlediv[i].id = "newfaqtitle" + i;
//         document.getElementById("faq").appendChild(faqtitlediv[i]);
//         document.getElementById("newfaqtitle" + i).children[0].children[0].innerHTML = faqtitle[i];
//         faq2[i] = document.getElementById("notice2-demo").cloneNode(true);
//         faq2[i].id = "faq2" + i;
//         document.getElementById("big-div").appendChild(faq2[i]);
//         document.getElementById("faq2" + i).children[0].children[0].children[0].children[0].id = "faq2-turn" + i;
//         document.getElementById("faq2" + i).children[0].children[1].children[0].innerHTML = faqcontent[i];
//         $("#faq2" + i).hide();
//     }
//     //进入和离开常见问题内容页
//     function b(i){
//         $("#newfaqtitle" + i).click(
//             function (){
//                 $('.faq').hide();
//                 $("#faq2" + i).show();
//             });
//         $("#faq2-turn" + i).click(
//             function (){
//                 $("#faq2" + i).hide();
//                 $(".faq").show();
//             });
//     }
//     for(var k=0;k<10;k++){
//         b(k);
//     }
// }



//进入和离开“优惠劵”页面
$(document).ready(function () {
    $(".menu3").click(function () {
        $('.coupons').show();
        mainhide();
        $('#coupons-demo').hide();
        $("#amount").hide();
        $(".message-column").hide();
        $('.indent').hide();
        $('.faq').hide();
        $('.getcoupons').hide();
        color=3;
        menucolor();
    });
});
$(document).ready(function () {
    $("#coupons-turn").click(function () {
        $('.coupons').hide();
        mainshow();
        color=0;
        menucolor();
    });
});
//进入和离开“获取优惠劵”页面
$(document).ready(function () {
    $("#getcoupons-img2").css("color","red");
    $("#getcoupons-img").click(function () {
        $('.getcoupons').show();
        $('.coupons').hide();
        $("#getcoupons-turn2").css("color","red");
        color=3;
        menucolor();
    });
});
$(document).ready(function () {
    $("#getcoupons-turn").click(function () {
        $('.coupons').show();
        $('.getcoupons').hide();
        $("#getcoupons-img2").css("color","red");
        color=3;
        menucolor();
    });
});
$(document).ready(function () {
    $("#get-turn").click(function () {
        mainshow();
        $('.getcoupons').hide();
        color=0;
        menucolor();
    });
});
//进入和离开“通知”页面
$(document).ready(function () {
    $("#to-notice").click(function () {
        $('.notice').show();
        mainhide();
        notice();
        $('#notice-demo').hide();
        $('#notice2-demo').hide();
    });
});
$(document).ready(function () {
    $("#notice-turn").click(function () {
        $('.notice').hide();
        mainshow();
    });
});
//通知页 信息获取添加
function notice() {
    var data = new Array();
    data[0] = "2017.2.5";
    data[1] = "2017.5.10";
    var title = new Array();
    title[0] = "关于澡堂时间通知";
    title[1] = "关于澡堂设备使用方法介绍";
    var content = new Array();
    content[1] = "浴室管理人员要随时检查水管、通风、淋浴器、冷热水阀等供水设施是否完好，人员洗浴时电源是否切断，如有问题应及时报告、及时解决，避免危险事故的发生。浴室管理人员应每天检查浴室的线路及照明灯的使用情况，发现灯熄、电线裸露、供电设施损坏的情况及时报告、维修。没有消除安全隐患前不得开放浴室，坚决杜绝漏电伤人事故的发生。以上制度希望各位员工认真学习，执行并做到，互相监督，真正成为一名有素质有道德的猎风公司员工。";
    content[0] = "浴室管理人员应每天检查浴室的线路及照明灯的使用情况，发现灯熄、电线裸露、供电设施损坏的情况及时报告、维修。没有消除安全隐患前不得开放浴室，坚决杜绝漏电伤人事故的发生。以上制度希望各位员工认真学习，执行并做到，互相监督，真正成为一名有素质有道德的猎风公司员工。";
    var newtitle = new Array();
    var newcontent = new Array();
    for (i = 0; i < 2; i++) {
        newtitle[i] = document.getElementById("notice-demo").cloneNode(true);
        newtitle[i].id = "newtitle" + i;
        document.getElementById("notice").appendChild(newtitle[i]);
        document.getElementById("newtitle" + i).children[0].children[0].innerHTML = data[i];
        document.getElementById("newtitle" + i).children[1].children[0].innerHTML = title[i];
        newcontent[i] = document.getElementById("notice2-demo").cloneNode(true);
        newcontent[i].id = "newcontent" + i;
        document.getElementById("big-div").appendChild(newcontent[i]);
        document.getElementById("newcontent" + i).children[0].children[0].children[0].children[0].id = "notice2-turn" + i;
        document.getElementById("newcontent" + i).children[0].children[1].children[0].innerHTML = content[i];
        $("#newcontent" + i).hide();
        //进入和离开通知内容页
    }
    function a(i){
       $("#newtitle" + i).click(
        function (){
            $(".notice").hide();
            $("#newcontent" + i).show();
        });
       $("#notice2-turn" + i).click(
        function (){
            $("#newcontent" + i).hide();
            $(".notice").show();
        });
       }
       for(var k=0;k<10;k++){
           a(k);
       }
    }
//单间预约情况获取添加
/*var data = {
    "cell_id": 7
};*/

/*$.ajax({
    url: 'http://wenyizheng.cn/fastadmin/public/index.php/chatapi/room_info/cellobtain',
    data: 'data=' + JSON.stringify({"cell_id": "7"}),
    type: 'post',
    dataType: 'json',
    success: function (data) {
        var length = data.length;
        //console.log(data);
        //  console.log(b);
    },
    error: function () {
        //console.log("异常！");
    }
});*/

// $(document).ready(function () {
// var start1 = [];
// start1[0] = 10;
// start1[1] = 11;
// start1[2] = 15;
// start1[3] = 21;
// var start2 = [];
// start2[0] = 10;
// start2[1] = 12;
// start2[2] = 15;
// start2[3] = 30;
// var stop1 = [];
// stop1[0] = 11;
// stop1[1] = 12;
// stop1[2] = 16;
// stop1[3] = 21;
// var stop2 = [];
// stop2[0] = 30;
// stop2[1] = 20;
// stop2[2] = 12;
// stop2[3] = 59;
// var time = [];
// var a = [];
// var b = [];
// var i;
//     for (i = 0; i < 4; i++) {
//         time[i] = ((start1[i] * 60 + start2[i] - 480) / 840) * 100;
//         var m = time[i] + 2.5 + "%";
//         a[i] = document.createElement("div");
//         b[i] = document.createElement("div");
//         a[i].className = "append-time";
//         b[i].className = "append-sign";
//         b[i].style.top = m;
//         document.getElementById("bath-slip").appendChild(a[i]);
//         document.getElementById("bath-slip").appendChild(b[i]);
//         a[i].style.top = time[i] + "%";
//         if (i == 0 || i % 2 == 0) {
//             a[i].innerHTML = start1[i] + ":" + start2[i] + "～" + stop1[i] + ":" + stop2[i];
//             a[i].style.left = "0";
//         }
//         else if (i % 2 == 1) {
//             a[i].innerHTML = start1[i] + ":" + start2[i] + "～" + stop1[i] + ":" + stop2[i];
//             a[i].style.right = "-3%";
//         }
//     }
// });

//横屏自适应
$(document).ready(function () {
    window.addEventListener("onorientationchange" in window ? "orientationchange" : "resize", function() {
        if (window.orientation === 180 || window.orientation === 0) {
            $(".left-menu").css("height","100%");
        }
        if (window.orientation === 90 || window.orientation === -90 ){
            var a=$("#main-container").height();
            $(".left-menu").css("height",a);
        }
    }, false);
});
//执行完成提示框方法
//var a="完成";
//over(a);
function over(a) {
    $('.OkLogin').fadeIn(500);
    $('.OkLogin').fadeOut(1000);
    document.getElementById("point-text").innerHTML=a;
}
//表单验证错误提示方法
//var b="格式错误!";
//error(b);
function error(b) {
    $('.error').fadeIn(500);
    $('.error').fadeOut(1000);
    document.getElementById("error-text").innerHTML=b;
}



















