<?php
require('util/Connection.php');
require('util/SupervisorSessionCheck.php');
require('SupervisorHeader.php');

$name = "";
$faculty_id = "";
$mobile = "";
$email = "";
$gender = "";
$nationality = "";
$iit_name = "";
$department_name = "";

// if(isset($_SESSION["supervisorid"])){
// 	$supervisorid = $_SESSION["supervisorid"];
// 	$query = "SELECT * FROM supervisor WHERE uid='$supervisorid'";
// 	$result = mysqli_query($con,$query);
// 	$numrows = mysqli_num_rows($result);
// 	if($numrows==1){
// 		$row = mysqli_fetch_array($result);
// 		$name = $row['name'];
// 		$faculty_id = $row['faculty_id'];
// 		$mobile = $row['mobile'];
// 		$email = $row['email'];
// 		$gender = $row['gender'];
// 		$nationality = $row['nationality'];
// 		$iit_name = $row['iit_name'];
// 		$department_name = $row['department'];
// 	}
// 	else{
// 		header("Location:../SupervisorProfile.php");
// 	}
// }
// else{
// 	header("Location:../SupervisorProfile.php");
// }


?>

<script>
	function setSelectedValue(obj_value,valueToSet) {
		var obj = document.getElementById(obj_value);
		for (var i = 0; i < obj.options.length; i++) {
			if (obj.options[i].text.toLowerCase()== valueToSet.toLowerCase()) {
				obj.options[i].selected = true;
				return;
			}
		}
	}
</script>


                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Profile</li>
                </ul>
                <!-- END BREADCRUMB -->


				<!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <div class="row">
                        <div class="col-md-12">

                            <!-- START SIMPLE DATATABLE -->
                            <div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Profile Data</h3>
							</div>
								<div class="panel-body">
									<form action="api/SupervisorProfileEdit.php" method="POST" class="form-horizontal" enctype = "multipart/form-data">
									<div class="row">
										<div class="col-md-6">
											 <div class="form-group">
												<label class="col-md-3 control-label">Name</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name  ?>" />
													</div> 
												 </div>
											</div>
											</br>
											<div class="form-group">
												<label class="col-md-3 control-label">Mobile No</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-mobile"></span></span>
                                                        <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $mobile  ?>" />
													</div> 
												 </div>
											</div>
											</br>
											<div class="form-group">
												<label class="col-md-3 control-label">Gender</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-user"></span></span>
														<select class="form-control" name="gender" id="gender">
														<option value='male' style='color:#000'>Male</option>
														<option value='female' style='color:#000'>Female</option>
														</select>
													</div> 
												 </div>
											</div>
											</br>
											<div class="form-group">
												<label class="col-md-3 control-label">IIT Name</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-building"></span></span>
														<select class="form-control" name="iit_name" id="iit_name" readonly style="color:#000">
														<?php 
														$query = "SELECT name from iit_name WHERE 1";
														$result = mysqli_query($con,$query);
														$numrows = mysqli_num_rows($result);
														while($row = mysqli_fetch_array($result )){
															$name = $row['name'];
															echo "<option value='$name' style='color:#000'>$name</option>";
														}
														?>
														</select>
													</div> 
												 </div>
											</div>
										</div>
										<div class="col-md-6">
											 <div class="form-group">
												<label class="col-md-3 control-label">Faculty Id</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-check"></span></span>
                                                        <input type="text" class="form-control" id="facultyid" name="facultyid" value="<?php echo $faculty_id  ?>" />
													</div> 
												 </div>
											</div>
											</br>
											<div class="form-group">
												<label class="col-md-3 control-label">Email</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-envelope"></span></span>
														<input type="text" class="form-control" style="color:#000" id="email" name="email" value="<?php echo $email ?>"   />
													</div> 
												 </div>
											</div>
											</br>
											<div class="form-group">
												<label class="col-md-3 control-label">Nationality</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-flag"></span></span>
														<select class="form-control" id="nationality" name="nationality">
														<option value="indian" style='color:#000'>Indian</option>
														 
														</select>
													</div> 
												 </div>
											</div>
											</br>
											<div class="form-group">
												<label class="col-md-3 control-label">Department Name</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-building"></span></span>
														<!-- <select class="form-control" name="department_name" id="department_name"> -->
														<input class="form-control" name="department_name" id="department_name"/>
														<?php 
														// $query = "SELECT name from department WHERE 1";
														// $result = mysqli_query($con,$query);
														// $numrows = mysqli_num_rows($result);
														// while($row = mysqli_fetch_array($result )){
														// 	$name = $row['name'];
														// 	echo "<option value='$name' style='color:#000'>$name</option>";
														// }
														?>
														<!-- </select> -->
													</div> 
												 </div>
											</div>
											</br></br>
												<button class="btn btn-primary pull-right">Submit</button>
										</div>
									</div>
									</form>
                                </div>
                            </div>
                            <!-- END SIMPLE DATATABLE -->

                        </div>
                    </div>

                </div>
                <!-- PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->


		<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->                

        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>  
		<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>                
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        		
        <!-- END PAGE PLUGINS -->

        <!-- START TEMPLATE -->   
		
        <script type="text/javascript" src="js/jquery.table2excel.min.js"></script>
	

        <!-- END TEMPLATE -->
		
		<!-- START TEMPLATE -->
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->

        <!-- END TEMPLATE -->
		
		<?php 
		
			if(isset($_SESSION["studentid"])){
				$studentid = $_SESSION["studentid"];
				$query = "SELECT * FROM profile WHERE studentid='$studentid'";
				$result = mysqli_query($con,$query);
				$numrows = mysqli_num_rows($result);
				if($numrows==1){
					$row = mysqli_fetch_array($result);
					
					echo "<script>setSelectedValue('gender','{$row['gender']}'); </script>";
					echo "<script>setSelectedValue('advisor_name','{$row['advisor_name']}'); </script>";
					echo "<script>setSelectedValue('department_name','{$row['department_name']}'); </script>";
					echo "<script>setSelectedValue('nationality','{$row['nationality']}'); </script>";
					echo "<script>setSelectedValue('iit_name','{$row['iit_name']}'); </script>";
				}
			}
		
		?>
		
		<script>
		function post(params,file) {

			method = "post";
			path = file;

			var form = document.createElement("form");
			form.setAttribute("method", method);
			form.setAttribute("action", path);

			for(var key in params) {
				if(params.hasOwnProperty(key)) {
					var hiddenField = document.createElement("input");
					hiddenField.setAttribute("type", "hidden");
					hiddenField.setAttribute("name", key);
					hiddenField.setAttribute("value", params[key]);

					form.appendChild(hiddenField);
				 }
			}

			document.body.appendChild(form);
			form.submit();
		}

		function delete_entry(temp_id){
			post({uid: temp_id} ,"api/TargetDelete.php");
		}

		function edit_entry(temp_id){
			post({uid: temp_id} ,"TargetEdit.php");
		}



		</script>
    </body>
</html>
