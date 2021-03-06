<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/style.css" type="text/css" rel="stylesheet"/>
    <style>
        body {
            margin: 0px;
            padding: 0px;
            border: 0px;
        }

        h1 {
            margin: 0px;
            padding: 0px;
            border: 0px;
            text-align: center;
            line-height: 100px;
        }

        #top {
            background-color: #C0C0C0;
            margin: 0px;
            height: 100px;
        }

        #login {
            width: 600px;
            margin: 0 auto;
            padding: 40px 0px;
        }

        #login_logo {
            text-align: center;
            margin-top: 20px;
        }

        #login_font {
            font-size: 30px;
            text-align: center;
        }

        .login_input1 {
            display: block;
            width: 350px;
            height: 30px;
            padding: 20px 20px;
            margin-left: auto;
            margin-right: auto;
            background-color: white;
            text-align: left;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border: 1px solid #fff;
            outline: none;
            margin: 0px auto;
            color: #999;
        }

        .login_input1 {
            border-top: 2px solid #30a5ff;
            border-left: 2px solid #30a5ff;
            border-right: 2px solid #30a5ff;
            border-bottom: 1.5px solid #30a5ff;
        }

        .login_input2 {
            display: block;
            width: 350px;
            height: 30px;
            padding: 20px 20px;
            margin-left: auto;
            margin-right: auto;
            background-color: white;
            text-align: left;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            border: 2px solid #fff;
            outline: none;
            margin: 0px auto;
            color: #999;
        }

        .login_input2 {
            border-top: 1px solid #30a5ff;
            border-left: 2px solid #30a5ff;
            border-right: 2px solid #30a5ff;
            border-bottom: 2px solid #30a5ff;
        }

        .tabtop13 {
            margin-top: 13px;
        }

        .tabtop13 td {
            background-color: #ffffff;
            height: 25px;
            line-height: 150%;
        }

        .font-center {
            text-align: center
        }

        .btbg {
            background: #e9faff !important;
        }

        .btbg1 {
            background: #f2fbfe !important;
        }

        .btbg2 {
            background: #f3f3f3 !important;
        }

        .biaoti {
            font-family: 微软雅黑;
            font-size: 26px;
            font-weight: bold;
            border-bottom: 1px dashed #CCCCCC;
            color: #255e95;
        }

        .titfont {

            font-family: 微软雅黑;
            font-size: 16px;
            font-weight: bold;
            color: #255e95;
            background: url(../images/ico3.gif) no-repeat 15px center;
            background-color: #e9faff;
        }

        .tabtxt2 {
            font-family: 微软雅黑;
            font-size: 14px;
            font-weight: bold;
            text-align: right;
            padding-right: 10px;
            color: #327cd1;
        }

        .tabtxt3 {
            font-family: 微软雅黑;
            font-size: 14px;
            padding-left: 15px;
            color: #000;
            margin-top: 10px;
            margin-bottom: 10px;
            line-height: 20px;
        }
    </style>
    <script>
        function goBack() {
            window.history.back()
        }
    </script>
</head>
<body>

<div id="top"><h1>形成性评价系统</h1></div>
<table width="100%" border="1" cellspacing="1" cellpadding="4" bgcolor="#cccccc" class="tabtop13" align="center">

    <tr>
        <td width="15%" colspan="1" class="btbg font-center titfont" rowspan="2">学号</td>
        <td width="15%" class="btbg font-center titfont" rowspan="2">姓名</td>
        <td width="15%" class="btbg font-center titfont" rowspan="1" colspan="3">成绩</td>
        <td width="15%" class="btbg font-center titfont" rowspan="2" colspan="1">总评</td>
        <td width="15%" class="btbg font-center titfont" rowspan="2" colspan="1">反馈</td>
    </tr>
    <tr>
        <td class="btbg font-center titfont" rowspan="1" colspan="1">出勤及课堂表现</td>
        <td class="btbg font-center titfont" rowspan="1" colspan="1">个人作业</td>
        <td class="btbg font-center titfont" rowspan="1" colspan="1">小组作业</td>
    </tr>
    <tr id="row"></tr>

</table>
<ul id="student_select"></ul>

<button type="button" onclick="goBack()" style="position:absolute;left:820px;width:150px;top:600px">返回上一级</button>
<script >
    var info_stu = ['stu1', 'stu2', 'stu3', 'stu4'];
    var STUNAME = 'stu1';

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
                    getGrade(stuname);
                }
            })(i)
        }
    }


    function getGrade(username) {
        $.ajax({
            url: "getGrade.php",
            data: {username:username},
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
</script>
</body>
</html>
