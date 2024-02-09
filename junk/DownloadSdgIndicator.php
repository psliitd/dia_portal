<?php

require('util/Connection.php');

// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
$fileName = "DistrictSdgTemplate_" . date('d-m-Y') . ".csv"; 

$query = "SELECT indicator FROM targets WHERE 1";
$result = mysqli_query($con,$query);
$numrows = mysqli_num_rows($result);
$columns = array();

if($numrows>0){
	array_push($columns,"District Name");
	while($row = mysqli_fetch_array($result)){
		array_push($columns,$row['indicator']);
	}
}

$query = "SELECT name FROM districts WHERE 1";
$result = mysqli_query($con,$query);
$numrows = mysqli_num_rows($result);
$rows = array();

if($numrows>0){
	while($row = mysqli_fetch_array($result)){
		array_push($rows,$row['name']);
	}
}

array_push($rows,"NationalTarget");
 
// Display column names as first row 
$excelDataColumns = implode(",", array_values($columns)) . "\n";


foreach ($rows as $value) {
	$excelDataColumns .=  $value. "\n";
}

 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelDataColumns; 
 
exit;

?>