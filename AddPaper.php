<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('Header.php');
?>

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Add Paper</li>
                </ul>
                <!-- END BREADCRUMB -->


				<!-- PAGE CONTENT WRAPPER -->
                 <div class="page-content-wrap">

                    <div class="row">
                        <div class="col-md-12">

                            <form action="api/AddPaper.php" method="POST" class="form-horizontal" enctype = "multipart/form-data">
                            <div class="panel panel-default">
                               <div class="panel-body">
                                    <p>Fill this form to add new paper.</p>
                                </div>

                             <div class="panel-body">

                                    <div class="row">

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Paper Title*</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                                        <input type="text" class="form-control" id="title" name="title" required />
                                                    </div>
                                                    <span class="help-block">Paper Title</span>
                                                </div>
                                            </div>

											 <div class="form-group">
                                                <label class="col-md-3 control-label">Presentation Date*</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                        <input type="text" class="form-control datepicker" id="date" name="date" required autocomplete="off"/>
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
														<option value="India" style='color:#000'>India</option>
														<option value="Afghanistan" style='color:#000'>Afghanistan</option>
														<option value="Albania" style='color:#000'>Albania</option>
														<option value="Algeria" style='color:#000'>Algeria</option>
														<option value="America" style='color:#000'>America</option>
														<option value="Andorra" style='color:#000'>Andorra</option>
														<option value="Angola" style='color:#000'>Angola</option>
														<option value="Antigua and Barbuda" style='color:#000'>Antigua and Barbuda</option>
														<option value="Argentina" style='color:#000'>Argentina</option>
														<option value="Armenia" style='color:#000'>Armenia</option>
														<option value="Australia" style='color:#000'>Australia</option>
														<option value="Austria" style='color:#000'>Austria</option>
														<option value="Azerbaijan" style='color:#000'>Azerbaijan</option>
														<option value="Bahamas" style='color:#000'>Bahamas</option>
														<option value="Bahrain" style='color:#000'>Bahrain</option>
														<option value="Bangladesh" style='color:#000'>Bangladesh</option>
														<option value="Barbados" style='color:#000'>Barbados</option>
														<option value="Barbuda" style='color:#000'>Barbuda</option>
														<option value="Botswana" style='color:#000'>Botswana</option>
														<option value="Belarus" style='color:#000'>Belarus</option>
														<option value="Belgium" style='color:#000'>Belgium</option>
														<option value="Belize" style='color:#000'>Belize</option>
														<option value="Benin" style='color:#000'>Benin</option>
														<option value="Bhutan" style='color:#000'>Bhutan</option>
														<option value="Bolivia" style='color:#000'>Bolivia</option>
														<option value="Bosnia" style='color:#000'>Bosnia</option>
														<option value="Brazil" style='color:#000'>Brazil</option>
														<option value="Britain" style='color:#000'>Britain</option>
														<option value="Brunei" style='color:#000'>Brunei</option>
														<option value="Bulgaria" style='color:#000'>Bulgaria</option>
														<option value="Burkina Faso" style='color:#000'>Burkina Faso</option>
														<option value="Burma" style='color:#000'>Burma</option>
														<option value="Burundi" style='color:#000'>Burundi</option>
														<option value="Cambodia" style='color:#000'>Cambodia</option>
														<option value="Cameroon" style='color:#000'>Cameroon</option>
														<option value="Canada" style='color:#000'>Canada</option>
														<option value="Cape Verde" style='color:#000'>Cape Verde</option>
														<option value="Central African Republic" style='color:#000'>Central African Republic</option>
														<option value="Chad" style='color:#000'>Chad</option>
														<option value="Chile" style='color:#000'>Chile</option>
														<option value="China" style='color:#000'>China</option>
														<option value="Colombia" style='color:#000'>Colombia</option>
														<option value="Comoros" style='color:#000'>Comoros</option>
														<option value="Congo" style='color:#000'>Congo</option>
														<option value="Costa Rica" style='color:#000'>Costa Rica</option>
														<option value="Croatia" style='color:#000'>Croatia</option>
														<option value="Cuba" style='color:#000'>Cuba</option>
														<option value="Cyprus" style='color:#000'>Cyprus</option>
														<option value="Czech Republic" style='color:#000'>Czech Republic</option>
														<option value="Denmark" style='color:#000'>Denmark</option>
														<option value="Djibouti" style='color:#000'>Djibouti</option>
														<option value="Dominica" style='color:#000'>Dominica</option>
														<option value="Dutch" style='color:#000'>Dutch</option>
														<option value="East Timor" style='color:#000'>East Timor</option>
														<option value="Ecuador" style='color:#000'>Ecuador</option>
														<option value="Egypt" style='color:#000'>Egypt</option>
														<option value="Emirates" style='color:#000'>Emirates</option>
														<option value="Equatorial Guinea" style='color:#000'>Equatorial Guinea</option>
														<option value="Eritrea" style='color:#000'>Eritrea</option>
														<option value="Estonia" style='color:#000'>Estonia</option>
														<option value="Ethiopia" style='color:#000'>Ethiopia</option>
														<option value="Fiji" style='color:#000'>Fiji</option>
														<option value="Filipino" style='color:#000'>Filipino</option>
														<option value="Finland" style='color:#000'>Finland</option>
														<option value="France" style='color:#000'>France</option>
														<option value="Gabon" style='color:#000'>Gabon</option>
														<option value="Gambia" style='color:#000'>Gambia</option>
														<option value="Georgia" style='color:#000'>Georgia</option>
														<option value="Germany" style='color:#000'>Germany</option>
														<option value="Ghana" style='color:#000'>Ghana</option>
														<option value="Greece" style='color:#000'>Greece</option>
														<option value="Grenada" style='color:#000'>Grenada</option>
														<option value="Guatemala" style='color:#000'>Guatemala</option>
														<option value="Guinea-Bissau" style='color:#000'>Guinea-Bissau</option>
														<option value="Guinea" style='color:#000'>Guinea</option>
														<option value="Guyana" style='color:#000'>Guyana</option>
														<option value="Haiti" style='color:#000'>Haiti</option>
														<option value="Herzegovina" style='color:#000'>Herzegovina</option>
														<option value="Honduras" style='color:#000'>Honduras</option>
														<option value="Hungary" style='color:#000'>Hungary</option>
														<option value="Iceland" style='color:#000'>Iceland</option>
														<option value="Indonesia" style='color:#000'>Indonesia</option>
														<option value="Iran" style='color:#000'>Iran</option>
														<option value="Iraq" style='color:#000'>Iraq</option>
														<option value="Ireland" style='color:#000'>Ireland</option>
														<option value="Israel" style='color:#000'>Israel</option>
														<option value="Italy" style='color:#000'>Italy</option>
														<option value="Ivory Coast" style='color:#000'>Ivory Coast</option>
														<option value="Jamaica" style='color:#000'>Jamaica</option>
														<option value="Japan" style='color:#000'>Japan</option>
														<option value="Jordan" style='color:#000'>Jordan</option>
														<option value="Kazakhstan" style='color:#000'>Kazakhstan</option>
														<option value="Kenya" style='color:#000'>Kenya</option>
														<option value="Kiribati" style='color:#000'>Kiribati</option>
														<option value="Kuwait" style='color:#000'>Kuwait</option>
														<option value="Kyrgyzstan" style='color:#000'>Kyrgyzstan</option>
														<option value="Laos" style='color:#000'>Laos</option>
														<option value="Latvia" style='color:#000'>Latvia</option>
														<option value="Lebanon" style='color:#000'>Lebanon</option>
														<option value="Liberia" style='color:#000'>Liberia</option>
														<option value="Libya" style='color:#000'>Libya</option>
														<option value="Liechtenstein" style='color:#000'>Liechtenstein</option>
														<option value="Lithuania" style='color:#000'>Lithuania</option>
														<option value="Luxembourg" style='color:#000'>Luxembourg</option>
														<option value="Macedonia" style='color:#000'>Macedonia</option>
														<option value="Madagascar" style='color:#000'>Madagascar</option>
														<option value="Malawi" style='color:#000'>Malawi</option>
														<option value="Malaysia" style='color:#000'>Malaysia</option>
														<option value="Maldives" style='color:#000'>Maldives</option>
														<option value="Mali" style='color:#000'>Mali</option>
														<option value="Malta" style='color:#000'>Malta</option>
														<option value="Marshall Islands" style='color:#000'>Marshall Islands</option>
														<option value="Mauritania" style='color:#000'>Mauritania</option>
														<option value="Mauritius" style='color:#000'>Mauritius</option>
														<option value="Mexico" style='color:#000'>Mexico</option>
														<option value="Micronesia" style='color:#000'>Micronesia</option>
														<option value="Moldova" style='color:#000'>Moldova</option>
														<option value="Monaco" style='color:#000'>Monaco</option>
														<option value="Mongolia" style='color:#000'>Mongolia</option>
														<option value="Morocco" style='color:#000'>Morocco</option>
														<option value="Mozambique" style='color:#000'>Mozambique</option>
														<option value="Namibia" style='color:#000'>Namibia</option>
														<option value="Nauru" style='color:#000'>Nauru</option>
														<option value="Nepal" style='color:#000'>Nepal</option>
														<option value="New Zealand" style='color:#000'>New Zealand</option>
														<option value="Vanuatu" style='color:#000'>Vanuatu</option>
														<option value="Nicaragua" style='color:#000'>Nicaragua</option>
														<option value="Niger" style='color:#000'>Niger</option>
														<option value="North Korea" style='color:#000'>North Korea</option>
														<option value="Northern Ireland" style='color:#000'>Northern Ireland</option>
														<option value="Norway" style='color:#000'>Norway</option>
														<option value="Oman" style='color:#000'>Oman</option>
														<option value="Pakistan" style='color:#000'>Pakistan</option>
														<option value="Palau" style='color:#000'>Palau</option>
														<option value="Panama" style='color:#000'>Panama</option>
														<option value="Papua New Guinea" style='color:#000'>Papua New Guinea</option>
														<option value="Paraguay" style='color:#000'>Paraguay</option>
														<option value="Peru" style='color:#000'>Peru</option>
														<option value="Poland" style='color:#000'>Poland</option>
														<option value="Portugal" style='color:#000'>Portugal</option>
														<option value="Qatar" style='color:#000'>Qatar</option>
														<option value="Romania" style='color:#000'>Romania</option>
														<option value="Russia" style='color:#000'>Russia</option>
														<option value="Rwanda" style='color:#000'>Rwanda</option>
														<option value="Saint Lucia" style='color:#000'>Saint Lucia</option>
														<option value="El Salvador" style='color:#000'>El Salvador</option>
														<option value="Samoa" style='color:#000'>Samoa</option>
														<option value="San Marino" style='color:#000'>San Marino</option>
														<option value="Sao Tome and Principe" style='color:#000'>Sao Tome and Principe</option>
														<option value="Saudi Arabia" style='color:#000'>Saudi Arabia</option>
														<option value="Scotland" style='color:#000'>Scotland</option>
														<option value="Senegal" style='color:#000'>Senegal</option>
														<option value="Serbia" style='color:#000'>Serbia</option>
														<option value="Seychelles" style='color:#000'>Seychelles</option>
														<option value="Sierra Leone" style='color:#000'>Sierra Leone</option>
														<option value="Singapore" style='color:#000'>Singapore</option>
														<option value="Slovakia" style='color:#000'>Slovakia</option>
														<option value="Slovenia" style='color:#000'>Slovenia</option>
														<option value="Solomon Islands" style='color:#000'>Solomon Islands</option>
														<option value="Somalia" style='color:#000'>Somalia</option>
														<option value="South Africa" style='color:#000'>South Africa</option>
														<option value="South Korea" style='color:#000'>South Korea</option>
														<option value="Spain" style='color:#000'>Spain</option>
														<option value="Sri Lanka" style='color:#000'>Sri Lanka</option>
														<option value="Sudan" style='color:#000'>Sudan</option>
														<option value="Suriname" style='color:#000'>Suriname</option>
														<option value="Swaziland" style='color:#000'>Swaziland</option>
														<option value="Sweden" style='color:#000'>Sweden</option>
														<option value="Switzerland" style='color:#000'>Switzerland</option>
														<option value="Syria" style='color:#000'>Syria</option>
														<option value="Taiwan" style='color:#000'>Taiwan</option>
														<option value="Tajikistan" style='color:#000'>Tajikistan</option>
														<option value="Tanzania" style='color:#000'>Tanzania</option>
														<option value="Thailand" style='color:#000'>Thailand</option>
														<option value="Togo" style='color:#000'>Togo</option>
														<option value="Tonga" style='color:#000'>Tonga</option>
														<option value="Trinidad and Tobago" style='color:#000'>Trinidad and Tobago</option>
														<option value="Tunisia" style='color:#000'>Tunisia</option>
														<option value="Turkey" style='color:#000'>Turkey</option>
														<option value="Tuvalu" style='color:#000'>Tuvalu</option>
														<option value="Uganda" style='color:#000'>Uganda</option>
														<option value="Ukraine" style='color:#000'>Ukraine</option>
														<option value="Uruguay" style='color:#000'>Uruguay</option>
														<option value="Uzbekistan" style='color:#000'>Uzbekistan</option>
														<option value="Venezuela" style='color:#000'>Venezuela</option>
														<option value="Vietnam" style='color:#000'>Vietnam</option>
														<option value="Wales" style='color:#000'>Wales</option>
														<option value="Yemen" style='color:#000'>Yemen</option>
														<option value="Zambia" style='color:#000'>Zambia</option>
														<option value="Zimbabwe" style='color:#000'>Zimbabwe</option>

														</select>
													</div>
                                                    <span class="help-block">Presentation Paper</span>
												 </div>
											</div>

                                        </div>
                                        <div class="col-md-6">

											 <div class="form-group">
                                                <label class="col-md-3 control-label">Paper Website*</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-book"></span></span>
                                                        <input type="text" class="form-control" id="website" name="website" required />
                                                    </div>
                                                    <span class="help-block">Paper Website</span>
                                                </div>
                                            </div>
											
											<div class="form-group">
                                                <label class="col-md-3 control-label">Paper Link*</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-book"></span></span>
                                                        <input type="text" class="form-control" id="link" name="link" required />
                                                    </div>
                                                    <span class="help-block">Paper Link</span>
                                                </div>
                                            </div>


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
