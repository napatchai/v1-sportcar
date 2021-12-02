<?php 
print_r($_POST);
    include('../condb.php');
    $type = $_GET['type'];
    if($type == 'add'){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $level = $_POST['level'];
        $password = md5($_POST['password']);
        $random = random_int(100000, 999999);
        $mem_id = $fname[0].$lname[0].$random;
        $sql = "INSERT INTO member (mem_id, Fname, Lname, phone, email, password, level) VALUE ('$mem_id', '$fname', '$lname', '$phone', '$email', '$password', '$level')";
        $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
    }else if ($type == 'edit'){
        $mem_id = $_POST['mem_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $level = $_POST['level'];
        $sql = "UPDATE member SET Fname = '$fname', Lname = '$lname', phone = '$phone', email = '$email', level = '$level' WHERE mem_id = '$mem_id'";
        $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
    }else if($type == 'delete'){
        $mem_id = $_POST['mem_id'];
        $sql = "DELETE FROM member WHERE mem_id = '$mem_id'";
        $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
    }

    if($result){
        echo "<script>window.top.window.showResult('1');</script>";
    }else{
        echo "<script>window.top.window.showResult('2');</script>";
    }
?>