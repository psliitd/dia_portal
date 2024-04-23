<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('Header.php');

$name = "";
$registration_number = "";
$iit_entry_no = "";
$mobile = "";
$email = "";
$gender = "";
$advisor_name = "";
$address = "";
$nationality = "";
$iit_name = "";
$department_name = "";
$joining_date = "";
$joining_date_campus = "";
$personal_mobile = "";
$permanent_email = "";

if(isset($_SESSION["studentid"])){
	$studentid = $_SESSION["studentid"];
	$query = "SELECT * FROM profile WHERE studentid='$studentid'";
	$result = mysqli_query($con,$query);
	$numrows = mysqli_num_rows($result);
	if($numrows==1){
		$row = mysqli_fetch_array($result);
		$name = $row['name'];
		$registration_number = $row['registration_number'];
		$iit_entry_no = $row['iit_entry_no'];
		$mobile = $row['mobile'];
		$email = $row['email'];
		$gender = $row['gender'];
		$advisor_name = $row['advisor_name'];
		$address = $row['address'];
		$nationality = $row['nationality'];
		$iit_name = $row['iit_name'];
		$department_name = $row['department_name'];
		$joining_date = $row['joining_date'];
		$joining_date_campus = $row['joining_campus_date'];	
		$personal_mobile = $row['personal_mobile'];
		$permanent_email = $row['permanent_email'];
	}
	else{
		header("Location:../Profile.php");
	}
}
else{
	header("Location:../Profile.php");
}

if(isset($_SESSION["studentid"])){
    $studentid = $_SESSION["studentid"];
    $query = "SELECT photo_url FROM profile WHERE studentid='$studentid'";
    $result = mysqli_query($con,$query);
    $numrows = mysqli_num_rows($result);
    if($numrows==1){
        $row = mysqli_fetch_array($result);
        $photo_url = $row['photo_url'];
    }
}

?>

<style>
        body {
            font-size: 15px; /* Adjust the font size as needed */
        }

        /* Add other global styles if needed */
        .hidden {
            display: none;
        }

        .xn-logo a:hover {
            color: white !important;
            background-color: red !important;
        }
		/* Style for the panel */
		.panel {
        margin-top: 20px;
    }

   
    </style>
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

										 
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title">Upload Profile Photo</h3>
												</div>
												<div class="panel-body">
													<form action="api/upload_photo.php" method="post" enctype="multipart/form-data" class="form-horizontal">
														<div class="form-group">
															<label class="col-md-3 control-label">Choose Photo</label>
															<div class="col-md-6">
															<input type="file" name="photo" id="photo" class="form-control" style="width: 200px;">

																<br>
																<button type="submit" class="btn btn-primary" style="margin-left: 10px;">Upload</button>

															</div>
															<div class="col-md-3">
															<img src="<?php echo $photo_url; ?>" alt="Profile Photo" class="img-thumbnail" style="width: 150px; height: 200px; margin-left: 10px;">

															</div>
														</div>
														<div class="form-group">
															<div class="col-md-offset-3 col-md-9">
																
															</div>
														</div>
													</form>
												</div>
											</div>
											 





                            <!-- START SIMPLE DATATABLE -->
                            <div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Profile Data</h3>
								 
							</div>
							
							<a href="ProfileEdit.php" style="float:right;margin-top:10px;margin-right:10px">
							<button type="button" class="btn btn-success" style="font-size: 18px; padding: 8px 20px;">Edit</button>
							</a>
 
					
									 
								

					
								<div class="panel-body">
									<div class="row">
										<div class="col-md-6">
											 <div class="form-group">
												<label class="col-md-3 control-label">Name</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-user"></span></span>&nbsp
														<?php echo $name; ?>
													</div> 
												 </div>
											</div>
											</br></br>
											<div class="form-group">
												<label class="col-md-3 control-label">Mobile No</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-mobile"></span></span>&nbsp
														<?php echo $mobile; ?>
													</div> 
												 </div>
											</div>
											</br></br>
											<div class="form-group">
												<label class="col-md-3 control-label">Personal Mobile No</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-mobile"></span></span>&nbsp
														<?php echo $personal_mobile; ?>
													</div> 
												 </div>
											</div>
											</br></br>
											<div class="form-group">
												<label class="col-md-3 control-label">Gender</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-user"></span></span>&nbsp
														<?php echo $gender; ?>
													</div> 
												 </div>
											</div>
											</br></br>
											<div class="form-group">
												<label class="col-md-3 control-label">Address</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-home"></span></span>&nbsp
														<?php echo $address; ?>
													</div> 
												 </div>
											</div>
											</br></br>
											<div class="form-group">
												<label class="col-md-3 control-label">IIT Name</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-building"></span></span>&nbsp
														<?php echo $iit_name; ?>
													</div> 
												 </div>
											</div>
											</br></br>
											<div class="form-group">
												<label class="col-md-3 control-label">Date of Joining</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-calendar"></span></span>&nbsp
														<?php echo $joining_date; ?>
													</div> 
												 </div>
											</div>
										</div>
										<div class="col-md-6">
											 <div class="form-group">
												<label class="col-md-3 control-label">Application Number</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-calendar"></span></span>&nbsp
														<?php echo $registration_number; ?>
													</div> 
												 </div>
											</div>
											</br></br>
										
											<div class="form-group">
												<label class="col-md-3 control-label">IIT Entry No</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-calendar"></span></span>&nbsp
														<?php echo $iit_entry_no; ?>
													</div> 
												 </div>
											</div>
											</br></br>
											<div class="form-group">
												<label class="col-md-3 control-label">Email</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-calendar"></span></span>&nbsp
														<?php echo $email; ?>
													</div> 
												 </div>
											</div>
											</br></br>
											<div class="form-group">
												<label class="col-md-3 control-label">Permanent Email</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-calendar"></span></span>&nbsp
														<?php echo $permanent_email; ?>
													</div> 
												 </div>
											</div>
											</br></br>
											<div class="form-group">
												<label class="col-md-3 control-label">Advisor Name</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-calendar"></span></span>&nbsp
														<?php echo $advisor_name; ?>
													</div> 
												 </div>
											</div>
											</br></br>
											<div class="form-group">
												<label class="col-md-3 control-label">Nationality</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-calendar"></span></span>&nbsp
														<?php echo $nationality; ?>
													</div> 
												 </div>
											</div>
											</br></br>
											<div class="form-group">
												<label class="col-md-3 control-label">Department Name</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-calendar"></span></span>&nbsp
														<?php echo $department_name; ?>
													</div> 
												 </div>
											</div>
											</br></br>
											<div class="form-group">
												<label class="col-md-3 control-label">Date of Joining on Campus</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-calendar"></span></span>&nbsp
														<?php echo $joining_date_campus; ?>
													</div> 
												 </div>
											</div>
										</div>
									</div>
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



    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- END PLUGINS -->

        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="js/plugins/tableexport/tableExport.js"></script>
		<script type="text/javascript" src="js/plugins/tableexport/jquery.base64.js"></script>
		<script type="text/javascript" src="js/plugins/tableexport/html2canvas.js"></script>
		<script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/sprintf.js"></script>
		<script type="text/javascript" src="js/plugins/tableexport/jspdf/jspdf.js"></script>
		<script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/base64.js"></script>
        <!-- END PAGE PLUGINS -->

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/actions.js"></script>
        <!-- END TEMPLATE -->

    </body>
</html>