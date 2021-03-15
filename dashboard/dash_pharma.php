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
if ($login_id == NULL && $_SESSION['user_type'] != 'Pharmaceutical') {
    header('Location: ../index.php');
}
?>

<?php
//selecting data associated with this particular id
$select = "SELECT login.company_id, pharmaceutical.name,pharmaceutical.email FROM `login` INNER JOIN `pharmaceutical` ON login.company_id = pharmaceutical.company_id WHERE login_id = $login_id";
$result=$conn->query($select);
while($row = $result->fetch_assoc())
{
  $name = $row['name'];
  $company_id = $row['company_id'];
  $email= $row['email'];
}
	
//form submit
if(isset($_POST["add"])) {
	$med_name = $_POST['medname'];
	$med_power = $_POST['power'];
	$type = $_POST['type'];
	$generic = $_POST['generic'];
	$price = $_POST['price'];
	$description = $_POST['desp'];
	
	$sql = "INSERT INTO `medicine`(`med_name`, `power`, `genericid`, `company_id`, `type`, `rate`, `description`) VALUES ('$med_name','$med_power mg','$generic','$company_id','$type','$price','$description')";
	$result=$conn->query($sql);	
	
	//user last activity
	date_default_timezone_set("Asia/Dhaka");
	$logdate = date("d/m/Y")." at ".date("h:i a");
	$sql_log = "UPDATE `login` SET `last_activity`='$logdate' WHERE `login_id` = $login_id";
	$result=$conn->query($sql_log);
	
	mysqli_close($conn);
	header('Location: dash_pharma.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pharmaceutical</title>
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
        <a href="dash_pharma.php" class="brand-logo">
          <img src="assets/images/logo.jpg" alt="logo">
        </a>
		
      </div>
      <div class="mdc-drawer__content">
        <div class="mdc-list-group">
          <nav class="mdc-list mdc-drawer-menu"> 
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="dash_pharma.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">add_to_photos</i>
                Add Product
              </a>
            </div>
			
			<div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="dash_pharma_list.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">dvr</i>
                My Products
              </a>
            </div>
			
			<div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="dash_pharma_request.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">touch_app</i>
                 Necessary Inputs
              </a>
            </div>
     
         </nav>
        </div>
		<div class="profile-actions">
          <a href="dash_pharma_update.php">Edit Profile</a>
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
            <button class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">menu</button>
            <span class="mdc-top-app-bar__title"><?php echo $name?></span>
            
          </div>
          <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end mdc-top-app-bar__section-right">
            <div class="menu-button-container menu-profile d-none d-md-block">
              <button class="mdc-button mdc-menu-button">
                <span class="d-flex align-items-center">
                  <span class="figure">
                    <img src="../photos/pharma.png" alt="user" class="user">
                  </span>
                  <span class="user-name"><?php echo $email?></span>
                </span>
              </button>
              <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon-only">
                      <i class="mdi mdi-account-edit-outline text-primary"></i>
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                     <a href="dash_pharma_update.php"><h6 class="item-subject font-weight-normal">Update Profile</h6></a>
                    </div>
                  </li>
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon-only">
                      <i class="mdi mdi-logout-variant text-primary text-primary"></i>                      
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
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
				<!-- do code here -->
				<form id="reg-form" action="#" method="post" enctype="multipart/form-data">
					
                  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-2 text-muted tx-14">
                          <h6>ADD YOUR PRODUCT</h6>
                      </div><br>
                  <div class="template-demo">
                    <div class="mdc-layout-grid__inner">
                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                         <div class="mdc-text-field mdc-text-field--outlined">
                          <input class="mdc-text-field__input" id="text-field-hero-input" required name="medname">
                          <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                              <label for="text-field-hero-input" class="mdc-floating-label" >Medicine Name</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                          </div>
                        </div>
                      </div>
                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field mdc-text-field--outlined">
                          <input class="mdc-text-field__input" id="text-field-hero-input" name="power" required>
                          <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                              <label for="text-field-hero-input" class="mdc-floating-label" >Dose/Power</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                          </div>
                        </div>
                      </div>
					  
					  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                         <div class="mdc-text-field mdc-text-field--outlined">
                          <input class="mdc-text-field__input" id="text-field-hero-input" name="price">
                          <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                              <label for="text-field-hero-input" class="mdc-floating-label" >Price-Rate (/=)</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                          </div>
                        </div>
                      </div>
                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field mdc-text-field--outlined">
                          <input class="mdc-text-field__input" id="text-field-hero-input" name="desp">
                          <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                              <label for="text-field-hero-input" class="mdc-floating-label">Description/Cautions</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                          </div>
                        </div>
                      </div>
					  
                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
						<div class="mdc-select demo-width-class" data-mdc-auto-init="MDCSelect">
						  <input type="hidden" name="generic" required>
						  <i class="mdc-select__dropdown-icon"></i>
						  <div class="mdc-select__selected-text"></div>
						  <div class="mdc-select__menu mdc-menu-surface demo-width-class">
							<ul class="mdc-list">
							  <li class="mdc-list-item mdc-list-item--selected" data-value="" aria-selected="true">
							  </li>
							 							  
							  <?php
								//selecting data associated with this particular id
								$select1 = "SELECT * FROM `med_generic` WHERE `status`=1";
								$result1=$conn->query($select1);
								while($row1 = $result1->fetch_assoc())
								{								  
								 echo "<li class='mdc-list-item' data-value='".$row1['genericid']."'>".$row1['generic_name']."</li>";
								}		
								?>
							  
							</ul>
						  </div>
						  <span class="mdc-floating-label">Generic Name</span>
						  <div class="mdc-line-ripple"></div>
						</div>						
                      </div>
					  
					  
                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                    <div class="mdc-select demo-width-class" data-mdc-auto-init="MDCSelect">
						  <input type="hidden" name="type" required>
						  <i class="mdc-select__dropdown-icon"></i>
						  <div class="mdc-select__selected-text"></div>
						  <div class="mdc-select__menu mdc-menu-surface demo-width-class">
							<ul class="mdc-list">
							  <li class="mdc-list-item mdc-list-item--selected" data-value="" aria-selected="true">
							  </li>
							  <li class="mdc-list-item" data-value="Tablet">
								Tablet
							  </li>
							  <li class="mdc-list-item" data-value="Capsule">
								Capsule
							  </li>
							  <li class="mdc-list-item" data-value="Drop">
								Drop
							  </li>
							  <li class="mdc-list-item" data-value="Syrup">
								Syrup
							  </li>
							  <li class="mdc-list-item" data-value="Vitamin">
								Vitamin
							  </li>
							  <li class="mdc-list-item" data-value="Cream">
								Cream
							  </li>
							  <li class="mdc-list-item" data-value="Injection">
								Injection
							  </li>
							  <li class="mdc-list-item" data-value="Suspension">
								Suspension
							  </li>
							   <li class="mdc-list-item" data-value="Gel">
								Gel
							  </li>
							  <li class="mdc-list-item" data-value="Spray">
								Spray
							  </li>
							</ul>
						  </div>
						  <span class="mdc-floating-label">Medicine Type</span>
						  <div class="mdc-line-ripple"></div>
						</div>
                      </div>
                    </div>
                  </div>
				  <br>
				  <br>
                <button class="mdc-button mdc-button--raised filled-button--dark" type="submit" name="add"><i class="material-icons">add</i></button>
	 
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