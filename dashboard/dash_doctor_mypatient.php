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
if ($login_id == NULL && $_SESSION['user_type'] != 'Doctor') {
    header('Location: ../index.php');
}

//selecting doctor's information who is logged
$select = "SELECT doctors.doc_id, doctors.fname, doctors.lname, doctors.dob, doctors.gender, doctors.blood, doctors.nid, doctors.nationality, doctors.phone, doctors.email, doctors.propic, doctors.degrees, (SELECT specialization FROM `specialization` WHERE `specialize_id` = doctors.specialize_id) as specialization, doctors.chamber FROM `doctors` INNER JOIN login ON doctors.doc_id=login.doc_id where login.login_id=$login_id";
$result=$conn->query($select);
while($row = $result->fetch_assoc())
{
  $fname = $row['fname'];
  $lname = $row['lname'];
  $email = $row['email'];
  $propic = $row['propic'];
  $chamber = $row['chamber'];
  $degree = $row['degrees'];
  $specializ = $row['specialization'];
  $doc_id = $row['doc_id'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Doctor</title>
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
        <a href="dash_doctor.php" class="brand-logo">
          <img src="assets/images/logo.jpg" alt="logo">
        </a>
		
      </div>
      <div class="mdc-drawer__content">
        <div class="user-info">
          <p class="name"><?php echo "Hello, ".$fname." !!"?></p>
          <p class="email"><?php echo $email?></p>
        </div>
        <div class="mdc-list-group">
          <nav class="mdc-list mdc-drawer-menu">
          
          
       
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="dash_doctor.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">assignment</i>
                Make Prescription
              </a>
            </div>
     
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="sample-page-submenu">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">assignment_ind</i>
                Patient
                <i class="mdc-drawer-arrow material-icons">chevron_right</i>
              </a>
              <div class="mdc-expansion-panel" id="sample-page-submenu">
                <nav class="mdc-list mdc-drawer-submenu">
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="dash_doctor_mypatient.php">
                     My Patients
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="dash_doctor_allpatient.php">
                      All Patients
                    </a>
                  </div>
         
                </nav>
              </div>
            </div>
			
			<div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="dash_doctor_medicine.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">local_hospital</i>
                Show Medicine
              </a>
            </div>
			
			<div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="dash_doctor_request.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">touch_app</i>
                Necessary Input
              </a>
            </div>    
          </nav>
        </div>
		
		<br>
		 <div class="profile-actions">
          <a href="dash_doctor_update.php">Edit Profile</a>
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
                    <?php echo "<img src='../photos/uploads/doctor/$propic' alt='user' class='user'>" ?>
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
                      <a href="dash_doctor_update.php"><h6 class="item-subject font-weight-normal">Edit profile</h6></a>
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
       
	   		<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card p-0">
                  <h6 class="card-title card-padding pb-0">My Patients</h6><br>
                  <div class="table-responsive">
                    <table class="table table-hoverable">
                      <thead>
                        <tr>
                          <th class="text-right">Patient ID</th>
                          <th>Patient Name</th>
                          <th>Blood Group</th>
                          <th>Phone</th>
                          <th>Email</th>
                          <th>District</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
						   $sql = "SELECT DISTINCT patients.patient_id, patients.fname, patients.lname, patients.blood, patients.phone, patients.email, (SELECT district_name from district WHERE district_id = patients.district_id) AS district FROM patients INNER JOIN prescription ON patients.patient_id = prescription.patient_id WHERE prescription.doc_id = $doc_id";
						   $result2=$conn->query($sql);
						   while($row2=$result2->fetch_assoc())
						   {	   
						?>
						
						<tr>
                          <td><?php echo $row2['patient_id'];?></td>
                          
						  <?php echo "<td> <a title='Click to view all Prescriptions' href=\"dash_doctor_mypatient_prescriptions.php?patient_id=$row2[patient_id]\">$row2[fname] $row2[lname]</a></td>" ?>
                          <td><?php echo $row2['blood'];?></td>
                          <td><?php echo $row2['phone'];?></td>
                          <td><?php echo $row2['email'];?></td>
                          <td><?php echo $row2['district'];?></td>
                        </tr>
						
						<?php }?>
                      </tbody>
                    </table>
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