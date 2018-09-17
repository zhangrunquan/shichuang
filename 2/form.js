stuSelect();

//生成班级选择的下拉框
function stuSelect() {
    var ul = document.getElementById('student_select');
    for (var i = 0; i < info_stu.length; i++) {
        (function () {
            var li = document.createElement('li');
            ul.appendChild(li);
            var a = document.createElement('a');
            li.appendChild(a);
            var stuname = info_stu[i];
            var textnode = document.createTextNode(stuname);
            a.appendChild(textnode);
            a.setAttribute('stuname', stuname);
            a.onclick = function (ev) {
                var stuname = this.getAttribute('stuname');
                changeStu(stuname);
            }
        })(i)
    }
}

function changeStu(stuname) {
    STUNAME = stuname;
    fillForm(stuname)
}

//将当前表的内容存入数据库
function setForm() {
    var str = '';
    $(".tdClass").find("input").each(function (e) {
        str += $(".tdClass").find("input").eq(e).val() + ',';
    });
    console.log(str);
    return str;
}
function showHint(str, table, username) {
    $.ajax({
        url: "insert_data.php",
        data: {q: str, table: table, username: username},
        success: function (data) {
            console.log(data)
        }
    })
    saveTotal();
}

//从数据库中读取数据并填入表格
function fillForm(stuname) {
    $.ajax({
        url: "get_data.php",
        data: {username: stuname,table:TABLE},
        success: function (data) {
            console.log(data);
            var info=JSON.parse(data);
            //缺少结果检查，可能返回空结果
            var i=0
            $(".tdClass").find("input").each(function (e) {
                $(".tdClass").find("input").eq(e).val(info[i++]) ;
            });
        }
    })
}

//计算总成绩
function sum() {
    var sum=0;
    $(".tdClass").find("input").each(function (e) {
        if($(".tdClass").find("input").eq(e).val()!=''){
            sum += parseInt($(".tdClass").find("input").eq(e).val()) ;
        }
    });
    return sum;
}

//向数据库保存总成绩
function saveTotal() {
    var total=sum();
    console.log('total: '+total)
    $.ajax({
        url: "insert_totalgrade.php",
        data: {key: COLUMN, value:total,username: STUNAME},
        success: function (data) {
            console.log(data)
        }
    })
}
