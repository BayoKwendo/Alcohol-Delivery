<?php
include '../includes/connect.php';
$name = htmlspecialchars($_POST['name']);
$username = htmlspecialchars($_POST['username']);
$password = md5(htmlspecialchars($_POST['password']));
$phone = $_POST['phone'];
$Address = $_POST['Address'];
$email = $_POST['email'];

echo "string";

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


	require '/home/cancerch/public_html/phpmailer/PHPMailerAutoload.php';

	$mail = new PHPMailer(); 

	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";

    $mail->Port = 587; // or 587
    $mail->Username = "bayokwendo@gmail.com";
    $mail->Password = "bayo1996-";

//Set who the message is to be sent from
    $mail->setFrom($email, 'DaPlace');
    $to =  $email ;
//Set an alternative reply-to address
    $mail->addAddress($to);

    $mail->Subject = 'Confirmation your account!';

     //Set the subject line
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body

//Replace the plain text body with one created manually

      $message .= "<tr><td><b>Verify your account?</b>  <a href='https://cancerchronic.org/daplace/confirmation.php?userid=$user_id' >Click here</a></td></tr>";

       $mail->msgHTML($message);

      if($mail->send()){
      		echo '<script> window.location="https://cancerchronic.org/daplace/login.php?action=success";</script>';
	    } 
   else
	echo "string";


$sql = "INSERT INTO wallet(customer_id) VALUES ($user_id)";
if($con->query($sql)==true){
	$wallet_id =  $con->insert_id;
	$cc_number = number(16);
	$cvv_number = number(3);
	$sql = "INSERT INTO wallet_details(wallet_id, number, cvv) VALUES ($wallet_id, $cc_number, $cvv_number)";
	$con->query($sql);
}
}else{
	echo '<script> window.location="https://cancerchronic.org/daplace/register.php?action=fail";</script>';

	// die("Couldnt insert into database".$con->error);
}
// header("location: ../login.php");
?>