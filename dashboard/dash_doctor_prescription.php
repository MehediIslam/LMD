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

//global variable
$doc_id;

//selecting doctor's information who is logged
$select = "SELECT doctors.doc_id, doctors.fname, doctors.lname, doctors.dob, doctors.gender, doctors.blood, doctors.nid, doctors.nationality, doctors.phone, doctors.email, doctors.propic, doctors.degrees, (SELECT specialization FROM `specialization` WHERE `specialize_id` = doctors.specialize_id) as specialization, doctors.chamber FROM `doctors` INNER JOIN login ON doctors.doc_id=login.doc_id where login.login_id=$login_id";
$result=$conn->query($select);
while($row = $result->fetch_assoc())
{
  $fname = $row['fname'];
  $lname = $row['lname'];
  $email = $row['email'];
  $phonr = $row['phone'];
  $propic = $row['propic'];
  $chamber = $row['chamber'];
  $degree = $row['degrees'];
  $specializ = $row['specialization'];
  $doc_id = $row['doc_id'];
}

if (isset($_SESSION['patient_id'])){
	 $patient_id = $_SESSION['patient_id'];
	//selecting patient's information who is selected
	$select2 = "SELECT fname,`lname`,`gender`, dob, CONCAT(CONCAT(TRUNCATE(TIMESTAMPDIFF(MONTH, DOB,SYSDATE())/12,0), ' year  '),    CONCAT(TRUNCATE(MOD(TIMESTAMPDIFF(MONTH, DOB,SYSDATE()),12),0), ' month')) as age FROM patients WHERE patient_id = $patient_id";
	$result2=$conn->query($select2);
	while($row2 = $result2->fetch_assoc())
	{
	  $pfname = $row2['fname'];
	  $plname = $row2['lname'];
	  $age = $row2['age'];
	  $gender = $row2['gender'];
	}	
	//date format exchange
	$curdate = date('Y-m-d');
	$displaydate = date("d-M-Y", strtotime($curdate));	
}
		
		
	if(isset($_POST['submit'])) { 
		if((isset($_POST['suspected_disease']) != NULL)&&(isset($_POST['patient_department']) != NULL)){				
		
		$patient_id = $_POST['patient_id'];
		$patient_age_at_time = $_POST['patient_age'];
		$patient_department = $_POST['patient_department'];
		$c_c = $_POST['c/c'];
		$o_e = $_POST['o/e'];
		$findings = $_POST['findings'];
		$disease_id = $_POST['suspected_disease'];
		$advise = $_POST['advise'];
		$date = date('Y-m-d');
		
		$sql = "INSERT INTO `prescription`(`doc_id`, `patient_id`,`patient_age`,`patient_department`, `c/c`, `o/e`, `findings`, `disease_id`, `advise`, `date`) VALUES ('$doc_id','$patient_id','$patient_age_at_time','$patient_department','$c_c','$o_e','$findings','$disease_id','$advise','$date')";	
		if (mysqli_query($conn, $sql)) {
			
			//returning last prescription id
			$prescription_id = mysqli_insert_id($conn);
			
			//insert medicines...
			$medicine_id = $_POST['prescribed_medicines'];
			$minstruction = $_POST['medicines_instruction'];
			$madvise = $_POST['medication_advise'];
			
			$arr_size = count($medicine_id);	
			for($x = 0; $x<$arr_size; $x++) {				
				$sql2 = "INSERT INTO `prescribed_medicines`(`prescription_id`, `medid`, `instruction_route`, `medication_advise`) 
				VALUES ('$prescription_id','$medicine_id[$x]','$minstruction[$x]','$madvise[$x]')";
				$result=$conn->query($sql2);	
			}
					
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
		  unset($_SESSION['patient_id']);	
		  header('Location:dash_doctor.php');
		}
		
		else{
				print('<script>alert("Please select required field");</script>');
			}
	} 
	
	if(isset($_POST['discard'])) {
		 unset($_SESSION['patient_id']);	
	     header('Location:dash_doctor.php');
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
  
<!--Custom Dropdown style-->  
<style>
.cusselect-css {
    display: block;
    font-size: 16px;
	color: #615a5a;
    font-family: sans-serif;
    font-weight: 300;
    line-height: 1.3;
    padding: .6em 1.4em .5em .8em;
    width: 100%;
	height: 98%;
    max-width: 100%; 
    box-sizing: border-box;
	border:0.5px solid #edebeb;
    margin: 1px;
    -moz-appearance: none;
    -webkit-appearance: none;
    appearance: none;
    background-color: #fff;
    background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
      linear-gradient(to bottom, #ffffff 0%,#e5e5e5 100%);
    background-repeat: no-repeat, repeat;
    background-position: right .7em top 50%, 0 0;
    background-size: .65em auto, 100%;
}

.cusselect-css:hover {
  cursor: pointer;
}
.cusselectbody{
  padding-top: 5%;
}
.cusselectbody2{
  padding-top: 3%;
}
.cusselectbody3{
  padding-top: 4%;
}
</style>
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
            <span class="mdc-top-app-bar__title">Prescription Form</span>	
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

  <div class="mdc-layout-grid__cell--span-12">
	<div class="mdc-card">
	  <div class="template-demo">
	  <form method="post" action="#" enctype="multipart/form-data">
		<div class="mdc-layout-grid__inner">
					
			  <!--Patient-Info Part-->
			  <!-- Row 1 -->			  
			  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
				<div class="mdc-text-field mdc-text-field--outlined">
				  <input class="mdc-text-field__input" id="text-field-hero-input" name="patient_id" value='<?php echo $patient_id;?>' readonly>
				  <div class="mdc-notched-outline">
					<div class="mdc-notched-outline__leading"></div>
					<div class="mdc-notched-outline__notch">
					  <label for="text-field-hero-input" class="mdc-floating-label">Patient ID</label>
					</div>
					<div class="mdc-notched-outline__trailing"></div>
				  </div>
				</div>
			  </div>
			  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop cusselectbody3">
				<select class="cusselect-css" name="patient_department">
					<option disabled selected>Patient Department*</option>
					<option value="OPD">OPD</option>
					<option value="IPD">IPD</option>			
				</select>
			  </div>
			  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
				<div class="mdc-text-field mdc-text-field--outlined">
				  <input class="mdc-text-field__input" id="text-field-hero-input" value='<?php echo $displaydate;?>' readonly>
				  <div class="mdc-notched-outline">
					<div class="mdc-notched-outline__leading"></div>
					<div class="mdc-notched-outline__notch">
					  <label for="text-field-hero-input" class="mdc-floating-label" name="prescription_date">Prescription Date</label>
					</div>
					<div class="mdc-notched-outline__trailing"></div>
				  </div>
				</div>
			  </div>
			  <!-- Row 2 -->
			  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
				<div class="mdc-text-field mdc-text-field--outlined">
				  <input class="mdc-text-field__input" id="text-field-hero-input" value='<?php echo $pfname." ".$plname;?>' name="patient_name" readonly>
				  <div class="mdc-notched-outline">
					<div class="mdc-notched-outline__leading"></div>
					<div class="mdc-notched-outline__notch">
					  <label for="text-field-hero-input" class="mdc-floating-label">Patient Name</label>
					</div>
					<div class="mdc-notched-outline__trailing"></div>
				  </div>
				</div>
			  </div> 
			  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
				<div class="mdc-text-field mdc-text-field--outlined">
				  <input class="mdc-text-field__input" id="text-field-hero-input" value='<?php echo $age;?>' name="patient_age" readonly>
				  <div class="mdc-notched-outline">
					<div class="mdc-notched-outline__leading"></div>
					<div class="mdc-notched-outline__notch">
					  <label for="text-field-hero-input" class="mdc-floating-label">Age</label>
					</div>
					<div class="mdc-notched-outline__trailing"></div>
				  </div>
				</div>
			  </div>
			  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
				<div class="mdc-text-field mdc-text-field--outlined">
				  <input class="mdc-text-field__input" id="text-field-hero-input" value='<?php echo $gender;?>' name="patient_sex" readonly>
				  <div class="mdc-notched-outline">
					<div class="mdc-notched-outline__leading"></div>
					<div class="mdc-notched-outline__notch">
					  <label for="text-field-hero-input" class="mdc-floating-label">Sex</label>
					</div>
					<div class="mdc-notched-outline__trailing"></div>
				  </div>
				</div>
			  </div>


			  <!--Diagnosis Part-->
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
				<h6 class="card-title mb-2">Diagnosis</h6>
				<div class="mdc-layout-grid__inner">
				
				<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
					<div class="mdc-text-field mdc-text-field--outlined">
					  <textarea class="mdc-text-field__input" id="text-field-hero-input" name="c/c" ></textarea>
					  <div class="mdc-notched-outline">
						<div class="mdc-notched-outline__leading"></div>
						<div class="mdc-notched-outline__notch">
						  <label for="text-field-hero-input" class="mdc-floating-label">Chief Complaint (C/C)</label>
						</div>
						<div class="mdc-notched-outline__trailing"></div>
					  </div>
					</div>
				  </div>
				  
				  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
					<div class="mdc-text-field mdc-text-field--outlined">
					  <textarea class="mdc-text-field__input" id="text-field-hero-input" name="o/e"></textarea>
					  <div class="mdc-notched-outline">
						<div class="mdc-notched-outline__leading"></div>
						<div class="mdc-notched-outline__notch">
						  <label for="text-field-hero-input" class="mdc-floating-label">On Examination (O/E)</label>
						</div>
						<div class="mdc-notched-outline__trailing"></div>
					  </div>
					</div>
				  </div>
				  				  
				  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
					<div class="mdc-text-field mdc-text-field--outlined">
					  <textarea class="mdc-text-field__input" id="text-field-hero-input" name="findings"></textarea>
					  <div class="mdc-notched-outline">
						<div class="mdc-notched-outline__leading"></div>
						<div class="mdc-notched-outline__notch">
						  <label for="text-field-hero-input" class="mdc-floating-label">Your Investigations and Findings</label>
						</div>
						<div class="mdc-notched-outline__trailing"></div>
					  </div>
					</div>
				  </div>
				  
				  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop cusselectbody2">
					<select class="cusselect-css" name="suspected_disease">
						<option disabled selected >Suspected Disease Area*</option>
						<?php
						//fetching disease list
						$select3 = "SELECT * FROM `disease` WHERE status = 1";
						$result3=$conn->query($select3);
						while($row3 = $result3->fetch_assoc())
						{
						  echo "<option value='".$row3['disease_id']."'>".$row3['disease_name']."</option>" ;
						}		
						?>
					</select>
				  </div>
                 
                </div>
                </div> 
              </div>
			  
			  <!--Rx/Medicine Part-->
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
				 <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-2">Rx</h4>
                    <div>
                        <i class="material-icons refresh-icon" onclick="addMedicine()">add_box</i>
                    </div>
                 </div>
				<div class="mdc-layout-grid__inner">
				  <!-- Medicine 1 -->
				 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop cusselectbody">
						<select class="cusselect-css" name="prescribed_medicines[]">
							<option disabled selected>Select Medicine 1</option>
							<?php
							//fetching medicine list
							$select2 = "SELECT * FROM `medicine`";
							$result2=$conn->query($select2);
							while($row2 = $result2->fetch_assoc())
							{
							  echo "<option value='".$row2['medid']."'>".$row2['type']." > ".$row2['med_name']." -- ".$row2['power']."</option>" ;
							}		
							?>
						</select>
				 </div>
				 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop cusselectbody">
						<select class="cusselect-css" name="medicines_instruction[]">
							<option disabled selected>Instruction / Route</option>
							<option value="0 + 0 + 1">0 + 0 + 1</option>
							<option value="0 + 1 + 1">0 + 1 + 1</option>
							<option value="1 + 1 + 1">1 + 1 + 1</option>
							<option value="1 + 1 + 0">1 + 1 + 0</option>
							<option value="1 + 0 + 0">1 + 0 + 0</option>
							<option value="1 + 0 + 1">1 + 0 + 1</option>
							<option value="0 + 1 + 0">0 + 1 + 0</option>
						</select>
				  </div>
				  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
					<div class="mdc-text-field mdc-text-field--outlined">
					  <input class="mdc-text-field__input" id="text-field-hero-input" name="medication_advise[]">
					  <div class="mdc-notched-outline">
						<div class="mdc-notched-outline__leading"></div>
						<div class="mdc-notched-outline__notch">
						  <label for="text-field-hero-input" class="mdc-floating-label">Advise on Medication</label>
						</div>
						<div class="mdc-notched-outline__trailing"></div>
					  </div>
					</div>
				  </div>
				  
				 <!-- Medicine 2 -->
				 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop cusselectbody">
						<select class="cusselect-css" name="prescribed_medicines[]">
							<option disabled selected>Select Medicine 2</option>
							<?php
							//fetching medicine list
							$select2 = "SELECT * FROM `medicine`";
							$result2=$conn->query($select2);
							while($row2 = $result2->fetch_assoc())
							{
							  echo "<option value='".$row2['medid']."'>".$row2['type']." > ".$row2['med_name']." -- ".$row2['power']."</option>" ;
							}		
							?>
						</select>
				 </div>  
				 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop cusselectbody">
						<select class="cusselect-css" name="medicines_instruction[]">
							<option disabled selected>Instruction / Route</option>
							<option value="0 + 0 + 1">0 + 0 + 1</option>
							<option value="0 + 1 + 1">0 + 1 + 1</option>
							<option value="1 + 1 + 1">1 + 1 + 1</option>
							<option value="1 + 1 + 0">1 + 1 + 0</option>
							<option value="1 + 0 + 0">1 + 0 + 0</option>
							<option value="1 + 0 + 1">1 + 0 + 1</option>
							<option value="0 + 1 + 0">0 + 1 + 0</option>
						</select>
				  </div>
				  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
					<div class="mdc-text-field mdc-text-field--outlined">
					  <input class="mdc-text-field__input" id="text-field-hero-input" name="medication_advise[]">
					  <div class="mdc-notched-outline">
						<div class="mdc-notched-outline__leading"></div>
						<div class="mdc-notched-outline__notch">
						  <label for="text-field-hero-input" class="mdc-floating-label">Advise on Medication</label>
						</div>
						<div class="mdc-notched-outline__trailing"></div>
					  </div>
					</div>
				  </div>
				  
				  <!-- Medicine 3 -->
				 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop cusselectbody">
						<select class="cusselect-css" name="prescribed_medicines[]">
							<option disabled selected>Select Medicine 3</option>
							<?php
							//fetching medicine list
							$select2 = "SELECT * FROM `medicine`";
							$result2=$conn->query($select2);
							while($row2 = $result2->fetch_assoc())
							{
							  echo "<option value='".$row2['medid']."'>".$row2['type']." > ".$row2['med_name']." -- ".$row2['power']."</option>" ;
							}		
							?>
						</select>
				 </div>  
				 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop cusselectbody">
						<select class="cusselect-css" name="medicines_instruction[]">
							<option disabled selected>Instruction / Route</option>
							<option value="0 + 0 + 1">0 + 0 + 1</option>
							<option value="0 + 1 + 1">0 + 1 + 1</option>
							<option value="1 + 1 + 1">1 + 1 + 1</option>
							<option value="1 + 1 + 0">1 + 1 + 0</option>
							<option value="1 + 0 + 0">1 + 0 + 0</option>
							<option value="1 + 0 + 1">1 + 0 + 1</option>
							<option value="0 + 1 + 0">0 + 1 + 0</option>
						</select>
				  </div>
				  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
					<div class="mdc-text-field mdc-text-field--outlined">
					  <input class="mdc-text-field__input" id="text-field-hero-input" name="medication_advise[]">
					  <div class="mdc-notched-outline">
						<div class="mdc-notched-outline__leading"></div>
						<div class="mdc-notched-outline__notch">
						  <label for="text-field-hero-input" class="mdc-floating-label">Advise on Medication</label>
						</div>
						<div class="mdc-notched-outline__trailing"></div>
					  </div>
					</div>
				  </div>
				  
				   <!-- Medicine 4 -->
				 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop cusselectbody">
						<select class="cusselect-css" name="prescribed_medicines[]">
							<option disabled selected>Select Medicine 4</option>
							<?php
							//fetching medicine list
							$select2 = "SELECT * FROM `medicine`";
							$result2=$conn->query($select2);
							while($row2 = $result2->fetch_assoc())
							{
							  echo "<option value='".$row2['medid']."'>".$row2['type']." > ".$row2['med_name']." -- ".$row2['power']."</option>" ;
							}		
							?>
						</select>
				 </div>  
				 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop cusselectbody">
						<select class="cusselect-css" name="medicines_instruction[]">
							<option disabled selected>Instruction / Route</option>
							<option value="0 + 0 + 1">0 + 0 + 1</option>
							<option value="0 + 1 + 1">0 + 1 + 1</option>
							<option value="1 + 1 + 1">1 + 1 + 1</option>
							<option value="1 + 1 + 0">1 + 1 + 0</option>
							<option value="1 + 0 + 0">1 + 0 + 0</option>
							<option value="1 + 0 + 1">1 + 0 + 1</option>
							<option value="0 + 1 + 0">0 + 1 + 0</option>
						</select>
				  </div>
				  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
					<div class="mdc-text-field mdc-text-field--outlined">
					  <input class="mdc-text-field__input" id="text-field-hero-input" name="medication_advise[]">
					  <div class="mdc-notched-outline">
						<div class="mdc-notched-outline__leading"></div>
						<div class="mdc-notched-outline__notch">
						  <label for="text-field-hero-input" class="mdc-floating-label">Advise on Medication</label>
						</div>
						<div class="mdc-notched-outline__trailing"></div>
					  </div>
					</div>
				  </div>
				  
				   <!-- Medicine 5 -->
				 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop cusselectbody">
						<select class="cusselect-css" name="prescribed_medicines[]">
							<option disabled selected>Select Medicine 5</option>
							<?php
							//fetching medicine list
							$select2 = "SELECT * FROM `medicine`";
							$result2=$conn->query($select2);
							while($row2 = $result2->fetch_assoc())
							{
							  echo "<option value='".$row2['medid']."'>".$row2['type']." > ".$row2['med_name']." -- ".$row2['power']."</option>" ;
							}		
							?>
						</select>
				 </div>  
				 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop cusselectbody">
						<select class="cusselect-css" name="medicines_instruction[]">
							<option disabled selected>Instruction / Route</option>
							<option value="0 + 0 + 1">0 + 0 + 1</option>
							<option value="0 + 1 + 1">0 + 1 + 1</option>
							<option value="1 + 1 + 1">1 + 1 + 1</option>
							<option value="1 + 1 + 0">1 + 1 + 0</option>
							<option value="1 + 0 + 0">1 + 0 + 0</option>
							<option value="1 + 0 + 1">1 + 0 + 1</option>
							<option value="0 + 1 + 0">0 + 1 + 0</option>
						</select>
				  </div>
				  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
					<div class="mdc-text-field mdc-text-field--outlined">
					  <input class="mdc-text-field__input" id="text-field-hero-input" name="medication_advise[]">
					  <div class="mdc-notched-outline">
						<div class="mdc-notched-outline__leading"></div>
						<div class="mdc-notched-outline__notch">
						  <label for="text-field-hero-input" class="mdc-floating-label">Advise on Medication</label>
						</div>
						<div class="mdc-notched-outline__trailing"></div>
					  </div>
					</div>
				  </div>
				  
				   <!-- Medicine 6 -->
				 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop cusselectbody">
						<select class="cusselect-css" name="prescribed_medicines[]">
							<option disabled selected>Select Medicine 6</option>
							<?php
							//fetching medicine list
							$select2 = "SELECT * FROM `medicine`";
							$result2=$conn->query($select2);
							while($row2 = $result2->fetch_assoc())
							{
							  echo "<option value='".$row2['medid']."'>".$row2['type']." > ".$row2['med_name']." -- ".$row2['power']."</option>" ;
							}		
							?>
						</select>
				 </div>  
				 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop cusselectbody">
						<select class="cusselect-css" name="medicines_instruction[]">
							<option disabled selected>Instruction / Route</option>
							<option value="0 + 0 + 1">0 + 0 + 1</option>
							<option value="0 + 1 + 1">0 + 1 + 1</option>
							<option value="1 + 1 + 1">1 + 1 + 1</option>
							<option value="1 + 1 + 0">1 + 1 + 0</option>
							<option value="1 + 0 + 0">1 + 0 + 0</option>
							<option value="1 + 0 + 1">1 + 0 + 1</option>
							<option value="0 + 1 + 0">0 + 1 + 0</option>
						</select>
				  </div>
				  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
					<div class="mdc-text-field mdc-text-field--outlined">
					  <input class="mdc-text-field__input" id="text-field-hero-input" name="medication_advise[]">
					  <div class="mdc-notched-outline">
						<div class="mdc-notched-outline__leading"></div>
						<div class="mdc-notched-outline__notch">
						  <label for="text-field-hero-input" class="mdc-floating-label">Advise on Medication</label>
						</div>
						<div class="mdc-notched-outline__trailing"></div>
					  </div>
					</div>
				  </div>
                 
                </div>
                </div> 
              </div>
			  
			  <!--Last Part-->
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
				<div class="mdc-layout-grid__inner">			  
				   <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
					<div class="mdc-text-field mdc-text-field--outlined">
					  <textarea class="mdc-text-field__input" id="text-field-hero-input" name="advise"></textarea>
					  <div class="mdc-notched-outline">
						<div class="mdc-notched-outline__leading"></div>
						<div class="mdc-notched-outline__notch">
						  <label for="text-field-hero-input" class="mdc-floating-label">Advise</label>
						</div>
						<div class="mdc-notched-outline__trailing"></div>
					  </div>
					</div>
				  </div>
				  
				<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">	
					<div class="template-demo typography-demo">
						<div class="mdc-layout-grid__inner align-items-center">
						<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
							<h1 class="mdc-typography--subtitle2"><b><?php echo $fname." ".$lname?></b><br><?php echo $degree;?><?php echo ", Specialization: ".$specializ;?><br><?php echo $chamber;?></h1>
						</div>
						</div>
					</div>
                </div>
                 <button class="mdc-button mdc-button--raised filled-button--dark" type="submit" name="submit">Submit</button>
                 <button class="mdc-button mdc-button--raised filled-button--dark" name="discard">Discard</button>	 
                </div>
                </div> 
              </div>				  
		</div>		
		</form>
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
  <script>
	function addMedicine() {
	  alert("Sorry!! You can not add more medicines in this beta version.");
	}
	</script>

</body>
</html> 