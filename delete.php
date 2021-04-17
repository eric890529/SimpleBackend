<?php
header("Content-Type: text/html; charset=utf-8");
if (!isset($_POST['submit'])) {
    exit("錯誤執行!!!");
}

include('connect.php');

$sId = $_POST['sId'];
$id = $_POST['id'];
$sId_sql = "SELECT * FROM stu WHERE sId = '$sId';";//
//echo $sId_sql."<br>";
$data_sId = $conn->query($sId_sql);//回傳搜尋到的東西
$row = $data_sId->fetch_assoc();
echo $row['sId']."<br>";
echo $row['phone']."<br>";
echo $row['id']."<br>";

$checksId=$row['sId'];
$checkid =$row['id'];

if (isset($_POST['sId']) && isset($_POST['id']) && $id == $checkid && $sId == $checksId) {
    echo $sId . " " .  $id . " ";
    $sql = "DELETE FROM stu WHERE sId=$sId AND id='$id';";
    if ($conn->query($sql) === TRUE) {
        echo "已刪除資料";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "查無此資料";
}



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
    <input type="button" name="back" value="回首頁" onclick="location.href='index.php'">
</body>

</html>