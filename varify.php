<?php
ob_start();
session_start();
require 'DBcon.php';
class Login {

    public function user_login_check($data) 
	{
	    $hostname = 'sql201.epizy.com';
        $username = 'epiz_26979386';
        $password = 'lms1ZEDLzpH';
        $dbname = 'epiz_26979386_lmd';
        $conn = mysqli_connect($hostname, $username, $password, $dbname);

        $userid = $data['userid'];
        $password = $data['password'];
        $query = "SELECT * FROM login WHERE userid='$userid' and password='$password'";
        
        if (mysqli_query($conn,$query)) 
		{
            $resourse_id = mysqli_query($conn, $query);
            $user_info = mysqli_fetch_assoc($resourse_id);

            if ($user_info) 
			{
                if ($user_info['login_access'] == '1') 
				{
                    $_SESSION['login_id'] = $user_info['login_id'];
                    $_SESSION['user_type'] = $user_info['user_type'];

                    if ($user_info['user_type'] == "Pharmaceutical") 
					{
                        header('Location: dashboard/dash_pharma.php');
                    } 
					
					else if ($user_info['user_type'] == "Doctor") 
					{
                        header('Location: dashboard/dash_doctor.php');
                    }
					
					else if ($user_info['user_type'] == "Patient") 
					{
                        header('Location: dashboard/dash_patient.php');
                    }
					
					else if ($user_info['user_type'] == "Admin") 
					{
                        header('Location: dashboard/dash_admin.php');
                    }
                }
				
				else if($user_info['login_access'] != '1')
				{	
					print "<script type=\"text/javascript\"> alert('Account is not Activated. Please try later !!'); </script>";					
				}
            }
			
			else{
					print "<script type=\"text/javascript\"> alert('Invalid User ID or Password'); </script>";
            	}
        } 
		
		else 
		{
            die('Query Problem' . mysqli_error());
        }
    }
}
ob_flush();
?>
