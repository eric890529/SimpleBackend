<?php
header("Content-Type: text/html; charset=utf-8");
if (!isset($_POST['submit'])) {
    exit("錯誤執行!!!");
}

include('connect.php');

$subject = $_POST['subject'];
//$myalls = implode (",", $subject);
$id = $_POST['id'];

echo $id."<br>";
foreach ($subject as $class){
    $sql = "INSERT INTO record(id,cId) values('$id',(SELECT cId FROM `course` USE INDEX (index_cName) WHERE cName='$class'));";
    //echo $sql."!!!<br>";

    if ($conn->query($sql) == TRUE) {
        echo $class."<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error."<br>";
    }
}
/*
if(isset($_POST['subject'])){
   // echo $myalls;
    $find="Select cId From Course where cName='????'";
    $sql = "INSERT INTO  record (sId,cId)
    VALUE ('$myalls')";
}
*/

/*if ($conn->query($sql) === TRUE) {
    echo "選取成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/
$conn->close();
?>
<input type="button"
 name="back"  value="回首頁" onclick="location.href='index.php'">
