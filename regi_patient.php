<?php
ob_start();
error_reporting(0);

if(isset($_POST["next"])) {
	session_start();
		
	$_SESSION['fname'] = $_POST['fname'];
	$_SESSION['lname'] = $_POST['lname'];
	$_SESSION['dob'] = $_POST['dob'];
	$_SESSION['gender'] = $_POST['gender'];
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['mobile'] = $_POST['mobile'];
	$_SESSION['nationality'] = $_POST['nationality'];
	$_SESSION['nid'] = $_POST['nid'];
	$_SESSION['blood'] = $_POST['blood'];
	
	header("Location: regi_patient_con.php");	
}
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
	 padding: 20px 150px;}
	 
	 .nav_container{
	 padding: 0px 350px;
	 background-color:#26a69a;}
  </style>

  
</head>
<body>
  <nav role="navigation">
     <div class="nav-wrapper nav_container"><a id="logo-container" href="#" class="brand-logo" >Patient Registration</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php">Back</a></li>
      </ul>

      <!--<ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>-->
    </div>
  </nav>

<div class="container">
<div class="row">
    <form id="reg-form" method="post" action="regi_patient.php" enctype="multipart/form-data">
	  <!--Row 1-->
      <div class="row">
        <div class="input-field col s6">
          <input id="input_text" name="fname" type="text" data-length="10">
		  <label for="input_text">First Name</label>
        </div>
        <div class="input-field col s6">
         <input id="input_text" name="lname" type="text" data-length="10">
		 <label for="input_text">Last Name</label>
        </div>
      </div>
      
	  <!--Row 2-->
      <div class="row">
        <div class="input-field col s6">
          <input id="email" type="email" name="email" class="validate" required>
          <label for="email">Email</label>
        </div>
        <div class="input-field col s6">
         <input id="input_text" type="text" name="mobile" data-length="15">
		 <label for="input_text">Phone No.</label>
        </div>
      </div>
      
	  <!--Row 3-->
      <div class="row">
        <div class="input-field col s12">
         <input id="input_text" type="text" name="nid" data-length="20">
		 <label for="input_text">NID / Passport / Birth Certificate</label>
        </div>
      </div>
      
      <!--Row 4-->
	  <div class="row">
        <div class="input-field col s6">
          <input id="input_text" type="text" name="nationality" data-length="15">
		 <label for="input_text">Nationality</label>
        </div>
        <div class="input-field col s6">
      <!--  <input type="date" class="datepicker " name="dob" data-rule-dateWithMoment="true"> -->
          <input type="text" class="datepicker" name="dob" data-rule-dateWithMoment="true">
		  <label for="input_text">Date of Birth</label>
        </div>
      </div>
      
	  <!--Row 5-->
      <div class="row">
        <div class="col s6">
         <div >
            <input name="gender" type="radio" value="Male" id="male"  checked />
            <label for="male">Male</label>
            <br>
            <input name="gender" type="radio" value="Female" id="female"  />
            <label for="female">Female</label>
         </div>
        </div>

        <div class="col s6">
           <select name="blood">
              <option value = "" disabled selected>Blood Group</option>
              <option value = "A+">A+</option>
              <option value = "B+">B+</option>
              <option value = "O+">O+</option>
              <option value = "AB+">AB+</option>
              <option value = "A-">A-</option>
              <option value = "B-">B-</option>
              <option value = "O-">O-</option>
           </select> 
        </div>
	  </div>
                
      <!--Next Button-->
	  <button title="Next" class="ngl btn-floating btn-medium waves-effect waves-light" type="submit" name="next"><i class="material-icons">input</i></button>
	  
    </form>
  </div>
</div>


            
<!--Import jQuery before materialize.js-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script type="text/javascript" src="js/materialize.min.js"></script>
 

  <script>
  //date picker

$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 100, // Creates a dropdown of 15 years to control year
    format: 'yyyy-mm-dd' }); 


/*
    $(function() {
      jQuery.validator.addMethod("dateWithMoment", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || moment(value, "YYYY-MM-DD", true).isValid() ;
}, 'Please enter a valid date with moment.');

      $('.datepicker').pickadate({
        editable: true,
        selectMonths: true,
        selectYears: 15,
        format: 'yyyy-mm-dd',
        // pour fermer le datepicker quand on sélectionne une date
        onSet: function(ele) {
          if (ele.select) {
            //this.close();
          }
        }
      }).dblclick(function(){
        $(this).pickadate('picker').set(moment.now());
      });

     $('.trigger-datepicker').click(function(event) {
        event.stopPropagation();
        var $datepicker = $(this).parent().parent().find('.datepicker');
        var picker = $datepicker.pickadate('picker');
        picker.open();
      }); 

      $('#formulaireDate').validate();
    }); */
	
	//drop-down item select
	 $(document).ready(function() {
		$('select').material_select();
	 });
	
  </script>
  

</body>
</html>
<?php ob_flush(); ?>
