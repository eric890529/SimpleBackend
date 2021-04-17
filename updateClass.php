<?php
header("Content-Type: text/html; charset=utf-8");
if (!isset($_POST['submit'])) {
    exit("錯誤執行!!!");
}
include('connect.php');


$name = $_POST['sName'];
$id = $_POST['id'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$subject = $_POST['subject'];

$sql_1="UPDATE stu SET name='$name',phone='$phone',address='$address' WHERE id='$id'";

foreach ($subject as $class){
    $sql = "INSERT INTO record(id,cId) values('$id',(SELECT cId FROM `course` USE INDEX (index_cName) WHERE cName='$class'));";
    //echo $sql."!!!<br>";

    if ($conn->query($sql) == TRUE) {
        echo $class."<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error."<br>";
    }
}

if($conn->query($sql_1)==True){
    echo "更改成功";
}else{
    echo "error";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<style>

</style>

<body>

    <input type="button" name="back" value="回首頁" onclick="location.href='index.php'">

</body>

</html>