<!DOCTYPE HTML>
<html lang="en">
<?php
    require 'database.php';
    $username = (String)$_POST['username'];
    $password = $_POST['password'];

    //check whether input information is available
    if($username==null||$password==null){
        $url = 'registerPage.html';
        echo '<script>alert("Invalid Username or Password");location.href="'.$url.'"</script>';
        exit();
    }    

    $hash_password = password_hash($password,PASSWORD_DEFAULT);

    //Check whether the input username is available and is already used
    $stmt = $mysqli->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit();
    }
    $stmt -> bind_param('s',$username);
    $stmt->execute();
    $stmt->bind_result($cnt);
    $stmt->fetch();
    $stmt->close();

    echo $cnt;
    if($cnt!=0){
        $url = 'registerPage.html';
        echo '<script>alert("Username has been registered");location.href="'.$url.'"</script>';
        exit();
    }   

    //FIEO check
    if( !preg_match('/^[\w_\-]+$/', $username) ){
        $url = 'registerPage.html';
        echo '<script>alert("Invalid Username");location.href="'.$url.'"</script>';
        exit();
    }
    
    //create new user
    $stmt = $mysqli->prepare("insert into users (username, password) values (?,?)");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit();
    }
    $stmt->bind_param('ss',$username,$hash_password);
    $stmt->execute();
    $stmt->close();
    $url = '../login.html';
    echo '<script>alert("Register Success！");location.href="'.$url.'"</script>';

?>
</html>