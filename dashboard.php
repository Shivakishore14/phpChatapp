<html>
  <body>
   <form action="send.php" method="GET">

	 <input type="text" placeholder="To" id="to" name="to"></input><br>
	 <textarea rows= "10" col="50" placeholder="msg" id="msg" name="msg"></textarea><br>
	 <input type="submit" value="send" ></input>

    </form>
    <div name="msgarea">
        <?php
    	    $uname = $_COOKIE["name"];
            if (!isset($uname)){
                header("refresh:1; url=login.php");
            }
            echo "<div id='uname'>$uname</div>";
            $con=mysql_connect("localhost","root","");
            if(!$con){
                    die('could not connect'.mysql_error());
            }
            mysql_select_db("reddy",$con);
            $sql="select from1,msg from chatapp where to1='$uname'";
            $e=mysql_query($sql,$con);
            if(!$e) {
                die('error'.mysql_error());
            } else {
                while($row = mysql_fetch_array($e)){
                    echo"<b>{$row[0]}</b> : "."{$row[1]}<br/>";
                }
            }
            mysql_close($con);
            ?>
        </div>
    </body>
</html>
