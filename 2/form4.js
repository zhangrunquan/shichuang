var sid = getQueryString("sid");
var info_user=[];
getSession();
//获取get传值的方法,（利用正则表达式从链接中获取）
function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return decodeURI(r[2]);
    return null;
}
//求某一项的和（g1，g2...)
function sum(name) {
    var sum = 0;
    $("." + name).find("input").each(function (e) {
        if ($("." + name).find("input").eq(e).val() != '') {
            if($("." + name).find("input").eq(e).val())
            sum +=parseInt($("." + name).find("input").eq(e).val()) ;
        }
    });
    return sum;
}

//存储每个空
function setForm() {
    var str = '';
    for(var i=1;i<=4;++i){
        $(".g"+i).find("input").each(function (e) {
            str += $(".g"+i).find("input").eq(e).val() + ',';
        });
    }
    return str;
}
function showHint(str, table) {
    $.ajax({
        url: "insert_data.php",
        data: {q: str, table: table,username:info_user['username']},
        success: function (data) {
            console.log(data)
        }
    })
}

function getSession() {
    $.ajax({
        url: "getSessionInfo.php",
        data: {sid: sid},
        success: function (data) {
            info_user=JSON.parse(data);
            console.log(info_user);
            if(info_user['role']=='leader'){
                var a=document.getElementById('link');
                if(a){
                    a.href='小组互评.html?sid='+sid;
                    document.getElementById('互评').style.display='block';
                }


            }

        }
    });
}