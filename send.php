<?php
    include 'connection.php';
    define("msg","msg");
    define("cid", "cid");
    $uname = $_COOKIE["name"];
    if (isset($_GET["cid"]) && isset($_GET["msg"]) ){

        $sql="INSERT INTO conversationMessages values('$_GET[cid]', '$uname', '$_GET[msg]', $t)";

        if($conn->query($sql) === TRUE){
            echo "sent";
            header("refresh:2; url=dashboard.php");
        } else {
            echo "not sent";
        }
        setcookie("name", $uname, time()+3600, "/", "", 0); //update cookie
    }else{
        echo "pls check msg";
    }
    $conn->close();
?>
