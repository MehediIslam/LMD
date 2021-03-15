<?php
ob_start();
include 'DBcon.php';
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Patient Registration</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
   
  <style type="text/css">
    .container {
	 padding: 10px 150px;}
	 
	 .nav_container{
	 padding: 0px 350px;
	 background-color:#26a69a;}
  </style>
                            
</head>
<body>
  <nav role="navigation">
     <div class="nav-wrapper nav_container"><a id="logo-container" href="#" class="brand-logo" >Patient Registration</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="regi_patient.php">Back</a></li>
      </ul>

      <!--<ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>-->
    </div>
  </nav>

<div class="container">
	<div class="row">
    <form id="reg-form" method="post" action="regi_patient_con.php" enctype="multipart/form-data">           
      	<!--Row 1-->
		<div class="row">
             <div class="input-field col s6">
              <input id="password" type="password" name="pass" class="validate"  data-length="50" required>
              <label for="password">Password</label>
             </div>
         
            <div class="input-field col s6">
             <input id="re-password" type="password" name="repass" class="validate" data-length="50" required>
             <label for="password">Confirm Password</label>
            </div>
        </div><br>
        
		<!--Row 2, File upload-->
      	<div class="row">
			<div class="file-field input-field col s6">
			  <div class="btn">
				<i class="material-icons">assignment_ind</i>
				<input type="file" multiple title="Provide Scancopy (ex: JPEG, JPG, PNG)" required name="fileToUpload">
			  </div>
			  <div class="file-path-wrapper">
				<input class="file-path validate" type="text" placeholder="Upload NID / Passport / BC" required name="fileToUpload">
			  </div>
			</div>
		 
			<div class="file-field input-field col s6">
			  <div class="btn">
				<i class="material-icons">add_a_photo</i>
				<input type="file" title="Provide passport size photo (Format: JPEG, JPG, PNG)" required name="fileToUpload2">
			  </div>
			  <div class="file-path-wrapper">
				<input class="file-path validate" type="text" placeholder="Upload Profile Picture" required name="fileToUpload2">
			  </div>			
			</div>
		</div>
				
        <br><br>

		<!--Row 3-->
        <div class="row">
			<div class="col s6">           
			   <select name="district">
				 <option value = "N/A" disabled selected>Location/Region</option>  
					<?php
					//selecting data associated with this particular id
					$select1 = "SELECT * FROM `district`";
					$result1=$conn->query($select1);
					while($row1 = $result1->fetch_assoc())
					{
					  echo "<option value='".$row1['district_id']."'>".$row1['district_name']."</option>" ;
					}		
					?>
			   </select>       
			</div>
			
			<div class="input-field col s6 " align="right">
				<button class="btn waves-effect waves-light" title="Registerd" type="submit" name="action">Submit
				<i class="material-icons right">send</i>
				</button>
			</div>
        </div>     		
    </form>
  </div>
</div>


            
<!--Import jQuery before materialize.js-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script type="text/javascript" src="js/materialize.min.js"></script>
  <script>
	//drop-down item select
	 $(document).ready(function() {
		$('select').material_select();
	 });
  </script>
 
  
</body>
</html>

<?php 
session_start();	

$target_dir = "photos/uploads/patient/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$file1 = basename($_FILES["fileToUpload"]["name"]);

$target_file2 = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
$file2 = basename($_FILES["fileToUpload2"]["name"]);	

if(isset($_POST["action"])){
	
	$fname = $_SESSION['fname'];
	$lname = $_SESSION['lname'];
	$dob = $_SESSION['dob'];
	$gender = $_SESSION['gender'];
	$email = $_SESSION['email'];
	$mobile = $_SESSION['mobile'];
	$nationality = $_SESSION['nationality'];
	$nid = $_SESSION['nid'];
	$blood = $_SESSION['blood'];
	
	$pass = $_POST['pass'];
	$repass = $_POST['repass'];
	$address = $_POST['district'];
	$status = date("d-M-Y");
	
	if($pass === $repass)
	{
		//file upload-1 (NID)	
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) 
		{
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
			{print "<script type=\"text/javascript\"> alert('Sorry, only JPG, JPEG & PNG files are allowed.'); </script>";}
			
			else
			{move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
		
				//file upload-2 (DP)
				$check2 = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
				if($check2 !== false) 
				{
					if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg") 
					{print "<script type=\"text/javascript\"> alert('Sorry, only JPG, JPEG & PNG files are allowed.'); </script>";}
					
					else
					{move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2);
				
						//data insert to patients Table
						$sql = "INSERT INTO `patients`(`fname`, `lname`, `dob`, `gender`, `blood`, `nid`, `nationality`, `phone`, `email`, `district_id`, `propic`, `nid_pic`) VALUES ('$fname','$lname','$dob','$gender','$blood','$nid','$nationality','$mobile','$email','$address','$file2','$file1')";
						
						if (mysqli_query($conn, $sql)) {
							$last_id = mysqli_insert_id($conn);
						} else {
							echo "Error: " . $sql . "<br>" . mysqli_error($conn);
						}
						
						//data insert to login Table
						$sql2 = "INSERT INTO `login`(`patient_id`,`userid`, `password`, `user_type`, `status`, `login_access`) VALUES ('$last_id','$email','$repass','Patient','$status','0')";
						$result=$conn->query($sql2);
						mysqli_close($conn);
						
						session_unset();
						//header("Location: index.php");
					}    
				} 	
				else 
				{print "<script type=\"text/javascript\"> alert('Sorry, file is not an image.'); </script>";}	
			}    
		} 	
		else 
		{print "<script type=\"text/javascript\"> alert('Sorry, file is not an image.'); </script>";}
	}
	else
	{
		{print "<script type=\"text/javascript\"> alert('Sorry, passwords not matched !!'); </script>";}
	}	
}

ob_flush();
?>
