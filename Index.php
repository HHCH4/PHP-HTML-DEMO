<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>一个CRUD</title>
</head>
<body>
    <h1 align="center">记得起标题</h1>
    <form action="" method="post" name="index">
            <p align="center"><input type="button" value="新增" name="inbut" onclick="location.href='insert.php'"></p>
            <p align="center"><input type="text" name="sel"/><input type="submit" value="查找" name="selsub"/></p>
            <table align="center" border="1px" cellspacing="0px">
                <tr><th>id</th><th>信息</th><th>操作</th></tr>
<?php
    $link =  mysqli_connect("127.0.0.1:3306","root","123456","php_demo");
       if(!$link){
        echo "连接失败";
    }
    if(empty($_POST["selsub"])){
        $res = mysqli_query($link,"select * from test order by id");
    }
    else{
        $sel = $_POST["sel"];
        $res = mysqli_query($link,"select * from test where id like '%$sel%'or name like '%$sel%' ");
    }
    while($row = mysqli_fetch_array($res)){
        echo '<tr>';
        echo "<td>$row[0]</td><td>$row[1]</td>
            <td>
            <input type = 'submit' name='upsub$row[0]' value='修改' />
            <input type = 'submit' name='delsub$row[0]' value='删除' />

            </td>";
        echo '</tr>';
        if(!empty($_POST["upsub$row[0]"])){
            echo '<tr>';
            echo "<td><input type='text' name='uid' value='$row[0]'></td>
                   <td><input type='text' name='uname' value='$row[1]'></td>
                   <td><input type='submit' value='确认修改' name='ups$row[0]'></td>";

            echo '</tr>';
        }
        if (!empty($_POST["ups$row[0]"])){
            $uid = $_POST['uid'];
            $uname = $_POST['uname'];
            mysqli_query($link,"update test set id = '$uid',name = '$uname' where id = $row[0]");
            header('location:#');
        }
        if (!empty($_POST["delsub$row[0]"])){
            mysqli_query($link,"delete from test where id = $row[0]");
            header('location:#');
        }
    }
?>

        </table>
    </form>
</body>

</html>