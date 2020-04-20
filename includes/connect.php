<?php
session_start();
$servername = "localhost";
$server_user = "root";
$server_pass = "1NU7~=+##424";
$dbname = "cancerch_alcohol_delivery";
$name = $_SESSION['name'];
$role = $_SESSION['role'];
$con = new mysqli($servername, $server_user, $server_pass, $dbname);

?>