<?php

$dbhost = 'localhost'; // mysql服务器主机地址
$dbuser = 'root'; // mysql用户名
$dbpass = ''; // mysql用户名密码
$dbname = 's_sc_c';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);//建立一个数据库连接
//连接失败则报错
if ($conn->connect_error) {
    die("数据库连接失败");
}
echo "数据库连接成功！<br>";
$conn->query("set names utf8mb4");//设置数据库编码，防止乱码
$str = isset($_GET['addr']) ? $_GET['addr'] : "";//通过$_GET[]函数获取用户输入的要查询的字段
$sql="SELECT * FROM S WHERE SADDR LIKE '%$str%'";//SQL语句模糊查找
//使用$conn->query()函数执行SQL语句查询
$result = $conn->query("DESC S");
//获取返回的数据并格式输出，展示给用户
echo "<table border='1'><tr>";
while ($row = $result->fetch_row()) {//使用$result->fetch_row()函数获取SQL返回的结果
    echo "<td>$row[0]</td>";
}
echo "</tr>";
$result = $conn->query($sql);
while ($row = $result->fetch_row()) {
    echo "<tr>";
    foreach ($row as $item) {
        echo "<td>$item</td>";
    }
    echo "</tr>";
    
}
//HTML样式，用于美化数据格式
echo "</table><style>td,th{
    width:80px;
    margin:0;
    text-align:center;
   outline:1px solid black;

  }
  </style>
";
?>