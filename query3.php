<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Query3</title>
</head>

<body>
<h1>
PATIENT_NO COMPLAINT_NAME TREATMENT_CODE START_DATE END_DATE

<h1>

<?php  // example 2.1 ..creating a database connection 

//include_once('db_config.php');

   $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)) ) (CONNECT_DATA = (SID = hamza) ) )"; 
   $db_user = "Hospital"; 
   $db_pass = "1234"; 
   $con = oci_connect($db_user,$db_pass,$db_sid); 
  
   if(!$con)
      { die('Could not connect to Oracle: '); } 
      
      $sql_select="select p.patient_no,c.complaint_name,t.treatment_code,t.start_date,t.end_date from complaint c inner join patient p on (c.patient_no=p.patient_no) inner join treatment t on (c.complaint_no=t.complaint_no)";
		
				  

			$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
        	//$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
			
		
	      while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
        		echo "<br>";
			$p_name = $row["PATIENT_NO"];
			echo $p_name;
			echo " ";
			$c_name = $row["COMPLAINT_NAME"];
			echo $c_name;
			echo " ";
			$t_code = $row["TREATMENT_CODE"];
			echo $t_code;
			echo " ";
			$s_date = $row["START_DATE"];
			echo $s_date;
			echo " ";
			$e_date = $row["END_DATE"];
			echo $e_date;
			
		  } //while
?>
         

</body>
</html>
