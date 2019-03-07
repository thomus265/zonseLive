<?php

$name = $_POST['name'];
$email = $_POST['email'];
$msg = $_POST['msg'];

$from = $email;
$to = "submit@zonse.live";
$subject = "Zonse Contact Form";
$headers = "From:" . $from;
mail($to,$subject,$msg, $headers);

echo "1";
?>