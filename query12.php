<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Query12</title>
</head>

<body>
<h1>
COUNT OF POSITIONS

<h1>

<?php  // example 2.1 ..creating a database connection 

//include_once('db_config.php');

   $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)) ) (CONNECT_DATA = (SID = hamza) ) )"; 
   $db_user = "Hospital"; 
   $db_pass = "1234"; 
   $con = oci_connect($db_user,$db_pass,$db_sid); 
  
   if(!$con)
      { die('Could not connect to Oracle: '); } 
      
      $sql_select="select count(staff_nurse_no) from staff_nurse";
		$sql_select2 = "select count(non_reg_nurse_no) from non_reg_nurse";
		$sql_select3 = "select count(day_sister_no) from day_sister";
		$sql_select4 = "select count(night_sister_no) from night_sister";

		$sql_select5 = "select count(consultant_no) from consultant";

		$sql_select6 = "select count(doc_no) from doctor";

			$query_id3 = oci_parse($con, $sql_select);
			$runselect = oci_execute($query_id3);
			$query_id4 = oci_parse($con, $sql_select2);
			$runselect = oci_execute($query_id4);
			
			$query_id5 = oci_parse($con, $sql_select3);
			$runselect = oci_execute($query_id5);
			$query_id6 = oci_parse($con, $sql_select4);
			$runselect = oci_execute($query_id6);

			$query_id7 = oci_parse($con, $sql_select5);
			$runselect = oci_execute($query_id7);

			$query_id8 = oci_parse($con, $sql_select6);
			$runselect = oci_execute($query_id8);
        	//$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
			
		echo "STAFF NURSES COUNT : ";
	      while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
        		echo "<br>";
			$p_no = $row["COUNT(STAFF_NURSE_NO)"];
			echo $p_no;
			
			
			
			
			
		  } //while
		  echo "<br>";
		  echo "NON REG NURSES COUNT : ";
	      while($row = oci_fetch_array($query_id4, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
        		echo "<br>";
			$s_no = $row["COUNT(NON_REG_NURSE_NO)"];
			echo $s_no;
			
			
			
			
			
		  } //while
		  echo "<br>";
		  echo "DAY SISTER COUNT : ";
	      while($row = oci_fetch_array($query_id5, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
        		echo "<br>";
			$s_no = $row["COUNT(DAY_SISTER_NO)"];
			echo $s_no;
			
			
			
			
			
		  } //while
		  echo "<br>";
		  echo "NIGHT SISTER COUNT : ";
	      while($row = oci_fetch_array($query_id6, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
        		echo "<br>";
			$s_no = $row["COUNT(NIGHT_SISTER_NO)"];
			echo $s_no;
			
			
			
			
			
		  } //while

		  echo "<br>";
		  echo "CONSULTANT COUNT : ";
	      while($row = oci_fetch_array($query_id7, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
        		echo "<br>";
			$s_no = $row["COUNT(CONSULTANT_NO)"];
			echo $s_no;
			
			
			
			
			
		  } //while

		  echo "<br>";
		  echo "DOCTOR COUNT : ";
	      while($row = oci_fetch_array($query_id8, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
        		echo "<br>";
			$s_no = $row["COUNT(DOC_NO)"];
			echo $s_no;
			
			
			
			
			
		  } //while
?>

         

</body>
</html>
