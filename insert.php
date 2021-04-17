<?php
header("Content-Type: text/html; charset=utf-8");
if (!isset($_POST['submit'])) {
    exit("錯誤執行!!!");
}

include('connect.php');

$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$id = $_POST['id'];
$gender = $_POST['sex'];


if(isset($_POST['name'])&&isset($_POST['phone'])
&&isset($_POST['address'])&&isset($_POST['id'])
&&isset($_POST['sex'])){
    echo $name." ". $phone." ". $address. " ". $id." ". $gender;
    $sql = "INSERT INTO  stu (name,phone,address,id,sex)
    VALUE ('$name','$phone','$address','$id','$gender')";
}


if ($conn->query($sql) === TRUE) {
    echo "註冊成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
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
<br><br>
   
    <form action="chooseClass.php" method="post">
        <?php
        echo "<input type='hidden' value='$id' name='id' />";
        ?>
        <input type="submit" value="選取課程" >
    </form>
</body>

</html>
