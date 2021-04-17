<?php

include('connect.php');
$id = $_POST['id'];
$sql = "SELECT * FROM course";
$result = $conn->query($sql);
echo "<h2>選取課程</h2>";
echo "<form action='choose.php' method='post'>";
echo '<input type="hidden" value="'.$id.'" name="id">';
if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        
        echo "cName: " . $row["cName"] ;
        $cName=$row["cName"];
        echo "<input type='checkbox' name ='subject[]' value='$cName'>";
        echo "<br>";
    }
}
echo '<input type="submit" name="submit" value="送出"> ';
echo "</form>";

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
    
    <?php
    
    ?>
 <!--   <form action="choose.php" method="post">
        
        <input type="checkbox" name="subject[]" value="algorithm" /> algorithm<br>
        <input type="checkbox" name="subject[]" value="linear" /> linear<br>
        <input type="checkbox" name="subject[]" value="DataBase" /> DataBase<br>
        <input type="submit" name="submit" value="送出">
    </form>-->
</body>

</html>