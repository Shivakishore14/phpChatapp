<?php

    define("name","name");
    include "connection.php";
    $sql = "SELECT dp FROM login WHERE user='$_COOKIE[name]'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();

        $dp = $row['dp'];
        $uname = $_COOKIE[name];

        $object = (object) ['dp' => $dp, 'user' => $uname];
        echo json_encode($object);
    }else{
        echo "not valid";
    }
?>
