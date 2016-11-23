<html>
    <body>
        <form action="" method="GET">
            <input type="text" placeholder="username" name="uname"></input><br>
            <input type="password" placeholder="password" name="pass"></input><br>
            <input type="submit" value="Login"></input>
        </form>
    </body>
    <?php
    	if (isset($_GET["uname"]) && isset($_GET["pass"])){
            include "connection.php";
            $sql = "SELECT password FROM login WHERE user='$_GET[uname]'";
            $result = $conn->query($sql);
            if ($result->num_rows == 1){
                $row = $result->fetch_assoc();

                if ($row['password'] == $_GET["pass"]){
                    echo "valid";
                    setcookie("name", $_GET["uname"], time()+3600, "/", "", 0);
                    header("refresh:0; url=chat.html");
                }else{
                    echo "not valid";
                }
            }else{
                echo "not valid";
            }
            //setcookie("name", $uname, time()+3600, "/", "", 0);
    		//header("refresh:0; url=dashboard.php");
    	}
    ?>
</html>
