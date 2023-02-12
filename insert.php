<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增</title>
</head>
<body align = "center">
    <h1 align = "center">新增</h1>
    <form action="" method="post" name="insform">
        <p aligne = "center">ID:<input type = "text" name="id" /></p>
        <p aligne = "center">信息:<input type = "text" name="name" /></p>
        <p aligne = "center"><input type = "submit" name="insub" value = "提交" /></p>
    </form>
<?php
    $link =  mysqli_connect("127.0.0.1:3306","root","123456","php_demo");
    if(!$link){
     echo "连接失败";
    }
    if(!empty($_POST["insub"])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        mysqli_query($link,"insert into test (id,name) value ('$id','$name')");
        header('location:Index.php');
    }
?>
    
</body>
</html>