<?php
 $severname="localhost";
 $account="root";
 $password="";
 $dbname="hw1";

 $conn=mysqli_connect($severname,$account,$password,$dbname);//進入資料庫並連結到資料庫

 if($conn->connect_error){
     die("Connection failed: ". $conn->connect_error);
 }
 echo "Connected successfully <br>";
 ?>
