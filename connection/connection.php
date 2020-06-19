<?php

    $servername = "localhost";
    $username   = "tinymce";
    $password   = "1234";
    $database   = "db_tinymce";

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