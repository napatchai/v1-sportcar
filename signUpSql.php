<?php 
include('./condb.php');
print_r($_POST);
$Fname = $_POST['Fname'];
$Lname = $_POST['Lname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$type_use = $_POST['type-use'];
$random = random_int(100000, 999999);
$mem_id = $Fname[0].$Lname[0].$random;
$checkEmail = "SELECT email FROM member WHERE email = '$email'";
$resultcheck = mysqli_query($conn, $checkEmail);
if(mysqli_num_rows($resultcheck) < 1){
    $sql = "INSERT INTO member (mem_id, Fname, Lname, phone, email, password, Objective) VALUE ('$mem_id', '$Fname', '$Lname', '$phone', '$email', '$password', '$type_use')";
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
    if($result){
        echo "<script>window.top.window.showResult('1');</script>";
    }else{
        echo "<script>window.top.window.showResult('3');</script>";
    }
}else{
    echo "<script>window.top.window.showResult('2');</script>";
}
?>