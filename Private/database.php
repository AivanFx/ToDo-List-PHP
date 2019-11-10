<?php

require_once('db_credentials.php');

    function db_connect(){
        global $connection;
        $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die("Couldn't set a connection ):");
        return $connection;
    }

    function db_disconnect(){
        if(isset($connection)){
            mysqli_close($connection);
        }
        
    }


?>