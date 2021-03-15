<?php 
error_reporting(0);
$pres_id = $_GET['pres_id'];
require '../DBcon.php';

//selecting prescription information
$select = "SELECT prescription.patient_age,prescription.patient_department,prescription.`c/c`, prescription.`o/e`, prescription.findings, prescription.advise, prescription.date, CONCAT(patients.fname,' ',patients.lname) AS patients, patients.gender, CONCAT(doctors.fname,' ',doctors.lname) AS doctor, doctors.degrees, (SELECT specialization.specialization FROM specialization WHERE specialization.specialize_id=doctors.specialize_id) AS specialization, doctors.chamber FROM prescription, patients, doctors WHERE prescription.prescription_id = $pres_id AND prescription.patient_id=patients.patient_id AND prescription.doc_id=doctors.doc_id";
$result=$conn->query($select);
while($row = $result->fetch_assoc())
{
  $patient_name = $row['patients'];
  $patient_age = $row['patient_age'];
  $patient_gender = $row['gender'];
  
  $department = $row['patient_department'];
  $prescription_date = date("d-M-Y", strtotime($row['date']));
  $cc = $row['c/c'];
  $oe = $row['o/e'];
  $findings = $row['findings'];
  $advise = $row['advise'];
  
  $doctor_name = $row['doctor'];
  $doctor_degrees = $row['degrees'];
  $doctor_special = $row['specialization'];
  $doctor_chamber = $row['chamber'];
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Prescription <?php $pres_id ?></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>

body{
	margin:0;
	padding:0;
}

p{
	font-size:15px;
}

.prescription_top{
	padding-top:30px;
}

.prescription_content h6{
	border-bottom:1px solid #000;
	display:inline-block;
}

.content-left{
	border-right: 1px solid gray;
}

.rx h3{
	font-size:50px;
}

.rx span{
	font-size:20px;
}

.doctors_sign{
	padding-top:120px;
	text-align:right;
}
.sex{
	text-align:right;
}

</style>
</head>

<body>

	<div class="container">
		<div class="prescription_top">
			<div class="row">
				<div class="col-md-5">
					<div class="patient_name">
						<p>Patient Name : <?php echo $patient_name; ?></p>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="age">
						<p>Age : <?php echo $patient_age; ?></p>
					</div>
				</div>
				
				<div class="col-md-3">
					<div class="sex">
						<p>Sex : <?php echo $patient_gender; ?></p>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-5">
					<p>Date : <?php echo $prescription_date;?></p>
				</div>
				<div class="col-md-4">
					<p>Prescription ID : <?php echo $pres_id; ?></p>
				</div>
				<div class="col-md-3">
				<div class="sex">
					<p>Department : <?php echo $department; ?></p>
				</div>
				</div>
			</div>
			
		</div>
			
			<hr>
		
		<div class="prescription_content">
			<div class="row">
				<div class="col-md-5">
					<div class="content-left">
						<h6>Cheif Complaints (C/C) :</h6>
						<p><?php echo $cc; ?></p>
												
						<br><h6>On examination (O/E) :</h6>
						<p><?php echo $oe; ?></p>						
						<p><?php echo $findings;?></p>
						
						<br><h6>Advice :</h6>
						<p><?php echo $advise;?></p>
						
					
					</div>
				</div>
				
				
				<div class="col-md-7">
					<div class="content_right">
						<div class="rx">
							<h3>R<span>X</span></h3>
						</div>
						 
						<?php					   
						   $sql = "SELECT (@row:=@row+1) AS no, medicine.med_name, medicine.power, medicine.type, prescribed_medicines.instruction_route, prescribed_medicines.medication_advise FROM medicine, prescribed_medicines,(SELECT @row := 0) r WHERE prescription_id = $pres_id AND prescribed_medicines.medid =medicine.medid";
						   $result2=$conn->query($sql);
						   while($row2=$result2->fetch_assoc())
						   {	   
						?>		
						<div class="row">
							<div class="col-md-5">
								<p><?php echo $row2['no'].'. '.$row2['type'].' > '.$row2['med_name'].' ('.$row2['power'].')'; ?></p>
							</div>
							
							<div class="col-md-2">	
								<p><?php echo $row2['instruction_route'];?></p>
							</div>
							
							<div class="col-md-5">
								<p><?php echo $row2['medication_advise'];?></p>
							</div>
						</div>
								
						<?php }?>
						
						
						

						<div class="doctors_sign">
							<p><?php echo '<b>'.$doctor_name.'</b><br>'; echo $doctor_degrees.'<br>'; echo $doctor_special.'<br>';
							echo $doctor_chamber;?></p>
							
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>

</body>
</html>