<?php ob_start();
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
error_reporting(0);
?>


<?php
require 'varify.php';
$obj_login = new Login();

if (isset($_POST['login'])) 
{
    $message = $obj_login->user_login_check($_POST);
}

if (isset($_SESSION['login_id'])) 
{
    $user_id = $_SESSION['login_id'];

    if ($user_id == NULL) 
	{
        if ($_SESSION['user_type'] == 'Pharmaceutical') 
		{
            header('Location: dashboard/dash_pharma.php');
        } 
		
		else if ($_SESSION['user_type'] == 'Doctor') 
		{
            header('Location: dashboard/dash_doctor.php');
        }
		
		else if ($_SESSION['user_type'] == 'Patient') 
		{
            header('Location: dashboard/dash_patient.php');
        }
		else
		{
			header('Location: index.php');
		}
    }
}
ob_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Lifeline Medicine Data</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <style type="text/css">
  .row.center .col.s12.m6 h3 em {
	font-family: Palatino Linotype, Book Antiqua, Palatino, serif;
}
  .row.center .col.s12.m6 h4 {
	font-family: Comic Sans MS, cursive;
}
  .row.center .col.s12.m6 .blue-grey-text {
	font-family: Comic Sans MS, cursive;
}
  </style>
</head>

<body>

<div class="row center">
  
    <div class="col s12 m6">
        <br><br><br><h5 class="blue-grey-text">Are you new here?</h5>
        <br>
        <div class="row center">
       	  <div class="col s4 m4">
              <div class="card hoverable">
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="photos/doctor.png">
                </div>
                <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4"><a href="regi_doctor.php">Doctor</a><i class="material-icons right">more_vert</i></span>
                </div>
                <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4"><a href="regi_doctor.php"><b>Sign Up</b></a><i class="material-icons right">close</i></span>
                  <p align="justify"><br>If you want to SignUp as a Doctor then you may go with this.</p>
                </div>
              </div>
            </div>
          <div class="col s4 m4">
                   	   <div class="card hoverable">
                        <div class="card-image waves-effect waves-block waves-light"><img class="activator" src="photos/patient.png"></div>
                        <div class="card-content">
                          <span class="card-title activator grey-text text-darken-4"><a href="regi_patient.php">Patient</a><i class="material-icons right">more_vert</i></span>
                        </div>
                        <div class="card-reveal">
                          <span class="card-title grey-text text-darken-4"><a href="regi_patient.php"><b>Sign Up</b></a><i class="material-icons right">close</i></span>
                          <p align="justify"><br>If you want to SignUp as a Patient then you may go with this.</p>
                        </div>
                       </div>
            </div>
            
             <div class="col s4 m4">
           	   <div class="card hoverable">
                        <div class="card-image waves-effect waves-block waves-light"><img class="activator" src="photos/pharma.png"></div>
                        <div class="card-content">
                          <span class="card-title activator grey-text text-darken-4"><a href="regi_pharma.php">Pharmaceutical</a><i class="material-icons right">more_vert</i></span>
                        </div>
                        <div class="card-reveal">
                          <span class="card-title grey-text text-darken-4"><a href="regi_pharma.php"><b>Sign Up</b></a><i class="material-icons right">close</i></span>
                          <p align="justify"><br>If you want to be a member with your organization then you may register your pharmaceutical company with this way</p>
                        </div>
                       </div>
            </div>
        </div> 
        <a class="waves-effect waves-light btn" name="GO" href="dashboard/dash_report1.php">Reports & Predictions</a>
 	</div>
    
    
    
    
    <div class="col s12 m6">
    <br><br><br><br><br><br>
    <form action="index.php" method="post" enctype="multipart/form-data">
    <table align="left">
        <tr>
        <td width="36%"></td>
        <td width="56%">        
          <input id="input_text" type="text" class="validate" required name="userid">
          <label for="input_text">Your e-mail</label>
          <input id="password" type="password" class="validate" required name="password">
          <label for="password">Password</label><br><br><br>
          <button class="waves-effect waves-light btn" type="submit" name="login">Sign In</button>
        </td>
        <td width="8%"></td>
        </tr>
    </table>	
    </form>
          
     
 
  
 	</div>
</div>


<!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
