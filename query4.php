<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Query4</title>
</head>

<body>
<h1>
DOC_NO PATIENT_NAME

<h1>

<?php  // example 2.1 ..creating a database connection 

//include_once('db_config.php');

   $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)) ) (CONNECT_DATA = (SID = hamza) ) )"; 
   $db_user = "Hospital"; 
   $db_pass = "1234"; 
   $con = oci_connect($db_user,$db_pass,$db_sid); 
  
   if(!$con)
      { die('Could not connect to Oracle: '); } 
      
      $sql_select="select t.doc_no,p.patient_name,c.unit_no,c.incharge_staff_nurse from patient p  inner join team t on (t.doc_no=p.incharge_doc) inner join care_unit c on (p.care_unit_no=c.unit_no) where t.position='jh'";
		
				  

			$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
        	//$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
			
		
	      while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
        		echo "<br>";
			$p_name = $row["DOC_NO"];
			echo $p_name;
			echo " ";
			$c_name = $row["PATIENT_NAME"];
			echo $c_name;
			
			echo " ";
			$unit = $row["UNIT_NO"];
			echo $unit;
			echo " ";
			$inc = $row["INCHARGE_STAFF_NURSE"];
			echo $inc;
			
		  } //while
?>
         

</body>
</html>
