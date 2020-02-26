<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Query2</title>
</head>

<body>
<h1>
WARD NAME DAY SISTER NIGHT SISTER CARE UNIT INCHARGE NURSE NUMBER

<h1>

<?php  // example 2.1 ..creating a database connection 

//include_once('db_config.php');

   $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)) ) (CONNECT_DATA = (SID = hamza) ) )"; 
   $db_user = "Hospital"; 
   $db_pass = "1234"; 
   $con = oci_connect($db_user,$db_pass,$db_sid); 
  
   if(!$con)
      { die('Could not connect to Oracle: '); } 
      
      $sql_select="select w.ward_name,d.day_sister_no,nn.night_sister_no,u.unit_no,u.incharge_staff_nurse from ward w inner join day_sister d on (w.ward_name=d.ward_name) inner join night_sister nn on (w.ward_name=nn.ward_name) inner join care_unit u on (w.ward_name=u.ward_name)";
		
				  

			$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
        	//$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
			
		
	      while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
        		echo "<br>";
			$w_name = $row["WARD_NAME"];
			echo $w_name;
			echo " ";
			$d_sister_no = $row["DAY_SISTER_NO"];
			echo $d_sister_no;
			echo " ";
			$n_sister_no = $row["NIGHT_SISTER_NO"];
			echo $n_sister_no;
			echo " ";
			$u_no = $row["UNIT_NO"];
			echo $u_no;
			echo " ";
			$i_staff = $row["INCHARGE_STAFF_NURSE"];
			echo $i_staff;
			
		  } //while
?>
         

</body>
</html>
