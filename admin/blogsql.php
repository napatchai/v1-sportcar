<?php 
include('../condb.php');
print_r($_POST);
$type = $_GET['type'];
if($type == 'add'){
    $blogID = generateRandomString().random_int(1000000, 9999999);
    $subjectHead = $_POST['Subject'];
    $pinblog = $_POST['pinblog'];
    $price = $_POST['price'];
    $newNamethumbnail = img('Thumbnail');
    if($pinblog == 1){
        $sqlupdatepin = "UPDATE blog SET blogpin = 2";
        $resultpin = mysqli_query($conn, $sqlupdatepin);
    }
    $sql = "INSERT INTO blog (blogID, subject, blogpin, price, thumbnail) VALUE ('$blogID', '$subjectHead', '$pinblog', '$price', '$newNamethumbnail')";
    $result = mysqli_query($conn, $sql);
    if(is_array(@$_FILES['bannerDesktop'])){
        foreach ($_FILES['bannerDesktop']['name'] as $name => $value)  
        {
              $newNameBannerDesktop = imgarray('bannerDesktop', $name);
              $newNameBannerMobile = imgarray('bannerMobile', $name);
              $subjectDes = $_POST["subject"][$name];
              $blogDes = $_POST["description"][$name];
               if(strlen($newNameBannerDesktop) > 5 && strlen($newNameBannerDesktop) > 5){
                $sql = "INSERT INTO blog_detail (blogID, blogDesID, blog_desktop, blog_mobile, subjectDes ,description) VALUE ('$blogID', '$name', '$newNameBannerDesktop', '$newNameBannerMobile', '$subjectDes' ,'$blogDes')";
                $result = mysqli_query($conn, $sql) or die ("Error sql = $sql" . mysqli_error());
               }
               if($result){
                echo "<script>window.top.window.showResult('1');</script>";
            }else{
                echo "<script>window.top.window.showResult('2');</script>";
            }
        }
    }
}else if($type == 'delete'){
    $blogID = $_POST['blogID'];
    $sql = "DELETE FROM blog WHERE blogID = '$blogID'";
    $result = mysqli_query($conn, $sql);
    $sql = "DELETE FROM blog_detail WHERE blogID = '$blogID'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>window.top.window.showResult('1');</script>";
    }else{
        echo "<script>window.top.window.showResult('2');</script>";
    }
}else if($type == 'edit'){
    $Subject = $_POST['Subject'];
    $blogID = $_POST['blogID'];
    $pinblog = $_POST['pinblog'];
    $price = $_POST['price'];
    $newNamethumbnail = img('Thumbnail');
    $sqlmore1 = "";
    if(Strlen($newNamethumbnail) > 5){
        $sqlmore1 .= ", thumbnail = '$newNamethumbnail'";
    }
    if($pinblog == '1'){
        $updatepin = "UPDATE blog set blogpin = 2";
        $resultpin = mysqli_query($conn, $updatepin);
    }
    $query = "UPDATE blog SET subject = '$Subject', blogpin = '$pinblog', price = '$price' $sqlmore1  WHERE blogID = '$blogID'";
    echo $query;
    mysqli_query($conn, $query) or die ('ERROR $sql ' . mysqli_error());
    $querycheck = "SELECT * FROM blog_detail WHERE blogID = '$blogID'";
    $resultcheck = mysqli_query($conn, $querycheck) or die ("Error $sql " . mysqli_error());
        if(mysqli_num_rows($resultcheck) > 0){
            foreach($resultcheck as $rsc){
                $postCheckImgDesktop = 'bannerDesktop'. $rsc['blogDesID']; 
                $postCheckImgMobile = 'bannerMobile'. $rsc['blogDesID']; 
                $postCheckSubject = 'subject'. $rsc['blogDesID']; 
                $postCheckDescription = 'description'. $rsc['blogDesID']; 
                $postCheckDelete = 'deletetext'. $rsc['blogDesID'];
                if($_POST[$postCheckDelete] == 'Delete'){
                    $blogDesID = $rsc['blogDesID'];
                    $sqlDelete = "DELETE FROM blog_detail WHERE blogID = '$blogID' AND blogDesID = '$blogDesID'";
                    $result = mysqli_query($conn, $sqlDelete);
                }else{
                    $newNameImgDesktop = img($postCheckImgDesktop);
                    $newNameImgMobile = img($postCheckImgMobile);
                    $subjectDes1 = $_POST[$postCheckSubject];
                    $description1 = $_POST[$postCheckDescription];
                    $blogDesID = $rsc['blogDesID'];
                    $sqlmode = '';
                    if(Strlen($newNameImgDesktop) > 5){
                        $sqlmode = $sqlmode . ", blog_desktop = '$newNameImgDesktop'";
                    }
                    if(Strlen($newNameImgMobile) > 5){
                        $sqlmode = $sqlmode . ", blog_mobile = '$newNameImgMobile'";
                    }
                        $sqlUpdate = "UPDATE blog_detail SET subjectDes = '$subjectDes1', description = '$description1' $sqlmode  WHERE blogID = '$blogID' AND blogDesID = '$blogDesID'";
                        $result = mysqli_query($conn, $sqlUpdate) or die ("Error $sql " . mysqli_error() );
                }
            }
            if(is_array(@$_FILES['bannerDesktop'])){
                foreach ($_FILES['bannerDesktop']['name'] as $name => $value)  
                {
                      $newNameBannerDesktop1 = imgarray('bannerDesktop', $name);
                      $newNameBannerMobile1 = imgarray('bannerMobile', $name);
                      $subject1 = $_POST["subject"][$name];
                      $description1 = $_POST["description"][$name];
                       if(strlen($newNameBannerDesktop1) > 5){
                        $queryTopID = "SELECT MAX(blogDesID) as maxTop FROM blog_detail WHERE blogID = '$blogID'";
                        $resultTopID = mysqli_query($conn, $queryTopID);
                        $rowTopID = mysqli_fetch_array($resultTopID);
                        $maxID = $rowTopID['maxTop'] + 1;
                        $sql = "INSERT INTO blog_detail (blogID, blogDesID, blog_desktop, blog_mobile, subjectDes, description) VALUE ('$blogID', '$maxID', '$newNameBannerDesktop1', '$newNameBannerMobile1', '$subject1', '$description1')";
                        $result = mysqli_query($conn, $sql) or die ("Error sql = $sql" . mysqli_error());
                       }
                }
            }
            if($result){
                echo "<script>window.top.window.showResult('1');</script>";
            }else{
                echo "<script>window.top.window.showResult('2');</script>";
            }
        }
}else if ($type == 'changepin'){
    $blogID = $_POST['id'];
    $sqlupdatepin = "UPDATE blog set blogpin = '2'";
    mysqli_query($conn, $sqlupdatepin);
    $updatepin1 = "UPDATE blog set blogpin = '1' WHERE blogID = '$blogID'";
    mysqli_query($conn, $updatepin1);
}else if ($type == 'changepromotion'){
    $blogID = $_POST['id'];
    $sqlupdatepromotion = "UPDATE blog set promotion = '1'";
    mysqli_query($conn, $sqlupdatepromotion);
    if($blogID != ''){
    $updatepromotion = "UPDATE blog set promotion = '2' WHERE blogID = '$blogID'";
    mysqli_query($conn, $updatepromotion);
    }
}else if($type == 'updateStatus'){
    $blogID = $_POST['blogID'];
    $statusDefault = $_POST['statusDefault'];

    if($statusDefault == '1'){
        $sqlupdateStatus = "UPDATE blog set statusblog = 0 WHERE blogID = '$blogID'";
    }else{
        $sqlupdateStatus = "UPDATE blog set statusblog = 1 WHERE blogID = '$blogID'";
    }
    $result = mysqli_query($conn, $sqlupdateStatus) or die ("ERROR $sqlupdateStatus " . mysqli_error());
    if($result){
        echo "<script>window.top.window.showResult('1');</script>";
    }else{
        echo "<script>window.top.window.showResult('2');</script>";
    }
}

function img($file){
    $date1 = date("Ymd_His");
    //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
    $numrand = (mt_rand());
    $p_img = (isset($_POST[$file]) ? $_POST[$file] : '');
    @$upload=$_FILES[$file]['name'];
    if($upload != '') {
        //โฟลเดอร์เก็บไฟล์
        $path= "../blog/";
        //แยกชื่อและนามสกุลของไฟล์ออกจากกัน
        $type = strrchr($_FILES[$file]['name'], ".");
        //ตั้งชื่อไฟล์ใหม่
        $newname = $numrand.$date1.$type;
        $path_copy = $path.$newname;
        $path_link = "../blog/".$newname;
        //คัดลอกไฟล์ไปยังโฟลเดอร์
        move_uploaded_file($_FILES[$file]['tmp_name'], $path_copy);
        return $newname;
    }
    return false;
}

function imgarray($file, $name){
    $date1 = date("Ymd_His");
    //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
    $numrand = (mt_rand());
    $p_img = (isset($_POST[$file]) ? $_POST[$file] : '');
    @$upload=$_FILES[$file]['name'][$name];
    if($upload != '') {
        //โฟลเดอร์เก็บไฟล์
        $path= "../blog/";
        //แยกชื่อและนามสกุลของไฟล์ออกจากกัน
        $type = strrchr($_FILES[$file]['name'][$name], ".");
        //ตั้งชื่อไฟล์ใหม่
        $newname = $numrand.$date1.$type;
        $path_copy = $path.$newname;
        $path_link = "../blog/".$newname;
        //คัดลอกไฟล์ไปยังโฟลเดอร์
        move_uploaded_file($_FILES[$file]['tmp_name'][$name], $path_copy);
        return $newname;
    }
    return false;
}


function generateRandomString($length = 3) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>