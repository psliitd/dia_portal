<?php


require('../util/Connection.php');
require('../structures/Login.php');

$person = new Login;
$person->setUsername($_POST["username"]);
$person->setPassword($_POST["password"]);

$query1 = "SELECT * FROM login  WHERE username='".$person->getUsername()."' AND password='".$person->getPassword()."'";
 

$result1 = mysqli_query($con,$query1);
 
$numrows1 = mysqli_num_rows($result1);
 
 

if($numrows1 == 0  ){
	echo "Password is incorrect";
}
else {
	 
	$row = mysqli_fetch_array($result1);
	 
	session_start();

	$_SESSION['user'] = $person->getUsername();
	$_SESSION['password'] = $person->getPassword();
	$_SESSION['studentid'] = $row["studentid"];
	 
	mysqli_close($con);
	 
	$logMessage = $_SESSION['user'] . " logged in at " . date("Y-m-d H:i:s") . "\n";
    $logFile = 'login_log.txt';
    file_put_contents($logFile, $logMessage, FILE_APPEND);


	if ($_SESSION['user'] == 'shallu@iitd.in') {
        header("Location:../Profile.php");
        exit(); // Ensure script execution stops after redirection
    } else if ($_SESSION['user'] == 'IIT Jammu') {
		 
         header("Location: http://localhost/dia/dia/DiaHome.php");
        exit(); // Ensure script execution stops after redirection
    }else if ($_SESSION['user'] == 'nomesh_bolia') {
		 
		header("Location: http://localhost/dia/dia/StudentData.php");
	   exit(); // Ensure script execution stops after redirection
   }else if ($_SESSION['user'] == 'diacoordinator') {
		 
	header("Location: http://localhost/dia/dia/Coordinator.php");
   exit(); // Ensure script execution stops after redirection
}
}
 
?>
