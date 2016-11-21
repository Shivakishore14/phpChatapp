<?php
    $con=mysql_connect("localhost","root","");
    if(!$con){
            die('could not connect'.mysql_error());
    }
    mysql_select_db("reddy",$con);

    $uname = $_COOKIE["name"];
    $sql="INSERT INTO chatapp values('$uname','$_GET[to]','$_GET[msg]')";
    $e=mysql_query($sql,$con);
    if(!$e){
        die('error'.mysql_error());
    }else{
        header("refresh:5; url=dashboard.php");
        echo "sent<br>";
    }
    mysql_close($con);
?>
