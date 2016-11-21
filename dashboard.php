<html>
  <body>
   <form action="send.php" method="GET">

	 <input type="text" placeholder="To" id="to" name="to"></input><br>
	 <textarea rows= "10" col="50" placeholder="msg" id="msg" name="msg"></textarea><br>
	 <input type="submit" value="send" ></input>

    </form>
    <div name="msgarea">
        <?php
            include 'connection.php';

    	    $uname = $_COOKIE["name"];
            if (!isset($uname)){
                header("refresh:1; url=login.php");
            }
            echo "<div id='uname'>$uname</div>";

            $sql="select fromuser, msg from $tablename where touser='$uname'";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    echo "<b>".$row['fromuser'].": </b>".$row["msg"]."<br>";
                }
            }
            $conn->close();
        ?>
        </div>
    </body>
</html>
