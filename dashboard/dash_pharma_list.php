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
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
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
			<span class="mdc-top-app-bar__title"></span>	
			 <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon search-text-field d-none d-md-flex">
              <i class="material-icons mdc-text-field__icon">search</i>
              <input class="mdc-text-field__input" id="text-field-hero-input">
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
				<!-- do code here -->
				
				<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card p-0">
                  <h6 class="card-title card-padding pb-0">YOUR PRODUCTS</h6><br>
                  <div class="table-responsive">
                    <table class="table table-hoverable">
                      <thead>
                        <tr>
                          <th class="text-right">Product ID</th>
                          <th>Medicine Name</th>
                          <th>Power</th>
                          <th>Generic</th>
                          <th>Type</th>
                          <th>Price</th>
                          <th>Caution</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
						   $sql = "SELECT medicine.medid, medicine.med_name, medicine.power,med_generic.generic_name, medicine.type, medicine.rate, medicine.description FROM medicine INNER JOIN med_generic ON medicine.genericid=med_generic.genericid where company_id = $company_id";
						   $result2=$conn->query($sql);
						   while($row=$result2->fetch_assoc())
						   {	   
						?>
						
						<tr>
                          <td><?php echo $row['medid'];?></td>
                          <td><?php echo $row['med_name'];?></td>
                          <td><?php echo $row['power']; ?></td>
                          <td><?php echo $row['generic_name'];?></td>
                          <td><?php echo $row['type'];?></td>
                          <td><?php echo $row['rate'].'/=';?></td>
                          <td><?php echo $row['description'];?></td>
                        </tr>
						
						<?php }?>
                      </tbody>
                    </table>
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