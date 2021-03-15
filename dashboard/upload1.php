<?php
$target_dir = "assets/images/prediction/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$file1 = basename($_FILES["fileToUpload"]["name"]);


$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
if($check !== false) 
{
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
	{print "<script type=\"text/javascript\"> alert('Sorry, only JPG, JPEG & PNG files are allowed.'); </script>";}
	
	else
	{
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
	}    
} 	
else 
{
	print "<script type=\"text/javascript\"> alert('Sorry, file is not an image.'); </script>";
}

?>