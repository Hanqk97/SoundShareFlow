<?php
    //destroy session and redirect to mainPage.html
    session_start();
    session_destroy();
    $url = '../index.html';
    echo '<script>alert("Logout Success！");location.href="'.$url.'"</script>';
    exit();
?>