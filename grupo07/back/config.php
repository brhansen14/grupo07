<?php
$dbHost="localhost";
$dbUser="root";
$dbPassword="";
$dbName="cms";

$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Deu errado. Database não está conectado;");
}
?>