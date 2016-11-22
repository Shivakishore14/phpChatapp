<?php
    class CList {
        public $user;
        public $cid;
    }
    if(isset($_COOKIE["name"])){
        include 'connection.php';

        $clist = array();
        $i = 0;
        $uname = $_COOKIE["name"];

        $sql1 = "SELECT user2, cid from conversation WHERE user1='$uname'";
        $sql2 = "SELECT user1, cid from conversation WHERE user2='$uname'";

        $result = $conn->query($sql1);
        if ( $result->num_rows > 0 ){
            while( $row = $result->fetch_assoc() ){
                $clist[$i] = new CList();
                $clist[$i]->user = $row["user2"];
                $clist[$i]->cid = $row["cid"];
                $i = $i + 1;
            }
        }

        $result = $conn->query($sql2);
        if ( $result->num_rows > 0 ){
            while( $row = $result->fetch_assoc() ){
                $clist[$i] = new CList();
                $clist[$i]->user = $row["user1"];
                $clist[$i]->cid = $row["cid"];
                $i = $i + 1;
            }
        }
        echo json_encode($clist);
    }else{
        echo "login";
    }
?>
