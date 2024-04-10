<?php		
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<title>DIA SECRATARIAT</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
      
      .xn-logo a:hover {
    color: white !important;
    background-color: red !important;

}
.x-navigation li.active {
        background-color: red;
    }



    </style>
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
                        <a href="Coordinator.php">SECRATARIAT</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <div class="profile">
                            <div class="profile-data">
                                <div class="profile-data-name">Hi</div>
								
                                <div class="profile-data-name">
									<b>Current IP : <?php echo $ip_address ?></b>
                                    <br>
                                    <br>
                                    <ul>
                                    <li style="text-align: left;" <?php echo basename($_SERVER['PHP_SELF']) == 'AcademicStatus.php' ? 'class="active"' : ''; ?>>
    <a href="AcademicStatus.php" style="font-size: 16px;">
        <span><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
        <span class="xn-text">Academic Status</span>
    </a>
</li>

<li style="text-align: left;" <?php echo basename($_SERVER['PHP_SELF']) == 'FundStatus.php' ? 'class="active"' : ''; ?>>
    <a href="FundStatus.php" style="font-size: 16px;">
        <span><i class="fa fa-money" aria-hidden="true"></i></span>
        <span class="xn-text">Fund Status</span>
    </a>
</li>

<!-- <li style="text-align: left;"<?php echo basename($_SERVER['PHP_SELF']) == 'CoordinatorSummary.php' ? 'class="active"' : ''; ?>>
    <a href="CoordinatorSummary.php" style="font-size: 16px;">
        <span><i class="fa fa-list-alt" aria-hidden="true"></i></span>
        <span class="xn-text">Summary</span>
    </a>
</li> -->

<li style="text-align: left;" <?php echo basename($_SERVER['PHP_SELF']) == 'api/Logout.php' ? 'class="active"' : ''; ?>>
    <a href="api/Logout.php" style="font-size: 16px;">
        <span><i class="fa fa-sign-out" aria-hidden="true"></i></span>
        <span class="xn-text">Logout</span>
    </a>
</li>


<li style="text-align: left;"></li>

                                    </ul>
                                    
								</div>
                            </div>
                            
                        </div>
                        
                    </li>
                    
					<!-- <li>
                        <a href="Index.php"><span ></span> <span class="xn-text">Dashboard</span></a>
                    </li> -->
					
  
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
