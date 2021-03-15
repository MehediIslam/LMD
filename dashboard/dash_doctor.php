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

$doc_id;	//global variable

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

//checkup counter
$selectc = "SELECT COUNT(`prescription_id`) AS today FROM `prescription` WHERE `doc_id` = '$doc_id' AND `date` = CURDATE()";
$resultc=$conn->query($selectc);
while($rowc = $resultc->fetch_assoc())
{
  $todays_check = $rowc['today'];
}

$selectd = "SELECT COUNT(`prescription_id`) AS total FROM `prescription` WHERE `doc_id` = '$doc_id'";
$resultd=$conn->query($selectd);
while($rowd = $resultd->fetch_assoc())
{
  $total = $rowd['total'];
}


//form submit and pass patient_id to the prescription page
if(isset($_POST["add"])) {
	$patient_info = $_POST['patient_info'];
	$sql = "SELECT * FROM patients WHERE CONCAT(fname,' ',lname,' ',email) = '$patient_info' OR phone='$patient_info'";
	$result2=$conn->query($sql);
	while($row2 = $result2->fetch_assoc())
	{
		$patient_id = $row2['patient_id'];
	}	
	echo $_SESSION["patient_id"] = $patient_id;
	header('Location:dash_doctor_prescription.php');
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
  
  <style type="text/css">
    /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
		background: white;
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
	
}
</style>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

</head>
<body>
<script src="assets/js/preloader.js"></script>
  <div class="body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
      <div class="mdc-drawer__header">
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
		<form action="#" method="post" enctype="multipart/form-data">
          <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <a class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">menu</a>
			<span class="mdc-top-app-bar__title"></span>			
			<div class="search-box">
				<div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon search-text-field d-none d-md-flex">
				  <i class="material-icons mdc-text-field__icon">search</i>
				  <input class="mdc-text-field__input" id="text-field-hero-input" autocomplete="off" type="text" name="patient_info" required>
				  
				  <div class="result"></div>
				  <div class="mdc-notched-outline">
					<div class="mdc-notched-outline__leading"></div>
					<div class="mdc-notched-outline__notch">
					  <label for="text-field-hero-input" class="mdc-floating-label">Search Patient by Phone</label>
					</div>
					<div class="mdc-notched-outline__trailing"></div>
				  </div>
				</div>
			</div>
			
			<span class="mdc-top-app-bar__title"><span class="mdc-top-app-bar__title">
			<button class="mdc-button mdc-button--raised filled-button--dark" type="submit" name="add">Generate Prescription</button>
			</span></span>					
          </div>
		</form>
		  
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
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
              </div>
			  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
              </div>
			  
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--info">
                  <div class="card-inner">
                    <h6 class="font-weight-light pb-2 mb-1"><?php echo $fname." ".$lname; ?></h6>
                    <h6 class="font-weight-light pb-2 mb-1 border-bottom"><?php echo $degree?></h6>
                    <p class="tx-12 text-muted"><?php echo "<b>Specialization:</b> ".$specializ; ?></p> 
				    <div class="card-icon-wrapper">
                      <i class="material-icons">assignment_ind</i>
                    </div>
                  </div>
                </div>
              </div>
			  
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
            </div>
          </div>
		
          <div class="mdc-layout-grid">	  
            <div class="mdc-layout-grid__inner">
             <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">             
              </div>
			  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
              </div>
			  
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--danger">
                  <div class="card-inner">
                    <h6 class="font-weight-light pb-2 mb-1">Today's Viewed</h6>
                    <h6 class="font-weight-light pb-2 mb-1 border-bottom"><?php echo $todays_check." Patients";?></h6>
                    <p class="tx-12 text-muted"><?php echo $chamber; ?></p>
                     <div class="card-icon-wrapper">
                      <i class="material-icons">airline_seat_flat_angled</i>
                    </div>
                  </div>
                </div>
              </div>
			  
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--primary">
                  <div class="card-inner">
                    <h6 class="font-weight-light pb-2 mb-1">Total Viewed</h6>
                    <h6 class="font-weight-light pb-2 mb-1 border-bottom"><?php echo $total." Patients";?></h6>
                    <p class="tx-12 text-muted">Till now you have been checked-up</p>
                    <div class="card-icon-wrapper">
                      <i class="material-icons">local_hospital</i>
                    </div>
                  </div>
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