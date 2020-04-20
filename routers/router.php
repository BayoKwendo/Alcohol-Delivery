<?php
include '../includes/connect.php';
$success=false;

$username = htmlspecialchars($_POST['username']);
$password = md5(htmlspecialchars($_POST['password']));

$result = mysqli_query($con, "SELECT * FROM users WHERE username='$username' AND password='$password' AND role='Administrator' AND not deleted;");
while($row = mysqli_fetch_array($result))
{
	$success = true;
	$user_id = $row['id'];
	$name = $row['name'];
	$role= $row['role'];

}
if($success == true)
{	
	session_start();
	$_SESSION['admin_sid']=session_id();
	$_SESSION['user_id'] = $user_id;
	$_SESSION['role'] = $role;
	$_SESSION['name'] = $name;
		echo "string";
	echo  '<script> window.location="https://cancerchronic.org/daplace/admin-page.php";</script>';
	
}
else
{
	$result = mysqli_query($con, "SELECT * FROM users WHERE username='$username' AND password='$password' AND role='Customer' AND not deleted;");
	while($row = mysqli_fetch_array($result))
	{
	$success = true;
	$user_id = $row['id'];
	$name = $row['name'];
	$role= $row['role'];
	}
	if($success == true)
	{
		session_start();
		$_SESSION['customer_sid']=session_id();
		$_SESSION['user_id'] = $user_id;
		$_SESSION['role'] = $role;
		$_SESSION['name'] = $name;
			echo  '<script> window.location="https://cancerchronic.org/daplace/index.php";</script>';			
	}
	else
	{
		if (!$con) {

			echo "string";
			# code...
		};
  echo '<script> window.location="https://cancerchronic.org/daplace/login.php?action=fail";</script>';
	}
}
?>