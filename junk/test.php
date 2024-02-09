<?php

require('util/connection.php');


if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
		
		$query = "SELECT count(indicator) as total FROM targets WHERE 1";
		$result = mysqli_query($con, $query);
		$data = mysqli_fetch_assoc($result);
		
		$indicatorSize = $data['total'] + 1;
		
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            
            $userId = "";
			$i = 0;
			while($i<$indicatorSize){
				if (isset($column[$i])) {
					echo mysqli_real_escape_string($con, $column[$i]);
				}
				$i = $i + 1;
			}
            echo "</br>";
            /*
            $sqlInsert = "INSERT into users (userId,userName,password,firstName,lastName)
                   values (?,?,?,?,?)";
            $paramType = "issss";
            $paramArray = array(
                $userId,
                $userName,
                $password,
                $firstName,
                $lastName
            );
            $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
            
            if (! empty($insertId)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }*/
        }
    }
}
?>


<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<h2>Import CSV file into Mysql using PHP</h2>

    <div id="response"
        class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
        <?php if(!empty($message)) { echo $message; } ?>
        </div>
    <div class="outer-scontainer">
        <div class="row">
            <form class="form-horizontal" action="" method="post"
                name="frmCSVImport" id="frmCSVImport"
                enctype="multipart/form-data">
                <div class="input-row">
                    <label class="col-md-4 control-label">Choose CSV
                        File</label> <input type="file" name="file"
                        id="file" accept=".csv">
                    <button type="submit" id="submit" name="import"
                        class="btn-submit">Import</button>
                    <br/>
                </div>
            </form>
        </div>
            <table id='userTable'>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>

                </tr>
            </thead>
				<tbody>
                </tbody>
        </table>
    </div>
	
<script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {
		console.log("here1");
	    $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
		console.log("here2");
        if (!regex.test($("#file").val().toLowerCase())) {
        	    $("#response").addClass("error");
        	    $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
			console.log("here3");
            return false;
        }
		console.log("here4");
        return true;
    });
});
</script>