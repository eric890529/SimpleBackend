<?php
include('connect.php');

$sql = "SELECT * FROM stu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<form action='search.php' method='post'>";
        echo "id: " . $row["id"] ;
        $id=$row["id"];
        echo "<input type='submit' name ='submit' value='查詢'>";
        echo "<input type='hidden' name='id' value='$id' >";
        echo "</form>";
        echo "<br>";
    }
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

</body>

</html>