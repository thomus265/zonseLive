<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create($_SERVER['DOCUMENT_ROOT']);
$dotenv->load();

$Server = getenv('DB_HOST');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$dbname = getenv('DB_NAME');
$mysqli = mysqli_connect($Server, $username, $password, $dbname);

$dbh = new PDO('mysql:host=' . $Server . ';dbname=' . $dbname, $username, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>


