<?php

if (isset($_COOKIE["username"])) { 
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username); 
   
   $sql = "insert into COURSE values ('$_POST[cno]','$_POST[cname]','$_POST[crhrs]','$_POST[dname]')"; 
   if($conn->query($sql)) 
   { 
   
      $sql = "insert into SECTION values ('$_POST[cno]','A','Fall','2011',NULL)";
      $conn->query($sql);
      echo "<h3> Course and one section added!</h3>";
	
   }
   else {
      $err = $conn->errno; 
      if($err == 1062)
      {
	 echo "<p>Course Number $_POST[cno] already exists!</p>"; 
      }
      else {
	 echo "error number $err"; 
      }
      
   }
   echo "<a href=\"main.php\">Return</a> to Home Page."; 
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 

}

?>
 

