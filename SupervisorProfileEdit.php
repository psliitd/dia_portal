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
                                                        <input type="text" class="form-control" style="color:#000" id="email" name="email" value="<?php echo $email  ?>" readonly />
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
														<option value="afghan" style='color:#000'>Afghan</option>
														<option value="albanian" style='color:#000'>Albanian</option>
														<option value="algerian" style='color:#000'>Algerian</option>
														<option value="american" style='color:#000'>American</option>
														<option value="andorran" style='color:#000'>Andorran</option>
														<option value="angolan" style='color:#000'>Angolan</option>
														<option value="antiguans" style='color:#000'>Antiguans</option>
														<option value="argentinean" style='color:#000'>Argentinean</option>
														<option value="armenian" style='color:#000'>Armenian</option>
														<option value="australian" style='color:#000'>Australian</option>
														<option value="austrian" style='color:#000'>Austrian</option>
														<option value="azerbaijani" style='color:#000'>Azerbaijani</option>
														<option value="bahamian" style='color:#000'>Bahamian</option>
														<option value="bahraini" style='color:#000'>Bahraini</option>
														<option value="bangladeshi" style='color:#000'>Bangladeshi</option>
														<option value="barbadian" style='color:#000'>Barbadian</option>
														<option value="barbudans" style='color:#000'>Barbudans</option>
														<option value="batswana" style='color:#000'>Batswana</option>
														<option value="belarusian" style='color:#000'>Belarusian</option>
														<option value="belgian" style='color:#000'>Belgian</option>
														<option value="belizean" style='color:#000'>Belizean</option>
														<option value="beninese" style='color"#000'>Beninese</option>
														<option value="bhutanese" style='color"#000'>Bhutanese</option>
														<option value="bolivian" style='color"#000'>Bolivian</option>
														<option value="bosnian" style='color"#000'>Bosnian</option>
														<option value="brazilian" style='color"#000'>Brazilian</option>
														<option value="british" style='color"#000'>British</option>
														<option value="bruneian" style='color"#000'>Bruneian</option>
														<option value="bulgarian" style='color"#000'>Bulgarian</option>
														<option value="burkinabe" style='color"#000'>Burkinabe</option>
														<option value="burmese" style='color"#000'>Burmese</option>
														<option value="burundian" style='color"#000'>Burundian</option>
														<option value="cambodian" style='color"#000'>Cambodian</option>
														<option value="cameroonian" style='color"#000'>Cameroonian</option>
														<option value="canadian" style='color"#000'>Canadian</option>
														<option value="cape verdean" style='color"#000'>Cape Verdean</option>
														<option value="central african" style='color"#000'>Central African</option>
														<option value="chadian" style='color"#000'>Chadian</option>
														<option value="chilean" style='color"#000'>Chilean</option>
														<option value="chinese" style='color"#000'>Chinese</option>
														<option value="colombian" style='color"#000'>Colombian</option>
														<option value="comoran" style='color"#000'>Comoran</option>
														<option value="congolese" style='color"#000'>Congolese</option>
														<option value="costa rican" style='color"#000'>Costa Rican</option>
														<option value="croatian" style='color"#000'>Croatian</option>
														<option value="cuban" style='color"#000'>Cuban</option>
														<option value="cypriot" style='color"#000'>Cypriot</option>
														<option value="czech" style='color"#000'>Czech</option>
														<option value="danish" style='color"#000'>Danish</option>
														<option value="djibouti" style='color"#000'>Djibouti</option>
														<option value="dominican" style='color"#000'>Dominican</option>
														<option value="dutch" style='color"#000'>Dutch</option>
														<option value="east timorese" style='color"#000'>East Timorese</option>
														<option value="ecuadorean" style='color"#000'>Ecuadorean</option>
														<option value="egyptian" style='color"#000'>Egyptian</option>
														<option value="emirian" style='color"#000'>Emirian</option>
														<option value="equatorial guinean" style='color"#000'>Equatorial Guinean</option>
														<option value="eritrean" style='color"#000'>Eritrean</option>
														<option value="estonian" style='color"#000'>Estonian</option>
														<option value="ethiopian" style='color"#000'>Ethiopian</option>
														<option value="fijian" style='color"#000'>Fijian</option>
														<option value="filipino" style='color"#000'>Filipino</option>
														<option value="finnish" style='color"#000'>Finnish</option>
														<option value="french" style='color"#000'>French</option>
														<option value="gabonese" style='color"#000'>Gabonese</option>
														<option value="gambian" style='color"#000'>Gambian</option>
														<option value="georgian" style='color"#000'>Georgian</option>
														<option value="german" style='color"#000'>German</option>
														<option value="ghanaian" style='color"#000'>Ghanaian</option>
														<option value="greek" style='color"#000'>Greek</option>
														<option value="grenadian" style='color"#000'>Grenadian</option>
														<option value="guatemalan" style='color"#000'>Guatemalan</option>
														<option value="guinea-bissauan" style='color"#000'>Guinea-Bissauan</option>
														<option value="guinean" style='color"#000'>Guinean</option>
														<option value="guyanese" style='color"#000'>Guyanese</option>
														<option value="haitian" style='color"#000'>Haitian</option>
														<option value="herzegovinian" style='color"#000'>Herzegovinian</option>
														<option value="honduran" style='color"#000'>Honduran</option>
														<option value="hungarian" style='color"#000'>Hungarian</option>
														<option value="icelander" style='color"#000'>Icelander</option>
														<option value="indonesian" style='color"#000'>Indonesian</option>
														<option value="iranian" style='color"#000'>Iranian</option>
														<option value="iraqi" style='color"#000'>Iraqi</option>
														<option value="irish" style='color"#000'>Irish</option>
														<option value="israeli" style='color"#000'>Israeli</option>
														<option value="italian" style='color"#000'>Italian</option>
														<option value="ivorian" style='color"#000'>Ivorian</option>
														<option value="jamaican" style='color"#000'>Jamaican</option>
														<option value="japanese" style='color"#000'>Japanese</option>
														<option value="jordanian" style='color"#000'>Jordanian</option>
														<option value="kazakhstani" style='color"#000'>Kazakhstani</option>
														<option value="kenyan" style='color"#000'>Kenyan</option>
														<option value="kittian and nevisian" style='color"#000'>Kittian and Nevisian</option>
														<option value="kuwaiti" style='color"#000'>Kuwaiti</option>
														<option value="kyrgyz" style='color"#000'>Kyrgyz</option>
														<option value="laotian" style='color"#000'>Laotian</option>
														<option value="latvian" style='color"#000'>Latvian</option>
														<option value="lebanese" style='color"#000'>Lebanese</option>
														<option value="liberian" style='color"#000'>Liberian</option>
														<option value="libyan" style='color"#000'>Libyan</option>
														<option value="liechtensteiner" style='color"#000'>Liechtensteiner</option>
														<option value="lithuanian" style='color"#000'>Lithuanian</option>
														<option value="luxembourger" style='color"#000'>Luxembourger</option>
														<option value="macedonian" style='color"#000'>Macedonian</option>
														<option value="malagasy" style='color"#000'>Malagasy</option>
														<option value="malawian" style='color"#000'>Malawian</option>
														<option value="malaysian" style='color"#000'>Malaysian</option>
														<option value="maldivan" style='color"#000'>Maldivan</option>
														<option value="malian" style='color"#000'>Malian</option>
														<option value="maltese" style='color"#000'>Maltese</option>
														<option value="marshallese" style='color"#000'>Marshallese</option>
														<option value="mauritanian" style='color"#000'>Mauritanian</option>
														<option value="mauritian" style='color"#000'>Mauritian</option>
														<option value="mexican" style='color"#000'>Mexican</option>
														<option value="micronesian" style='color"#000'>Micronesian</option>
														<option value="moldovan" style='color"#000'>Moldovan</option>
														<option value="monacan" style='color"#000'>Monacan</option>
														<option value="mongolian" style='color"#000'>Mongolian</option>
														<option value="moroccan" style='color"#000'>Moroccan</option>
														<option value="mosotho" style='color"#000'>Mosotho</option>
														<option value="motswana" style='color"#000'>Motswana</option>
														<option value="mozambican" style='color"#000'>Mozambican</option>
														<option value="namibian" style='color"#000'>Namibian</option>
														<option value="nauruan" style='color"#000'>Nauruan</option>
														<option value="nepalese" style='color"#000'>Nepalese</option>
														<option value="new zealander" style='color"#000'>New Zealander</option>
														<option value="ni-vanuatu" style='color"#000'>Ni-Vanuatu</option>
														<option value="nicaraguan" style='color"#000'>Nicaraguan</option>
														<option value="nigerien" style='color"#000'>Nigerien</option>
														<option value="north korean" style='color"#000'>North Korean</option>
														<option value="northern irish" style='color"#000'>Northern Irish</option>
														<option value="norwegian" style='color"#000'>Norwegian</option>
														<option value="omani" style='color"#000'>Omani</option>
														<option value="pakistani" style='color"#000'>Pakistani</option>
														<option value="palauan" style='color"#000'>Palauan</option>
														<option value="panamanian" style='color"#000'>Panamanian</option>
														<option value="papua new guinean" style='color"#000'>Papua New Guinean</option>
														<option value="paraguayan" style='color"#000'>Paraguayan</option>
														<option value="peruvian" style='color"#000'>Peruvian</option>
														<option value="polish" style='color"#000'>Polish</option>
														<option value="portuguese" style='color"#000'>Portuguese</option>
														<option value="qatari" style='color"#000'>Qatari</option>
														<option value="romanian" style='color"#000'>Romanian</option>
														<option value="russian" style='color"#000'>Russian</option>
														<option value="rwandan" style='color"#000'>Rwandan</option>
														<option value="saint lucian" style='color"#000'>Saint Lucian</option>
														<option value="salvadoran" style='color"#000'>Salvadoran</option>
														<option value="samoan" style='color"#000'>Samoan</option>
														<option value="san marinese" style='color"#000'>San Marinese</option>
														<option value="sao tomean" style='color"#000'>Sao Tomean</option>
														<option value="saudi" style='color"#000'>Saudi</option>
														<option value="scottish" style='color"#000'>Scottish</option>
														<option value="senegalese" style='color"#000'>Senegalese</option>
														<option value="serbian" style='color"#000'>Serbian</option>
														<option value="seychellois" style='color"#000'>Seychellois</option>
														<option value="sierra leonean" style='color"#000'>Sierra Leonean</option>
														<option value="singaporean" style='color"#000'>Singaporean</option>
														<option value="slovakian" style='color"#000'>Slovakian</option>
														<option value="slovenian" style='color"#000'>Slovenian</option>
														<option value="solomon islander" style='color"#000'>Solomon Islander</option>
														<option value="somali" style='color"#000'>Somali</option>
														<option value="south african" style='color"#000'>South African</option>
														<option value="south korean" style='color"#000'>South Korean</option>
														<option value="spanish" style='color"#000'>Spanish</option>
														<option value="sri lankan" style='color"#000'>Sri Lankan</option>
														<option value="sudanese" style='color"#000'>Sudanese</option>
														<option value="surinamer" style='color"#000'>Surinamer</option>
														<option value="swazi" style='color"#000'>Swazi</option>
														<option value="swedish" style='color"#000'>Swedish</option>
														<option value="swiss" style='color"#000'>Swiss</option>
														<option value="syrian" style='color"#000'>Syrian</option>
														<option value="taiwanese" style='color"#000'>Taiwanese</option>
														<option value="tajik" style='color"#000'>Tajik</option>
														<option value="tanzanian" style='color"#000'>Tanzanian</option>
														<option value="thai" style='color"#000'>Thai</option>
														<option value="togolese" style='color"#000'>Togolese</option>
														<option value="tongan" style='color"#000'>Tongan</option>
														<option value="trinidadian or tobagonian" style='color"#000'>Trinidadian or Tobagonian</option>
														<option value="tunisian" style='color"#000'>Tunisian</option>
														<option value="turkish" style='color"#000'>Turkish</option>
														<option value="tuvaluan" style='color"#000'>Tuvaluan</option>
														<option value="ugandan" style='color"#000'>Ugandan</option>
														<option value="ukrainian" style='color"#000'>Ukrainian</option>
														<option value="uruguayan" style='color"#000'>Uruguayan</option>
														<option value="uzbekistani" style='color"#000'>Uzbekistani</option>
														<option value="venezuelan" style='color"#000'>Venezuelan</option>
														<option value="vietnamese" style='color"#000'>Vietnamese</option>
														<option value="welsh" style='color"#000'>Welsh</option>
														<option value="yemenite" style='color"#000'>Yemenite</option>
														<option value="zambian" style='color"#000'>Zambian</option>
														<option value="zimbabwean" style='color"#000'>Zimbabwean</option>
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
														<select class="form-control" name="department_name" id="department_name">
														<?php 
														$query = "SELECT name from department WHERE 1";
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
