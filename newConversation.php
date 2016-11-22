<?php
    if(isset($_GET["to"]){
        include 'connection.php';

        $uname = $_COOKIE["name"];
        
        $sql = "INSERT INTO conversation(`user1`, `user2`, `timestamp`) VALUES('$uname', '$_GET[to]', $t)"
        if ($conn->query($sql) === TRUE){
            echo "done";
        } else {
            echo "error";
        }
    }
?>
