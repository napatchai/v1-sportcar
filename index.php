<?php include('./header.php'); ?>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script>
function SubForm() {
    var name = document.getElementById('namepop').value;
    var phone = document.getElementById('phone1').value;
    var time = document.getElementById('time').value;
    if (name == '') {
        swal("Error", "Please Enter Name", "error");
        return
    } else if (phone == '') {
        swal("Error", "Please Enter Phone", "error");
        return
    } else if (time == '') {
        swal("Error", "Please Select Time", "error");
        return
    }
    var date = $("#datepicker").datepicker("getDate");
    var app = $.datepicker.formatDate("dd-MM-yy", date);
    document.getElementById('app').value = app;
    console.log($("#popForm").serializeArray())

    $.ajax({
        url: "https://api.apispreadsheets.com/data/17962/",
        type: "post",
        data: $("#popForm").serializeArray(),
        success: function() {
            swal({
                title: "Send Success",
                type: "success",
                icon: "success",
            });
            setTimeout(function() {
                window.location = "./index.php"
            }, 1500);
        },
        error: function() {
            swal("Error", "Some Thing Warnning", "error");
        }
    });
}

function setimgbeforeFooter(src) {
    document.getElementById("rightcloneimg").src = './blog/' + src;
}

function setlinkbeforeFooter(src) {
    document.getElementById("rightclonelink").href = './blogDetail.php?ID=' + src;
}
</script>
<?php include('./navbar.php') ?>
<?php 
$query = "SELECT * FROM banner ORDER BY number ASC";
$result = mysqli_query($conn, $query);
$queryProduct = "SELECT * FROM product WHERE status = '1' ORDER BY RAND() LIMIT 10";
$resultProduct = mysqli_query($conn, $queryProduct);
$numresult = mysqli_num_rows($resultProduct);
?>
<?php 
    $cip = $_SERVER['REMOTE_ADDR'];
    $saveLog = "INSERT INTO log_user (cip) VALUE ('$cip')";
    mysqli_query($conn, $saveLog) or die ("ERROR sql $saveLog" . mysqli_error());
?>

<script>
document.addEventListener("DOMContentLoaded", () => {
    document.cookie = "cookieName=" + screen.width;
});
</script>
<!-- //? Start Image Slide -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <!-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class=" active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button> -->
        <?php 
        $count = 0;
        foreach($result as $row){ 
            if($count == 0)
            {
            ?>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $count ?>"
            class=" active" aria-current="true" aria-label="Slide 1"></button>
        <?php }else{ ?>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $count ?>"
            aria-current="true" aria-label="Slide 1"></button>
        <?php } $count = $count + 1;?>
        <?php } ?>
    </div>
    <!-- //todo Start banner Desktop -->
    <div class="carousel-inner">
        <?php 
        $count = 0;
        foreach($result as $row){ 
            if($count == 0)
            {
            ?>
        <div class="carousel-item active" data-bs-interval="3500">
            <img src="./banner/<?php echo $row['banner_desktop'] ?>" class="test d-block w-100 imgdesktop" alt="...">
            <img src="./banner/<?php echo $row['banner_mobile'] ?>" class="test d-block w-100 imgmobile" alt="...">
            <div class="carousel-caption  d-md-block">
                <h1><?php echo $row['subject'] ?></h1>
                <h5><?php echo $row['description'] ?></h5>
                <a href="<?php echo $row['link'] ?>">
                    <div class="readmore">
                        Read more
                    </div>
                </a>
            </div>

        </div>
        <?php }else{ ?>
        <div class="carousel-item" data-bs-interval="3500">
            <img src="./banner/<?php echo $row['banner_desktop'] ?>" class="test d-block w-100 imgdesktop" alt="...">
            <img src="./banner/<?php echo $row['banner_mobile'] ?>" class="test d-block w-100 imgmobile" alt="...">
            <div class="carousel-caption  d-md-block">
                <h1><?php echo $row['subject'] ?></h1>
                <h5><?php echo $row['description'] ?></h5>
                <a href="<?php echo $row['link'] ?>">
                    <div class="readmore">
                        Read more
                    </div>
                </a>
            </div>

        </div>
        <?php }$count = $count + 1;} ?>
        <!-- <div class="carousel-item" data-bs-interval="3500">
            <img src="./img/Seconebanner.png" class="test d-block w-100 imgdesktop" alt="...">
            <img src="./img/Hero_bannerMobile1.png" class="test d-block w-100 imgmobile" alt="...">
            <div class="carousel-caption d-md-block">
                <h1>BUGATTI CHIRON</h1>
                <h5>The ultimate tourisme</h5>
                <a href="">
                    <div class="readmore">
                        Read more
                    </div>
                </a>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="3500">
            <img src="./img/thridbanner.png" class="d-block w-100 imgdesktop" alt="...">
            <img src="./img/Hero_bannerMobile1.png" class="test d-block w-100 imgmobile" alt="...">
            <div class="carousel-caption d-md-block">
                <h1>BUGATTI CHIRON</h1>
                <h5>The ultimate tourisme</h5>
                <a href="">
                    <div class="readmore">
                        Read more
                    </div>
                </a>
            </div>
        </div> -->
    </div>
    <!-- //todo End banner Desktop -->
</div>
<!-- //? End Image Slide -->
<!-- //? Start Who -->
<div class="who">
    <img src="./img/ExDesktopsize.png" alt="Snow" class="imgwho">
    <div class="centered">
        Lorem Ipsum is simply dummy text <br>
        of the printing and typesetting industry. <br>
        Lorem Ipsum has been the industry’s standard dummy <br>
        text ever since the 1500s, when an <br>
        <div class="content-iconwho">
            <div class="row">
                <div class="col-4">
                    <a href="./product.php">
                        <img src="./img/supercar.png" width="100%" class="iconwho" alt="">
                    </a>
                </div>
                <div class="col-4">
                    <a href="./service.php">
                        <img src="./img/fix.png" width="100%" class="iconwho" alt="">
                    </a>
                </div>
                <div class="col-4">
                    <?php if(isset($_COOKIE['mem_id'])) { ?>
                    <a href="#" onclick="togglePopupBooking()">
                        <?php }else { ?>
                        <a href="#" onclick="pleaselogin()">
                            <?php } ?>
                            <img src="./img/headphones.png" width="100%" class="iconwho" alt="">
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //? End Who -->

<!-- //? Start Filter -->
<!-- <div class="content-filter">
    <div class="filter">
        Filter > <span class="inputfilter">
            <span class="inputfilter">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Brand</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </span>
            <span class="inputfilter">/</span>
            <span class="inputfilter">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Year</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </span>
            <span class="inputfilter">/</span>
            <span class="inputfilter">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Price</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </span>
    </div>
</div> -->
<!-- //? End Filter -->
<!-- //? start index product -->



<?php if($numresult > 0) { ?>
<div id="carouselExampleControls" class="carousel slide slide1" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php 
                    @$widthScreen =  (int)$_COOKIE['cookieName'];
                    $setNumPro;
                    if($widthScreen > 1200){
                        $setNumPro = 4;
                    } elseif($widthScreen <= 1200){
                        $setNumPro = 2;
                    }
                    $check = 0;
        ?>
        <?php foreach($resultProduct as $rsp) {
            if($check == 0) {
        ?>
        <div class="carousel-item active" data-bs-interval="5000">
            <div class="row indexproduct">
                <?php }elseif($check%$setNumPro==0) { ?>
                <div class="carousel-item" data-bs-interval="5000">
                    <div class="row indexproduct">
                        <?php }  ?>
                        <div class="col-6 col-xl-3" style="padding-left: 20px">
                            <label for="" class="labelproduct"><?php echo $rsp['brand'] ?></label> <br>
                            <?php if(($check+1)%$setNumPro == 0) { ?>
                            <div class="product-contentend">
                                <?php }else{ ?>
                                <div class="product-content">
                                    <?php } ?>
                                    <label for="" class="labelmed"><?php echo $rsp['model'] ?></label>
                                    <br>
                                    <p class="pevent"><?php echo $rsp['descriptionIcon'] ?> </p>
                                    <img src="./product/<?php echo $rsp['iconproduct'] ?>" width="100%"
                                        style="padding: 20px" class="productIcon" alt="">
                                    <br>
                                </div>
                                <a href="./productdetail.php?id=<?php echo $rsp['productID'] ?>">
                                    <div class="discovermore">
                                        Discover more
                                    </div>
                                </a>
                            </div>
                            <?php if(($check+1)%$setNumPro == 0 || $check+1 == $numresult) { ?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php $check++; ?>
                    <?php }   ?>
                    <!-- <div class="carousel-item" data-bs-interval="5000">
            <div class="row indexproduct">
                <div class="col-6 col-xl-3" style="padding-left: 20px">
                    <label for="" class="labelproduct">Ghibli</label> <br>
                    <div class="product-content">
                        <label for="" class="labelmed">You’re not like everyone else</label> <br>
                        <p class="pevent">The masterful combination of style, power, sporty,<br>
                            handing, and comfort </p>
                        <img src="./img/gh_front.png" width="100%" style="padding: 20px" alt=""> <br>
                    </div>
                    <div class="discovermore">
                        Discover more
                    </div>
                </div>
                <div class="col-6 col-xl-3">
                    <label for="" class="labelproduct">Ghibli</label> <br>
                    <div class="product-contentend">
                        <label for="" class="labelmed">You’re not like everyone else</label> <br>
                        <p class="pevent">The masterful combination of style, power, sporty,<br>
                            handing, and comfort </p>
                        <img src="./img/gh_front.png" width="100%" style="padding: 20px" alt=""> <br>
                    </div>
                    <div class="discovermore">
                        Discover more
                    </div>
                </div>
                <div class="col-6 col-xl-3 productshownone">
                    <label for="" class="labelproduct">Ghibli</label> <br>
                    <div class="product-content">
                        <label for="" class="labelmed">You’re not like everyone else</label> <br>
                        <p class="pevent">The masterful combination of style, power, sporty,<br>
                            handing, and comfort </p>
                        <img src="./img/gh_front.png" width="100%" style="padding: 20px" alt=""> <br>
                    </div>
                    <div class="discovermore">
                        Discover more
                    </div>
                </div>
                <div class="col-6 col-xl-3 productshownone">
                    <label for="" class="labelproduct">Ghibli</label> <br>
                    <label for="" class="labelmed">You’re not like everyone else</label> <br>
                    <p class="pevent">The masterful combination of style, power, sporty,<br>
                        handing, and comfort </p>
                    <img src="./img/gh_front.png" width="100%" style="padding: 20px" alt=""> <br>

                    <div class="discovermore">
                        Discover more
                    </div>
                </div>
            </div>
        </div> -->
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>


            <?php } ?>
            <!-- 
<div class="row indexproduct">
    <div class="col-6 col-xl-3" style="padding-left: 20px">
        <label for="" class="labelproduct">Ghibli</label> <br>
        <div class="product-content">
            <label for="" class="labelmed">You’re not like everyone else</label> <br>
            <p class="pevent">The masterful combination of style, power, sporty,<br>
                handing, and comfort </p>
            <img src="./img/gh_front.png" width="100%" alt=""> <br>

            <div class="discovermore">
                Discover more
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-3">
        <label for="" class="labelproduct">Ghibli</label> <br>
        <div class="product-contentend">
            <label for="" class="labelmed">You’re not like everyone else</label> <br>
            <p class="pevent">The masterful combination of style, power, sporty,<br>
                handing, and comfort </p>
            <img src="./img/gh_front.png" width="100%" alt=""> <br>

            <div class="discovermore">
                Discover more
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-3 productshownone">
        <label for="" class="labelproduct">Ghibli</label> <br>
        <div class="product-content">
            <label for="" class="labelmed">You’re not like everyone else</label> <br>
            <p class="pevent">The masterful combination of style, power, sporty,<br>
                handing, and comfort </p>
            <img src="./img/gh_front.png" width="100%" alt=""> <br>

            <div class="discovermore">
                Discover more
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-3 productshownone">
        <label for="" class="labelproduct">Ghibli</label> <br>
        <label for="" class="labelmed">You’re not like everyone else</label> <br>
        <p class="pevent">The masterful combination of style, power, sporty,<br>
            handing, and comfort </p>
        <img src="./img/gh_front.png" width="100%" alt=""> <br>

        <div class="discovermore">
            Discover more
        </div>
    </div>
</div> -->
            <!-- //? end index product -->
            <!-- //? Start image before footer -->
            <?php 
            $queryblogpin = "SELECT * from blog WHERE blogpin = '1' AND statusblog = '1'"; 
            $resultblogpin = mysqli_query($conn, $queryblogpin);
            $rowpin = mysqli_fetch_array($resultblogpin);
            $numblogpin = mysqli_num_rows($resultblogpin);
            ?>
            <div class="containerimglast">
                <div class="row" style="border: 0px solid #707070">
                    <?php if($numblogpin > 0){ ?>
                    <div class="col-12" id="rightclone" style="padding: 0px">
                        <a href="./blogDetail.php?ID=<?php echo $rowpin['blogID'] ?>" id="rightclonelink">
                            <img src="./blog/<?php echo $rowpin['thumbnail'] ?>" id="rightcloneimg" width="100%"
                                height="100%" style="object-fit: cover;" alt="">
                        </a>
                    </div>
                    <?php } ?>

                    <div class="col-12 col-sm-4" style="padding: 0px">
                        <div class="row" style="padding: 0px;margin-left: 0px">
                            <?php 
                        $queryBlognew = "SELECT * FROM blog WHERE blogpin = '2' AND promotion = '1' AND statusblog = '1' order by date DESC LIMIT 2";
                        $resultblognew = mysqli_query($conn, $queryBlognew);
                        $numblognews = mysqli_num_rows($resultblognew);
                        $c = 0;
                        if($numblognews > 0){
                        foreach($resultblognew as $rsbn){
                            $c++;
                            if($c == 1){
                        ?>
                            <div class="col-6 col-sm-12 beforebootertop">
                                <a href="./blogDetail.php?ID=<?php echo $rsbn['blogID'] ?>">
                                    <img src="./blog/<?php echo $rsbn['thumbnail'] ?>" width="100%" alt=""
                                        class="imgfooterleft setimagesize">
                                </a>
                            </div>
                            <?php } else { ?>
                            <div class="col-6 col-sm-12" style="margin-top: 4px">
                                <a href="./blogDetail.php?ID=<?php echo $rsbn['blogID'] ?>">
                                    <img src="./blog/<?php echo $rsbn['thumbnail'] ?>" width="100%" alt=""
                                        class="imgfooterright setimagesize">
                                </a>
                            </div>
                            <?php } ?>
                            <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <?php if($numblogpin > 0){ ?>
                    <div class="col-8" id="rightimg">
                        <a href="./blogDetail.php?ID=<?php echo $rowpin['blogID'] ?>">
                            <img src="./blog/<?php echo $rowpin['thumbnail'] ?>" width="100%" class="setimagesize"
                                alt="">
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!-- //? End image before footer -->

            <!-- //? Start popup booking -->
            <form action="" id="popForm">
                <div class="popupbooking" id="popup-1booking">
                    <div class="overlaybooking" onclick="togglePopupBooking()"></div>
                    <div class="contentbooking">
                        <div class="close-btn-dotbooking" onclick="togglePopupBooking()">...</div>
                        <div class="close-btnbooking" onclick="togglePopupBooking()">-</div>
                        <p style="margin-bottom: 15px;margin-top: 20px">Lorem Ipsum is simply dummy text of the printing
                            and typesetting industry.
                        </p>
                        <span class="footerleft-content-social"><img src="./img/viber.png" class="imgsocial"
                                alt=""></span>
                        <span class="footerleft-content-social"><img src="./img/facebook-app-logo.png" class="imgsocial"
                                alt=""></span>
                        <span class="footerleft-content-social"><img src="./img/line.png" class="imgsocial"
                                alt=""></span>
                        <div class="calendarcenter">
                            <?php include('./testcalendar.php') ?>
                        </div>
                        <div class="row test1234">
                            <div class="col-1 col-sm-2"></div>
                            <div class="col-5 col-sm-4">
                                <input type="text" name="Name" id="namepop" required placeholder="Name"
                                    class="inputbooking">
                            </div>
                            <!-- <div class="col-1"></div> -->
                            <div class="col-5 col-sm-4">
                                <input type="text" name="phone" id="phone1" required placeholder="Phone"
                                    class="inputbooking">
                            </div>
                            <div class="col-1 col-sm-2"></div>
                            <input type="hidden" name="Date" id="app">
                            <div class="col-1 col-sm-2"></div>
                            <div class="col-5 col-sm-4" style="margin-top: 20px">
                                <select name="Time" id="time" class="inputbooking">
                                    <option value="">Time</option>
                                    <option value="13:00-15:00">13:00-15:00</option>
                                    <option value="15:00-18:00">15:00-18:00</option>
                                    <option value="18:00-20:00">18:00-20:00</option>
                                </select>
                            </div>
                            <div class="col-6 col-sm-6"></div>
                        </div>
                        <div class="col-12 formsubmit" style="margin-bottom: 0px">
                            <button type="button" class="btn btn-dark" onclick="SubForm()"
                                style="padding: 6px 22px">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- //? End popup booking -->

            <!-- //? Start popup Promotion -->
            <?php 
            $sqlpromotion = "SELECT * FROM blog b inner join blog_detail d on d.blogID = b.blogID WHERE promotion = '2' AND d.blogDesID = '0'";
            $resultpromotion = mysqli_query($conn, $sqlpromotion) or die ("ERROR $sql " . mysqli_error());
            $rowpromotion = mysqli_fetch_array($resultpromotion);
            $numpromotion = mysqli_num_rows($resultpromotion);
            if($numpromotion > 0){
            ?>
            <div class="popupbooking active" id="popup-promotion">
                <?php }else{ ?>
                <div class="popupbooking" id="popup-promotion">
                    <?php } ?>
                    <div class="overlaybooking promotion" onclick="togglePopupPromotion()"></div>
                    <div class="contentbooking contentPromotion" style="background: none;">
                        <div class="close-btnbooking" style="color: #fff;border: 0px" onclick="togglePopupPromotion()">x
                        </div>
                        <div style="position: relative;">
                            <img src="./blog/<?php echo $rowpromotion['blog_desktop'] ?>"
                                class="imgdesktop imgpromotionDesktop" alt=" Snow" style="width:100%;margin-top: 20px">
                            <img src="./blog/<?php echo $rowpromotion['blog_mobile'] ?>"
                                class="imgmobile imgpromotionMobile" alt=" Snow" style="width:100%;margin-top: 20px">
                            <a href="./blogDetail.php?ID=<?php echo $rowpromotion['blogID'] ?>">
                                <div class="bottom-center">Enter Site</div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- //? End popup Promotion -->

                <!-- //? Start footer -->
                <?php include('./contentfooter.php') ?>
                <!-- //? End footer -->

                <!-- //? Start popup message -->
                <?php include('./message.php') ?>
                <!-- //? pop message -->
                <script>
                var width1 = screen.width;
                setimg(width1);

                window.addEventListener("resize", function(event) {
                    setimg(document.body.clientWidth);
                })

                function setimg(size) {
                    if (size <= 600) {
                        document.getElementById("rightimg").style.display = "none";
                        document.getElementById("rightclone").style.display = "block";
                    } else {
                        document.getElementById("rightimg").style.display = "block";
                        document.getElementById("rightclone").style.display = "none";
                    }
                }
                </script>

                <script>
                function togglePopupBooking() {
                    document.getElementById("popup-1booking").classList.toggle("active");
                }

                function togglePopupPromotion() {
                    document.getElementById("popup-promotion").classList.toggle("active");
                }

                function pleaselogin() {
                    swal({
                        title: "โปรด login เพื่อนัดหมายวันดูรถหรือรับข้อมูลข่าวสารกับ V1",
                        type: "info",
                        icon: "warning",
                    });
                    setTimeout(function() {
                        window.location = "./login.php"
                    }, 1500);
                }
                </script>
                <?php include('./footer.php'); ?>