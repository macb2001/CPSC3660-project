<?php

if (isset($_COOKIE["username"])) { 
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);

   $sql = "insert into SECTION values ('$_POST[cno]','$_POST[secid]','$_POST[sem]','$_POST[yr]',NULL)"; 
   if($conn->query($sql)) 
   { 
   
      echo "<p>New Section for course number $_POST[cno] added!</p> "; 
	
   } else {
      $err = $conn->errno; 
      if($err == 1062)
      {
	 echo "<p>Course section already exists!</p>";
      }
      else if ($err == 1452) {
	 echo "<p>Course $_POST[cno] does not exist!</p>"; 
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
 

