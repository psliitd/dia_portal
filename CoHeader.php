<?php		
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<title>DIA Coordinator Portal</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">

            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="Coordinator.php">DIA Coordinator Portal</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <div class="profile">
                            <div class="profile-data">
                                <div class="profile-data-name">Hi</div>
								
                                <div class="profile-data-name">
									<b>Current IP : <?php echo $ip_address ?></b>
								</div>
                            </div>
                        </div>
                    </li>
                    <!--
					<li>
                        <a href="Index.php"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
                    </li>
					-->
					<li>
						<a href="AcademicStatus.php"><span class="fa fa-info"></span> <span class="xn-text">Academic Status</span></a>
					</li>
					<li>
						<a href="FundStatus.php"><span class="fa fa-info"></span> <span class="xn-text">Fund Status</span></a>
					</li>
                    
                    <li>
						<a href="CoordinatorSummary.php"><span class="fa fa-info"></span> <span class="xn-text">Summary</span></a>
					</li> 
					<li>
						<a href="api/Logout.php"><span class="fa fa-info"></span> <span class="xn-text">Logout</span></a>
					</li>
					<li></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></li>
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->

            <!-- PAGE CONTENT -->
            <div class="page-content">

			<!-- START X-NAVIGATION VERTICAL -->
			<ul class="x-navigation x-navigation-horizontal x-navigation-panel">
				<!-- TOGGLE NAVIGATION -->
				<li class="xn-icon-button">
					<a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
				</li>
				<!-- END TOGGLE NAVIGATION -->
			</ul>
			<!-- END X-NAVIGATION VERTICAL -->
