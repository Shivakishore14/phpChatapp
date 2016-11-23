<?php
    include 'connection.php';
    define("cid","cid");
    class Messages {
        public $user;
        public $msg;
    }
    if(isset($_GET["cid"])){
        $msgList = array();
        $i = 0;
        $uname = $_COOKIE["name"];
        $sql = "select fromuser, msg from conversationMessages where cid=$_GET[cid]";

        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $msgList[$i] = new Messages();
                $msgList[$i]->user = $row["fromuser"];
                $msgList[$i]->msg = $row["msg"];
                $i += 1;
            }
        }

        setcookie("name", $uname, time()+3600, "/", "", 0); //update cookie
        echo json_encode($msgList);
    }

?>
