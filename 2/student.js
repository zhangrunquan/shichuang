//sid以get方式传值，从网址中获得参数
var sid = getQueryString("sid");
var info_user=[];
getSession();


window.onload=function (ev) {
    var a=document.getElementById('查看成绩');
    a.href='grade.php?sid='+sid;
    a=document.getElementById('xiaozuzuoye');
    a.href='mid.html?sid='+sid;
};


function getSession() {
    $.ajax({
        url: "getSessionInfo.php",
        data: {sid: sid},
        success: function (data) {
            info_user=JSON.parse(data);
            console.log(info_user);
            if(info_user['role']=='leader'){
                var a=document.getElementById('link');
                a.href='小组互评.html?sid='+sid;
                document.getElementById('互评').style.display='block';
            }

        }
    });
}
//获取get传值的方法,（利用正则表达式从链接中获取）
function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return decodeURI(r[2]);
    return null;
}
