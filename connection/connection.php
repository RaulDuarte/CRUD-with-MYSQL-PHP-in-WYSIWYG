<?php

    $servername = "localhost";
    $username   = "username";
    $password   = "password";
    $database   = "database";

    $link = mysqli_connect($servername, $username, $password, $database);

    /*
    
    if(!$link){
        echo 'Connection Error' . " - " . mysqli_connect_error();   
    }else{
        echo "Connection OK";
    }

    mysqli_close();

    */

?>