
<?php


require('../util/Connection.php');
require('../structures/Login.php');

$person = new Login;
$person->setUsername($_POST["username"]);
$person->setPassword($_POST["password"]);

$query1 = "SELECT * FROM supervisorlogin  WHERE username='".$person->getUsername()."' AND password='".$person->getPassword()."'";
 

$result1 = mysqli_query($con,$query1);
 
$numrows1 = mysqli_num_rows($result1);
 

if($numrows1 == 0  ){
	echo "Password is incorrect";
}
else if($numrows1 == 1){
	$row = mysqli_fetch_array($result1);
	session_start();
	$_SESSION['user'] = $person->getUsername();
	$_SESSION['password'] = $person->getPassword();
	$_SESSION['studentid'] = $row["studentid"];
	
	mysqli_close($con);
	
	$logMessage = $_SESSION['user'] . " logged in at " . date("Y-m-d H:i:s") . "\n";
    $logFile = 'login_log.txt';
    file_put_contents($logFile, $logMessage, FILE_APPEND);


	  if ($_SESSION['user'] == 'anmol@dia.in') {
		 
		header("Location: ../SupervisorProfileRegister.php");
	   exit(); // Ensure script execution stops after redirection
   } 
}
 
?>
