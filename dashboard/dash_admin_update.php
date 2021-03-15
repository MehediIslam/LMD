<?php
ob_start();
error_reporting(0);
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
//selecting Admin's information who is logged
$select = "SELECT password FROM login WHERE login_id =$login_id";
$result=$conn->query($select);
while($row = $result->fetch_assoc())
{
  $oldpass = $row['password'];
}

if (isset($_POST['pachange'])){
	
	if($oldpass === $_POST['oldpass'])
	{
		if($_POST['newpass'] === $_POST['repass'])
		{
			$newpassword = $_POST['repass'];
			$logdate = date("d/m/Y")." at ".date("h:i a");
			$query1 = "UPDATE `login` SET `password`='$newpassword',`last_activity`='$logdate' WHERE `login_id`=$login_id";
			$result=$conn->query($query1);
			mysqli_close($conn);
			header('Location: dash_admin_update.php');		
		}
		else{
			print "<script type=\"text/javascript\"> alert('Re-type password not matched !!'); </script>";
		}
	}
	
	else
	{
		print "<script type=\"text/javascript\"> alert('Current password not matched !!'); </script>";
	}	
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
			<span class="mdc-top-app-bar__title">Update Profile</span>						
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
	 
			  	 <!-- Section 1 -->
		  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                <div class="mdc-card">
			<form id="reg-form" action="dash_admin_update.php" method="post" enctype="multipart/form-data">		
			  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-2 text-muted tx-14">
				<h6>Change Password</h6>
			  </div><br>
			  <div class="template-demo">
				<div class="mdc-layout-grid__inner">
				
				  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
					 <div class="mdc-text-field mdc-text-field--outlined">
					  <input class="mdc-text-field__input" id="text-field-hero-input" type="password" required name="oldpass">
					  <div class="mdc-notched-outline">
						<div class="mdc-notched-outline__leading"></div>
						<div class="mdc-notched-outline__notch">
						  <label for="text-field-hero-input" class="mdc-floating-label" >Enter your current Password</label>
						</div>
						<div class="mdc-notched-outline__trailing"></div>
					  </div>
					</div>
				   </div>
				   <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
					 <div class="mdc-text-field mdc-text-field--outlined">
					  <input class="mdc-text-field__input" id="text-field-hero-input" type="password" name="newpass">
					  <div class="mdc-notched-outline">
						<div class="mdc-notched-outline__leading"></div>
						<div class="mdc-notched-outline__notch">
						  <label for="text-field-hero-input" class="mdc-floating-label" >New Password</label>
						</div>
						<div class="mdc-notched-outline__trailing"></div>
					  </div>
					</div>
				  </div>			 				  
				  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
					 <div class="mdc-text-field mdc-text-field--outlined">
					  <input class="mdc-text-field__input" type="password" id="text-field-hero-input" required name="repass">
					  <div class="mdc-notched-outline">
						<div class="mdc-notched-outline__leading"></div>
						<div class="mdc-notched-outline__notch">
						  <label for="text-field-hero-input" class="mdc-floating-label" >Confirm new Password</label>
						</div>
						<div class="mdc-notched-outline__trailing"></div>
					  </div>
					</div>
				  </div>
									 
                  </div>
                  </div>
				  <br>			
					<button class="mdc-button mdc-button--raised filled-button--dark" type="submit" name="pachange">Change</button>		 
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