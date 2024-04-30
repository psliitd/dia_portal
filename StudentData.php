<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('SupervisorHeader.php');

$advisor_name = "";
$iit_name = "";

if(isset($_SESSION["user"])){
	$user = $_SESSION["user"];
	echo $user;
	$query = "SELECT * FROM supervisor WHERE username='$user'";
	$result = mysqli_query($con,$query);
	$numrows = mysqli_num_rows($result);
	if($numrows==1){
		$row = mysqli_fetch_array($result);
		$advisor_name = $row['username'];
		echo $advisor_name;
		$iit_name = $row['iit_name'];
		echo $iit_name;
	}
	 
}
 




?>
<style>
	  body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            font-size: 14px;
        }
</style>

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Student Data</li>
                </ul>
                <!-- END BREADCRUMB -->


				<!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <div class="row">
                        <div class="col-md-12">
						
						
                            <!-- START SIMPLE DATATABLE -->
                            <div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Student List</h3>
							</div>
								<div class="panel-body">
									<div class="row">
									
									<div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
												<th>Name</th>
                                                <th>Department</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php

										$query = "SELECT * FROM profile WHERE advisor_name='$advisor_name' AND iit_name='$iit_name'";
										$result = mysqli_query($con,$query);
										$numrows = mysqli_num_rows($result);
										while($row = mysqli_fetch_array($result))
										{
											echo $row['studentid'];
											$temp_id = (string)$row['studentid'];
											
											echo "<tr><td>{$row['name']}</td>".
												"<td>{$row['department_name']}</td>".
												"<td><button class='btn btn-info btn-rounded'><a href='viewSupervisorStudent.php?StudentId={$row['studentid']}'>Summary</a></button></td>".
												"<td><button class='btn btn-info btn-rounded'><a href='viewSupervisorStudentDetails.php?StudentId={$row['studentid']}'>Details</a></button></td></tr>";}

										?>
                                        </tbody>
                                    </table>
                                  </div>
										
                                </div>
                            </div>
                            <!-- END SIMPLE DATATABLE -->

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

		function view_entry(filename, temp_id){
			post({uid: temp_id} ,"StudentDataView.php");				
		}
		
		</script>

    </body>
</html>
