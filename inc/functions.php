<?php
 $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "zonse";
     $mysqli= mysqli_connect($Server,$username,$psrd,$dbname); 

     $dbh = new PDO('mysql:host=localhost;dbname=zonse', 'root', "");
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>


