<html>
<head><title>University of Wendy</title></head>
<body>



<?php

if(isset($_COOKIE["username"])){

   echo "<form action=\"deletecourse.php\" method=post>";

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];	
   
   $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);

   $sql = "select cno from COURSE"; 
   $result = $conn->query($sql);
   if($result->num_rows != 0)
   {
      echo "Course Numbers: <select name=\"cno\">";
      
      while($val = $result->fetch_assoc())
      {
	 echo "<option value='$val[cno]'>$val[cno]</option>"; 
	 
      }
      echo "</select>"; 
      echo "<input type=submit name=\"submit\" value=\"Delete\">"; 
   }
   else
   {
      echo "<p>No Courses! </p>"; 
   }
   
   echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 

}
?>


 
</body>
</html>
