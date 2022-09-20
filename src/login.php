<?php
    session_start();
    require'database.php';

    //create CSRF token
    $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Get account's information like hash password form database to prepare for verify
    $stmt = $mysqli->prepare("select count(*), userid, password from users where username = ?");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }
    $stmt->bind_param('s',$username);
    $stmt->execute();
    $stmt->bind_result($cnt, $id, $hash_password_data);
    $stmt->fetch();

    echo $username;
    echo '<br>';
    echo $password;
    echo '<br>';
    echo $cnt;
    echo '<br>';
    echo $hash_password_data;
    echo '<br>';
  

    //Verify the hash password and exist of account
    if($cnt==1 && password_verify($password,$hash_password_data)){
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $username;
        $url = 'Dashboard.php';
        echo '<script>alert("Login Success！");location.href="'.$url.'"</script>';
        exit();
    }else{
        $url = '../index.html';
        echo '<script>alert("Login Fail！");location.href="'.$url.'"</script>';
        exit();
    }
    
    $stmt->close();
    exit();
    
?>