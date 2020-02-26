<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Query7</title>
</head>

<body>
<h1>
PATIENT_NO COMPLAINT_NO TREATMENT_CODE

<h1>

<?php  // example 2.1 ..creating a database connection 

//include_once('db_config.php');

   $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)) ) (CONNECT_DATA = (SID = hamza) ) )"; 
   $db_user = "Hospital"; 
   $db_pass = "1234"; 
   $con = oci_connect($db_user,$db_pass,$db_sid); 
  
   if(!$con)
      { die('Could not connect to Oracle: '); } 
      
      $sql_select="select c.patient_no,c.complaint_no,t.treatment_code from complaint c inner join treatment t on (c.complaint_no=t.complaint_no) where c.patient_no=(select patient_no from complaint group by(patient_no) having count(complaint_no)>1)";
		
				  

			$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
        	//$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
			
		
	      while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
        		echo "<br>";
			$p_no = $row["PATIENT_NO"];
			echo $p_no;
			echo " ";
			$c_no = $row["COMPLAINT_NO"];
			echo $c_no;
			echo " ";
			 $t_no = $row["TREATMENT_CODE"];
			echo $t_no;
			
			
			
			
		  } //while
?>
         

</body>
</html>
