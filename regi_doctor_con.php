<?php
ob_start();
include 'DBcon.php';
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Doctor Registration</title>

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
	 
	 #mbbs,#md,#fcps,#frcs,#phd{
	   display: none;}
  </style>

</head>
<body>
  <nav role="navigation">
     <div class="nav-wrapper nav_container"><a id="logo-container" href="#" class="brand-logo" >Doctor Registration</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="regi_doctor.php">Back</a></li>
      </ul>

      <!--<ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>-->
    </div>
  </nav>

<div class="container">
<div class="row">
<form  id="reg-form" action="regi_doctor_con.php" method="post" enctype="multipart/form-data"> 
<label>Degrees and Certifications</label>
    
	  <!--Row 1,Doctor's Degree-->
      <div class="row">
        <div class="col s6"><br>
          <input type="checkbox" name="degree[]" value="MBBS" id="check1" class="filled-in" required >
          <label for="check1">MBBS / Equivalent Bachelor Degree</label>
        </div>
        
		<div class="file-field input-field col s6" id="mbbs">
		  <div class="btn">
            <i class="material-icons">file_upload</i>
            <input type="file" required title="Provide your certificates (Format: PDF, JPG, PNG)">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" required type="text" placeholder="Upload your MBBS Certificate">
          </div>			
        </div>
      </div>
      
      <!--Row 2-->
	  <div class="row">
        <div class="col s6"><br>
          <input type="checkbox" name="degree[]" value="MD" id="check2" class="filled-in">
          <label for="check2">MD</label>
        </div>
        
		<div class="file-field input-field col s6" id="md">
		  <div class="btn">
            <i class="material-icons">file_upload</i>
            <input type="file" title="Provide your certificates (Format: PDF, JPG, PNG)">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Upload your MD Certificate">
          </div>			
        </div>
      </div>
      
	  <!--Row 3-->
	  <div class="row">
        <div class="col s6"><br>
          <input type="checkbox" name="degree[]" value="FCPS" id="check3" class="filled-in">
          <label for="check3">FCPS</label>
        </div>
        
		<div class="file-field input-field col s6" id="fcps">
		  <div class="btn">
            <i class="material-icons">file_upload</i>
            <input type="file" title="Provide your certificates (Format: PDF, JPG, PNG)">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Upload your FCPS Certificate">
          </div>			
        </div>
      </div>
      
      <!--Row 4-->
      <div class="row">
        <div class="col s6"><br>
          <input type="checkbox" name="degree[]" value="FRCS" id="check4" class="filled-in">
          <label for="check4">FRCS</label>
        </div>
        
		<div class="file-field input-field col s6" id="frcs">
		  <div class="btn">
            <i class="material-icons">file_upload</i>
            <input type="file" title="Provide your certificates (Format: PDF, JPG, PNG)">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Upload your FRCS Certificate" >
          </div>			
        </div>
      </div>
      
      <!--Row 5-->
      <div class="row">
        <div class="col s6"><br>
          <input type="checkbox" name="degree[]" value="PHD" id="check5" class="filled-in">
          <label for="check5">PHD</label>
        </div>
        
		<div class="file-field input-field col s6" id="phd">
		  <div class="btn">
            <i class="material-icons">file_upload</i>
            <input type="file" title="Provide your certificates (Format: PDF, JPG, PNG)">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Upload your PHD Certificate">
          </div>			
        </div>
      </div>
      
      <!--Row 6-->
      <div class="row">
        <div class="col s6 input-field">
			<select name="specialization">
              <option value = "" disabled selected>Area of Specialization</option>  
			  <?php
				//selecting data associated with this particular id
				$select1 = "SELECT * FROM `specialization`";
				$result1=$conn->query($select1);
				while($row1 = $result1->fetch_assoc())
				{
				  echo "<option value='".$row1['specialize_id']."'>".$row1['specialization']."</option>" ;
				}		
				?>
           </select> 
        </div>
        
        <div class="input-field col s6">
         <input id="input_text" name="license" required type="text" data-length="10">
		 <label for="input_text">Doctor's License No.</label>
        </div>
      </div>
      
	  <!--Row 7-->
      <div class="row">
        <div class="input-field col s6">
         <textarea id="textarea2" name="address" class="materialize-textarea" data-length="120"></textarea>
         <label for="textarea2">Home Address</label>
        </div>
        
        <div class="input-field col s6">
         <textarea id="textarea2" name="chamber" class="materialize-textarea" data-length="120"></textarea>
         <label for="textarea2">Chamber Address</label>
        </div>
      </div>
               
      <!--Submit Button-->
	   <button class="btn waves-effect waves-light" type="submit" name="complete" value="Submit">Submit
          <i class="material-icons right">send</i>
        </button> 
    </form>
  </div>
</div>


            
<!--Import jQuery before materialize.js-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script type="text/javascript" src="js/materialize.min.js"></script>
 
  <script>
    //Show certificates file upload
	$(document).ready(function(){
	  $("#check1").click(function(){
		$("#mbbs").toggle();
	  });
	});
	
	$(document).ready(function(){
	  $("#check2").click(function(){
		$("#md").toggle();
	  });
	});
	
	$(document).ready(function(){
	  $("#check3").click(function(){
		$("#fcps").toggle();
	  });
	});
	
	$(document).ready(function(){
	  $("#check4").click(function(){
		$("#frcs").toggle();
	  });
	});
	
	$(document).ready(function(){
	  $("#check5").click(function(){
		$("#phd").toggle();
	  });
	});
	
	//drop-down item select
	 $(document).ready(function() {
		$('select').material_select();
	 });
  </script>
  
</body>
</html>

<?php 
session_start();	

if(isset($_POST["complete"])){
	
	$fname = $_SESSION['fname'];
	$lname = $_SESSION['lname'];
	$dob = $_SESSION['dob'];
	$gender = $_SESSION['gender'];
	$email = $_SESSION['email'];
	$mobile = $_SESSION['mobile'];
	$nationality = $_SESSION['nationality'];
	$nid = $_SESSION['nid'];
	$blood = $_SESSION['blood'];
	$pass = $_SESSION['pass'];
	$repass = $_SESSION['repass'];
	
	$propic = "default.jpg";
	$nid_pic = "NID.jpg";
	$status = date("d-M-Y");
	
	$degree = implode(", ", $_POST['degree']);
	$special = $_POST['specialization'];
	$license = $_POST['license'];
	$address = $_POST['address'];
	$chamber = $_POST['chamber'];
	$cert = "MBBS Cert.jpg";
	
	//data insert to doctors Table
	$sql = "INSERT INTO `doctors`(`fname`, `lname`, `dob`, `gender`, `blood`, `nid`, `nationality`, `phone`, `email`, `address`, `propic`, `nid_pic`, `degrees`, `certificates`, `specialize_id`, `license_no`, `chamber`) VALUES ('$fname','$lname','$dob','$gender','$blood','$nid','$nationality','$mobile','$email','$address','$propic','$nid_pic','$degree','$cert','$special','$license','$chamber')";
	
	if (mysqli_query($conn, $sql)) {
		$last_id = mysqli_insert_id($conn);
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	//data insert to login Table
	$sql2 = "INSERT INTO `login`(`doc_id`,`userid`,`password`,`user_type`,`status`,`login_access`) VALUES ('$last_id','$email','$repass','Doctor','$status','0')";
	$result=$conn->query($sql2);
	mysqli_close($conn);
	
	session_unset();
	header("Location: index.php");
}

ob_flush();
?>
