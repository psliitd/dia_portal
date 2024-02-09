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


 
 
if(isset($_SESSION["user"])){
	$user = $_SESSION["user"];
	$query = "SELECT * FROM supervisor WHERE username='$user'";
	$result = mysqli_query($con,$query);
	$numrows = mysqli_num_rows($result);
	if($numrows==1){
		$row = mysqli_fetch_array($result);
		$name = $row['name'];
		$faculty_id = $row['faculty_id'];
		$mobile = $row['mobile'];
		$email = $row['email'];
		$gender = $row['gender'];
		$nationality = $row['nationality'];
		$iit_name = $row['iit_name'];
		$department_name = $row['department'];
	}
	 
}


?>


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
							<a href="SupervisorProfileEdit.php" style="float:right;margin-top:10px;margin-right:13px"><button type="button" class="btn btn-success">Edit</button></a>
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
												<label class="col-md-3 control-label">IIT Name</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-building"></span></span>&nbsp
														<?php echo $iit_name; ?>
													</div> 
												 </div>
											</div>
										</div>
										<div class="col-md-6">
											 <div class="form-group">
												<label class="col-md-3 control-label">Faculty Number</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-calendar"></span></span>&nbsp
														<?php echo $faculty_id; ?>
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
