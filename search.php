<?php
header("Content-Type: text/html; charset=utf-8");
if (!isset($_POST['submit'])) {
    exit("錯誤執行!!!");
}

include('connect.php');

$id = $_POST['id'];
$id_sql = "SELECT * FROM stu WHERE id = '$id';";
$data_sId = $conn->query($id_sql); //回傳搜尋到的東西 看語句對不對
$row = $data_sId->fetch_assoc();//如果是空的=False
if ($row) {
    echo "姓名:" . $row['name'] . "<br>";
    echo "學號:" . $row['sId'] . "<br>";
    echo "手機號碼:" . $row['phone'] . "<br>";
    echo "ID:" . $row['id'] . "<br>";
    echo "性別:" . $row['sex'] . "<br>";
    echo "地址:" . $row['address'] . "<br>";
} else {
    echo "error";
}



echo "<br>有上的課程<br>";
$class_sql = "SELECT cName FROM record,course WHERE record.id='$id' AND course.cId=record.cId ;";

$result= $conn->query($class_sql); //回傳搜尋到的東西 看語句對不對
//如果是空的=False
if ($result->num_rows > 0) {
    while ($row1 = $result->fetch_assoc()) {
        echo $row1['cName'];
        echo "<br>";
    }
}

echo "<br>";


$sch_name = $row['name'];
$sch_sId = $row['sId'];
$sch_phone = $row['phone'];
$sch_id = $row['id'];
$sch_address = $row['address'];
//echo $sch_name."<br>".$sch_sId."<br>".$sch_phone."<br>".$sch_id."<br>".$sch_address;


$conn->close();
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
    
    <form action="update.php" method="post">
        <?php
        echo "<input type='hidden' value='$sch_name' name='sName' />";
        echo "<input type='hidden' value='$sch_phone' name='phone' />";
        echo "<input type='hidden' value='$sch_id' name='id' />";
        echo "<input type='hidden' value='$sch_address' name='address' />";
        ?>
        <input <?php  if(!$row){
            echo "hidden";
        }   ?>  type="submit" name="submit" value="修改">
    </form>
    <input type="button" name="back" value="回首頁" onclick="location.href='index.php'">
</body>

</html>