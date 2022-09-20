<?php
    $mysqli = new mysqli('localhost','Hanqk97','Chq@970713','Music');
    
    //start database 

    if($mysqli->connect_errno){
        printf("Connection Failed: %s\n", $mysqli->connect_error);
	    exit;
    }
?>