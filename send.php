<?php
    include 'connection.php';

    $uname = $_COOKIE["name"];

    $sql="INSERT INTO $tablename values('$uname','$_GET[to]','$_GET[msg]',$t)";

    if($conn->query($sql) === TRUE){
        echo "sent";
        header("refresh:2; url=dashboard.php");
    } else {
        echo "not sent";
    }
    $conn->close();
?>
