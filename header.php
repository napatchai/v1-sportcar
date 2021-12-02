<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./fontawesome-free-5.15.3-web/css/all.css">
    <!-- //? start font awesome -->
    <script src="./fontawesome-free-5.15.3-web/js/all.js" crossorigin="anonymous"></script>
    <!-- //? End font awesome -->
    <!-- //? Start Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- //? End Bootstrap -->


    <title>Document</title>
</head>

<body>

    <?php 
$REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];
$timeoutseconds = 300;
include('./condb.php');
$timestamp=time();
$timeout=$timestamp-$timeoutseconds;
$loguseronline = "INSERT INTO user_online (cip, date) VALUES ('$REMOTE_ADDR','$timestamp')";
mysqli_query($conn, $loguseronline) or die ("ERROR $loguseronline " . mysqli_error());

$deleteloguseronline = "DELETE FROM user_online WHERE date<$timeout";
mysqli_query($conn, $deleteloguseronline) or die ("ERROR $deleteloguseronline " . mysqli_error());


$useronlinerealtime = "SELECT cip FROM user_online GROUP BY cip";
$resultuserrealtime = mysqli_query($conn, $useronlinerealtime) or die ("ERROR $useronlinerealtime " . mysqli_error());
// todo จำนวนคน online
$useronlinerealtime = mysqli_num_rows($resultuserrealtime);
// todo จำนวนคน online

$sqlalluseruse = "SELECT COUNT(cip) as userall FROM log_user";
$resultalluseruse = mysqli_query($conn, $sqlalluseruse) or die ("ERROR $sqlalluseruse " . mysqli_error());
$getalluser = mysqli_fetch_array($resultalluseruse);

// todo all user
$alluser = $getalluser['userall'];
// todo all user

$today = date("y-m-d");
$sqluseronlinedate = "SELECT COUNT(cip) as userbydate FROM log_user WHERE date like '%$today%' ";
$resultuserbydate = mysqli_query($conn, $sqluseronlinedate);

// todo จำนวนตยดูจ่อวัน
$getuserbydate = mysqli_fetch_array($resultuserbydate);
// todo จำนวนตยดูจ่อวัน
$userbydate = $getuserbydate['userbydate'];

?>