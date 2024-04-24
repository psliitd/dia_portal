<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('Header.php');

$paper_link = "";
$paper_website = "";
$paper_name = "";
$presentation_date = "";
$presentation_country = "";

$uid = $_POST['uid'];
$query = "SELECT * FROM papers WHERE uid='$uid'";
$result = mysqli_query($con,$query);
$numrows = mysqli_num_rows($result);
if($numrows==1){
	$row = mysqli_fetch_assoc($result);
	$paper_link = $row['paper_link'];
	$paper_website = $row['paper_website'];
	$paper_name = $row['paper_name'];
	$presentation_date = $row['presentation_date'];
	$presentation_country = $row['presentation_country'];
}
else{
	header("Location:../ProgressReport.php");
}
?>

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Edit Paper</li>
                </ul>
                <!-- END BREADCRUMB -->


				<!-- PAGE CONTENT WRAPPER -->
                 <div class="page-content-wrap">

                    <div class="row">
                        <div class="col-md-12">

                            <form action="api/EditPaper.php" method="POST" class="form-horizontal" enctype = "multipart/form-data">
                            <div class="panel panel-default">
                               <div class="panel-body">
                                    <p>Fill this form to edit paper.</p>
                                </div>

                             <div class="panel-body">

                                    <div class="row">

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Paper Title*</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $paper_name ?>" required />
                                                    </div>
                                                    <span class="help-block">Paper Title</span>
                                                </div>
                                            </div>

											 <div class="form-group">
                                                <label class="col-md-3 control-label">Presentation Date*</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                        <input type="text" class="form-control datepicker" id="date" name="date" value="<?php echo $presentation_date ?>"  required autocomplete="off"/>
                                                    </div>
                                                    <span class="help-block">Presentation Date of Paper</span>
                                                </div>
                                            </div>
											
											<div class="form-group">
												<label class="col-md-3 control-label">Paper Presentation Country</label>
												<div class="col-md-9">                                            
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-flag"></span></span>
														<select class="form-control" id="country" name="country">
														<option value="india" style='color:#000'>India</option>
														<option value="afghanistan" style='color:#000'>Afghanistan</option>
														<option value="albania" style='color:#000'>Albania</option>
														<option value="algeria" style='color:#000'>Algeria</option>
														<option value="america" style='color:#000'>America</option>
														<option value="andorra" style='color:#000'>Andorra</option>
														<option value="angola" style='color:#000'>Angola</option>
														<option value="antigua and barbuda" style='color:#000'>Antigua and Barbuda</option>
														<option value="argentina" style='color:#000'>Argentina</option>
														<option value="armenia" style='color:#000'>Armenia</option>
														<option value="australia" style='color:#000'>Australia</option>
														<option value="austria" style='color:#000'>Austria</option>
														<option value="azerbaijan" style='color:#000'>Azerbaijan</option>
														<option value="bahamas" style='color:#000'>Bahamas</option>
														<option value="bahrain" style='color:#000'>Bahrain</option>
														<option value="bangladesh" style='color:#000'>Bangladesh</option>
														<option value="barbados" style='color:#000'>Barbados</option>
														<option value="barbuda" style='color:#000'>Barbuda</option>
														<option value="botswana" style='color:#000'>Botswana</option>
														<option value="belarus" style='color:#000'>Belarus</option>
														<option value="belgium" style='color:#000'>Belgium</option>
														<option value="belize" style='color:#000'>Belize</option>
														<option value="benin" style='color:#000'>Benin</option>
														<option value="bhutan" style='color:#000'>Bhutan</option>
														<option value="bolivia" style='color:#000'>Bolivia</option>
														<option value="bosnia" style='color:#000'>Bosnia</option>
														<option value="brazil" style='color:#000'>Brazil</option>
														<option value="britain" style='color:#000'>Britain</option>
														<option value="brunei" style='color:#000'>Brunei</option>
														<option value="bulgaria" style='color:#000'>Bulgaria</option>
														<option value="burkina faso" style='color:#000'>Burkina Faso</option>
														<option value="burma" style='color:#000'>Burma</option>
														<option value="burundi" style='color:#000'>Burundi</option>
														<option value="cambodia" style='color:#000'>Cambodia</option>
														<option value="cameroon" style='color:#000'>Cameroon</option>
														<option value="canada" style='color:#000'>Canada</option>
														<option value="cape verde" style='color:#000'>Cape Verde</option>
														<option value="central african republic" style='color:#000'>Central African Republic</option>
														<option value="chad" style='color:#000'>Chad</option>
														<option value="chile" style='color:#000'>Chile</option>
														<option value="china" style='color:#000'>China</option>
														<option value="colombia" style='color:#000'>Colombia</option>
														<option value="comoros" style='color:#000'>Comoros</option>
														<option value="congo" style='color:#000'>Congo</option>
														<option value="costa rica" style='color:#000'>Costa Rica</option>
														<option value="croatia" style='color:#000'>Croatia</option>
														<option value="cuba" style='color:#000'>Cuba</option>
														<option value="cyprus" style='color:#000'>Cyprus</option>
														<option value="czech republic" style='color:#000'>Czech Republic</option>
														<option value="denmark" style='color:#000'>Denmark</option>
														<option value="djibouti" style='color:#000'>Djibouti</option>
														<option value="dominica" style='color:#000'>Dominica</option>
														<option value="dutch" style='color:#000'>Dutch</option>
														<option value="east timor" style='color:#000'>East Timor</option>
														<option value="ecuador" style='color:#000'>Ecuador</option>
														<option value="egypt" style='color:#000'>Egypt</option>
														<option value="emirates" style='color:#000'>Emirates</option>
														<option value="equatorial guinea" style='color:#000'>Equatorial Guinea</option>
														<option value="eritrea" style='color:#000'>Eritrea</option>
														<option value="estonia" style='color:#000'>Estonia</option>
														<option value="ethiopia" style='color:#000'>Ethiopia</option>
														<option value="fiji" style='color:#000'>Fiji</option>
														<option value="filipino" style='color:#000'>Filipino</option>
														<option value="finland" style='color:#000'>Finland</option>
														<option value="france" style='color:#000'>France</option>
														<option value="gabon" style='color:#000'>Gabon</option>
														<option value="gambia" style='color:#000'>Gambia</option>
														<option value="georgia" style='color:#000'>Georgia</option>
														<option value="germany" style='color:#000'>Germany</option>
														<option value="ghana" style='color:#000'>Ghana</option>
														<option value="greece" style='color:#000'>Greece</option>
														<option value="grenada" style='color:#000'>Grenada</option>
														<option value="guatemala" style='color:#000'>Guatemala</option>
														<option value="guinea-bissau" style='color:#000'>Guinea-Bissau</option>
														<option value="guinea" style='color:#000'>Guinea</option>
														<option value="guyana" style='color:#000'>Guyana</option>
														<option value="haiti" style='color:#000'>Haiti</option>
														<option value="herzegovina" style='color:#000'>Herzegovina</option>
														<option value="honduras" style='color:#000'>Honduras</option>
														<option value="hungary" style='color:#000'>Hungary</option>
														<option value="iceland" style='color:#000'>Iceland</option>
														<option value="indonesia" style='color:#000'>Indonesia</option>
														<option value="iran" style='color:#000'>Iran</option>
														<option value="iraq" style='color:#000'>Iraq</option>
														<option value="ireland" style='color:#000'>Ireland</option>
														<option value="israel" style='color:#000'>Israel</option>
														<option value="italy" style='color:#000'>Italy</option>
														<option value="ivory coast" style='color:#000'>Ivory Coast</option>
														<option value="jamaica" style='color:#000'>Jamaica</option>
														<option value="japan" style='color:#000'>Japan</option>
														<option value="jordan" style='color:#000'>Jordan</option>
														<option value="kazakhstan" style='color:#000'>Kazakhstan</option>
														<option value="kenya" style='color:#000'>Kenya</option>
														<option value="kiribati" style='color:#000'>Kiribati</option>
														<option value="kuwait" style='color:#000'>Kuwait</option>
														<option value="kyrgyzstan" style='color:#000'>Kyrgyzstan</option>
														<option value="laos" style='color:#000'>Laos</option>
														<option value="latvia" style='color:#000'>Latvia</option>
														<option value="lebanon" style='color:#000'>Lebanon</option>
														<option value="liberia" style='color:#000'>Liberia</option>
														<option value="libya" style='color:#000'>Libya</option>
														<option value="liechtenstein" style='color:#000'>Liechtenstein</option>
														<option value="lithuania" style='color:#000'>Lithuania</option>
														<option value="luxembourg" style='color:#000'>Luxembourg</option>
														<option value="macedonia" style='color:#000'>Macedonia</option>
														<option value="madagascar" style='color:#000'>Madagascar</option>
														<option value="malawi" style='color:#000'>Malawi</option>
														<option value="malaysia" style='color:#000'>Malaysia</option>
														<option value="maldives" style='color:#000'>Maldives</option>
														<option value="mali" style='color:#000'>Mali</option>
														<option value="malta" style='color:#000'>Malta</option>
														<option value="marshall islands" style='color:#000'>Marshall Islands</option>
														<option value="mauritania" style='color:#000'>Mauritania</option>
														<option value="mauritius" style='color:#000'>Mauritius</option>
														<option value="mexico" style='color:#000'>Mexico</option>
														<option value="micronesia" style='color:#000'>Micronesia</option>
														<option value="moldova" style='color:#000'>Moldova</option>
														<option value="monaco" style='color:#000'>Monaco</option>
														<option value="mongolia" style='color:#000'>Mongolia</option>
														<option value="morocco" style='color:#000'>Morocco</option>
														<option value="mozambique" style='color:#000'>Mozambique</option>
														<option value="namibia" style='color:#000'>Namibia</option>
														<option value="nauru" style='color:#000'>Nauru</option>
														<option value="nepal" style='color:#000'>Nepal</option>
														<option value="new zealand" style='color:#000'>New Zealand</option>
														<option value="vanuatu" style='color:#000'>Vanuatu</option>
														<option value="nicaragua" style='color:#000'>Nicaragua</option>
														<option value="niger" style='color:#000'>Niger</option>
														<option value="north korea" style='color:#000'>North Korea</option>
														<option value="northern ireland" style='color:#000'>Northern Ireland</option>
														<option value="norway" style='color:#000'>Norway</option>
														<option value="oman" style='color:#000'>Oman</option>
														<option value="pakistan" style='color:#000'>Pakistan</option>
														<option value="palau" style='color:#000'>Palau</option>
														<option value="panama" style='color:#000'>Panama</option>
														<option value="papua new guinea" style='color:#000'>Papua New Guinea</option>
														<option value="paraguay" style='color:#000'>Paraguay</option>
														<option value="peru" style='color:#000'>Peru</option>
														<option value="poland" style='color:#000'>Poland</option>
														<option value="portugal" style='color:#000'>Portugal</option>
														<option value="qatar" style='color:#000'>Qatar</option>
														<option value="romania" style='color:#000'>Romania</option>
														<option value="russia" style='color:#000'>Russia</option>
														<option value="rwanda" style='color:#000'>Rwanda</option>
														<option value="saint lucia" style='color:#000'>Saint Lucia</option>
														<option value="el salvador" style='color:#000'>El Salvador</option>
														<option value="samoa" style='color:#000'>Samoa</option>
														<option value="san marino" style='color:#000'>San Marino</option>
														<option value="sao tome and principe" style='color:#000'>Sao Tome and Principe</option>
														<option value="saudi arabia" style='color:#000'>Saudi Arabia</option>
														<option value="scotland" style='color:#000'>Scotland</option>
														<option value="senegal" style='color:#000'>Senegal</option>
														<option value="serbia" style='color:#000'>Serbia</option>
														<option value="seychelles" style='color:#000'>Seychelles</option>
														<option value="sierra leone" style='color:#000'>Sierra Leone</option>
														<option value="singapore" style='color:#000'>Singapore</option>
														<option value="slovakia" style='color:#000'>Slovakia</option>
														<option value="slovenia" style='color:#000'>Slovenia</option>
														<option value="solomon islands" style='color:#000'>Solomon Islands</option>
														<option value="somalia" style='color:#000'>Somalia</option>
														<option value="south africa" style='color:#000'>South Africa</option>
														<option value="south korea" style='color:#000'>South Korea</option>
														<option value="spain" style='color:#000'>Spain</option>
														<option value="sri lanka" style='color:#000'>Sri Lanka</option>
														<option value="sudan" style='color:#000'>Sudan</option>
														<option value="suriname" style='color:#000'>Suriname</option>
														<option value="swaziland" style='color:#000'>Swaziland</option>
														<option value="sweden" style='color:#000'>Sweden</option>
														<option value="switzerland" style='color:#000'>Switzerland</option>
														<option value="syria" style='color:#000'>Syria</option>
														<option value="taiwan" style='color:#000'>Taiwan</option>
														<option value="tajikistan" style='color:#000'>Tajikistan</option>
														<option value="tanzania" style='color:#000'>Tanzania</option>
														<option value="thailand" style='color:#000'>Thailand</option>
														<option value="togo" style='color:#000'>Togo</option>
														<option value="tonga" style='color:#000'>Tonga</option>
														<option value="trinidad and tobago" style='color:#000'>Trinidad and Tobago</option>
														<option value="tunisia" style='color:#000'>Tunisia</option>
														<option value="turkey" style='color:#000'>Turkey</option>
														<option value="tuvalu" style='color:#000'>Tuvalu</option>
														<option value="uganda" style='color:#000'>Uganda</option>
														<option value="ukraine" style='color:#000'>Ukraine</option>
														<option value="uruguay" style='color:#000'>Uruguay</option>
														<option value="uzbekistan" style='color:#000'>Uzbekistan</option>
														<option value="venezuela" style='color:#000'>Venezuela</option>
														<option value="vietnam" style='color:#000'>Vietnam</option>
														<option value="wales" style='color:#000'>Wales</option>
														<option value="yemen" style='color:#000'>Yemen</option>
														<option value="zambia" style='color:#000'>Zambia</option>
														<option value="zimbabwe" style='color:#000'>Zimbabwe</option>

														</select>
													</div>
                                                    <span class="help-block">Presentation  Paper</span>
												 </div>
											</div>

                                        </div>
                                        <div class="col-md-6">

											 <div class="form-group">
                                                <label class="col-md-3 control-label">Paper Website*</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-book"></span></span>
                                                        <input type="text" class="form-control" id="website" name="website" value="<?php echo $paper_website ?>" required />
                                                    </div>
                                                    <span class="help-block">Paper Website</span>
                                                </div>
                                            </div>
											
											<div class="form-group">
                                                <label class="col-md-3 control-label">Paper Link*</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-book"></span></span>
                                                        <input type="text" class="form-control" id="link" name="link" value="<?php echo $paper_link ?>" required />
                                                    </div>
                                                    <span class="help-block">Paper Link</span>
                                                </div>
                                            </div>
											
											
											<input type="hidden" id="uid" name="uid" value="<?php echo $uid ?>" />

                                        </div>

                                    </div>

                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </div>
                            </form>

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

    </body>
</html>
