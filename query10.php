<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Query10</title>
</head>

<body>
<h1>

MEDICAL DETAILS

<h1>

<?php  // example 2.1 ..creating a database connection 

//include_once('db_config.php');

   $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)) ) (CONNECT_DATA = (SID = hamza) ) )"; 
   $db_user = "Hospital"; 
   $db_pass = "1234"; 
   $con = oci_connect($db_user,$db_pass,$db_sid); 
  
   if(!$con)
      { die('Could not connect to Oracle: '); } 
      
      $sql_select="select p.patient_no,p.patient_name,p.d_o_b,d.doc_no,d.doc_name,t.consultant_id,c.complaint_no from patient p inner join doctor d on (p.incharge_doc=d.doc_no) inner join team t on (p.incharge_doc=t.doc_no) inner join complaint c on (p.patient_no=c.patient_no) where p.patient_no=$_REQUEST[patientno]";
		
				  

			$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
        	//$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
			
		
	      while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
        		echo "<br>";
			$p_no = $row["PATIENT_NO"];
			echo $p_no;
			echo " ";
			$per = $row["PATIENT_NAME"];
            echo $per;
            echo " ";
			$dob = $row["D_O_B"];
            echo $dob;
            echo " ";
			$docno = $row["DOC_NO"];
            echo $docno;
            echo " ";
			$docname = $row["DOC_NAME"];
            echo $docname;
            echo " ";
			$consulid = $row["CONSULTANT_ID"];
            echo $consulid;
            echo " ";
			$compid = $row["COMPLAINT_NO"];
			echo $compid;
			
			
			
			
			
		  } //while
?>
         

</body>
</html>
