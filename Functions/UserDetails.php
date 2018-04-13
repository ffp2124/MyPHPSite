<?php
require_once('Functions/mysql.class.php');
   function checkUserCredentals($inputUsername, $inputPassword)
   {
   /*
   This function takes input username and password as parameters and 
   returns TRUE if the user is authenticated, FALSE if the user is not authenticated
   */
	   
	   //create connection
	   global $db;
	   
	  $sql = "SELECT * FROM Customer Where User_Name='".$inputUsername."' AND Password='".$inputPassword."'";
	  
	  $result = $db->query($sql);
	  
	  if ($result->size()==1)
	  {
		  $row = $result->fetch();
		  if($row['Status'] == "Enabled"){
			  	//authentication succeeded
				return 1;
			  }else
			  {
				return 2;  }
	  }
	  else
	  {
		  //authentication failed
		  return 3;	
	  }
   }
   
?>