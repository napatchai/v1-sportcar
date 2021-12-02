<?php 
    include('./condb.php');
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $oldpassword = md5($_POST['oldpassword']);
    $newpassword = md5($_POST['newpassword']);
    $mem_id = $_POST['mem_id'];
    if(strlen($_POST['oldpassword']) > 2){
        $checkOldPassword = "SELECT * FROM member WHERE mem_id = '$mem_id' AND password = '$oldpassword'";
        $resultOldPassword = mysqli_query($conn, $checkOldPassword) or die ("Error $checkOldPassword " . mysqli_error());
    }
    if(mysqli_num_rows($resultOldPassword) > 0 || strlen($_POST['oldpassword']) == 0){
        $sqlmore = "";
        if(strlen($_POST['oldpassword']) > 2){
            $sqlmore .= ", password = '$newpassword'";
        }
        $sqlupdateprofile = "UPDATE member SET Fname = '$fname', Lname = '$lname', phone = '$phone', email = '$email' $sqlmore WHERE mem_id = '$mem_id'";
        $resultUpdateProfile = mysqli_query($conn, $sqlupdateprofile);
        if($resultUpdateProfile){
            setcookie("mem_id",$mem_id,time()+3600*24*356);
            setcookie("Fname",$fname,time()+3600*24*356);
            setcookie("Lname",$lname,time()+3600*24*356);
            setcookie("phone",$phone,time()+3600*24*356);
            setcookie("email",$email,time()+3600*24*356);
            echo "<script>window.top.window.showResultProfile('1');</script>";
        }else{
            echo "<script>window.top.window.showResultProfile('2');</script>";
        }
    }else{
        echo "<script>window.top.window.showResultProfile('0');</script>";
    }
?>