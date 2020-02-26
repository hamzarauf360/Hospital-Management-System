<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Query6</title>
</head>

<body>
<h1>

complaint_no treatment_code doc_no from_date to_date establishment position
<h1>

<?php  // example 2.1 ..creating a database connection 

//include_once('db_config.php');

   $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)) ) (CONNECT_DATA = (SID = hamza) ) )"; 
   $db_user = "Hospital"; 
   $db_pass = "1234"; 
   $con = oci_connect($db_user,$db_pass,$db_sid); 
  
   if(!$con)
      { die('Could not connect to Oracle: '); } 
      
      $sql_select="select c.complaint_no,t.treatment_code,t.doc_no,e.from_date,e.to_date,e.establishment,e.position from treatment t inner join complaint c on (t.complaint_no=c.complaint_no) inner join experience e on (t.doc_no=e.doc_no)";
		
				  

			$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
        	//$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
			
		
	      while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
        		echo "<br>";
			$c_no = $row["COMPLAINT_NO"];
			echo $c_no;
			echo " ";
			$t_c = $row["TREATMENT_CODE"];
			echo $t_c;
			echo " ";
			$d_no = $row["DOC_NO"];
			echo $d_no;
			echo " ";
			$f_date = $row["FROM_DATE"];
			echo $f_date;
			echo " ";
			$t_date = $row["TO_DATE"];
			echo $t_date;
			echo " ";
			$estab = $row["ESTABLISHMENT"];
			echo $estab;
			echo " ";
			$posi = $row["POSITION"];
			echo $posi;
			
			
		  } //while
?>
         

</body>
</html>
