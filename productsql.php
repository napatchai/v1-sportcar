<?php 
print_r($_POST);
    include('../condb.php');
    $type = $_GET['type'];
    if($type == "add"){
        $model = $_POST['model'];
        $condition = $_POST['condition'];
        $price = $_POST['price'];
        $exterior = $_POST['exterior'];
        $productID = generateRandomString().random_int(1000000, 9999999);
        $newNameBannerDes = img('bannerDesktop');
        $newNameBannerMo = img('bannerMobile');
        $newNameBannerDesDes = img('bannerDesktopDes');
        $newNameBannerMoDes = img('bannerMobileDes');
        $newNameIconProduct = img('iconProduct');
        $textHeadIcon = $_POST['headTexticon'];
        $descriptionIcon = $_POST['descriptionicon'];
        $textedit1 = $_POST['exterior'];
        $textedit2 = $_POST['exterior2'];
        $brand = $_POST['brand'];
            $year = $_POST['year'];

        $sql = "INSERT INTO product (productID, product_desktop, product_Mobile, model, conditionPro, price, detail, detail_Desktop, detail_Mobile, textHeadIcon, descriptionIcon, iconproduct, brand, year, textedit1, textedit2) VALUE ('$productID', '$newNameBannerDes', '$newNameBannerMo', '$model', '$condition', '$price', '', '$newNameBannerDesDes', '$newNameBannerMoDes', '$textHeadIcon', '$descriptionIcon', '$newNameIconProduct', '$brand', '$year', '$textedit1', '$textedit2')";
        $result = mysqli_query($conn, $sql) or die ("Error sql = $sql" . mysqli_error());

        if(is_array($_FILES)){
            foreach ($_FILES['imageproduct']['name'] as $name => $value)  
            {
                  $newnamemoreproduct = imgarray('imageproduct', $name);
                  $sql = "INSERT INTO product_image (productID, productDesID, ImageProDes) VALUE ('$productID', '$name', '$newnamemoreproduct')";
                  $result = mysqli_query($conn, $sql) or die ("Error sql = $sql" . mysqli_error());
            }
        }
        if($result){
            echo "<script>window.top.window.showResult('1');</script>";
        }else{
            echo "<script>window.top.window.showResult('2');</script>";
        }

        // $equipment = count($_POST["equipment"]);  
        // if($equipment > 0){
        //     for($i=0; $i<$equipment; $i++)  
        //     {
        //         if(trim($_POST["equipment"][$i] != ''))  
        //         {  
        //             $value = $_POST["equipment"][$i];
        //              $sql = "INSERT INTO productHigh (productID, proHighID, highlight) VALUE ('$productID', '$i', '$value')";
        //              $result = mysqli_query($conn, $sql) or die ("Error sql = $sql" . mysqli_error());
        //              if($result){
        //                 echo "<script>window.top.window.showResult('1');</script>";
        //             }else{
        //                 echo "<script>window.top.window.showResult('2');</script>";
        //             }
        //         } 
        //     }
        // }
        
    }else if($type == 'delete'){
        $productID = $_POST['productID'];
        $sql = "DELETE FROM product WHERE productID = '$productID'";
        $result = mysqli_query($conn, $sql) or die ("Error sql = $sql" . mysqli_error());
        if($result){
            $sql = "DELETE FROM productHigh WHERE productID = '$productID'";
            $result = mysqli_query($conn, $sql) or die ("Error sql = $sql" . mysqli_error());
            if($result){
                $sql = "DELETE FROM product_image WHERE productID = '$productID'";
                $result = mysqli_query($conn, $sql) or die ("Error sql = $sql" . mysqli_error());
                if($result){
                    if($result){
                        echo "<script>window.top.window.showResult('1');</script>";
                    }else{
                        echo "<script>window.top.window.showResult('2');</script>";
                    }
                }
            }
        }
    }else if($type == 'edit'){
        $newNameBannerDes = img('bannerDesktop');
        $newNameBannerMo = img('bannerMobile');
        $model = $_POST['model'];
        $condition = $_POST['condition'];
        $price = $_POST['price'];
        $exterior = $_POST['exterior'];
        $productID = $_POST['productID'];
        $querycheck = "SELECT * FROM product_image WHERE productID = '$productID'";
        $resultcheck = mysqli_query($conn, $querycheck) or die ("Error $sql " . mysqli_error());
        if(mysqli_num_rows($resultcheck) > 0){
            foreach($resultcheck as $rsc){
                $postCheckImg = 'imageproduct'. $rsc['productDesID']; 
                $postCheckDelete = 'Delete'. $rsc['productDesID'];
                if($_POST[$postCheckDelete] == 'Delete'){
                    $productDesID = $rsc['productDesID'];
                    $sqlDelete = "DELETE FROM product_image WHERE productID = '$productID' AND productDesID = '$productDesID'";
                    $result = mysqli_query($conn, $sqlDelete);
                }else{
                    $newNameImgMore = img($postCheckImg);
                    $productDesID = $rsc['productDesID'];
                    if($newNameImgMore != ''){
                        $sqlUpdate = "UPDATE product_image SET imageProDes = '$newNameImgMore' WHERE productID = '$productID' AND productDesID = '$productDesID'";
                        $result = mysqli_query($conn, $sqlUpdate) or die ("Error $sql " . mysqli_error() );
                    }
                }
            }
            if(is_array(@$_FILES['imageproductTest'])){
                foreach ($_FILES['imageproductTest']['name'] as $name1 => $value)  
                {
                      $newnamemoreproduct1 = imgarray('imageproductTest', $name1);
                      $productDesID = $rsc['productDesID'];
                       if(strlen($newnamemoreproduct1) > 5){
                        $queryTopID = "SELECT MAX(productDesID) as maxTop FROM product_image WHERE productID = '$productID'";
                        $resultTopID = mysqli_query($conn, $queryTopID);
                        $rowTopID = mysqli_fetch_array($resultTopID);
                        $maxID = $rowTopID['maxTop'] + 1;
                        $sql = "INSERT INTO product_image (productID, productDesID, ImageProDes) VALUE ('$productID', '$maxID', '$newnamemoreproduct1')";
                        $result = mysqli_query($conn, $sql) or die ("Error sql = $sql" . mysqli_error());
                       }
                }
            }
        }
        $newNameBannerDesDes = img('bannerDesktopDes');
        $newNameBannerMoDes = img('bannerMobileDes');
        // $querycheckhig = "SELECT * FROM productHigh WHERE productID = '$productID'";
        // $resultcheckhig = mysqli_query($conn, $querycheckhig);
        // if(mysqli_num_rows($resultcheckhig) > 0){
        //     foreach($resultcheckhig as $rsh){
        //         $postchecktext = 'equipment'.$rsh['proHighID'];
        //         $postCheckTextDelete = 'Deletetext' . $rsh['proHighID'];
        //         if($_POST[$postCheckTextDelete] == 'Delete'){
        //             $proHighID = $rsh['proHighID'];
        //             $sqlDeleteText = "DELETE FROM productHigh WHERE productID = '$productID' AND proHighID = '$proHighID'";
        //             $resultDeleteText = mysqli_query($conn, $sqlDeleteText);
        //         }else{
        //             $text = $_POST[$postchecktext];
        //             $proHighID = $rsh['proHighID'];
        //             $sqlUpdateText = "UPDATE productHigh SET highlight = '$text' WHERE productID = '$productID' AND proHighID = '$proHighID'";
        //             $resultUpdateText = mysqli_query($conn, $sqlUpdateText);
        //         }
        //     }
        //     @$equipment = count($_POST["equipment"]);  
        //         if($equipment > 0){
        //         for($i=0; $i<$equipment; $i++)  
        //         {
        //             if(trim($_POST["equipment"][$i] != ''))  
        //             {  
        //                 $queryTopIDText = "SELECT MAX(proHighID) as maxTop FROM productHigh WHERE productID = '$productID'";
        //                 $resultTopIDText = mysqli_query($conn, $queryTopIDText);
        //                 $rowTopIDText = mysqli_fetch_array($resultTopIDText);
        //                 $maxIDText = $rowTopIDText['maxTop'] + 1;
        //                 $value = $_POST["equipment"][$i];
        //                 $sql = "INSERT INTO productHigh (productID, proHighID, highlight) VALUE ('$productID', '$maxIDText', '$value')";
        //                 $result = mysqli_query($conn, $sql) or die ("Error sql = $sql" . mysqli_error());
        //                 if($result){
        //                     echo "<script>window.top.window.showResult('1');</script>";
        //                 }else{
        //                     echo "<script>window.top.window.showResult('2');</script>";
        //                 }
        //             } 
        //         }
        //     }
            
        // }
        $newNameIconProduct = img('iconProduct');
            $sqlmore = '';
            if($newNameBannerDes != ''){
                $sqlmore = $sqlmore . ", product_desktop = '" . $newNameBannerDes . "'";
            }
            if($newNameBannerMo != ''){
                $sqlmore = $sqlmore . ", product_Mobile = '" . $newNameBannerMo . "'";
            }
            if($newNameBannerDesDes != ''){
                $sqlmore = $sqlmore . ", detail_Desktop = '" . $newNameBannerDesDes . "'";
            }
            if($newNameBannerMoDes != ''){
                $sqlmore = $sqlmore . ", detail_Mobile = '" . $newNameBannerMoDes . "'";
            }
            if($newNameIconProduct != ''){
                $sqlmore = $sqlmore . ", iconproduct = '" . $newNameIconProduct . "'";
            }
            $textHeadIcon = $_POST['headTexticon'];
            $descriptionIcon = $_POST['descriptionicon'];
            $brand = $_POST['brand'];
            $year = $_POST['year'];
            $textedit1 = $_POST['exterior'];
            $textedit2 = $_POST['exterior2'];
            $insert = "UPDATE product SET model = '$model', conditionPro = '$condition', price = '$price', detail = '', textHeadIcon = '$textHeadIcon', descriptionIcon = '$descriptionIcon' , brand = '$brand', year = '$year', textedit1 = '$textedit1', textedit2 = '$textedit2'  $sqlmore WHERE productID = '$productID'";
            $resultinsert = mysqli_query($conn, $insert) or die ("Error $insert". mysqli_error());
            if($resultinsert){
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
            $path= "../product/";
            //แยกชื่อและนามสกุลของไฟล์ออกจากกัน
            $type = strrchr($_FILES[$file]['name'], ".");
            //ตั้งชื่อไฟล์ใหม่
            $newname = $numrand.$date1.$type;
            $path_copy = $path.$newname;
            $path_link = "../product/".$newname;
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
            $path= "../product/";
            //แยกชื่อและนามสกุลของไฟล์ออกจากกัน
            $type = strrchr($_FILES[$file]['name'][$name], ".");
            //ตั้งชื่อไฟล์ใหม่
            $newname = $numrand.$date1.$type;
            $path_copy = $path.$newname;
            $path_link = "../product/".$newname;
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