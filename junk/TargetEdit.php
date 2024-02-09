<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('Header.php');

$uid = $_POST['uid'];

$query = "SELECT * FROM targets WHERE id='$uid'";
$result = mysqli_query($con,$query);
$numrows = mysqli_num_rows($result);
 
if($numrows!=0)
{
	while($row = mysqli_fetch_array($result))   
    {
	 $target = $row['target'];
	 $indicator = $row['indicator'];
	 $nature = $row['nature'];
	 $source = $row['source'];
	 $indicatorvalue = $row['indicatorvalue'];
    }
}


?>
              
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active">Target Edit</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
				
				<!-- PAGE CONTENT WRAPPER -->
                 <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form action="api/TargetEdit.php" method="POST" class="form-horizontal">
                            <div class="panel panel-default">
                               <div class="panel-body">
                                    <p>Fill this form to Edit Target Rates.</p>
                                </div>
               			      
                             <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Target*</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-info"></span></span>
                                                        <input type="text" class="form-control" id="target" name="target" value="<?php echo $target; ?>"  required />
                                                    </div>                                            
                                                    <span class="help-block">Target</span>
                                                </div>
                                            </div>
											
											 <div class="form-group">
                                                <label class="col-md-3 control-label">Indicator*</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-info"></span></span>
                                                        <input type="text" class="form-control" id="indicator" name="indicator" value="<?php echo $indicator; ?>" required />
                                                    </div>                                            
                                                    <span class="help-block">Indicator</span>
                                                </div>
                                            </div>
											
											<div class="form-group">
                                                <label class="col-md-3 control-label">Source*</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-info"></span></span>
                                                        <input type="text" class="form-control" id="source" name="source" value="<?php echo $source; ?>" required />
                                                    </div>                                            
                                                    <span class="help-block">Source</span>
                                                </div>
                                            </div>
											 										
                                            
                                        </div>
                                        <div class="col-md-6">
                                            
											<div class="form-group">
                                                <label class="col-md-3 control-label">Indicator Value*</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-info"></span></span>
                                                        <input type="text" class="form-control" id="indicatorvalue" name="indicatorvalue" value="<?php echo $indicatorvalue; ?>" required />
                                                    </div>                                            
                                                    <span class="help-block">Indicator Value</span>
                                                </div>
                                            </div>
											
										   <div class="form-group">
                                                <label class="col-md-3 control-label">Select Nature*</label>
                                                <div class="col-md-9">
                                                   <div class="input-group">
												   <span class="input-group-addon"><span class="fa fa-arrow-down"></span></span>
                                                    <select class="form-control select" id="nature" name="nature">
                                                        <option value="1">Positive</option>
                                                        <option value="0">Negative</option>
                                                    </select>
													</div>
                                                    <span class="help-block">Select Indicator Nature</span>
                                                </div>
                                            </div>

																	

											<input type="hidden" value="'<?php echo $uid ?>'"  name="uid" id="uid">
                                            
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
        
        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->                

        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
		
		
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>                
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        <!-- END PAGE PLUGINS -->

        
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>  

		<script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
		<?php require('city-autocomplete.php') ?>
        <!-- END TEMPLATE -->

    </body>
</html>
