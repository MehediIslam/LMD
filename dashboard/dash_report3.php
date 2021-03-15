<?php 
error_reporting(0);
require '../Super_Admin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>LMD Reports</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/demo/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>
<body>
<script src="assets/js/preloader.js"></script>
  <div class="body-wrapper">
    <!-- partial:../../partials/_sidebar.html -->
    <aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
	<div class="mdc-drawer__header"">
          <a href="dash_pharma.php" class="brand-logo">
          <img src="assets/images/logo.jpg" alt="logo">
        </a>
    </div>
      <div class="mdc-drawer__content">
        <div class="mdc-list-group">
          <nav class="mdc-list mdc-drawer-menu">
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="../index.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">home</i>
                Home
              </a>
            </div> 
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="sample-page-submenu">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">pie_chart_outlined</i>
                Reports
                <i class="mdc-drawer-arrow material-icons">chevron_right</i>
              </a>
              <div class="mdc-expansion-panel" id="sample-page-submenu">
                <nav class="mdc-list mdc-drawer-submenu">
				  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="dash_report1.php">
                      Top Medicine
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="dash_report2.php">
                      Common Disease
                    </a>
                  </div>
				  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="dash_report4.php">
                      Geographic Area
                    </a>
                  </div> 
				   <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="dash_report3.php">
                      Disease Prediction 
                    </a>
                  </div>                                  
                </nav>
              </div>
            </div>
        
          </nav>
        </div><br>
        <div class="profile-actions">
          <a href="../index.php">Register</a>
          <span class="divider"></span>
          <a href="../index.php">Login</a>
        </div>

      </div>
    </aside>
    <!-- partial -->
    <div class="main-wrapper mdc-drawer-app-content">
      <!-- partial:../../partials/_navbar.html -->
      <header class="mdc-top-app-bar">
        <div class="mdc-top-app-bar__row">
          <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <button class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">menu</button>
            <span class="mdc-top-app-bar__title">Forecasting Probable Disease Outbreaks <?php //echo "(".date("Y").")"; ?></span>
           
          </div>
          <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end mdc-top-app-bar__section-right">
            <div class="menu-button-container menu-profile d-none d-md-block">
  
              <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon-only">
                      <i class="mdi mdi-account-edit-outline text-primary"></i>
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">Edit profile</h6>
                    </div>
                  </li>
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon-only">
                      <i class="mdi mdi-settings-outline text-primary"></i>                      
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">Logout</h6>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
                     
          </div>
        </div>
      </header>
      <!-- partial -->
      <div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
			
            <!-- Previous Prediction --><!--
			  <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-11-desktop">
                <div class="mdc-card">
                  <h6 class="card-title"></h6>
                  <canvas id="linechart-multi"></canvas>
                </div>
              </div> -->
	
			
				<?php 
				//retrieve prediction file name
				$selectc = "SELECT * FROM prediction WHERE `fig_type` = 1 ORDER BY id DESC LIMIT 1";
				$resultc=$conn->query($selectc);
				while($rowc = $resultc->fetch_assoc())
				{
				   $filename = $rowc['prediction_img'];
				}
				
				//retrieve ETS Decomposition file name
				$selecta = "SELECT * FROM prediction WHERE `fig_type` = 2 ORDER BY id DESC LIMIT 1";
				$resulta=$conn->query($selecta);
				while($rowa = $resulta->fetch_assoc())
				{
				   $filename2 = $rowa['ets_decomposition'];
				}
				?>		
			
				<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-11-desktop">
					<div class="mdc-card">
					  <h6 class="card-title"></h6>
						<?php  echo "<img src='assets/images/prediction/$filename' alt=' fig_1 not available' >"; ?>
						<br><br>
						<?php  echo "<img src='assets/images/prediction/$filename2' alt=' fig_2 not available' >"; ?>
					</div>
				</div>
  
            </div>
          </div>
        </main>
    
        <!-- partial -->
      </div>
    </div>
  </div>
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="assets/vendors/chartjs/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="assets/js/material.js"></script>
  <script src="assets/js/misc.js"></script>
  <!-- endinject -->
   
 
  <!-- Custom js for this page-->
  
  
  <!-- End custom js for this page-->
</body>
</html>




<?php
require 'reports/chartjs.php';
?>