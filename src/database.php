<?php
    $mysqli = new mysqli('localhost','Hanqi','Chq@970713','music_player');
    
    //start database 

    if($mysqli->connect_errno){
        printf("Connection Failed: %s\n", $mysqli->connect_error);
	    exit;
    }
?>