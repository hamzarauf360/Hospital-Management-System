<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Query1</title>
</head>

<body>
<h1>
consultant doctor doctor name

<?php  // example 2.1 ..creating a database connection 

//include_once('db_config.php');

   $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)) ) (CONNECT_DATA = (SID = hamza) ) )"; 
   $db_user = "Hospital"; 
   $db_pass = "1234"; 
   $con = oci_connect($db_user,$db_pass,$db_sid); 
  
   if(!$con)
      { die('Could not connect to Oracle: '); } 
      
      $sql_select="select c.consultant_no,t.doc_no,d.doc_name from  team t inner join  consultant c on (c.consultant_no=t.consultant_id) inner join doctor d on (t.doc_no=d.doc_no)";
		
				  

			$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
        	//$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
			
		
	      while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
        		echo "<br>";
			$c_no = $row["CONSULTANT_NO"];
			echo $c_no;
			echo " ";
			$t_doc_no = $row["DOC_NO"];
			echo $t_doc_no;
			echo " ";
			$d_doc_name = $row["DOC_NAME"];
			echo $d_doc_name;
			
			
		  } //while
?>
         

</body>
</html>
