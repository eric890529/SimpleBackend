<?php

header("Content-Type: text/html; charset=utf-8");
include('connect.php');

$sql = "SELECT MAX(cId) as cId FROM course;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$count= $row['cId']+1;

$courseName=$_POST['courseName'];
$cClass=$_POST['cClass'];

echo $courseName."<br>".$cClass;

$sql_class="INSERT INTO course (cName,cClass,cId) VALUES('$courseName','$cClass','$count')";
if($conn->query($sql_class)==True){
    echo "課程加入成功";
}else{
    echo "error";
}



?>
<input type="button"
 name="back"  value="回首頁" onclick="location.href='index.php'">