<?php

require('../util/connection.php');

if (isset($_POST["submit"]) and isset($_POST["year"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
		$year = $_POST["year"];
		
		### check if year already exist ###
		$query = "SELECT * FROM district_year WHERE year='".$year."'";
		$result = mysqli_query($con, $query);
		$num_of_rows = mysqli_num_rows($result);
		if($num_of_rows>0){
			echo "Year Already Exist";
			return;
		}
		
		$uniqueId = uniqid();
		$query = "INSERT INTO district_year VALUES ('".$uniqueId."','".$_POST['year']."')";
		mysqli_query($con,$query);
		
		$query = "SELECT count(indicator) as total FROM targets WHERE 1";
		$result = mysqli_query($con, $query);
		$data = mysqli_fetch_assoc($result);
		
		$query = "SELECT * FROM targets WHERE 1";
		$result = mysqli_query($con, $query);
		$dict = array();
		
		while($row = mysqli_fetch_array($result)){
			$dict[$row['indicator']] = $row['id'];
		}
		
		### command to create table ###
		$tableName = "DistrictIndicator_".$_POST['year'];
		$query = "CREATE TABLE IF NOT EXISTS ".$tableName."( districtindicator  varchar(255))";
		//echo $query;
		mysqli_query($con, $query);
		
		$indicatorSize = $data['total'] + 1;
		$createTable = 0;
		
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $userId = "";
			$i = 0;
			$temp = "";
			while($i<$indicatorSize){
				if($createTable==0 and $i>0 and isset($column[$i])){
					$query = "ALTER TABLE ".$tableName." ADD ".$dict[$column[$i]]." varchar(255)";
					mysqli_query($con, $query);
				}
				else if(isset($column[$i])){
					$temp = $temp."'".strval($column[$i])."',";
				}
				$i = $i + 1;
			}
			if($createTable==1){
				$temp = substr($temp,0,strlen($temp)-1);
				$sqlInsert = "INSERT into ".$tableName." VALUES (".$temp.")";
				mysqli_query($con, $sqlInsert);
			}
			$createTable = 1;
        }
		header("Location:../DistrictIndicator.php");
    }
}
?>