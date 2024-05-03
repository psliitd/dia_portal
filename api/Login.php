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
	 
	$logMessage = $_SESSION['studentid'] . " logged in at " . date("Y-m-d H:i:s") . "\n";
    $logFile = 'login_log.txt';
    file_put_contents($logFile, $logMessage, FILE_APPEND);

 
 
if ($_SESSION['user'] == 'shallu@iitd.in' || 
    $_SESSION['user'] == 'Ryno.Settrisman' || 
    $_SESSION['user'] == 'Hok.Chheangkhy' || 
    $_SESSION['user'] == 'Cho.Win' || 
    $_SESSION['user'] == 'Thandar.Zaw' || 
    $_SESSION['user'] == 'Tran.Dang' || 
    $_SESSION['user'] == 'Rithy.Khouy' || 
    $_SESSION['user'] == 'Pham.Hanh' || 
    $_SESSION['user'] == 'Nguyen.Huyen' || 
    $_SESSION['user'] == 'Ramzul.Riza' || 
    $_SESSION['user'] == 'Zun.Mo' || 
    $_SESSION['user'] == 'Kyawt.Thein' || 
    $_SESSION['user'] == 'Made.Widyatmika' || 
    $_SESSION['user'] == 'Zin.Myint' || 
    $_SESSION['user'] == 'Mario.Poluakan' || 
    $_SESSION['user'] == 'Phyu.Cho' || 
    $_SESSION['user'] == 'Khin.Win' || 
    $_SESSION['user'] == 'Phyu.Mon' || 
    $_SESSION['user'] == 'Antonio.Regis' || 
    $_SESSION['user'] == 'Diana.Slyvia' || 
    $_SESSION['user'] == 'Anggy.Pratiwi' || 
    $_SESSION['user'] == 'Nurdini.Chusna' || 
    $_SESSION['user'] == 'Tin.Htay' || 
    $_SESSION['user'] == 'Fatihah.Sari' || 
    $_SESSION['user'] == 'Fransiska.Arumsari' || 
    $_SESSION['user'] == 'Nwe.Kyaw' || 
    $_SESSION['user'] == 'Sivaraman.rajah' || 
    $_SESSION['user'] == 'Thich.Nguyen' || 
    $_SESSION['user'] == 'Arvin.Subramaniam' || 
    $_SESSION['user'] == 'Thy.Doan' || 
    $_SESSION['user'] == 'Andri.Maulana' || 
    $_SESSION['user'] == 'Adi.Nugroho' || 
    $_SESSION['user'] == 'Phyo.Yee' || 
    $_SESSION['user'] == 'Khadijah.Udhayana' || 
    $_SESSION['user'] == 'Nurtria.Rahmadi' || 
    $_SESSION['user'] == 'Jetwadee.Phanthanachai' || 
    $_SESSION['user'] == 'Nguyen.Bich' || 
    $_SESSION['user'] == 'Yuana.Delvika' || 
    $_SESSION['user'] == 'Kay.Soe' || 
    $_SESSION['user'] == 'Moh.Myint' || 
    $_SESSION['user'] == 'Deborah.Mozes') {
    header("Location:../Profile.php");
    exit(); // Ensure script execution stops after redirection
}  else if (in_array($_SESSION['user'], [
    'IIT Jammu', 
    'IIT Varanasi', 
    'IIT Bhilai', 
    'IIT Bhubaneswar', 
    'IIT Bombay', 
    'IIT Delhi', 
    'IIT Dhanbad', 
    'IIT Dharwad', 
    'IIT Gandhinagar', 
    'IIT Goa', 
    'IIT Guwahati', 
    'IIT Hyderabad', 
    'IIT Indore', 
    'IIT Jammu', 
    'IIT Jodhpur', 
    'IIT Kanpur', 
    'IIT Kharagpur', 
    'IIT Madras', 
    'IIT Mandi', 
    'IIT Palakkad', 
    'IIT Patna', 
    'IIT Roorkee', 
    'IIT Ropar', 
    'IIT Tirupati', 
    'IIT Varanasi'
])) {
    header("Location: ../DiaHome.php");
    exit(); // Ensure script execution stops after redirection
} else if (in_array($_SESSION['user'], ['Prof. Ajit Kumar Mishra', 'Prof. Swasti Mishra', 'Prof. Sabyasachi Ghosh', 'Prof. Sabyasachi Ghosh', 'Prof. Naresh Chandra Sahu', 'Prof. Siddhartha Ghosh', 'Prof. Mrinal Kaul', 'Prof. C. D. Sebastian', 'Prof. Amber Shrivastava', 'Prof. Sahana V. Murthy', 'Prof. Vivek Kumar', 'Prof. Nomesh Bolia', 'Prof. Sagnik Sen', 'Prof. Rajshree Bedmata', 'Prof. Subrahmanyam', 'Prof. Krishnamohan', 'Prof. Subrahmanyam', 'Prof. Asif Quershi', 'Prof. Bhabani Shankar Mallik', 'Prof. Suman Kundu', 'Prof. Parichay Patra', 'Prof. R. Gurunath', 'Prof. Chaithra Puttaswamy', 'Prof. N. P. Sudharshana', 'Prof. Pabitra Mitra', 'Prof. Anil Prabhakar', 'Prof. Sreekumar N', 'Prof. Rajesh Singh', 'Prof. Ramakrishna Bag', 'Prof. Smriti Singh', 'Prof. Smriti Singh', 'Prof. Abhinav Dhall', 'Prof. Rahul Thakur', 'Prof. Usha Lenka', 'Prof. Manoj Tripathy', 'Prof. Mitthan Lal Kansal', 'Prof. Akshay Dvivedi', 'Prof. Indranil Lahiri', 'Prof. Sneha Singh'])) {
    header("Location: ../StudentData.php");
    exit(); // Ensure script execution stops after redirection
}
 else if ($_SESSION['user'] == 'diacoordinator') {
    header("Location: ../Coordinator.php");
    exit(); // Ensure script execution stops after redirection
} else {
    // Handle the case where the user is not recognized
    echo "Unauthorized access";
    exit();
}

 


}
 
?>
