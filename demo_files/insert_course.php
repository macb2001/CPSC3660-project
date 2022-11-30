<html>
<head><title>University of Wendy</title></head>
<body>



<?php
if(isset($_COOKIE["username"])){
   
   echo "<form action=\"insertcourse.php\" method=post>";
   
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];	

   $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
   
	
   $sql = "select dname from DEPT"; 
   $result = $conn->query($sql);
   if($result->num_rows != 0)
   {
      echo "Course Number: <input type=text name=\"cno\" size=8> <br><br>";
      echo "Course Name: <input type=text name=\"cname\" size=20> <br><br>";
      echo "Credit Hours: <input type=text name=\"crhrs\" size=3> <br><br>"; 
      echo "Department Name: <select name=\"dname\">";
      
      while($val = $result->fetch_assoc())
      {
	 echo "<option value='$val[dname]'>$val[dname]</option>"; 
	 
      }
      echo "</select>"; 
      echo "<input type=submit name=\"submit\" value=\"Add Course\">"; 
   }
   else
   {
      echo "<H3>There are no departments in the system! </H3>"; 
   }
   
   echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
   
}
?>


 
</body>
</html>
