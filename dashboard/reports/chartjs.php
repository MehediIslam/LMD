<?php
date_default_timezone_set("Asia/Dhaka");
error_reporting(0);
//database connection
define('DB_HOST', 'sql201.epizy.com');
define('DB_USERNAME', 'epiz_26979386');
define('DB_PASSWORD', 'lms1ZEDLzpH');
define('DB_NAME', 'epiz_26979386_lmd');
 
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}

/* ------------ Top Medicine Used ------------ */
//query to get data from the table
$query = sprintf("SELECT (SELECT medicine.med_name FROM medicine WHERE medicine.medid=prescribed_medicines.medid) AS med_name, COUNT(*) AS prescribed FROM prescribed_medicines INNER JOIN prescription ON prescribed_medicines.prescription_id=prescription.prescription_id WHERE (YEAR(prescription.date) BETWEEN (YEAR(CURDATE())-1) AND YEAR(CURDATE())) GROUP BY prescribed_medicines.medid ORDER BY COUNT(*) DESC LIMIT 6");

$query2 = sprintf("SELECT (SELECT medicine.med_name FROM medicine WHERE medicine.medid=prescribed_medicines.medid) AS med_name, COUNT(*) AS prescribed FROM prescribed_medicines INNER JOIN prescription ON prescribed_medicines.prescription_id=prescription.prescription_id WHERE (YEAR(prescription.date) BETWEEN (YEAR(CURDATE())-1) AND YEAR(CURDATE())) GROUP BY prescribed_medicines.medid ORDER BY COUNT(*) DESC LIMIT 6");

$result = $mysqli->query($query);
$result2 = $mysqli->query($query2);

//variable & array initializ
$data = array(); $data2 = array();
$s = array(); $p = array();
$s1=""; $s2=""; $s3=""; $s4=""; $s5=""; $s6="";
$p1=0; $p2=0; $p3=0; $p4=0; $p5=0; $p6=0;

while ($row = mysqli_fetch_assoc($result))
{
	$data[]=$row['med_name'];
}

while ($row = mysqli_fetch_assoc($result2))
{
	$data2[]=$row['prescribed'];
}

foreach ($data as $key => $value)
{
	//echo "Key: $key; Value: $value\n";
	//$s=$s.'"'.$value.'", ' ;
	$s[]=$value;  
}

foreach ($data2 as $key => $value)
{
	//echo "Key: $key; Value: $value\n";
	//$s=$s.'"'.$value.'", ' ;
	$p[]=$value;  
}

//Initializ med_name value
$s1=$s[0];
$s2=$s[1];
$s3=$s[2];
$s4=$s[3];
$s5=$s[4];
$s6=$s[5];

//Initializ medicine uses
$p1=$p[0];
$p2=$p[1];
$p3=$p[2];
$p4=$p[3];
$p5=$p[4];
$p6=$p[5];
/* ------------ END ------------ */


/* ------------ Most Generic ------------ */
$query3 = sprintf("SELECT YEAR(p.date) YEAR, m.genericid, mg.generic_name, COUNT(*) counter FROM prescribed_medicines pm, prescription p, medicine m, med_generic mg WHERE pm.prescription_id=p.prescription_id and pm.medid=m.medid and m.genericid=mg.genericid and (YEAR(p.date) BETWEEN (YEAR(CURDATE())-1) AND YEAR(CURDATE())) GROUP BY YEAR(p.date),m.genericid, mg.generic_name ORDER BY COUNT(*) DESC LIMIT 5");

$query4 = sprintf("SELECT YEAR(p.date) YEAR, m.genericid, mg.generic_name, COUNT(*) counter FROM prescribed_medicines pm, prescription p, medicine m, med_generic mg WHERE pm.prescription_id=p.prescription_id and pm.medid=m.medid and m.genericid=mg.genericid and (YEAR(p.date) BETWEEN (YEAR(CURDATE())-1) AND YEAR(CURDATE())) GROUP BY YEAR(p.date),m.genericid, mg.generic_name ORDER BY COUNT(*) DESC LIMIT 5");

$result3 = $mysqli->query($query3);
$result4 = $mysqli->query($query4); 

//variable & array initializ
$data3 = array(); $data4 = array();
$g = array(); $c = array();
$g1=""; $g2=""; $g3=""; $g4=""; $g5="";
$c1=0; $c2=0; $c3=0; $c4=0; $c5=0;

while ($row = mysqli_fetch_assoc($result3))
{
	$data3[]=$row['generic_name'];
}

while ($row = mysqli_fetch_assoc($result4))
{
	$data4[]=$row['counter'];
}

foreach ($data3 as $key => $value)
{
	$g[]=$value;  
}

foreach ($data4 as $key => $value)
{
	$c[]=$value;  
}

//Initializ generic name
$g1=$g[0];
$g2=$g[1];
$g3=$g[2];
$g4=$g[3];
$g5=$g[4];

//Initializ generic uses
$c1=$c[0];
$c2=$c[1];
$c3=$c[2];
$c4=$c[3];
$c5=$c[4];
/* ------------ END ------------ */


/* ------------ Common Disease ------------ */
$query5 = sprintf("SELECT disease.disease_name, COUNT(*) AS counter FROM `prescription` INNER JOIN disease ON prescription.disease_id = disease.disease_id WHERE YEAR(prescription.date) BETWEEN (YEAR(CURDATE())-1) AND YEAR(CURDATE()) GROUP BY disease.disease_name ORDER BY COUNT(*) DESC LIMIT 5");

$query6 = sprintf("SELECT disease.disease_name, COUNT(*) AS counter FROM `prescription` INNER JOIN disease ON prescription.disease_id = disease.disease_id WHERE YEAR(prescription.date) BETWEEN (YEAR(CURDATE())-1) AND YEAR(CURDATE()) GROUP BY disease.disease_name ORDER BY COUNT(*) DESC LIMIT 5");

$result5 = $mysqli->query($query5);
$result6 = $mysqli->query($query6);

//variable & array initializ
$data5 = array(); $data6 = array();
$d = array(); $dc = array();
$d1=""; $d2=""; $d3=""; $d4=""; $d5="";
$dc1=0; $dc2=0; $dc3=0; $dc4=0; $dc5=0;

while ($row = mysqli_fetch_assoc($result5))
{
	$data5[]=$row['disease_name'];
}

while ($row = mysqli_fetch_assoc($result6))
{
	$data6[]=$row['counter'];
}

foreach ($data5 as $key => $value)
{
	$d[]=$value;  
}

foreach ($data6 as $key => $value)
{
	$dc[]=$value;  
}

//Initializ disease name
$d1=$d[0];
$d2=$d[1];
$d3=$d[2];
$d4=$d[3];
$d5=$d[4];

//Initializ disease occurred
$dc1=$dc[0];
$dc2=$dc[1];
$dc3=$dc[2];
$dc4=$dc[3];
$dc5=$dc[4];
/* ------------ END ------------ */


/* ------------ Disease Prediction ------------ */

//Months name
$query7 = "SELECT t.Months, SUM(t.Avarage) Avarage FROM ( SELECT m.month Months, 0 Avarage FROM ( SELECT 'January' AS MONTH UNION SELECT 'February' AS MONTH UNION SELECT 'March' AS MONTH UNION SELECT 'April' AS MONTH UNION SELECT 'May' AS MONTH UNION SELECT 'June' AS MONTH UNION SELECT 'July' AS MONTH UNION SELECT 'August' AS MONTH UNION SELECT 'September' AS MONTH UNION SELECT 'October' AS MONTH UNION SELECT 'November' AS MONTH UNION SELECT 'December' AS MONTH ) AS m UNION SELECT DATE_FORMAT(date, '%M') 'Months', ROUND(COUNT(*)/ROUND((SELECT CASE WHEN COUNT(DISTINCT DATE_FORMAT(date, '%Y')) = 5 THEN 5 ELSE COUNT(DISTINCT DATE_FORMAT(date, '%Y')) END from prescription)),2) 'Avarage' from prescription WHERE disease_id =12 GROUP BY DATE_FORMAT(date, '%M') ) t GROUP BY t.Months ORDER BY FIELD(t.Months,'January','February','March','April','May','June','July','August','September','October','November','December')";

//Disease: Diarrhea
$query8 = "SELECT t.Months, SUM(t.Avarage) Avarage FROM ( SELECT m.month Months, 0 Avarage FROM ( SELECT 'January' AS MONTH UNION SELECT 'February' AS MONTH UNION SELECT 'March' AS MONTH UNION SELECT 'April' AS MONTH UNION SELECT 'May' AS MONTH UNION SELECT 'June' AS MONTH UNION SELECT 'July' AS MONTH UNION SELECT 'August' AS MONTH UNION SELECT 'September' AS MONTH UNION SELECT 'October' AS MONTH UNION SELECT 'November' AS MONTH UNION SELECT 'December' AS MONTH ) AS m UNION SELECT DATE_FORMAT(date, '%M') 'Months', ROUND(COUNT(*)/ROUND((SELECT CASE WHEN COUNT(DISTINCT DATE_FORMAT(date, '%Y')) = 5 THEN 5 ELSE COUNT(DISTINCT DATE_FORMAT(date, '%Y')) END from prescription)),2) 'Avarage' from prescription WHERE disease_id =12 GROUP BY DATE_FORMAT(date, '%M') ) t GROUP BY t.Months ORDER BY FIELD(t.Months,'January','February','March','April','May','June','July','August','September','October','November','December')";

//Disease: Dengue
$query9 = "SELECT t.Months, SUM(t.Avarage) Avarage FROM ( SELECT m.month Months, 0 Avarage FROM ( SELECT 'January' AS MONTH UNION SELECT 'February' AS MONTH UNION SELECT 'March' AS MONTH UNION SELECT 'April' AS MONTH UNION SELECT 'May' AS MONTH UNION SELECT 'June' AS MONTH UNION SELECT 'July' AS MONTH UNION SELECT 'August' AS MONTH UNION SELECT 'September' AS MONTH UNION SELECT 'October' AS MONTH UNION SELECT 'November' AS MONTH UNION SELECT 'December' AS MONTH ) AS m UNION SELECT DATE_FORMAT(date, '%M') 'Months', ROUND(COUNT(*)/ROUND((SELECT CASE WHEN COUNT(DISTINCT DATE_FORMAT(date, '%Y')) = 5 THEN 5 ELSE COUNT(DISTINCT DATE_FORMAT(date, '%Y')) END from prescription)),2) 'Avarage' from prescription WHERE disease_id =13 GROUP BY DATE_FORMAT(date, '%M') ) t GROUP BY t.Months ORDER BY FIELD(t.Months,'January','February','March','April','May','June','July','August','September','October','November','December')";

//Disease: Abdominal Pain
$query10 = "SELECT t.Months, SUM(t.Avarage) Avarage FROM ( SELECT m.month Months, 0 Avarage FROM ( SELECT 'January' AS MONTH UNION SELECT 'February' AS MONTH UNION SELECT 'March' AS MONTH UNION SELECT 'April' AS MONTH UNION SELECT 'May' AS MONTH UNION SELECT 'June' AS MONTH UNION SELECT 'July' AS MONTH UNION SELECT 'August' AS MONTH UNION SELECT 'September' AS MONTH UNION SELECT 'October' AS MONTH UNION SELECT 'November' AS MONTH UNION SELECT 'December' AS MONTH ) AS m UNION SELECT DATE_FORMAT(date, '%M') 'Months', ROUND(COUNT(*)/ROUND((SELECT CASE WHEN COUNT(DISTINCT DATE_FORMAT(date, '%Y')) = 5 THEN 5 ELSE COUNT(DISTINCT DATE_FORMAT(date, '%Y')) END from prescription)),2) 'Avarage' from prescription WHERE disease_id =1 GROUP BY DATE_FORMAT(date, '%M') ) t GROUP BY t.Months ORDER BY FIELD(t.Months,'January','February','March','April','May','June','July','August','September','October','November','December')";

$result7 = $mysqli->query($query7);
$result8 = $mysqli->query($query8);
$result9 = $mysqli->query($query9);
$result10 = $mysqli->query($query10);

$data7 = array(); $data8 = array();
$data9 = array(); $data10 = array();
$month = array(); $DataSet1 = array(); $DataSet2 = array(); $DataSet3 = array();

$month1=""; $month2=""; $month3=""; $month4=""; $month5=""; $month6=""; $month7=""; $month8=""; $month9=""; $month10=""; $month11="";$month12="";

$DataSet1_1=0; $DataSet1_2=0; $DataSet1_3=0; $DataSet1_4=0; $DataSet1_5=0; $DataSet1_6=0; $DataSet1_7=0; $DataSet1_8=0; $DataSet1_9=0; $DataSet1_10=0; $DataSet1_11=0; $DataSet1_12=0;

$DataSet2_1=0; $DataSet2_2=0; $DataSet2_3=0; $DataSet2_4=0; $DataSet2_5=0; $DataSet2_6=0; $DataSet2_7=0; $DataSet2_8=0; $DataSet2_9=0; $DataSet2_10=0; $DataSet2_11=0; $DataSet2_12=0;

$DataSet3_1=0; $DataSet3_2=0; $DataSet3_3=0; $DataSet3_4=0; $DataSet3_5=0; $DataSet3_6=0; $DataSet3_7=0; $DataSet3_8=0; $DataSet3_9=0; $DataSet3_10=0; $DataSet3_11=0; $DataSet3_12=0;

while ($row = mysqli_fetch_assoc($result7)) 
{
	$data7[]=$row['Months'];
}

while ($row = mysqli_fetch_assoc($result8))
{
	$data8[]=$row['Avarage'];
}

while ($row = mysqli_fetch_assoc($result9)) 
{
	$data9[]=$row['Avarage'];
}

while ($row = mysqli_fetch_assoc($result10))
{
	$data10[]=$row['Avarage'];
}

foreach ($data7 as $key => $value)
{
	$month[]=$value;  
}

foreach ($data8 as $key => $value)
{
	$DataSet1[]=$value;  
}
foreach ($data9 as $key => $value)
{
	$DataSet2[]=$value;  
}
foreach ($data10 as $key => $value)
{
	$DataSet3[]=$value;  
}

//Initializ month name
$jan=$month[0];
$feb=$month[1];
$mar=$month[2];
$apr=$month[3];
$may=$month[4];
$jun=$month[5];
$jul=$month[6];
$aug=$month[7];
$sep=$month[8];
$oct=$month[9];
$nov=$month[10];
$dec=$month[11];

//Initializ average for Diarrhea as DataSet1
$DataSet1_1=$DataSet1[0];
$DataSet1_2=$DataSet1[1];
$DataSet1_3=$DataSet1[2];
$DataSet1_4=$DataSet1[3];
$DataSet1_5=$DataSet1[4];
$DataSet1_6=$DataSet1[5];
$DataSet1_7=$DataSet1[6];
$DataSet1_8=$DataSet1[7];
$DataSet1_9=$DataSet1[8];
$DataSet1_10=$DataSet1[9];
$DataSet1_11=$DataSet1[10];
$DataSet1_12=$DataSet1[11];

//Initializ average for Dengue as DataSet2
$DataSet2_1 = $DataSet2[0];
$DataSet2_2 = $DataSet2[1];
$DataSet2_3 = $DataSet2[2];
$DataSet2_4 = $DataSet2[3];
$DataSet2_5 = $DataSet2[4];
$DataSet2_6 = $DataSet2[5];
$DataSet2_7 = $DataSet2[6];
$DataSet2_8 = $DataSet2[7];
$DataSet2_9 = $DataSet2[8];
$DataSet2_10 = $DataSet2[9];
$DataSet2_11 = $DataSet2[10];
$DataSet2_12 = $DataSet2[11];

//Initializ average for Abdominal-Pain as DataSet3
$DataSet3_1 = $DataSet3[0];
$DataSet3_2 = $DataSet3[1];
$DataSet3_3 = $DataSet3[2];
$DataSet3_4 = $DataSet3[3];
$DataSet3_5 = $DataSet3[4];
$DataSet3_6 = $DataSet3[5];
$DataSet3_7 = $DataSet3[6];
$DataSet3_8 = $DataSet3[7];
$DataSet3_9 = $DataSet3[8];
$DataSet3_10 = $DataSet3[9];
$DataSet3_11 = $DataSet3[10];
$DataSet3_12 = $DataSet3[11];
/* ------------ END ------------ */

/* ------------ Geographical Disease ------------ */

session_start();
$selected_disease = $_SESSION["disease_id"];

$query_11 = "SELECT (SELECT DISTRICT_NAME FROM district WHERE DISTRICT_ID = N.DISTRICT_ID) DISTRICT, N.TOTAL FROM ( SELECT A.district_id, COUNT(B.patient_id) TOTAL, @rowid := @rowid + 1 AS ROWID FROM patients A, prescription B , (SELECT @rowid := 0) dummy WHERE A.patient_id = B.patient_id AND B.disease_id = $selected_disease AND DATE_FORMAT(B.DATE, '%Y') BETWEEN DATE_FORMAT(SYSDATE(),'%Y')-2 AND DATE_FORMAT(SYSDATE(), '%Y') GROUP BY A.district_id ORDER BY 2 DESC ) N WHERE N.ROWID BETWEEN 1 AND 4";

$query_12 = "SELECT (SELECT DISTRICT_NAME FROM district WHERE DISTRICT_ID = N.DISTRICT_ID) DISTRICT, N.TOTAL FROM ( SELECT A.district_id, COUNT(B.patient_id) TOTAL, @rowid := @rowid + 1 AS ROWID FROM patients A, prescription B , (SELECT @rowid := 0) dummy WHERE A.patient_id = B.patient_id AND B.disease_id = $selected_disease AND DATE_FORMAT(B.DATE, '%Y') BETWEEN DATE_FORMAT(SYSDATE(),'%Y')-2 AND DATE_FORMAT(SYSDATE(), '%Y') GROUP BY A.district_id ORDER BY 2 DESC ) N WHERE N.ROWID BETWEEN 1 AND 4";

$result_11 = $mysqli->query($query_11);
$result_12 = $mysqli->query($query_12);

//variable & array initializ
$data_11 = array(); $data_12 = array();
$dis = array(); $total = array();

$dis1=""; $dis2=""; $dis3=""; $dis4="";
$total1=0; $total2=0; $total3=0; $total4=0;

while ($row = mysqli_fetch_assoc($result_11))
{
	$data_11[]=$row['DISTRICT'];
}

while ($row = mysqli_fetch_assoc($result_12))
{
	$data_12[]=$row['TOTAL'];
}

foreach ($data_11 as $key => $value)
{
	$dis[]=$value;  
}

foreach ($data_12 as $key => $value)
{
	$total[]=$value;  
}

//Initializ district name
 $dis1=$dis[0];
 $dis2=$dis[1];
 $dis3=$dis[2];
 $dis4=$dis[3];

//Initializ disease occurred
 $total1=$total[0];
 $total2=$total[1];
 $total3=$total[2];
 $total4=$total[3];

//percentage calculator
 $sum = ($total1+$total2+$total3+$total4);
 $percentage1 = round((($total1*100)/$sum),1);
 $percentage2 = round((($total2*100)/$sum),1);
 $percentage3 = round((($total3*100)/$sum),1);
 $percentage4 = round((($total4*100)/$sum),1);
/* ------------ END ------------ */

$result->close();
$mysqli->close();
?>


<script>
//Bar Chart - Top Medicine used
$(function () {
  'use strict';
  //variables of medicine name
  var val1 = "<?php echo $s1; ?>";
  var val2 = "<?php echo $s2; ?>";
  var val3 = "<?php echo $s3; ?>";
  var val4 = "<?php echo $s4; ?>";
  var val5 = "<?php echo $s5; ?>";
  var val6 = "<?php echo $s6; ?>";
  
  //variables of medicine uses
  var pres1 = "<?php echo $p1; ?>";
  var pres2 = "<?php echo $p2; ?>";
  var pres3 = "<?php echo $p3; ?>";
  var pres4 = "<?php echo $p4; ?>";
  var pres5 = "<?php echo $p5; ?>";
  var pres6 = "<?php echo $p6; ?>";
  
  //variables of medicine name
  var gen1 = "<?php echo $g1; ?>";
  var gen2 = "<?php echo $g2; ?>";
  var gen3 = "<?php echo $g3; ?>";
  var gen4 = "<?php echo $g4; ?>";
  var gen5 = "<?php echo $g5; ?>";
  
  //variables of medicine uses
  var c1 = "<?php echo $c1; ?>";
  var c2 = "<?php echo $c2; ?>";
  var c3 = "<?php echo $c3; ?>";
  var c4 = "<?php echo $c4; ?>";
  var c5 = "<?php echo $c5; ?>";

  //variables of disease name
  var d1 = "<?php echo $d1; ?>";
  var d2 = "<?php echo $d2; ?>";
  var d3 = "<?php echo $d3; ?>";
  var d4 = "<?php echo $d4; ?>";
  var d5 = "<?php echo $d5; ?>";
  
  //variables of Common Disease occurred
  var dc1 = "<?php echo $dc1; ?>";
  var dc2 = "<?php echo $dc2; ?>";
  var dc3 = "<?php echo $dc3; ?>";
  var dc4 = "<?php echo $dc4; ?>";
  var dc5 = "<?php echo $dc5; ?>";
  
  //variables of months name
  var jan = "<?php echo $jan; ?>";
  var feb = "<?php echo $feb; ?>";
  var mar = "<?php echo $mar; ?>";
  var apr = "<?php echo $apr; ?>";
  var may = "<?php echo $may; ?>";
  var jun = "<?php echo $jun; ?>";
  var jul = "<?php echo $jul; ?>";
  var aug = "<?php echo $aug; ?>";
  var sep = "<?php echo $sep; ?>";
  var oct = "<?php echo $oct; ?>";
  var nov = "<?php echo $nov; ?>";
  var dec = "<?php echo $dec; ?>";
  
  //DataSet of diarrhea
  var DataSet1_1 = "<?php echo $DataSet1_1; ?>";
  var DataSet1_2 = "<?php echo $DataSet1_2; ?>";
  var DataSet1_3 = "<?php echo $DataSet1_3; ?>";
  var DataSet1_4 = "<?php echo $DataSet1_4; ?>";
  var DataSet1_5 = "<?php echo $DataSet1_5; ?>";
  var DataSet1_6 = "<?php echo $DataSet1_6; ?>";
  var DataSet1_7 = "<?php echo $DataSet1_7; ?>";
  var DataSet1_8 = "<?php echo $DataSet1_8; ?>";
  var DataSet1_9 = "<?php echo $DataSet1_9; ?>";
  var DataSet1_10 = "<?php echo $DataSet1_10; ?>";
  var DataSet1_11 = "<?php echo $DataSet1_11; ?>";
  var DataSet1_12 = "<?php echo $DataSet1_12; ?>";
  
  //DataSet of dengue
  var DataSet2_1 = "<?php echo $DataSet2_1; ?>";
  var DataSet2_2 = "<?php echo $DataSet2_2; ?>";
  var DataSet2_3 = "<?php echo $DataSet2_3; ?>";
  var DataSet2_4 = "<?php echo $DataSet2_4; ?>";
  var DataSet2_5 = "<?php echo $DataSet2_5; ?>";
  var DataSet2_6 = "<?php echo $DataSet2_6; ?>";
  var DataSet2_7 = "<?php echo $DataSet2_7; ?>";
  var DataSet2_8 = "<?php echo $DataSet2_8; ?>";
  var DataSet2_9 = "<?php echo $DataSet2_9; ?>";
  var DataSet2_10 = "<?php echo $DataSet2_10; ?>";
  var DataSet2_11 = "<?php echo $DataSet2_11; ?>";
  var DataSet2_12 = "<?php echo $DataSet2_12; ?>";
  
  //DataSet of dengue
  var DataSet3_1 = "<?php echo $DataSet3_1; ?>";
  var DataSet3_2 = "<?php echo $DataSet3_2; ?>";
  var DataSet3_3 = "<?php echo $DataSet3_3; ?>";
  var DataSet3_4 = "<?php echo $DataSet3_4; ?>";
  var DataSet3_5 = "<?php echo $DataSet3_5; ?>";
  var DataSet3_6 = "<?php echo $DataSet3_6; ?>";
  var DataSet3_7 = "<?php echo $DataSet3_7; ?>";
  var DataSet3_8 = "<?php echo $DataSet3_8; ?>";
  var DataSet3_9 = "<?php echo $DataSet3_9; ?>";
  var DataSet3_10 = "<?php echo $DataSet3_10; ?>";
  var DataSet3_11 = "<?php echo $DataSet3_11; ?>";
  var DataSet3_12 = "<?php echo $DataSet3_12; ?>";
  
  //DataSet of District name
  var district1 = "<?php echo $dis1; ?>";
  var district2 = "<?php echo $dis2; ?>";
  var district3 = "<?php echo $dis3; ?>";
  var district4 = "<?php echo $dis4; ?>";
  
  //DataSet of Percentage of Disease occurred 
  var per1 = "<?php echo $percentage1; ?>";
  var per2 = "<?php echo $percentage2; ?>";
  var per3 = "<?php echo $percentage3; ?>";
  var per4 = "<?php echo $percentage4; ?>";
  
  
  var data = {
    labels: [val1,val2,val3,val4,val5,val6],
    datasets: [{
      label: ' of uses',
      data: [pres1,pres2,pres3,pres4,pres5,pres6],
      backgroundColor: [
        'rgba(255, 66, 15, 0.7)',
        'rgba(0, 187, 221, 0.7)',
        'rgba(255, 193, 7, 0.7)',
        'rgba(0, 182, 122, 0.7)',
        'rgba(153, 102, 255, 0.7)',
        'rgba(255, 159, 64, 0.7)'
      ],
      borderColor: [
        'rgba(255, 66, 15,1)',
        'rgba(0, 187, 221, 1)',
        'rgba(255, 193, 7, 1)',
        'rgba(0, 182, 122, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
      fill: false
    }]
  };
  
    var lineChart = {
    labels: [d1,d2,d3,d4,d5],
    datasets: [{
      label: ' of occurs',
      data: [dc1,dc2,dc3,dc4,dc5],
      backgroundColor: [
        'rgba(255, 66, 15, 0.7)',
        'rgba(0, 187, 221, 0.7)',
        'rgba(255, 193, 7, 0.7)',
        'rgba(0, 182, 122, 0.7)',
        'rgba(153, 102, 255, 0.7)',
        'rgba(255, 159, 64, 0.7)'
      ],
      borderColor: [
        'rgba(255, 66, 15,1)',
        'rgba(0, 187, 221, 1)',
        'rgba(255, 193, 7, 1)',
        'rgba(0, 182, 122, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 2,
      fill: false
    }]
  };
  
  
  var dataDark = {
    labels: ["test", "2014", "2014", "2015", "2016", "2017"],
    datasets: [{
      label: '# of Votes',
      data: [10, 19, 3, 5, 2, 3],
      backgroundColor: [
        'rgba(255, 66, 15, 0.7)',
        'rgba(0, 187, 221, 0.7)',
        'rgba(255, 193, 7, 0.7)',
        'rgba(0, 182, 122, 0.7)',
        'rgba(153, 102, 255, 0.7)',
        'rgba(255, 159, 64, 0.7)'
      ],
      borderColor: [
        'rgba(255, 66, 15,1)',
        'rgba(0, 187, 221, 1)',
        'rgba(255, 193, 7, 1)',
        'rgba(0, 182, 122, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
      fill: false
    }]
  };
  
  
  var multiLineData = {
    labels: [jan,feb,mar,apr,may,jun,jul,aug,sep,oct,nov,dec],
	//data set for Diarrhea
    datasets: [{
      label: 'Diarrhea',
      data: [DataSet1_1,DataSet1_2,DataSet1_3,DataSet1_4,DataSet1_5,DataSet1_6,DataSet1_7,DataSet1_8,DataSet1_9,DataSet1_10,DataSet1_11,DataSet1_12],
      borderColor: [
        '#587ce4'
      ],
      borderWidth: 2,
      fill: false
    },
	//data set for Dengue
    {
      label: 'Dengue',
      data: [DataSet2_1,DataSet2_2,DataSet2_3,DataSet2_4,DataSet2_5,DataSet2_6,DataSet2_7,DataSet2_8,DataSet2_9,DataSet2_10,DataSet2_11,DataSet2_12],
      borderColor: [
        '#00eb1f'
      ],
      borderWidth: 2,
      fill: false
    },
	//data set for Abdominal-Pain
    {
      label: 'Abdominal Pain',
      data: [DataSet3_1,DataSet3_2,DataSet3_3,DataSet3_4,DataSet3_5,DataSet3_6,DataSet3_7,DataSet3_8,DataSet3_9,DataSet3_10,DataSet3_11,DataSet3_12],
      borderColor: [
        '#f44252'
      ],
      borderWidth: 2,
      fill: false
    }
    ]
  };
  var options = {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    },
    legend: {
      display: false
    },
    elements: {
      point: {
        radius: 0
      }
    }

  };
  var optionsDark = {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        },
        gridLines: {
          color: '#322f2f',
          zeroLineColor: '#322f2f'
        }
      }],
      xAxes: [{
        ticks: {
          beginAtZero: true
        },
        gridLines: {
          color: '#322f2f',
        }
      }],
    },
    legend: {
      display: false
    },
    elements: {
      point: {
        radius: 0
      }
    }

  };
  var doughnutPieData = {
    datasets: [{
      data: [per1, per2, per3, per4],
      backgroundColor: [
		'rgba(204,102,153,2)',
        'rgba(102,153,153, 2)',
        'rgba(153,255,204, 2)',
		'rgba(255, 179, 102, 2)',
      ],
      borderColor: [
		'rgba(204,102,153, 2)',
        'rgba(102,153,153, 2)',
        'rgba(153,255,204, 2)',
		 'rgba(255, 179, 102, 2)',
      ],
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [district1,district2,district3,district4]
  };
  
  var doughnutPieOptions = {
    responsive: true,
    animation: {
      animateScale: true,
      animateRotate: true
    }
  };
  
  //Area chart - Most Drug Generic
  var areaData = { 
    labels: [gen1,gen2,gen3,gen4,gen5],
    datasets: [{
      label: ' of uses',
      data: [c1,c2,c3,c4,c5],
      backgroundColor: [
        'rgba(255, 66, 15, 0.4)',
        'rgba(0, 187, 221, 0.4)',
        'rgba(255, 193, 7, 0.4)',
        'rgba(0, 182, 122, 0.4)',
        'rgba(153, 102, 255, 0.4)',
        'rgba(255, 159, 64, 0.4)'
      ],
      borderColor: [
        'rgba(255, 66, 15,1)',
        'rgba(0, 187, 221, 1)',
        'rgba(255, 193, 7, 1)',
        'rgba(0, 182, 122, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
      fill: true, // 3: no fill
    }]
  };

  var areaDataDark = {
    labels: ["2013", "2014", "2015", "2016", "2017"],
    datasets: [{
      label: ' of votes',
      data: [12, 19, 3, 5, 2, 3],
      backgroundColor: [
        'rgba(255, 66, 15, 0.4)',
        'rgba(0, 187, 221, 0.4)',
        'rgba(255, 193, 7, 0.4)',
        'rgba(0, 182, 122, 0.4)',
        'rgba(153, 102, 255, 0.4)',
        'rgba(255, 159, 64, 0.4)'
      ],
      borderColor: [
        'rgba(255, 66, 15,1)',
        'rgba(0, 187, 221, 1)',
        'rgba(255, 193, 7, 1)',
        'rgba(0, 182, 122, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
      fill: true, // 3: no fill
    }]
  };

  var areaOptions = {
    plugins: {
      filler: {
        propagate: true
      }
    }
  }

  var areaOptionsDark = {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        },
        gridLines: {
          color: '#322f2f',
          zeroLineColor: '#322f2f'
        }
      }],
      xAxes: [{
        ticks: {
          beginAtZero: true
        },
        gridLines: {
          color: '#322f2f',
        }
      }],
    },
    plugins: {
      filler: {
        propagate: true
      }
    }
  }

  var multiAreaData = {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: 'Facebook',
      data: [8, 11, 13, 15, 12, 13, 16, 15, 13, 19, 11, 14],
      borderColor: ['rgba(255, 66, 15, 0.5)'],
      backgroundColor: ['rgba(255, 66, 15, 0.5)'],
      borderWidth: 1,
      fill: true
    },
    {
      label: 'Twitter',
      data: [7, 17, 12, 16, 14, 18, 16, 12, 15, 11, 13, 9],
      borderColor: ['rgba(0, 187, 221, 0.5)'],
      backgroundColor: ['rgba(0, 187, 221, 0.5)'],
      borderWidth: 1,
      fill: true
    },
    {
      label: 'Linkedin',
      data: [6, 14, 16, 20, 12, 18, 15, 12, 17, 19, 15, 11],
      borderColor: ['rgba(255, 193, 7, 0.5)'],
      backgroundColor: ['rgba(255, 193, 7, 0.5)'],
      borderWidth: 1,
      fill: true
    }
    ]
  };

  var multiAreaOptions = {
    plugins: {
      filler: {
        propagate: true
      }
    },
    elements: {
      point: {
        radius: 0
      }
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false
        }
      }],
      yAxes: [{
        gridLines: {
          display: false
        }
      }]
    }
  }

  var scatterChartData = {
    datasets: [{
      label: 'First Dataset',
      data: [{
        x: -10,
        y: 0
      },
      {
        x: 0,
        y: 3
      },
      {
        x: -25,
        y: 5
      },
      {
        x: 40,
        y: 5
      }
      ],
      backgroundColor: [
        'rgba(255, 66, 15, 0.7)'
      ],
      borderColor: [
        'rgba(255, 66, 15,1)'
      ],
      borderWidth: 1
    },
    {
      label: 'Second Dataset',
      data: [{
        x: 10,
        y: 5
      },
      {
        x: 20,
        y: -30
      },
      {
        x: -25,
        y: 15
      },
      {
        x: -10,
        y: 5
      }
      ],
      backgroundColor: [
        'rgba(0, 187, 221, 0.7)',
      ],
      borderColor: [
        'rgba(0, 187, 221, 1)',
      ],
      borderWidth: 1
    }
    ]
  }

  var scatterChartDataDark = {
    datasets: [{
      label: 'First Dataset',
      data: [{
        x: -10,
        y: 0
      },
      {
        x: 0,
        y: 3
      },
      {
        x: -25,
        y: 5
      },
      {
        x: 40,
        y: 5
      }
      ],
      backgroundColor: [
        'rgba(255, 66, 15, 0.7)'
      ],
      borderColor: [
        'rgba(255, 66, 15,1)'
      ],
      borderWidth: 1
    },
    {
      label: 'Second Dataset',
      data: [{
        x: 10,
        y: 5
      },
      {
        x: 20,
        y: -30
      },
      {
        x: -25,
        y: 15
      },
      {
        x: -10,
        y: 5
      }
      ],
      backgroundColor: [
        'rgba(0, 187, 221, 0.7)',
      ],
      borderColor: [
        'rgba(0, 187, 221, 1)',
      ],
      borderWidth: 1
    }
    ]
  }

  var scatterChartOptions = {
    scales: {
      xAxes: [{
        type: 'linear',
        position: 'bottom'
      }]
    }
  }

  var scatterChartOptionsDark = {
    scales: {
      xAxes: [{
        type: 'linear',
        position: 'bottom',
        gridLines: {
          color: '#322f2f',
          zeroLineColor: '#322f2f'
        }
      }],
      yAxes: [{
        gridLines: {
          color: '#322f2f',
          zeroLineColor: '#322f2f'
        }
      }]
    }
  }
  
  
  
  // Get context with jQuery - using jQuery's .get() method.
  
  //barcharts
  if ($("#barChart").length) {
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: data,
      options: options
    });
  }
  

  if ($("#barChartDark").length) {
    var barChartCanvasDark = $("#barChartDark").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var barChartDark = new Chart(barChartCanvasDark, {
      type: 'bar',
      data: dataDark,
      options: optionsDark
    });
  }

  
  if ($("#lineChart").length) {
    var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChart,
      options: multiLineData
    });
  }

  if ($("#lineChartDark").length) {
    var lineChartCanvasDark = $("#lineChartDark").get(0).getContext("2d");
    var lineChartDark = new Chart(lineChartCanvasDark, {
      type: 'line',
      data: dataDark,
      options: optionsDark
    });
  }

  if ($("#linechart-multi").length) {
    var multiLineCanvas = $("#linechart-multi").get(0).getContext("2d");
    var lineChart = new Chart(multiLineCanvas, {
      type: 'line',
      data: multiLineData,
      options: multiLineData
    });
  }

  if ($("#areachart-multi").length) {
    var multiAreaCanvas = $("#areachart-multi").get(0).getContext("2d");
    var multiAreaChart = new Chart(multiAreaCanvas, {
      type: 'line',
      data: multiAreaData,
      options: multiAreaOptions
    });
  }

  if ($("#doughnutChart").length) {
    var doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d");
    var doughnutChart = new Chart(doughnutChartCanvas, {
      type: 'doughnut',
      data: doughnutPieData,
      options: doughnutPieOptions
    });
  }

  if ($("#pieChart").length) {
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: doughnutPieData,
      options: doughnutPieOptions
    });
  }

  if ($("#areaChart").length) {
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    var areaChart = new Chart(areaChartCanvas, {
      type: 'line',
      data: areaData,
      options: areaOptions
    });
  }

  if ($("#areaChartDark").length) {
    var areaChartCanvas = $("#areaChartDark").get(0).getContext("2d");
    var areaChart = new Chart(areaChartCanvas, {
      type: 'line',
      data: areaDataDark,
      options: areaOptionsDark
    });
  }

  if ($("#scatterChart").length) {
    var scatterChartCanvas = $("#scatterChart").get(0).getContext("2d");
    var scatterChart = new Chart(scatterChartCanvas, {
      type: 'scatter',
      data: scatterChartData,
      options: scatterChartOptions
    });
  }

  if ($("#scatterChartDark").length) {
    var scatterChartCanvas = $("#scatterChartDark").get(0).getContext("2d");
    var scatterChart = new Chart(scatterChartCanvas, {
      type: 'scatter',
      data: scatterChartDataDark,
      options: scatterChartOptionsDark
    });
  }

  if ($("#browserTrafficChart").length) {
    var doughnutChartCanvas = $("#browserTrafficChart").get(0).getContext("2d");
    var doughnutChart = new Chart(doughnutChartCanvas, {
      type: 'doughnut',
      data: browserTrafficData,
      options: doughnutPieOptions
    });
  }
});
</script>