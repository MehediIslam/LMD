<?php
error_reporting(0);
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
if ($login_id == NULL && $_SESSION['user_type'] != 'Admin') {
    header('Location: ../index.php');
}
?>

<?php

//selecting users's counter
$select = "SELECT (SELECT COUNT(`doc_id`) FROM login WHERE `login_access` = 1) AS docActive, (SELECT COUNT(`patient_id`) FROM login WHERE `login_access` = 1) AS paActive, (SELECT COUNT(`company_id`) FROM login WHERE `login_access` = 1) AS phActive, (SELECT COUNT(`doc_id`) FROM login WHERE `login_access` = 0) AS docInactive, (SELECT COUNT(`patient_id`) FROM login WHERE `login_access` = 0) AS paInactive, (SELECT COUNT(`company_id`) FROM login WHERE `login_access` = 0) AS phInactive";
$result=$conn->query($select);
while($row = $result->fetch_assoc())
{
  $docActive = $row['docActive'];
  $paActive = $row['paActive'];
  $phActive = $row['phActive'];
  $docInactive = $row['docInactive'];
  $paInactive = $row['paInactive'];
  $phInactive = $row['phInactive'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Administrator</title>
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
      <div class="mdc-drawer__header">
        <a href="dash_admin.php" class="brand-logo">
          <img src="assets/images/logo.jpg" alt="logo">
        </a>
		
      </div>
      <div class="mdc-drawer__content">
        <div class="user-info">
          <p class="name"><?php echo "Hello, Mr. Administrator !!"?></p>
        </div>
        <div class="mdc-list-group">
          <nav class="mdc-list mdc-drawer-menu">

            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="sample-page-submenu">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">assignment_ind</i>
                Active Users
                <i class="mdc-drawer-arrow material-icons">chevron_right</i>
              </a>
              <div class="mdc-expansion-panel" id="sample-page-submenu">
                <nav class="mdc-list mdc-drawer-submenu">
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="dash_admin_Adoctor.php">
                     Doctors
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="dash_admin_Apatient.php">
                     Patients
                    </a>
                  </div>
				  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="dash_admin_Apharma.php">
                     Pharmaceuticals
                    </a>
                  </div>    
                </nav>
              </div>
            </div>
         
			<div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="sample-page-submenu1">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">person_add</i>
                Joining Requests
                <i class="mdc-drawer-arrow material-icons">chevron_right</i>
              </a>
              <div class="mdc-expansion-panel" id="sample-page-submenu1">
                <nav class="mdc-list mdc-drawer-submenu">
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="dash_admin_Rdoctor.php">
                     Doctors
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="dash_admin_Rpatient.php">
                     Patients
                    </a>
                  </div>
				  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="dash_admin_Rpharma.php">
                     Pharmaceuticals
                    </a>
                  </div>    
                </nav>
              </div>
            </div>
						
			<div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="sample-page-submenu3">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">perm_data_setting</i>
                Manages
                <i class="mdc-drawer-arrow material-icons">chevron_right</i>
              </a>
              <div class="mdc-expansion-panel" id="sample-page-submenu3">
                <nav class="mdc-list mdc-drawer-submenu">
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="dash_admin_generic.php">
                     Drug Generic
                    </a>
                  </div>
				  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="dash_admin_disease.php">
                     Disease
                    </a>
                  </div>
				  <div class="mdc-list-item mdc-drawer-item">
					<a class="mdc-drawer-link" href="dash_admin_specializ.php">
					 Specialization
					</a>
				  </div>  
                </nav>
              </div>
            </div><div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="dash_admin_input.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">touch_app</i>
                Input Requests
              </a>
            </div>	
			
			
       
          </nav>
        </div>
		<br>
		 <div class="profile-actions">
          <a href="dash_admin_update.php">Edit Profile</a>
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
			<span class="mdc-top-app-bar__title">Front Desk</span>						
			<span class="mdc-top-app-bar__title"><span class="mdc-top-app-bar__title">
			</span></span>					
          </div>
		  
          <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end mdc-top-app-bar__section-right">
            <div class="menu-button-container menu-profile d-none d-md-block">
              <button class="mdc-button mdc-menu-button">
                <span class="d-flex align-items-center">
                  <span class="figure">
                    <img src='../photos/logo.jpg' alt='user' class='user'>
                  </span>
                  <span class="user-name"><?php echo "Admin";?></span>
                </span>
              </button>
              <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon-only">
                      <i class="mdi mdi-account-edit-outline text-primary"></i>
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <a href="dash_admin_update.php"><h6 class="item-subject font-weight-normal">Edit profile</h6></a>
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
			 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
				 <div class="mdc-card info-card info-card--success">
                  <div class="card-inner">
                    <h6 class="font-weight-light pb-2 mb-1"><?php echo "Time: ".date("h:i a"); ?></h6>
                    <h6 class="font-weight-light pb-2 mb-1 border-bottom"><?php echo "Date: ".date("d/m/Y"); ?></h6>
                    <p class="tx-12 text-muted"><?php echo "Today is ".date("l"); ?></p>
                    <div class="card-icon-wrapper">
                      <i class="material-icons">access_time</i>
                    </div>
                  </div>
                </div>
              </div>      
			  
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--info">
                  <div class="card-inner">
                    <h6 class="font-weight-light pb-2 mb-1"><?php echo "Active Doctor" ?></h6>
                    <h6 class="font-weight-light pb-2 mb-1 border-bottom"><?php echo "Total: ".$docActive;?></h6>
                    <p class="tx-12 text-muted"><?php echo "<b>".$docInactive."</b> requests pending"; ?></p> 
				    <div class="card-icon-wrapper">
                      <i class="material-icons">assignment_ind</i>
                    </div>
                  </div>
                </div>
              </div>
			  			  
			  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--danger">
                  <div class="card-inner">
                    <h6 class="font-weight-light pb-2 mb-1">Active Patient</h6>
                    <h6 class="font-weight-light pb-2 mb-1 border-bottom"><?php echo "Total: ".$paActive;?></h6>
                    <p class="tx-12 text-muted"><?php echo "<b>".$paInactive."</b> requests pending"; ?></p>
                     <div class="card-icon-wrapper">
                      <i class="material-icons">airline_seat_flat_angled</i>
                    </div>
                  </div>
                </div>
              </div>
			  
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--primary">
                  <div class="card-inner">
                    <h6 class="font-weight-light pb-2 mb-1">Active Pharmaceutical</h6>
                    <h6 class="font-weight-light pb-2 mb-1 border-bottom"><?php echo "Total: ".$phActive;?></h6>
                    <p class="tx-12 text-muted"><?php echo "<b>".$phInactive."</b> requests pending"; ?></p>
                    <div class="card-icon-wrapper">
                      <i class="material-icons">local_hospital</i>
                    </div>
                  </div>
                </div>
              </div>	

			 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-4-tablet">
               <div class="mdc-card">
				<form action="dash_admin.php" method="post" enctype="multipart/form-data">
				  <input type="file" name="fileToUpload1" id="fileToUpload" required>
				  <br><br>
				  <button class="mdc-button mdc-button--raised filled-button--dark" type="submit" value="" name="submit1">Upload Prediction</button>
				</form>
               </div>
			 </div>
			  
			 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-4-tablet">
			  <div class="mdc-card">
				<form action="dash_admin.php" method="post" enctype="multipart/form-data">
				  <input type="file" name="fileToUpload2" id="fileToUpload" required>
				  <br><br>
				  <button class="mdc-button mdc-button--raised filled-button--dark" type="submit" value="" name="submit2">Upload ETS Decomposition</button>
				</form>
              </div>
			 </div>

			  
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

<?php
$target_dir = "assets/images/prediction/";
$target_file = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$file1 = basename($_FILES["fileToUpload1"]["name"]);

if(isset($_POST["submit1"])) {
	$check = getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
	if($check !== false) 
	{
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
		{
			print "<script type=\"text/javascript\"> alert('Sorry, only JPG, JPEG & PNG files are allowed!!'); </script>";
		}
		
		else
		{
			move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file);
						
			//data insert to prediction table
			$sql = "INSERT INTO `prediction`(`prediction_img`, `fig_type`) VALUES ('$file1','1')";
			$result=$conn->query($sql);
			mysqli_close($conn);
			
			print "<script type=\"text/javascript\"> alert('Uploaded Successfully!!'); </script>";
		}    
	} 	
	else 
	{
		print "<script type=\"text/javascript\"> alert('Sorry, file is not an image!!'); </script>";
	}
}
?>

<?php
$target_dir2 = "assets/images/prediction/";
$target_file2 = $target_dir2 . basename($_FILES["fileToUpload2"]["name"]);
$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
$file2 = basename($_FILES["fileToUpload2"]["name"]);

if(isset($_POST["submit2"])) {
	$check = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
	if($check !== false) 
	{
		if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg") 
		{
			print "<script type=\"text/javascript\"> alert('Sorry, only JPG, JPEG & PNG files are allowed!!'); </script>";
		}
		
		else
		{
			move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2);
			
			//data insert to prediction table
			$sql = "INSERT INTO `prediction`(`ets_decomposition`, `fig_type`) VALUES ('$file2','2')";
			$result=$conn->query($sql);
			mysqli_close($conn);
			
			print "<script type=\"text/javascript\"> alert('Uploaded Successfully!!'); </script>";
		}    
	} 	
	else 
	{
		print "<script type=\"text/javascript\"> alert('Sorry, file is not an image!!'); </script>";
	}
}
?>