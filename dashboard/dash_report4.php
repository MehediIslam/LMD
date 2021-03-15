<!DOCTYPE html>
<?php
date_default_timezone_set("Asia/Dhaka");
require '../DBcon.php';
error_reporting(0);
	
if(isset($_POST["disease"])) 
{
	$disease_id = $_POST['disease'];
	session_start();
	$_SESSION["disease_id"] = $disease_id;
	
	//fetching selected disease name
	$select = "SELECT disease_name FROM disease WHERE disease_id = $disease_id";
	$result=$conn->query($select);
	while($row = $result->fetch_assoc())
	{
	  $selected_disease = $row['disease_name'];
	}	
}

else
{
	//fetching default top disease
	$sql = "SELECT disease.disease_id, disease.disease_name, COUNT(*) AS counter FROM `prescription` INNER JOIN disease ON prescription.disease_id = disease.disease_id WHERE YEAR(prescription.date) BETWEEN (YEAR(CURDATE())-1) AND YEAR(CURDATE()) GROUP BY disease.disease_name ORDER BY COUNT(*) DESC LIMIT 1";
	$result1=$conn->query($sql);
	while($row = $result1->fetch_assoc())
	{
	  $disease_id=$row['disease_id'];
	  $selected_disease = $row['disease_name'];
	}
	session_start();
	$_SESSION["disease_id"] = $disease_id;
}	
?>

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
  
  <style>
  select {
    height: 40px;
    width: 200px;
    padding-left: 26px;
    font-size: 15px;
	border: none;}
  </style>
  
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
            <span class="mdc-top-app-bar__title">Most Disease Occurred in Geographic Area<?php //echo "(".date("Y").")"; ?></span>
           
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
			
            
			<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-9-desktop">
              <div class="mdc-card">
                <h6 class="card-title"><?php echo "Percentage (%) of ".$selected_disease;?></h6><br>
                <canvas id="pieChart"></canvas>
              </div>
            </div>	 

			<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3-desktop">
					
				<form method="post" action="#" id="myform">
				<select class="cusselect-css" name="disease" onchange="this.form.submit();">
					<option disabled selected>Top Disease Name</option>
					<?php
					//fetching top disease list
					$select2 = "SELECT disease.disease_id, disease.disease_name, COUNT(*) AS counter FROM `prescription` INNER JOIN disease ON prescription.disease_id = disease.disease_id WHERE YEAR(prescription.date) BETWEEN (YEAR(CURDATE())-1) AND YEAR(CURDATE()) GROUP BY disease.disease_name ORDER BY COUNT(*) DESC LIMIT 5";
					$result2=$conn->query($select2);
					while($row2 = $result2->fetch_assoc())
					{
					  echo "<option value='".$row2['disease_id']."'>".$row2['disease_name']."</option>" ;
					}		
					?>
				</select>
				</form>
			
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

</body>
</html>

<!-- Script --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'> 
function submitForm(){ 
  // Call submit() method on <form id='myform'>
  document.getElementById('myform').submit(); 
} 
</script>

<?php
require 'reports/chartjs.php';
?>