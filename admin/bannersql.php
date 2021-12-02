<?php 
include('../condb.php');
@$subject = $_POST['subject'];
@$description = $_POST['description'];
@$type = $_GET['type'];
@$number = $_POST['number'];

if($type == 'add'){
    $newNameBannerDesktop = img('bannerDesktop');
    $newNameBannerMobile = img('bannerMobile');
    $bannerId = generateRandomString().random_int(1000000, 9999999);
    $link = $_POST['link'];
    $sql = "INSERT INTO banner (banner_id, banner_desktop, banner_mobile, subject, description, number, link) VALUE ('$bannerId', '$newNameBannerDesktop', '$newNameBannerMobile', '$subject', '$description', '$number', '$link')";
    $result = mysqli_query($conn, $sql);
}else if($type == 'edit'){
    $newNameBannerDesktop = img('bannerDesktop');
    $newNameBannerMobile = img('bannerMobile');
    $banner_id = $_POST['banner_id'];
    $link = $_POST['link'];
    $column = "subject = '$subject', description = '$description', number = '$number', link = '$link'";
    if(strlen($newNameBannerDesktop) > 1){
        $column = $column . ", banner_desktop = '$newNameBannerDesktop'";
    }
    if(strlen($newNameBannerMobile) > 1){
        $column = $column . ", banner_mobile = '$newNameBannerMobile'";
    }
    $sqlupdate = "UPDATE banner SET $column WHERE banner_id = '$banner_id'";
    $result = mysqli_query($conn, $sqlupdate);
}else if($type == 'delete'){
    $banner_id = $_POST['banner_id1'];
    $sqlupdate = "DELETE FROM banner WHERE banner_id = '$banner_id'";
    $result = mysqli_query($conn, $sqlupdate);
}

if($result){
    echo "<script>window.top.window.showResult('1');</script>";
}else{
    echo "<script>window.top.window.showResult('2');</script>";
}

function img($file){
    $date1 = date("Ymd_His");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$numrand = (mt_rand());
	$p_img = (isset($_POST[$file]) ? $_POST[$file] : '');
	@$upload=$_FILES[$file]['name'];
	if($upload != '') {
		//โฟลเดอร์เก็บไฟล์
		$path= "../banner/";
		//แยกชื่อและนามสกุลของไฟล์ออกจากกัน
		$type = strrchr($_FILES[$file]['name'], ".");
		//ตั้งชื่อไฟล์ใหม่
		$newname = $numrand.$date1.$type;
		$path_copy = $path.$newname;
		$path_link = "../banner/".$newname;
		//คัดลอกไฟล์ไปยังโฟลเดอร์
        move_uploaded_file($_FILES[$file]['tmp_name'], $path_copy);
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