<?php
include '../includes/connect.php';

$name = $_POST['name'];
$price = $_POST['price'];
$sql = "INSERT INTO items (name, price) VALUES ('$name', $price)";
$con->query($sql);






echo  '<script> window.location="https://cancerchronic.org/daplace/admin-page.php";</script>';

?>