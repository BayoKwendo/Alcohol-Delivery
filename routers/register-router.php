<?php
include '../includes/connect.php';
$name = htmlspecialchars($_POST['name']);
$username = htmlspecialchars($_POST['username']);
$password = md5(htmlspecialchars($_POST['password']));
$phone = $_POST['phone'];
$Address = $_POST['Address'];
$email = $_POST['email'];

function number($length) {
	$result = '';

	for($i = 0; $i < $length; $i++) {
		$result .= mt_rand(0, 9);
	}

	return $result;
}

$sql = $sql = "INSERT INTO users (username, password, name, email, contact, address, role, verified, deleted) VALUES ('$username', '$password', '$name', '$email', $phone, '$Address', 'Customer', 0, 0)";
if($con->query($sql)==true){
	$user_id =  $con->insert_id;

	 $message .= "<tr><td>Want to visit the system now??  <a href='www.apondiform.com/DaPlace/confirmation.php?userid=$user_id' >Click here</a></td></tr>";


	$sql = "INSERT INTO wallet(customer_id) VALUES ($user_id)";
	if($con->query($sql)==true){
		$wallet_id =  $con->insert_id;
		$cc_number = number(16);
		$cvv_number = number(3);
		$sql = "INSERT INTO wallet_details(wallet_id, number, cvv) VALUES ($wallet_id, $cc_number, $cvv_number)";
		$con->query($sql);
	}
}else{
	 die("Couldnt insert into database".$con->error);
}
// header("location: ../login.php");
?>