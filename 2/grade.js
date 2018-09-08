//sid以get方式传值，从网址中获得参数
var sid = getQueryString("sid");
getGrade();

function getGrade() {
    $.ajax({
        url: "getGrade.php",
        data: {sid: sid},
        success: function (data) {
            console.log(data)
            var row=JSON.parse(data);
            var tr=document.getElementById('row');
            if(row!='0 结果'){
                tr.innerHTML= "<td>" + row["id"] + "</td>"+
                    "<td>" + row["name"] + "</td>"+
                    "<td>" + row["g1"] + "</td>"+
                    "<td>" + row["g2"] + "</td>"+
                    "<td>" + row["g3"] + "</td>"+
                    "<td>" + row["g4"] + "</td>"+
                    "<td>" + row["g5"] + "</td>";
            }
            else if(row=='0 结果'){
                tr.innerHTML=row;
            }


        }
    })
}


//获取get传值的方法,（利用正则表达式从链接中获取）
function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return decodeURI(r[2]);
    return null;
}