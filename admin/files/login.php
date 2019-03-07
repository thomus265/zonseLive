<?php
	require ("../../inc/functions.php");

	$name = $_POST['name'];
	$pass = $_POST['pass'];
	$pass = md5($pass);

    $q = mysqli_query($mysqli,"SELECT * FROM users WHERE userName='$name' AND password='$pass' ");
    if(!$res = mysqli_fetch_array($q)){
    echo "0";
    }
    else{
        $uid = $res['user_id'];
        $name = $res['userName'];

        session_start();
        $_SESSION['id'] = $res['user_id'];   
        echo "1";     
    }
?>