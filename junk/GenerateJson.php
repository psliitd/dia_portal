<?php

require("util/connection.php");

$response = array();

### Colour Function ###
function colorCode($value){
	if($value<49.99){
		return "#FF6666";
	}
	else if($value>=50 and $value<=64.99){
		return "#FF6666";
	}
	else if($value>=65 and $value<=99.99){
		return "#33FF33";
	}
	return "#003366";
}


### Indicator Sub JSON start ###

$query = "SELECT * FROM targets WHERE 1";
$result = mysqli_query($con, $query);
$num_of_rows = mysqli_num_rows($result);
$id_to_indicator = array();
$indicator_standard = array();
$indicator_nature = array();
$indicator_ids = array();
$indicators = array();
$targets = array();

if($num_of_rows>0){
	while($row = mysqli_fetch_array($result))
	{
		$temp = array();
		$temp["Target"] = $row['target'];
		$temp["Indicator"] = $row['indicator'];
		$temp["Source"] = $row['source'];
		$id_to_indicator[$row['id']] = $row['indicator'];
		if(!in_array($row['target'],$targets)){
			array_push($targets, $row['target']);
		}
		$indicator_nature[$row['id']] = $row['nature'];
		$indicator_standard[$row['id']] = $row['indicatorvalue'];
		
		array_push($indicator_ids, $row['id']);
		array_push($indicators, $temp);
	}
}
$response["Indicators"] = $indicators;
$response["Targets"] = $targets;

### Indicator Sub JSON end ###


### DistrictIndicator Sub JSON starts ###

$query = "SELECT * FROM district_year";
$result = mysqli_query($con, $query);
$num_of_rows = mysqli_num_rows($result);
$districtIndicator = array();


if($num_of_rows>0){
	while($row = mysqli_fetch_array($result))
	{
		$year = $row['year'];
		$temp = array();
		$temp["Year"] = $year;
		$indicators = array();
		
		$tableName = "districtindicator_".$year;
		
		$count = count($indicator_ids);
		$i = 0;
		while($i<$count){
			$data = array();
			$indicator = array();
			$query_ = "SELECT districtindicator,".$indicator_ids[$i]." FROM ".$tableName." WHERE 1";
			$result_ = mysqli_query($con, $query_);
			$average = 0;
			$districtCount = 0;
			$maxValue = 0;
			$minValue = 99999;
			while($row_ = mysqli_fetch_array($result_))
			{
				$temp_ = array();
				$temp_["Name"] = $row_['districtindicator'];
				$temp_["Value"] = $row_[$indicator_ids[$i]];
				$temp_["Color"] = colorCode($row_[$indicator_ids[$i]]);
				$average = $average + (int)($row_[$indicator_ids[$i]]);
				$districtCount = $districtCount + 1;
				$maxValue = max($maxValue, $row_[$indicator_ids[$i]]);
				$minValue = min($minValue, $row_[$indicator_ids[$i]]);
				array_push($data,$temp_);
			}
			$indicator["Name"] = $id_to_indicator[$indicator_ids[$i]];
			$indicator["Average"] = $average/$districtCount;
			$indicator["AverageColor"] = colorCode($average/$districtCount);
			$indicator["Standard"] = $indicator_standard[$indicator_ids[$i]];
			$indicator["StandardColor"] = colorCode($indicator_standard[$indicator_ids[$i]]);
			if($indicator_nature[$indicator_ids[$i]]==1){
				$indicator["Best"] = $maxValue;
				$indicator["Worst"] = $minValue;
			}
			else{
				$indicator["Best"] = $minValue;
				$indicator["Worst"] = $maxValue;
			}
			$indicator["Districts"] = $data;
			
			$i = $i + 1;
			array_push($indicators, $indicator);
		}
		$temp["Indicator"] = $indicators;
		array_push($districtIndicator, $temp);
	}
}

$response['DistrictIndicators'] = $districtIndicator;

### DistrictIndicator Sub JSON end ###

### StateIndicator Sub JSON starts ###

$query = "SELECT * FROM state_year";
$result = mysqli_query($con, $query);
$num_of_rows = mysqli_num_rows($result);
$stateIndicator = array();


if($num_of_rows>0){
	while($row = mysqli_fetch_array($result))
	{
		$year = $row['year'];
		$temp = array();
		$temp["Year"] = $year;
		$indicators = array();
		
		$tableName = "stateindicator_".$year;
		
		$count = count($indicator_ids);
		$i = 0;
		while($i<$count){
			$data = array();
			$indicator = array();
			$average = 0;
			$stateCount = 0;
			$query_ = "SELECT stateindicator,".$indicator_ids[$i]." FROM ".$tableName." WHERE 1";
			$result_ = mysqli_query($con, $query_);
			$rajasthan = 0;
			$maxValue = 0;
			$minValue = 99999;
			while($row_ = mysqli_fetch_array($result_))
			{
				$temp_ = array();
				$temp_["Name"] = $row_['stateindicator'];
				$temp_["Value"] = $row_[$indicator_ids[$i]];
				$temp_["Color"] = colorCode($row_[$indicator_ids[$i]]);
				$average = $average + $row_[$indicator_ids[$i]];
				$stateCount = $stateCount + 1;
				$maxValue = max($maxValue, $row_[$indicator_ids[$i]]);
				$minValue = min($minValue, $row_[$indicator_ids[$i]]);
				if($row_['stateindicator']=="Rajasthan"){
					$rajasthan = $row_[$indicator_ids[$i]];
				}
				array_push($data,$temp_);
			}
			$indicator["Name"] = $id_to_indicator[$indicator_ids[$i]];
			$indicator["Average"] = $average/$stateCount;
			$indicator["AverageColor"] = colorCode($average/$stateCount);
			$indicator["Standard"] = $indicator_standard[$indicator_ids[$i]];
			$indicator["StandardColor"] = colorCode($indicator_standard[$indicator_ids[$i]]);
			$indicator["Rajasthan"] = $rajasthan;
			$indicator["RajasthanColor"] = colorCode($rajasthan);
			
			if($indicator_nature[$indicator_ids[$i]]==1){
				$indicator["Best"] = $maxValue;
			}
			else{
				$indicator["Best"] = $minValue;
			}
			$indicator["States"] = $data;
			$i = $i + 1;
			array_push($indicators, $indicator);
		}
		$temp["Indicator"] = $indicators; 
		array_push($stateIndicator, $temp);
	}
}

$response['StateIndicators'] = $stateIndicator;

### StateIndicator Sub JSON end ###

### SDG Sub JSON starts ###

$query = "SELECT * FROM sdg_year";
$result = mysqli_query($con, $query);
$num_of_rows = mysqli_num_rows($result);
$sdgIndicator = array();


if($num_of_rows>0){
	while($row = mysqli_fetch_array($result))
	{
		$year = $row['year'];
		$temp = array();
		$temp["Year"] = $year;
		$indicators = array();
		$district_value_map = array();
		$district_names = array();
		$tableName = "sdgindicator_".$year;

		$count = count($indicator_ids);
		$i = 0;
		while($i<$count){
			$data = array();
			$indicator = array();
			
			### query to find maximum value of column
			$query = "SELECT MAX(".$indicator_ids[$i].") AS maxTarget FROM ".$tableName." WHERE sdgindicator <> 'NationalTarget'";
			$result = mysqli_query($con,$query);
			$maxValue = mysqli_fetch_array($result)['maxTarget'];
			
			$query = "SELECT MIN(".$indicator_ids[$i].") AS minTarget FROM ".$tableName." WHERE sdgindicator <> 'NationalTarget'";
			$result = mysqli_query($con,$query);
			$minValue = mysqli_fetch_array($result)['minTarget'];
			
			$query = "SELECT ".$indicator_ids[$i]." AS nationalTarget FROM ".$tableName." WHERE sdgindicator='NationalTarget'";
			$result = mysqli_query($con,$query);
			$nationalTarget = mysqli_fetch_array($result)['nationalTarget'];
			
			$query_ = "SELECT sdgindicator,".$indicator_ids[$i]." FROM ".$tableName." WHERE 1";
			$result_ = mysqli_query($con, $query_);
			while($row_ = mysqli_fetch_array($result_))
			{
				$temp_ = array();
				$temp_["Name"] = $row_['sdgindicator'];
				
				$calculatedValue = 0;
	
				if($indicator_nature[$indicator_ids[$i]]==1){
					//sdg is positive
					$calculatedValue = (($row_[$indicator_ids[$i]]-$minValue)/($nationalTarget-$minValue))*100;
				}
				else{
					//sdg is negative
					$calculatedValue = (1 - (($row_[$indicator_ids[$i]]-$nationalTarget)/($maxValue-$nationalTarget)))*100;
				}
				
				$calculatedValue = min($calculatedValue,100);
				$temp_["Value"] = $calculatedValue;
				$temp_["Color"] = colorCode($calculatedValue);
				
				if(array_key_exists($row_['sdgindicator'],$district_value_map)){
					$district_value_map[$row_['sdgindicator']] = $district_value_map[$row_['sdgindicator']] + $calculatedValue;
				}
				else{
					$district_value_map[$row_['sdgindicator']] = $calculatedValue;
					array_push($district_names, $row_['sdgindicator']);
				}
				array_push($data,$temp_);
			}
			$indicator["Name"] = $id_to_indicator[$indicator_ids[$i]];
			$indicator["States"] = $data;
			$i = $i + 1;
			array_push($indicators, $indicator);
		}
		$temp["Indicator"] = $indicators;
		$averageArray = array();
		for($i=0;$i<count($district_names);$i++){
			$average_temp = array();
			$average_temp["Name"] = $district_names[$i];
			$average_temp["Value"] = (string)($district_value_map[$district_names[$i]]/$count);
			$average_temp["Color"] = colorCode($district_value_map[$district_names[$i]]/$count);
			array_push($averageArray, $average_temp);
		}
		$temp["Average"] = $averageArray;
		array_push($sdgIndicator, $temp);
	}
}

$response['SdgIndicators'] = $sdgIndicator;

### SDG Sub JSON end ###

$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);

header("Location:Target.php");

?>






