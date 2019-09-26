<?php
include '../includes/connect.php';
include '../includes/wallet.php';
$status = $_POST['status'];
$ticket_id = $_POST['ticket_id'];
$sql = "UPDATE tickets SET status = '$status' WHERE id = $ticket_id;";
$con->query($sql);


  echo '<script> window.location="https://apondiform.com/DaPlace/view-ticket.php?id=$ticket_id";</script>';
  ?>