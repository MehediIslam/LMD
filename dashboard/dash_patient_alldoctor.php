<?php
ob_start();
date_default_timezone_set("Asia/Dhaka");
session_start();
require '../Super_Admin.php';
$obj_sup = new Super_Admin();
if (isset($_GET['status'])) {
    if (isset($_GET['logout']) == 'true') {
	    $obj_sup->logout();
    }
}
$login_id = $_SESSION['login_id'];
if ($login_id == NULL && $_SESSION['user_type'] != 'Patient') {
    header('Location: ../index.php');
}

$patient_id; //global variable;

//selecting doctor's information who is logged
$select = "SELECT * FROM `patients` INNER JOIN login ON patients.patient_id=login.patient_id WHERE login.login_id =$login_id";
$result=$conn->query($select);
while($row = $result->fetch_assoc())
{
  $patient_id = $row['patient_id'];
  $fname = $row['fname'];
  $lname = $row['lname'];
  $email = $row['email'];
  $propic = $row['propic'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Patient</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/demo/style.css">
</head>

<body>
<script src="assets/js/preloader.js"></script>
  <div class="body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
      <div class="mdc-drawer__header"">
        <a href="dash_patient.php" class="brand-logo">
          <img src="assets/images/logo.jpg" alt="logo">
        </a>
		
      </div>
      <div class="mdc-drawer__content">
        <div class="user-info">
          <p class="name"><?php echo "Hello, ".$fname." !!"?></p>
          <p class="email"><?php echo $email?></p>
          <p class="email"><?php echo "Patient ID: ".$patient_id?></p>
        </div>
        <div class="mdc-list-group">
          <nav class="mdc-list mdc-drawer-menu">
          
          
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="dash_patient.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">assignment</i>
                 My Prescription
              </a>
            </div>
     
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="sample-page-submenu">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">assignment_ind</i>
                Doctor
                <i class="mdc-drawer-arrow material-icons">chevron_right</i>
              </a>
              <div class="mdc-expansion-panel" id="sample-page-submenu">
                <nav class="mdc-list mdc-drawer-submenu">
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="dash_patient_mydoctor.php">
                     My Doctors
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="dash_patient_alldoctor.php">
                      All Doctors
                    </a>
                  </div>
         
                </nav>
              </div>
            </div>
			   
          </nav>
        </div>
		
		<br>
		 <div class="profile-actions">
          <a href="dash_patient_update.php">Edit Profile</a>
          <span class="divider"></span>
          <a href="?status=logout&logout=true">Logout</a>
        </div>


      </div>
    </aside>
    <!-- partial -->
    <div class="main-wrapper mdc-drawer-app-content">
      <!-- partial:partials/_navbar.html -->
      <header class="mdc-top-app-bar">
	   
        <div class="mdc-top-app-bar__row">
          <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <a class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">menu</a>
			<span class="mdc-top-app-bar__title"></span>			
				<div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon search-text-field d-none d-md-flex">
				  <i class="material-icons mdc-text-field__icon">search</i>
				  <input class="mdc-text-field__input" id="text-field-hero-input" autocomplete="off" type="text" name="patient_info">
				  
				  <div class="mdc-notched-outline">
					<div class="mdc-notched-outline__leading"></div>
					<div class="mdc-notched-outline__notch">
					  <label for="text-field-hero-input" class="mdc-floating-label">Search..</label>
					</div>
					<div class="mdc-notched-outline__trailing"></div>
				  </div>
				</div>
			</div>							
		  
          <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end mdc-top-app-bar__section-right">
            <div class="menu-button-container menu-profile d-none d-md-block">
              <button class="mdc-button mdc-menu-button">
                <span class="d-flex align-items-center">
                  <span class="figure">
                    <?php echo "<img src='../photos/uploads/patient/$propic' alt='user' class='user'>" ?>
                  </span>
                  <span class="user-name"><?php echo $fname." ".$lname?></span>
                </span>
              </button>
              <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon-only">
                      <i class="mdi mdi-account-edit-outline text-primary"></i>
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <a href="dash_patient_update.php"><h6 class="item-subject font-weight-normal">Edit profile</h6></a>
                    </div>
                  </li>
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon-only">
                      <i class="mdi mdi-logout-variant text-primary"></i>                      
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <a href="?status=logout&logout=true"><h6 class="item-subject font-weight-normal">Logout</h6></a>
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
              
		<?php
		   $sql = "SELECT `fname`, `lname`, `degrees`, (SELECT specialization.specialization from specialization WHERE specialization.specialize_id = doctors.specialize_id) AS specialization,`chamber` FROM `doctors`";
		   $result2=$conn->query($sql);
		   while($row2=$result2->fetch_assoc())
		   { 
	    ?>	   						  
		  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
			<div class="mdc-card info-card info-card--info">
			  <div class="card-inner">
				<h6 class="font-weight-light pb-2 mb-1"><?php echo $row2['fname']." ".$row2['lname'];?></h6>
				<h6 class="font-weight-light pb-2 mb-1"><?php echo $row2['degrees'];?></h6>
				<h6 class="font-weight-light pb-2 mb-1 border-bottom"><?php echo "Specialization: ".$row2['specialization']?></h6>
				<p class="tx-12 text-muted"><?php echo $row2['chamber'];?></p> 
				<div class="card-icon-wrapper">
				  <i class="material-icons">assignment_ind</i>
				</div>
			  </div>
			</div>
		  </div>
			  
		<?php }?> 
            	 
	</div>
  </div>
		
    
        </main>
      </div>
	  
	  
    </div>
  </div>
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- inject:js -->
  <script src="assets/js/material.js"></script>
  <script src="assets/js/misc.js"></script>

</body>
</html> 