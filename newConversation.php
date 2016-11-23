<?php
    define("to","to");
    if(isset($_GET["to"])){
        include 'connection.php';

        $uname = $_COOKIE["name"];
        $sql = "SELECT password FROM login WHERE user='$_GET[to]'";
        $result = $conn->query($sql);
        if ($result->num_rows < 1){
            echo "user not found";
        }else{
            $sql1 = "SELECT `timestamp` FROM conversation WHERE user1='$_GET[to]' AND user2='$uname'";
            $sql2 = "SELECT `timestamp` FROM conversation WHERE user2='$_GET[to]' AND user1='$uname'";
            $result1 = $conn->query($sql1);
            $result2 = $conn->query($sql2);
            if ($result1->num_rows > 0 || $result2->num_rows > 0 ){
                echo "chat already exists";
            }else{
                $sql = "INSERT INTO conversation(`user1`, `user2`, `timestamp`) VALUES('$uname', '$_GET[to]', $t)";
                if ($conn->query($sql) === TRUE){
                    echo "done";
                } else {
                    echo "error";
                }
            }
        }
    }else{
        echo "check touser";
    }
?>
