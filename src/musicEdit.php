<?php
    require 'database.php';
    session_start();
    header("Content-type:text/html;charset=gbk");
      
    $user_id = $_SESSION['id'];
    $musicid = $_POST['musicid'];
    $name = $_POST['name'];
    $artist = $_POST['artist'];
    $cover = $_POST['cover'];
    $source = $_POST['source'];
    $url = $_POST['url'];
    
    //check whether input information is available
    if($musicid == null || $name == null||$artist == null||$cover == null ||$source == null ||$url == null){
        $url = 'musicEditPage.html';
        echo '<script>alert("Invalid Information");location.href="'.$url.'"</script>';
        exit();
    }
    
    //update music's new info to music table
    $stmt = $mysqli->prepare("UPDATE music SET musicname=?, artist=?, cover=?, source=?, url=? where musicid = ? ");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }
    $stmt->bind_param('sssssi', $name, $artist, $cover, $source, $url, $musicid);
    $stmt->execute();
    $stmt->close();

    //get this story's id to prepare for inserting link to links table
    $stmt = $mysqli->prepare("SELECT musicid FROM music WHERE name = ?");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }
    $stmt -> bind_param('s',$name);
    $stmt->execute();
    $stmt->bind_result($story_id);
    $stmt->fetch();
    $stmt->close();

    $url = 'Dashboard.php';
    echo '<script>alert("Edit Success");location.href="'.$url.'"</script>';
    exit();
?>