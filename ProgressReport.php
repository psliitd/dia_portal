<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('Header.php');

$studentid = "123";
$studentid = $_SESSION["studentid"];
if(isset($_SESSION["studentid"])){

	$studentid = $_SESSION["studentid"];
	echo $studentid;
	$query = "SELECT * FROM profile WHERE studentid='$studentid'";
	$result = mysqli_query($con,$query);
	$numrows = mysqli_num_rows($result);
	if($numrows==1){
		
	}
	else{
		header("Location:../Profile.php");
	}
}
else{
	header("Location:../Profile.php");
}

 

 

$current_month = date('n');
$current_year = date('Y');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $month = $_POST['month'];
	$studentid = $_SESSION["studentid"];
	
	$month_name = date("F", mktime(0, 0, 0, $month, 1));
    // Validate if the selected month is equal to the current month
    // if ($month != $current_month) {
    //     $error_message = "You can only submit for the current month ($current_month).";
    // } else {
        // Validate stipend received
        $stipend = isset($_POST['stipend_received']) ? intval($_POST['stipend_received']) : 0;
        if (!is_numeric($stipend) || $stipend <= 0  ) {
            $error_message = "Stipend received must be a number greater than 0 ";
        } else {
            // Insert stipend received into the database
            $stmt = $con->prepare("INSERT INTO stipend_received (month, year, stipend,studentid) VALUES (?, ?, ?,?)");
            $stmt->bind_param("siis", $month_name, $current_year, $stipend,$studentid);

            if ($stmt->execute() === TRUE) {
                $success_message = "Stipend received inserted successfully for month $month_name.";
				 
            } else {
                $error_message = "Error inserting stipend received: " . $conn->error;
            }

            // Close statement
            $stmt->close();
        }
    // }
}

 

?>

<!-- <style>
    body {
        font-size: 15px; /* Change the value as needed */
    }
</style> -->

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Progress Report</li>
                </ul>
                <!-- END BREADCRUMB -->


				<!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <div class="row">
                        <div class="col-md-12">

                            <!-- START SIMPLE DATATABLE -->
                            <div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Grades</h3>
							</div>
							<a href="AddGrade.php" style="float:right;margin-top:10px;margin-right:13px" target="_blank"><button type="button" class="btn btn-success">Add Grade Record</button></a>
								<div class="panel-body">
									<div class="row">
									
									<div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
												<th>Subject</th>
                                                <th>Grade</th>
                                                <th>Date</th>
                                                <th>Approved</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php

										$query = "SELECT * FROM grades WHERE studentid='$studentid'";
										$result = mysqli_query($con,$query);
										$numrows = mysqli_num_rows($result);
										while($row = mysqli_fetch_array($result))
										{

											$temp_id = (string)$row['uid'];
											$approved = (string)$row['approved'];
											if($approved=='Approved'){
												$approved = "Approved";
											}
											else{
												$approved = "Pending";
											}
											
											echo "<tr><td>{$row['subject']}</td>".
											"<td>{$row['grade']}</td>".
											"<td>{$row['date']}</td>".
											"<td>{$approved}</td>".
											 "<td> <button class='btn btn-warning btn-rounded' onclick=\"edit_entry('grade','{$temp_id}')\">Edit</button></td>".
											 "<td> <button class='btn btn-danger btn-rounded' onclick=\"delete_entry('grade','{$temp_id}')\">Delete</button></td></tr>";

										}

										?>
                                        </tbody>
                                    </table>
                                  </div>
										
                                </div>
                            </div>
                            <!-- END SIMPLE DATATABLE -->

                        </div>
                    </div>

                </div>
				
				<div class="row">
                        <div class="col-md-12">

                            <!-- START SIMPLE DATATABLE -->
                            <div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Journals</h3>
							</div>
							<a href="AddJournals.php" style="float:right;margin-top:10px;margin-right:13px" target="_blank"><button type="button" class="btn btn-success">Add Journal Record</button></a>
								<div class="panel-body">
									<div class="row">
									
									<div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
												<th>Journal Name</th>
                                                <th>Publish Date</th>
                                                <th>Approved</th>
                                                <th>Journal Website</th>
                                                <th>Journal Link</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php

										$query = "SELECT * FROM journals WHERE studentid='$studentid'";
										$result = mysqli_query($con,$query);
										$numrows = mysqli_num_rows($result);
										while($row = mysqli_fetch_array($result))
										{

											$temp_id = (string)$row['uid'];
											$approved = (string)$row['approved'];
											$journal_website = (string)$row['journal_website'];
											$journal_link = (string)$row['journal_link'];
											if($approved=='Approved'){
												$approved = "Approved";
											}
											else{
												$approved = "Pending";
											}
											
											echo "<tr><td>{$row['journal_name']}</td>".
											"<td>{$row['publish_date']}</td>".
											"<td>{$approved}</td>".
											"<td><a href='{$journal_website}' target='_blank'><button class='btn btn-info btn-rounded'>Journal Website</button></a></td>".
											"<td><a href='{$journal_link}' target='_blank'><button class='btn btn-info btn-rounded'>Journal Link</button></a></td>".
											"<td> <button class='btn btn-warning btn-rounded' onclick=\"edit_entry('journal','{$temp_id}')\">Edit</button></td>".
											"<td> <button class='btn btn-danger btn-rounded' onclick=\"delete_entry('journal','{$temp_id}')\">Delete</button></td></tr>";

										}

										?>
                                        </tbody>
                                    </table>
                                  </div>
										
                                </div>
                            </div>
                            <!-- END SIMPLE DATATABLE -->

                        </div>
                    </div>

                </div>
				
				<div class="row">
                        <div class="col-md-12">

                            <!-- START SIMPLE DATATABLE -->
                            <div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Conference Papers</h3>
							</div>
							<a href="AddPaper.php" style="float:right;margin-top:10px;margin-right:13px" target="_blank"><button type="button" class="btn btn-success">Add Paper Record</button></a>
								<div class="panel-body">
									<div class="row">
									
									<div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
												<th>Paper Title</th>
                                                <th>Presentation Date</th>
                                                <th>Presentation Country</th>
                                                <th>Approved</th>
                                                <th>Paper Website</th>
                                                <th>Paper Link</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php

										$query = "SELECT * FROM papers WHERE studentid='$studentid'";
										$result = mysqli_query($con,$query);
										$numrows = mysqli_num_rows($result);
										while($row = mysqli_fetch_array($result))
										{

											$temp_id = (string)$row['uid'];
											$approved = (string)$row['approved'];
											$paper_website = (string)$row['paper_website'];
											$paper_link = (string)$row['paper_link'];
											if($approved=='Approved'){
												$approved = "Approved";
											}
											else{
												$approved = "Pending";
											}
											
											echo "<tr><td>{$row['paper_name']}</td>".
											 "<td>{$row['presentation_date']}</td>".
											 "<td>{$row['presentation_country']}</td>".
											 "<td>{$approved}</td>".
											 "<td><a href='$paper_website' target='_blank'><button class='btn btn-info btn-rounded'>Paper Website</button></a></td>".
											 "<td><a href='$paper_link' target='_blank'><button class='btn btn-info btn-rounded'>Paper Link</button></a></td>".
											 "<td> <button class='btn btn-warning btn-rounded' onclick=\"edit_entry('paper','{$temp_id}')\">Edit</button></td>".
											 "<td> <button class='btn btn-danger btn-rounded' onclick=\"delete_entry('paper','{$temp_id}')\">Delete</button></td></tr>";

										}

										?>
                                        </tbody>
                                    </table>
                                  </div>
										
                                </div>
                            </div>
                            <!-- END SIMPLE DATATABLE -->

                        </div>
                    </div>

                </div>
				
				<div class="row">
                        <div class="col-md-12">

                            <!-- START SIMPLE DATATABLE -->
                            <div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Patents</h3>
							</div>
							<a href="AddPatent.php" style="float:right;margin-top:10px;margin-right:13px" target="_blank"><button type="button" class="btn btn-success">Add Patent Record</button></a>
								<div class="panel-body">
									<div class="row">
									
									<div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
												<th>Patent Title</th>
                                                <th>Patent Date</th>
                                                <th>Approved</th>
                                                <th>Patent Link</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php

										$query = "SELECT * FROM patent WHERE studentid='$studentid'";
										$result = mysqli_query($con,$query);
										$numrows = mysqli_num_rows($result);
										while($row = mysqli_fetch_array($result))
										{

											$temp_id = (string)$row['uid'];
											$approved = (string)$row['approved'];
											$patent_link = (string)$row['patent_link'];
											if($approved=='Approved'){
												$approved = "Approved";
											}
											else{
												$approved = "Pending";
											}
											
											echo "<tr><td>{$row['patent_title']}</td>".
											 "<td>{$row['patent_grade']}</td>".
											 "<td>{$approved}</td>".
											 "<td><a href='$patent_link' target='_blank'><button class='btn btn-info btn-rounded'>Patent Link</button></a></td>".
											 "<td> <button class='btn btn-warning btn-rounded' onclick=\"edit_entry('patent','{$temp_id}')\">Edit</button></td>".
											 "<td> <button class='btn btn-danger btn-rounded' onclick=\"delete_entry('patent','{$temp_id}')\">Delete</button></td></tr>";

										}

										?>
                                        </tbody>
                                    </table>
                                  </div>
										
                                </div>
                            </div>
                            <!-- END SIMPLE DATATABLE -->

                        </div>
                    </div>

                </div>
                <!-- PAGE CONTENT WRAPPER -->
			
				<div class="row">
                        <div class="col-md-12">

                            <!-- START SIMPLE DATATABLE -->
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title">Last Stipend Received</h3>
										</div>
										<div class="panel-body">
											<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
												<?php if(!empty($error_message)) { ?>
													<div style="color: red;"><?php echo $error_message; ?></div>
												<?php } ?>
												<?php if(!empty($success_message)) { ?>
													<div style="color: green;"><?php echo $success_message; ?></div>
												<?php } ?>
												<label for="month">Month and Year:</label>
												<select id="month" name="month">
													<?php for ($i = 1; $i <= 12; $i++) { 
														$month = date('F', mktime(0, 0, 0, $i, 1));
														?>
														<option value="<?php echo $i; ?>"><?php echo $month; ?></option>
													<?php } ?>
												</select>
												<label for="year">Year:</label>
												<select id="year" name="year">
													<?php 
													$currentYear = date("Y");
													for ($i = $currentYear; $i <= $currentYear + 10; $i++) {
														echo '<option value="'.$i.'">'.$i.'</option>';
													}
													?>
												</select>
     
												<br><br>
												<?php if (!empty($previous_month_data)) { ?>
													<table>
														<tr>
															<th>Month</th>
															<th>Stipend Received</th>
														</tr>
														<?php foreach ($previous_month_data as $month => $stipend) { ?>
															<tr>
																<td><?php echo date('F Y', mktime(0, 0, 0, $month, 1)); ?></td>
																<td><?php echo $stipend; ?></td>
															</tr>
														<?php } ?>
													</table>
													<br>
												<?php } ?>
												<label for="stipend_received">Stipend Received:</label>
												<input type="number" id="stipend_received" name="stipend_received" min="1"   required>
												<input type="submit" value="Submit">
											</form>
										</div>
									</div>
								</div>
							</div>
                            <!-- END SIMPLE DATATABLE -->
                        </div>
                    </div>

                </div>


			<div class="row">
                        <div class="col-md-12">

                            <!-- START SIMPLE DATATABLE -->
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title">Stipend Received Data</h3>
										</div>
										<div class="panel-body">
											<?php
											$sql = "SELECT month, stipend, year FROM stipend_received where studentid='$studentid'";
											$result = $con->query($sql);

											// Check if the query returned any rows
											if ($result->num_rows > 0) {
												// Output table structure
												echo '<table class="table">';
												echo '<thead><tr><th>Month</th><th>Stipend</th><th>Year</th></tr></thead>';
												echo '<tbody>';

												// Fetch and display each row of the result set
												while ($row = $result->fetch_assoc()) {
													echo "<tr><td>{$row['month']}</td><td>{$row['stipend']}</td><td>{$row['year']}</td></tr>";
												}

												echo '</tbody></table>';
											} else {
												echo "No data found.";
											}
											?>
										</div>
									</div>
								</div>
							</div>

                            <!-- END SIMPLE DATATABLE -->
                        </div>
                    </div>
																	
                </div>

            </div>


            </div>
            <!-- END PAGE CONTENT -->

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
		
		function edit_entry(filename, temp_id){
			if(filename=="patent"){
				post({uid: temp_id} ,"EditPatent.php");				
			}
			else if(filename=="grade"){
				post({uid: temp_id} ,"EditGrade.php");				
			}
			else if(filename=="journal"){
				post({uid: temp_id} ,"EditJournal.php");
			}
			else if(filename=="paper"){
				post({uid: temp_id} ,"EditPaper.php");
			}
		}
		
		function delete_entry(filename, temp_id){
			if(filename=="patent"){
				post({uid: temp_id} ,"api/DeletePatent.php");				
			}
			else if(filename=="grade"){
				post({uid: temp_id} ,"api/DeleteGrade.php");				
			}
			else if(filename=="journal"){
				post({uid: temp_id} ,"api/DeleteJournal.php");
			}
			else if(filename=="paper"){
				post({uid: temp_id} ,"api/DeletePaper.php");
			}
		}
		
		</script>

    </body>
</html>
