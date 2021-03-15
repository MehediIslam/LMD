<?php
ob_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Pharmaceutical Registration</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
   
  <style type="text/css">
    .container {
	 padding: 20px 150px;}
	 
	 .nav_container{
	 padding: 0px 350px;
	 background-color:#26a69a;}
  </style>

</head>
<body>
 <div class="navbar-fixed">
  <nav role="navigation">
     <div class="nav-wrapper nav_container"><a id="logo-container" href="#" class="brand-logo" >Pharmaceutical Registration</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php">Back</a></li>
      </ul>

      <!--<ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>-->
    </div>
  </nav>
 </div>

<div class="container">
<div class="row">
    <form id="reg-form" action="regi_pharma.php" method="post" enctype="multipart/form-data">

      <!--Row 1-->  
      <div class="row">
        <div class="input-field col s6">
          <input id="input_text" type="text" data-length="50"  class="validate" name="companyname" required>
		  <label for="input_text">Company Name</label>
        </div>
        <div class="input-field col s6">
         <input id="input_text" type="text" data-length="50"  class="validate" name="web" >
		 <label for="input_text">Website</label>
        </div>
      </div>
      
      <!--Row 2-->
      <div class="row">
        <div class="input-field col s6">
          <input id="email" type="email" class="validate"  name="email" required>
          <label for="email">Email</label>
        </div>
        <div class="input-field col s6">
         <input id="input_text" type="text" data-length="11"  class="validate" name="phone" required>
		 <label for="input_text">Telephone No.</label>
        </div>
      </div>
      
      <!--Row 3-->
      <div class="row">
        <div class="input-field col s6">
         <input id="input_text" type="text" data-length="20"  class="validate" name="trade" required>
		 <label for="input_text">Trade License No.</label>
        </div>
        
        <div class="input-field col s6">
         <input id="input_text" type="text" data-length="10"  class="validate" name="cmmiso">
		 <label for="input_text">CMMI Level or ISO Certification</label>
        </div>
      </div>
      
      <!--Row 4, file upload-->
       <div class="row">
        <div class="file-field input-field col s6">
          <div class="btn">
            <i class="material-icons">assignment</i>
            <input type="file"  title="Provide Scancopy (ex: JPG, PNG, JPEG)"  name="fileToUpload" required>
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Upload Trade License" name="fileToUpload" >
          </div>  
        </div>
    
        <div class="file-field input-field col s6">
          <div class="btn">
            <i class="material-icons">assignment</i>
            <input type="file"  title="Provide Scancopy (ex: JPG, PNG, JPEG)" name="fileToUpload2">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Upload CMMI/ISO Certificates" name="fileToUpload2">
          </div>  
        </div>     
      </div>
      
	  <!--Row 5-->		
      <div class="row">
        <div class="input-field col s6">
         <input id="password" type="password" class="validate"  data-length="50"  name="password" required>
         <label for="password">Password</label>
        </div>
     
        <div class="input-field col s6">
         <input id="re-password" type="password" class="validate" data-length="50"  name="repassword" required>
         <label for="password">Confirm Password</label>
        </div>
      </div>
      
      <!--Row 6-->
      <div class="row">
        <div class="input-field col s6">
        <textarea id="textarea2" class="materialize-textarea" data-length="120" name="address"></textarea>
        <label for="textarea2">Address</label>
        </div> 
        
        <div class="input-field col s6" align="right"><br><br>
        <button class="btn waves-effect waves-light" title="Registerd" type="submit" name="btn_submit">Submit
          <i class="material-icons right">send</i>
        </button> 
        </div>
      </div>
      
    </form>
  </div>
</div>


            
<!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/moment.js"></script>
  <script type="text/javascript" src="js/moment-with-locales.js"></script>
  <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js"></script>
  


</body>
</html>

<?php
//DB connection
include 'DBcon.php';

//value insert to DB from registration form
if(isset($_POST["btn_submit"])) {
$company_name = $_POST['companyname'];
$website = $_POST['web'];
$email = $_POST['email'];	
$phone = $_POST['phone'];
$trade = $_POST['trade'];
$cmmi_iso = $_POST['cmmiso'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$address = $_POST['address'];

//initialization for file upload
$target_dir = "photos/uploads/pharma/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$uploadOk = 1;
$tradefile = basename($_FILES["fileToUpload"]["name"]);

$target_dir2 = "photos/uploads/pharma/";
$target_file2 = $target_dir2 . basename($_FILES["fileToUpload2"]["name"]);
$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
$uploadOk2 = 1;
$cmmifile = basename($_FILES["fileToUpload2"]["name"]);

	if($password === $repassword)
	{
	//trade license upload
	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) 
	{
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
		{
			 print "<script type=\"text/javascript\"> alert('Sorry!! only JPG, PNG & JPEG are allowed'); </script>";
			 $uploadOk = 0;
		}
		
		else
		{
			// Check if file already exists
				if (file_exists($target_file)) {
					print "<script type=\"text/javascript\"> alert('The file of Trade License already exists'); </script>";
					$uploadOk = 0;
				}
				else
				{					
					//cmmi and iso upload
					$check2 = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
					if($check2 !== false) 
					{
						if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg") 
						{
							 print "<script type=\"text/javascript\"> alert('Sorry!! only JPG, PNG & JPEG are allowed'); </script>";
							 $uploadOk2 = 0;
						}
						
						else
						{
								// Check if file already exists
								if (file_exists($target_file2)) {
									print "<script type=\"text/javascript\"> alert('The file name of CMMI or ISO already exists'); </script>";
									$uploadOk2 = 0;
								}
								else
								{
									move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
									move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2);
									$uploadOk2 = 1;
									
									//data insert to pharmaceutical Table
									$sql = "INSERT INTO `pharmaceutical`(`name`,`address`,`contact`,`web`,`email`,`trade_license`,`cmmi_iso`,`tradefile`,`cmmifile`) VALUES ('$company_name','$address','$phone','$website','$email','$trade','$cmmi_iso','$tradefile','$cmmifile')";
									
									if (mysqli_query($conn, $sql)) {
										$last_id = mysqli_insert_id($conn);
									} else {
										echo "Error: " . $sql . "<br>" . mysqli_error($conn);
									}
									
									//data insert to login Table
									$sql2 = "INSERT INTO `login`(`company_id`, `userid`, `password`, `user_type`, `status`, `login_access`) VALUES ('$last_id','$email','$repassword','Pharmaceutical','requested','0')";
									$result=$conn->query($sql2);
									mysqli_close($conn);
									header("Location: index.php");	
								}	
						
					
						
					}
					}
					 
					else 
					{
						print "<script type=\"text/javascript\"> alert('ISO or CMMI File is not an image'); </script>";
						$uploadOk2 = 0;
					}
				}	
		}
				
    }
	 
	else 
	{
		print "<script type=\"text/javascript\"> alert('Trade file is not an image'); </script>";
        $uploadOk = 0;
    }
	
	}
	else
	{print "<script type=\"text/javascript\"> alert('Passwords are not matched'); </script>";}
}

ob_flush();
?>
