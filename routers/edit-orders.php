<?php
include '../includes/connect.php';
$status = $_POST['status'];
$id = $_POST['id'];

$sql = "UPDATE orders SET status='$status' WHERE id=$id;";
$con->query($sql);
echo  '<script> window.location="https://apondiform.com/DaPlace/all-orders.php";</script>';

?>