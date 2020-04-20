<?php
include '../includes/connect.php';
$status = $_POST['status'];
$id = $_POST['id'];

$sql = "UPDATE orders SET status='$status' WHERE id=$id;";
$con->query($sql);
echo  '<script> window.location="https://cancerchronic.org/daplace/all-orders.php";</script>';

?>