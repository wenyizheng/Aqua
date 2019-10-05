$(document).ready(function () {
    var option=[];
    var s;
    var text=[];text[0]="卫生问题";text[1]="浴头问题";text[2]="水温问题";text[3]="管理问题";text[4]="预约问题";text[5]="钱款问题";
    for (var i = 0; i < 6; i++) {
        option[i] = document.getElementById("feedback-demo").cloneNode(true);
        option[i].id = "newoption" + i;
        s="opinionop"+i;
        document.getElementById("option").appendChild(option[i]);
        document.getElementById("newoption" + i).children[0].children[0].innerHTML="<input value="+text[i]+" name='0' id="+s+" type='radio'>"+" "+text[i];
    }
    $('#feedback-demo').hide();
});