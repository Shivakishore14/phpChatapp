<html>
  <body>
   <form action="" method="GET">
     <input type="text" placeholder="username" name="uname"></input><br>
	 <input type="submit" value="Login"></input>

   </form>
  </body>
  <?php
  $uname = $_GET[uname];
	 if (isset($uname)){
	    setcookie("name", $uname, time()+3600, "/", "", 0);
		 header("refresh:1; url=dashboard.php");
	 }
  ?>
</html>
