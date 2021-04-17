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
echo $name . "<br>" . $id . "<br>" . $phone . "<br>" . $address;

$sql = "DELETE FROM record WHERE record.id='$id';";
echo $sql;

if($conn->query($sql)==True){
    echo "刪除舊課程成功";
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
    <h2>更改資料</h2>
    <form action="updateClass.php" method="post">
        姓名:<input type="text" name="sName" value="<?php echo $name ?>"><br />
        電話:<input type="text" name="phone" value="<?php echo $phone ?>"><br />
        地址:<input type="text" name="address" value="<?php echo $address ?>"><br />
        <?php
        $sql_1 = "SELECT * FROM course";
        $result = $conn->query($sql_1);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo  $row["cName"];
                $cName = $row["cName"];
                echo "<input type='checkbox' name ='subject[]' value='$cName'>";
                echo "<br>";
            }
        }
      
        ?>
        <input type="hidden" name="id" value="<?php echo $id ?>"><br />
        <input type="submit" name="submit" value="送出">
    </form>

</body>

</html>