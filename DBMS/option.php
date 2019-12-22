<?php
$host = "localhost"; //主机地址
$username = "root"; //用户名
$passwd = ""; //密码
$dbname = "s_sc_c"; //数据库名
$conn = new mysqli($host, $username, $passwd, $dbname); //建立一个数据库连接
//连接失败则报错
if ($conn->connect_error) {
    die("连接数据库失败");
}
$conn->query("set names utf8mb4"); //设置数据库编码，防止乱码
echo "数据库连接成功！<br><br>";
$tableIndex = $_GET["tableIndex"]; //通过$_GET[]函数获取要选择的数据表
$tableName = ""; //设置数据表名称
if ($tableIndex == 1) {
    $tableName = "Student";
} else if ($tableIndex == 2) {
    $tableName = "SC";
} else if ($tableIndex == 3) {
    $tableName = "Course";
}
//通过$_GET[]函数获取要对数据表进行的操作
if ($_GET["option"] == "插入") {
    //通过$_GET[]函数获取用户输入的一系列数据
    if ($tableIndex == 1) {
        $sclass = $_GET["sclass"];
        $sno = $_GET["sno"];
        $sname = $_GET["sname"];
        $ssex = $_GET["ssex"];
        $sage = $_GET["sage"];
        $Sdept = $_GET["Sdept"];
        //组成SQL语句
        $sql = "INSERT INTO Student(sclass,sno,sname,ssex,sage,Sdept) VALUES ($sclass,$sno,'$sname','$ssex',$sage,'$Sdept');";
    } else if ($tableIndex == 2) {
        $sclass = $_GET["sclass"];
        $sno = $_GET["sno"];
        $cno = $_GET["cno"];
        $grade = $_GET["grade"];
        //组成SQL语句
        $sql = "INSERT INTO SC(sclass,sno,cno,grade) VALUES ($sclass,$sno,$cno,$grade);";
    } else if ($tableIndex == 3) {
        $cno = $_GET["cno"];
        $cname = $_GET["cname"];
        $cpno = $_GET["cpno"];
        $ccredit = $_GET["ccredit"];
        //组成SQL语句
        $sql = "INSERT INTO Course(cno,cname,cpno,ccredit) VALUES ($cno,'$cname',$cpno,$ccredit);";
    }
    //使用$conn->query()函数执行SQL语句查询
    //执行SQL语句，成功则返回数据，失败则返回提示
    if (!$conn->query($sql)) {
        die("插入失败！请检查数据类型");
    };
    echo "插入成功";
} else if ($_GET["option"] == "O") { //更新操作

    if ($tableIndex == 1) {
        $sclass = $_GET["sclass"];
        $sno = $_GET["sno"];
        $sname = $_GET["sname"];
        $ssex = $_GET["ssex"];
        $sage = $_GET["sage"];
        $Sdept = $_GET["Sdept"];
        $id = $_GET["id"]; //获取主键
        $sql = "UPDATE Student SET sclass=$sclass,sno=$sno,sname='$sname',ssex='$ssex',sage=$sage,Sdept='$Sdept' WHERE id=$id;";
    } else if ($tableIndex == 2) {

        $sclass = $_GET["sclass"];
        $sno = $_GET["sno"];
        $cno = $_GET["cno"];
        $id = $_GET["id"]; //获取主键
        $grade = $_GET["grade"];
        $sql = "UPDATE SC SET sclass=$sclass,sno=$sno,cno=$cno,grade=$grade WHERE id=$id;";
    } else if ($tableIndex == 3) {
        $cno = $_GET["cno"];
        $cname = $_GET["cname"];
        $cpno = $_GET["cpno"];
        $id = $_GET["id"]; //获取主键
        $ccredit = $_GET["ccredit"];
        $sql = "UPDATE Course SET cno=$cno,cname=$cname,cpno=$cpno,ccredit=$ccredit WHERE id=$id;";
    }
    //执行SQL语句，成功则返回数据，失败则返回提示
    //使用$conn->query()函数执行SQL语句查询
    if (!$conn->query($sql)) {
        die("更新失败！请检查数据类型");
    };
    echo "更新成功";
} else if ($_GET["option"] == "X") { //删除操作
    $id = $_GET["id"]; //获取主键
    $sql = "DELETE FROM $tableName WHERE id=$id;";
    //执行SQL语句，成功则返回数据，失败则返回提示

    if (!$conn->query($sql)) {
        die("删除失败！");
    };
    echo "删除成功";
}
//获取返回的数据并格式输出，展示给用户
//输出标头
$str = "DESC $tableName";
echo "<br/>$tableName<br/><br/>";
$result = $conn->query($str);
echo "<table border='0'><tr>";
$name = [];

$one = true;
while ($row = $result->fetch_row()) {

    if ($one) {
        echo "<th style='display:none'>$row[0]</th>";
        $one = false;
    } else {
        echo "<th>$row[0]</th>";
    }

    array_push($name, $row[0]);
}
echo "<th>修改</th><th>删除</th>";
echo "</tr>";
//获取返回的数据并格式输出，展示给用户
//输出内容
$result = $conn->query("SELECT * FROM $tableName");
while ($row = $result->fetch_row()) {
    echo "<tr><form action='option.php' method='GET' target='myframe'>
    <input name='tableIndex' value='$tableIndex' style='display:none;'>";
    for ($i = 0; $i < sizeof($row); $i++) {
        if ($i == 0) {
            echo "<td style='display:none;'>$row[$i]<input class='item' style='width:100%; display:none;' name='$name[$i]' value='$row[$i]'></input></td>";
        } else {
            echo "<td><input class='item' style='width:100%' name='$name[$i]' value='$row[$i]'></input></td>";
        }
    }
    echo "<td><input type='submit' name='option' value='O' onclick='show'></td>";
    echo "<td><input type='submit' name='option' value='X' onclick='show()'></td>";
    echo "</form></tr>";
}

// echo "</table>";
echo '
    <tr><form action="option.php" method="GET" target="myframe" onsubmit="show()">
                <input style="display:none" type="text" name="tableIndex" value="' . $tableIndex . '">';
foreach ($name as $nameItem) {
    if ($name[0] != $nameItem) {
        echo '<td><input class="s" type="text" name="' . $nameItem . '"></td>';
    }
}
//HTML样式表，用于美化数据格式
echo '<td colspan="2"><input class="s" type="submit" name="option" value="插入"></td>
            </form></tr></table>
            
            <style>
            html,body{
                font-size: 20px;
            }
            .s {
                width: 100%;
            }
            table{
                border:2px solid black;
                font-size: inherit;

            }
            form{
                margin-top:10px;
                margin-left:3px;
                display:flex;
            }
            
            td,th{
              min-width:80px;
              margin:0;
              text-align:center;
             outline:1px solid black;
            }
            .item{
                border:none;
                background-color: transparent;
                text-align:center;
                font-size: inherit;
            }
            input{
                font-size: inherit;

            }
            input:focus{
                background-color: white;
                text-align:center;
            }
            </style>
            <script>
                function show() {
                    setTimeout(() => {
                        document.getElementById("submit").click();
                
                    }, 1000);
                }
            </script>';
//关闭连接
$conn->close();
