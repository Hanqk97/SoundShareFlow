<?php
    require 'database.php';
    session_start();
    header("Content-type:text/html;charset=gbk");
      
    $user_id = $_SESSION['id'];
    $name = (String)$_POST['name'];
    $artist = $_POST['artist'];
    $cover = $_POST['cover'];
    $source = $_POST['source'];
    $url = $_POST['url'];
    
    //check whether input information is available
    if($name == null||$artist == null||$cover == null ||$source == null ||$url == null){
        $url = 'musicAddPage.html';
        echo '<script>alert("Invalid Information");location.href="'.$url.'"</script>';
        exit();
    }
    
    //insert music info to music table
    $stmt = $mysqli->prepare("INSERT INTO music (userid, musicname, artist, cover, source, url ) values(?,?,?,?,?,?) ");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }
    $stmt->bind_param('isssss',$user_id, $name, $artist, $cover, $source, $url);
    echo $name;
    $stmt->execute(); 
    $stmt->close();

    $url = 'Dashboard.php';
    echo '<script>alert("Add Success");location.href="'.$url.'"</script>';
    exit();
?>