<html>
    <body>
        <form action="" method="GET">
            <input type="text" placeholder="username" name="uname"></input><br>
            <input type="password" placeholder="password" name="pass"></input><br>
            <input type="submit" value="Register"></input>
        </form>
    </body>
    <?php
        define("uname", "uname");
        define("pass","pass");
    	if (isset($_GET[uname]) && isset($_GET[pass])){
            include "connection.php";
            $sql = "INSERT INTO login values('$_GET[uname]', '$_GET[pass]', '' )";

            if($conn->query($sql) === TRUE){
                echo "registered";
            } else {
                echo "error";
            }
    	}
    ?>
</html>
