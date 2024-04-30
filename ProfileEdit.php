<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('Header.php');

$name = "";
$registration_number = "";
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

if(isset($_SESSION["studentid"])){
	$studentid = $_SESSION["studentid"];
	$query = "SELECT * FROM profile WHERE studentid='$studentid'";
	$result = mysqli_query($con,$query);
	$numrows = mysqli_num_rows($result);
	if($numrows==1){
		$row = mysqli_fetch_array($result);
		$name = $row['name'];
		$registration_number = $row['registration_number'];
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
		$iit_entry_no=$row['iit_entry_no'];
		$permanent_email=$row['permanent_email'];
		$personal_mobile=$row['personal_mobile'];
	}
	else{
		header("Location:../Profile.php");
	}
}
else{
	header("Location:../Profile.php");
}

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
									<form action="api/ProfileEdit.php" method="POST" class="form-horizontal" enctype = "multipart/form-data">
									 
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
												<label class="col-md-3 control-label">Address</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-home"></span></span>
                                                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $address  ?>" />
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
											</br>
											<div class="form-group">
												<label class="col-md-3 control-label">Date of Joining</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                        <input type="text" class="form-control datepicker" id="joiningDate" name="joiningDate" value="<?php echo $joining_date ?>" />
													</div> 
												 </div>
											</div>
											<br/>
											<div class="form-group">
												<label class="col-md-3 control-label">IIT Entry No</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                        <input type="text" class="form-control" id="iit_entry_no" name="iit_entry_no" value="<?php echo $iit_entry_no ?>" />
													</div> 
												 </div>
											</div>
										</div>
										<div class="col-md-6">
											 <div class="form-group">
												<label class="col-md-3 control-label">Registration Number</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-check"></span></span>
                                                        <input type="text" class="form-control" id="registrationNumber" name="registrationNumber" value="<?php echo $registration_number  ?>" />
													</div> 
												 </div>
											</div>
											</br>
											<div class="form-group">
												<label class="col-md-3 control-label">Email</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                                        <input type="text" class="form-control" style="color:#000" id="email" name="email" value="<?php echo $email  ?>"  />
													</div> 
												 </div>
											</div>
											</br>
											<div class="form-group">
												<label class="col-md-3 control-label">Advisor Name</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-user"></span></span>
														<select class="form-control" name="advisor_name" id="advisor_name">
														<?php 
														$query = "SELECT name from supervisor WHERE 1";
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
											</br>
											<div class="form-group">
												<label class="col-md-3 control-label">Nationality</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-flag"></span></span>
														<select class="form-control" id="nationality" name="nationality">
														<option value="Indian" style='color:#000'>Indian</option>
														<option value="Afghan" style='color:#000'>Afghan</option>
														<option value="Albanian" style='color:#000'>Albanian</option>
														<option value="Algerian" style='color:#000'>Algerian</option>
														<option value="American" style='color:#000'>American</option>
														<option value="Andorran" style='color:#000'>Andorran</option>
														<option value="Angolan" style='color:#000'>Angolan</option>
														<option value="Antiguans" style='color:#000'>Antiguans</option>
														<option value="Argentinean" style='color:#000'>Argentinean</option>
														<option value="Armenian" style='color:#000'>Armenian</option>
														<option value="Australian" style='color:#000'>Australian</option>
														<option value="Austrian" style='color:#000'>Austrian</option>
														<option value="Azerbaijani" style='color:#000'>Azerbaijani</option>
														<option value="Bahamian" style='color:#000'>Bahamian</option>
														<option value="Bahraini" style='color:#000'>Bahraini</option>
														<option value="Bangladeshi" style='color:#000'>Bangladeshi</option>
														<option value="Barbadian" style='color:#000'>Barbadian</option>
														<option value="Barbudans" style='color:#000'>Barbudans</option>
														<option value="Batswana" style='color:#000'>Batswana</option>
														<option value="Belarusian" style='color:#000'>Belarusian</option>
														<option value="Belgian" style='color:#000'>Belgian</option>
														<option value="Belizean" style='color:#000'>Belizean</option>
														<option value="Beninese" style='color:#000'>Beninese</option>
														<option value="Bhutanese" style='color:#000'>Bhutanese</option>
														<option value="Bolivian" style='color:#000'>Bolivian</option>
														<option value="Bosnian" style='color:#000'>Bosnian</option>
														<option value="Brazilian" style='color:#000'>Brazilian</option>
														<option value="British" style='color:#000'>British</option>
														<option value="Bruneian" style='color:#000'>Bruneian</option>
														<option value="Bulgarian" style='color:#000'>Bulgarian</option>
														<option value="Burkinabe" style='color:#000'>Burkinabe</option>
														<option value="Burmese" style='color:#000'>Burmese</option>
														<option value="Burundian" style='color:#000'>Burundian</option>
														<option value="Cambodian" style='color:#000'>Cambodian</option>
														<option value="Cameroonian" style='color:#000'>Cameroonian</option>
														<option value="Canadian" style='color:#000'>Canadian</option>
														<option value="Cape Verdean" style='color:#000'>Cape Verdean</option>
														<option value="Central African" style='color:#000'>Central African</option>
														<option value="Chadian" style='color:#000'>Chadian</option>
														<option value="Chilean" style='color:#000'>Chilean</option>
														<option value="Chinese" style='color:#000'>Chinese</option>
														<option value="Colombian" style='color:#000'>Colombian</option>
														<option value="Comoran" style='color:#000'>Comoran</option>
														<option value="Congolese" style='color:#000'>Congolese</option>
														<option value="Costa Rican" style='color:#000'>Costa Rican</option>
														<option value="Croatian" style='color:#000'>Croatian</option>
														<option value="Cuban" style='color:#000'>Cuban</option>
														<option value="Cypriot" style='color:#000'>Cypriot</option>
														<option value="Czech" style='color:#000'>Czech</option>
														<option value="Danish" style='color:#000'>Danish</option>
														<option value="Djibouti" style='color:#000'>Djibouti</option>
														<option value="Dominican" style='color:#000'>Dominican</option>
														<option value="Dutch" style='color:#000'>Dutch</option>
														<option value="East Timorese" style='color:#000'>East Timorese</option>
														<option value="Ecuadorean" style='color:#000'>Ecuadorean</option>
														<option value="Egyptian" style='color:#000'>Egyptian</option>
														<option value="Emirian" style='color:#000'>Emirian</option>
														<option value="Equatorial Guinean" style='color:#000'>Equatorial Guinean</option>
														<option value="Eritrean" style='color:#000'>Eritrean</option>
														<option value="Estonian" style='color:#000'>Estonian</option>
														<option value="Ethiopian" style='color:#000'>Ethiopian</option>
														<option value="Fijian" style='color:#000'>Fijian</option>
														<option value="Filipino" style='color:#000'>Filipino</option>
														<option value="Finnish" style='color:#000'>Finnish</option>
														<option value="French" style='color:#000'>French</option>
														<option value="Gabonese" style='color:#000'>Gabonese</option>
														<option value="Gambian" style='color:#000'>Gambian</option>
														<option value="Georgian" style='color:#000'>Georgian</option>
														<option value="German" style='color:#000'>German</option>
														<option value="Ghanaian" style='color:#000'>Ghanaian</option>
														<option value="Greek" style='color:#000'>Greek</option>
														<option value="Grenadian" style='color:#000'>Grenadian</option>
														<option value="Guatemalan" style='color:#000'>Guatemalan</option>
														<option value="Guinea-Bissauan" style='color:#000'>Guinea-Bissauan</option>
														<option value="Guinean" style='color:#000'>Guinean</option>
														<option value="Guyanese" style='color:#000'>Guyanese</option>
														<option value="Haitian" style='color:#000'>Haitian</option>
														<option value="Herzegovinian" style='color:#000'>Herzegovinian</option>
														<option value="Honduran" style='color:#000'>Honduran</option>
														<option value="Hungarian" style='color:#000'>Hungarian</option>
														<option value="Icelander" style='color:#000'>Icelander</option>
														<option value="Indonesian" style='color:#000'>Indonesian</option>
														<option value="Iranian" style='color:#000'>Iranian</option>
														<option value="Iraqi" style='color:#000'>Iraqi</option>
														<option value="Irish" style='color:#000'>Irish</option>
														<option value="Israeli" style='color:#000'>Israeli</option>
														<option value="Italian" style='color:#000'>Italian</option>
														<option value="Ivorian" style='color:#000'>Ivorian</option>
														<option value="Jamaican" style='color:#000'>Jamaican</option>
														<option value="Japanese" style='color:#000'>Japanese</option>
														<option value="Jordanian" style='color:#000'>Jordanian</option>
														<option value="Kazakhstani" style='color:#000'>Kazakhstani</option>
														<option value="Kenyan" style='color:#000'>Kenyan</option>
														<option value="Kittian and Nevisian" style='color:#000'>Kittian and Nevisian</option>
														<option value="Kuwaiti" style='color:#000'>Kuwaiti</option>
														<option value="Kyrgyz" style='color:#000'>Kyrgyz</option>
														<option value="Laotian" style='color:#000'>Laotian</option>
														<option value="Latvian" style='color:#000'>Latvian</option>
														<option value="Lebanese" style='color:#000'>Lebanese</option>
														<option value="Liberian" style='color:#000'>Liberian</option>
														<option value="Libyan" style='color:#000'>Libyan</option>
														<option value="Liechtensteiner" style='color:#000'>Liechtensteiner</option>
														<option value="Lithuanian" style='color:#000'>Lithuanian</option>
														<option value="Luxembourger" style='color:#000'>Luxembourger</option>
														<option value="Macedonian" style='color:#000'>Macedonian</option>
														<option value="Malagasy" style='color:#000'>Malagasy</option>
														<option value="Malawian" style='color:#000'>Malawian</option>
														<option value="Malaysian" style='color:#000'>Malaysian</option>
														<option value="Maldivan" style='color:#000'>Maldivan</option>
														<option value="Malian" style='color:#000'>Malian</option>
														<option value="Maltese" style='color:#000'>Maltese</option>
														<option value="Marshallese" style='color:#000'>Marshallese</option>
														<option value="Mauritanian" style='color:#000'>Mauritanian</option>
														<option value="Mauritian" style='color:#000'>Mauritian</option>
														<option value="Mexican" style='color:#000'>Mexican</option>
														<option value="Micronesian" style='color:#000'>Micronesian</option>
														<option value="Moldovan" style='color:#000'>Moldovan</option>
														<option value="Monacan" style='color:#000'>Monacan</option>
														<option value="Mongolian" style='color:#000'>Mongolian</option>
														<option value="Moroccan" style='color:#000'>Moroccan</option>
														<option value="Mosotho" style='color:#000'>Mosotho</option>
														<option value="Motswana" style='color:#000'>Motswana</option>
														<option value="Mozambican" style='color:#000'>Mozambican</option>
														<option value="Namibian" style='color:#000'>Namibian</option>
														<option value="Nauruan" style='color:#000'>Nauruan</option>
														<option value="Nepalese" style='color:#000'>Nepalese</option>
														<option value="New Zealander" style='color:#000'>New Zealander</option>
														<option value="Ni-Vanuatu" style='color:#000'>Ni-Vanuatu</option>
														<option value="Nicaraguan" style='color:#000'>Nicaraguan</option>
														<option value="Nigerien" style='color:#000'>Nigerien</option>
														<option value="North Korean" style='color:#000'>North Korean</option>
														<option value="Northern Irish" style='color:#000'>Northern Irish</option>
														<option value="Norwegian" style='color:#000'>Norwegian</option>
														<option value="Omani" style='color:#000'>Omani</option>
														<option value="Pakistani" style='color:#000'>Pakistani</option>
														<option value="Palauan" style='color:#000'>Palauan</option>
														<option value="Panamanian" style='color:#000'>Panamanian</option>
														<option value="Papua New Guinean" style='color:#000'>Papua New Guinean</option>
														<option value="Paraguayan" style='color:#000'>Paraguayan</option>
														<option value="Peruvian" style='color:#000'>Peruvian</option>
														<option value="Polish" style='color:#000'>Polish</option>
														<option value="Portuguese" style='color:#000'>Portuguese</option>
														<option value="Qatari" style='color:#000'>Qatari</option>
														<option value="Romanian" style='color:#000'>Romanian</option>
														<option value="Russian" style='color:#000'>Russian</option>
														<option value="Rwandan" style='color:#000'>Rwandan</option>
														<option value="Saint Lucian" style='color:#000'>Saint Lucian</option>
														<option value="Salvadoran" style='color:#000'>Salvadoran</option>
														<option value="Samoan" style='color:#000'>Samoan</option>
														<option value="San Marinese" style='color:#000'>San Marinese</option>
														<option value="Sao Tomean" style='color:#000'>Sao Tomean</option>
														<option value="Saudi" style='color:#000'>Saudi</option>
														<option value="Scottish" style='color:#000'>Scottish</option>
														<option value="Senegalese" style='color:#000'>Senegalese</option>
														<option value="Serbian" style='color:#000'>Serbian</option>
														<option value="Seychellois" style='color:#000'>Seychellois</option>
														<option value="Sierra Leonean" style='color:#000'>Sierra Leonean</option>
														<option value="Singaporean" style='color:#000'>Singaporean</option>
														<option value="Slovakian" style='color:#000'>Slovakian</option>
														<option value="Slovenian" style='color:#000'>Slovenian</option>
														<option value="Solomon Islander" style='color:#000'>Solomon Islander</option>
														<option value="Somali" style='color:#000'>Somali</option>
														<option value="South African" style='color:#000'>South African</option>
														<option value="South Korean" style='color:#000'>South Korean</option>
														<option value="Spanish" style='color:#000'>Spanish</option>
														<option value="Sri Lankan" style='color:#000'>Sri Lankan</option>
														<option value="Sudanese" style='color:#000'>Sudanese</option>
														<option value="Surinamer" style='color:#000'>Surinamer</option>
														<option value="Swazi" style='color:#000'>Swazi</option>
														<option value="Swedish" style='color:#000'>Swedish</option>
														<option value="Swiss" style='color:#000'>Swiss</option>
														<option value="Syrian" style='color:#000'>Syrian</option>
														<option value="Taiwanese" style='color:#000'>Taiwanese</option>
														<option value="Tajik" style='color:#000'>Tajik</option>
														<option value="Tanzanian" style='color:#000'>Tanzanian</option>
														<option value="Thai" style='color:#000'>Thai</option>
														<option value="Togolese" style='color:#000'>Togolese</option>
														<option value="Tongan" style='color:#000'>Tongan</option>
														<option value="Trinidadian or Tobagonian" style='color:#000'>Trinidadian or Tobagonian</option>
														<option value="Tunisian" style='color:#000'>Tunisian</option>
														<option value="Turkish" style='color:#000'>Turkish</option>
														<option value="Tuvaluan" style='color:#000'>Tuvaluan</option>
														<option value="Ugandan" style='color:#000'>Ugandan</option>
														<option value="Ukrainian" style='color:#000'>Ukrainian</option>
														<option value="Uruguayan" style='color:#000'>Uruguayan</option>
														<option value="Uzbekistani" style='color:#000'>Uzbekistani</option>
														<option value="Venezuelan" style='color:#000'>Venezuelan</option>
														<option value="Vietnamese" style='color:#000'>Vietnamese</option>
														<option value="Welsh" style='color:#000'>Welsh</option>
														<option value="Yemenite" style='color:#000'>Yemenite</option>
														<option value="Zambian" style='color:#000'>Zambian</option>
														<option value="Zimbabwean" style='color:#000'>Zimbabwean</option>
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
														<input class="form-control" name="department_name" id="department_name"/>
														<!-- <select class="form-control" name="department_name" id="department_name">
														<?php 
														// $query = "SELECT name from department WHERE 1";
														// $result = mysqli_query($con,$query);
														// $numrows = mysqli_num_rows($result);
														// while($row = mysqli_fetch_array($result )){
														// 	$name = $row['name'];
														// 	echo "<option value='$name' style='color:#000'>$name</option>";
														// }
														?>
														</select> -->
													</div> 
												 </div>
											</div>
											</br>
											<div class="form-group">
												<label class="col-md-3 control-label">Date of Joining on Campus</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                        <input type="text" class="form-control datepicker" id="joiningDateCampus" name="joiningDateCampus" value="<?php echo $joining_date_campus ?>" />
													</div> 
												 </div>
											</div>

											</br> 
											<div class="form-group">
												<label class="col-md-3 control-label">Permanent email</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                        <input type="text" class="form-control" id="permanent_email" name="permanent_email" value="<?php echo $permanent_email ?>" />
													</div> 
												 </div>
											</div>
											</br> 

										 
											<div class="form-group">
												<label class="col-md-3 control-label">Personal Mobile no</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                        <input type="text" class="form-control" id="personal_mobile" name="personal_mobile" value="<?php echo $personal_mobile ?>" />
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
