<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
	 body{margin:0px;padding:0px;border:0px;}
	 h1{margin:0px;padding:0px;border:0px;text-align:center;line-height: 100px;}
	 #top{background-color:#C0C0C0;margin:0px;height:100px;}
	 td{height:20px;width:80px;}
    </style>
    <script>
function addrow(){
  var c=document.getElementById('mytable');//获得表格的信息
  if( c.rows.length==0){//如果是向一个空表增加一行
 var x=c.insertRow(0);//向空表插入一行
 var y=x.insertCell(0);//向新行插入一列
  }
else{
var z=c.rows[0].cells;//如果不是空表，首先获得表格有多少列，先获取再插入新行
var x=c.insertRow(0);
for(var i=0;i<z.length;i++){//依次向新行插入表格列数的单元格
     var y=x.insertCell(i);
y.innerHTML="<input style='width:80px;'>";
y.setAttribute("class","tdClass");
 }
}
}
function delrow(){
var x=document.getElementById("mytable");
x.deleteRow(0);//删除一行
}
function addcol(){
var c=document.getElementById('mytable');//获取表格信息
var len=c.rows.length;//获得行数
var ro=c.rows[0].cells;
var len2=ro.length;//获得列数
for(var i=0;i<len;i++){
var x=c.rows[i].insertCell(len2);//依次向每一行的末尾插入一个新列
x.innerHTML="new cell"+len2;
}
}
function delcol(){
var c=document.getElementById('mytable');//获取表格信息
var len=c.rows.length;//获取表格的行数
var ro=c.rows[0].cells//获取表格的列数
var len2=ro.length-1;
for(var i=0;i<len;i++){
var x=c.rows[i].deleteCell(len2);//删除每一行末尾的单元格
}
}
</script>
<script>
function showHint(str)
{
  var table=[
      'chuqin','geren','xiaozu'
  ];
  for (var i=0;i<3;++i){
      console.log('showhint'+i);
      //window.location.href='insert.php?q='+str[i]+'&table='+table[i];
      $.ajax({
          url: "insert.php",
          data: {q:str[i],table:table[i]},
          success: function (data) {
              console.log(data)
          }
      })
  }
    $.ajax({
        url: "insert_standard.php",
        data: {q:str[3],table:'standard'},
        success: function (data) {
            console.log(data)
        }
    })
}
</script>
<meta charset="UTF-8">
</head>
<body>
  <div id="top"><h1>形成性评价系统</h1></div>
  <input value="课程名称" readonly="readonly" style="margin:40px 0 0 330px;text-align:center;">
  <input style="width:600px;margin:40px"><br>

  <button style="margin:0 0 0 330px">创建评价表</button>
  
  <button onclick="showHint(setForm())">导入评价表</button>(初始表已有出勤及课堂表现、个人作业、小组作业三个一级指标)
  

  <p><input type="button" value="增加行" onclick="addrow()" >&nbsp&nbsp<input type="button" value="删除行" onclick="delrow()">&nbsp&nbsp</p>


<table frame="border" rules="all" id="mytable">
<tr >
<td >一级指标</td>
<td >二级指标</td>
<td >三级指标</td>
</tr>
</table>


<script type="text/javascript">
    var row_num=[3,8,15];
    //var row_num=[1,2,1];
    var COLNUM=3;
function setForm(){
		var str="";
			var num = $(".tdClass").find("input").length;
        var total=row_num[0]*COLNUM;
        str=[];
        for(var j=0;j<4;++j){
            str[j]='';
        }
        var i=0;
		$(".tdClass").find("input").each(function(e){
			var a = $(".tdClass").find("input").eq(e).val();
            /*
			if(e+1 == num){
				str+= a;
			}else{
				str+= a+',';
			}*/
            console.log(e)
			if(e+1>total){
                console.log('total:'+total)
                str[i]+= a+',';
                total+=row_num[i]*COLNUM;
			    ++i;
            }else{
                str[i]+= a+',';
            }


			    /*
			    total+=row_num[i];
			    while(e+1<=total){
                    a = $(".tdClass").find("input").eq(e).val();
			        console.log(e);
                    if(e+1 == total){
                        str[i]+= a;
                    }else{
                        str[i]+= a+',';
                    }
                }
                str[3]+=str[i];*/
		});
		str[3]=str[0]+str[1]+str[2];
		console.log(str);
		return str;
	}
</script>
</body>
</html>
