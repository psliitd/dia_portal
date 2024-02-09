<?php

require('../util/Connection.php');
require('../structures/District.php');
require('../util/SessionFunction.php');

if(!SessionCheck()){
	return;
}

$District = new District;

$District->setName(str_replace("'","",$_POST['name']));
$District->setId(str_replace("'","",$_POST['uid']));

$query = $District->update($District);
$result = mysqli_query($con,$query);

mysqli_close($con);

if($result){
	header("Location:../District.php");
}
else{
   echo "error";
}

?>
