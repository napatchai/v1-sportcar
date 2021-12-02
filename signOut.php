<?php 
    session_start();

    session_destroy();
    unset($_COOKIE['remember_user']); 
    setcookie("mem_id","",time()+3600*24*356);
    setcookie("Fname","",time()+3600*24*356);
    setcookie("Lname","",time()+3600*24*356);
    setcookie("phone","",time()+3600*24*356);
    setcookie("email","",time()+3600*24*356);
    setcookie("Objective","",time()+3600*24*356);
    setcookie("level","",time()+3600*24*356);
    header("Location: ./index.php ");	
?>