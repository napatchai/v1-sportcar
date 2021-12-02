<?php include('./header.php') ?>
<!-- //* Start ref slide -->
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.css">
<link rel="stylesheet" href="https://unpkg.com/flickity-fullscreen@1/fullscreen.css">
<script type="text/javascript">
document.cookie = "screenWidth=" + screen.width;
</script>
<?php include('./condb.php'); ?>
<?php 
$productID = $_GET['id'];
$sqlProduct = "SELECT * FROM product WHERE productID = '$productID'";
$resultProduct = mysqli_query($conn, $sqlProduct);
$rowProduct = mysqli_fetch_array($resultProduct);
?>
<?php 
$newView = $rowProduct['View'] + 1;
$sqlUpdate = "UPDATE product SET view = $newView WHERE productID = '$productID'";
$resultUpdate = mysqli_query($conn, $sqlUpdate);
?>
<style>
.carousel-slide {
    background: #EEE;
}

.carousel-image {
    display: block;
    height: auto;
    /* set min-width, allow images to set cell width */
    width: 70%;
    margin-right: 10px;
    /* vertically center */
    top: 50%;
    transform: translateY(-50%)
}

@media (max-width: 600px) {
    .carousel-image {
        width: 100%
    }
}

.carousel.is-fullscreen .carousel-image {
    height: auto;
    max-height: 100%;
}

.carousel-slide .flickity-viewport .flickity-prev-next {
    display: none !important;
}

.flickity-prev-next-button {
    height: 0px !important
}

.flickity-page-dots .dot {
    height: 3px !important;
    width: 20px !important;
    border-radius: 0px !important;
}
</style>
<!-- //* End ref slide -->
<?php include('./navbar.php') ?>
<!-- //? Start Banner -->
<!-- <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel"> -->
<!-- <div class="carousel-inner"> -->
<!-- <div class="carousel-item active" data-bs-interval="3500"> -->
<div style="margin-top: 50px">
    <img src="./product/<?php echo $rowProduct['product_desktop'] ?>" class="imgdesktop" style="width: 100%" alt="...">
    <img src="./product/<?php echo $rowProduct['product_Mobile'] ?>" class="imgmobile" style="width: 100%" alt="...">

</div>
<!-- </div> -->
<!-- </div> -->
<!-- </div> -->
<!-- //? End banner -->

<!-- //? Start generation -->
<div class="generation" style="text-align: center">
    <h2 class="bannertext"><?php echo $rowProduct['model'] ?></h2>
    <h5 class="pricetext">CONDITION: <span style="font-weight: bold;"><?php echo $rowProduct['conditionPro'] ?></span>
        <span class="orblock">|</span>
        <br class="newlineprice">
        PRICE : <?php echo $rowProduct['price'] ?> BAHT
    </h5>
</div>
<!-- //? End deneration -->

<!-- //todo start product slide -->
<div class="carousel-slide" data-flickity='{ "fullscreen": true, "lazyLoad": 2 }'>
    <?php 
    $sqlProductImg = "SELECT * FROM product_image WHERE productID = '$productID' ORDER BY productDesID asc";
    $resultProductImg = mysqli_query($conn, $sqlProductImg);
    foreach($resultProductImg as $rpi){
    ?>
    <img class="carousel-image" data-flickity-lazyload="./product/<?php echo $rpi['imageProDes'] ?>" />
    <?php } ?>
</div>
<!-- //todo End product slide -->

<!-- //? Start product detail -->
<div class="generation">
    <!-- <h2 class="bannertext">EXTERIOR + INTERIOR</h2>
    <p class="pricetext"><?php echo $rowProduct['detail'] ?></p> -->
    <?php echo $rowProduct['textedit1'] ?>
</div>
<!-- //? End product detail -->

<!-- //? banner footer -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="3500">
            <img src="./product/<?php echo $rowProduct['detail_Desktop'] ?>" class=" test d-block w-100 imgdesktop"
                alt="...">
            <img src="./product/<?php echo $rowProduct['detail_Mobile'] ?>" class="test d-block w-100 imgmobile"
                alt="...">
        </div>
    </div>
</div>
<!-- //? banner footer -->

<!-- //? start textfooter -->
<div class="generation">
    <!-- <h2 class="footertext">EQUIPMENT HIGHLIGHTS</h2> -->
    <?php echo $rowProduct['textedit2'] ?>
</div>
<!-- //? End textfooter -->

<!-- //? Start ref -->
<!-- <div class="container" style="margin-bottom: 100px">
    <div class="row">
        <?php 
    $sqlProhigh = "SELECT * FROM productHigh WHERE productID = '$productID' ORDER BY proHighID asc";
    $resulthigh = mysqli_query($conn, $sqlProhigh);
    foreach($resulthigh as $rsh){
    ?>
        <div class="col-md-6 ">
            <div class="ref">
                <?php echo $rsh['highlight'] ?>
            </div>
        </div>
        <?php } ?>
    </div>
</div> -->
<!-- //? End ref -->

<!-- //? Start message -->
<?php include('./message.php') ?>
<!-- //? End message -->
<div class="productmore">
    <h2 class="lineh2"><span class="linespan">More Product</span></h2>
    <br>
    <div class="row indexproduct" style="padding-left: 15px">
        <?php 
    $widthScreen =  $_COOKIE['screenWidth'];
    $setNumPro;
    if($widthScreen > 1200){
        $setNumPro = 4;
    } elseif($widthScreen <= 1200){
        $setNumPro = 2;
    }

    $queryProduct = "SELECT * FROM product WHERE status = '1'  ORDER BY RAND() asc LIMIT $setNumPro";
    $resultProduct = mysqli_query($conn, $queryProduct);
    $numresult = mysqli_num_rows($resultProduct);
    
    $check = 1;
    if($numresult > 0){
        foreach($resultProduct as $rs) {
    ?>

        <div class="col-6 col-xl-3" style="padding-left: 20px">
            <label for="" class="labelproduct"><?php echo $rs["model"] ?></label> <br>
            <?php  if(($check)%$setNumPro == 0) {  ?>
            <div class="product-contentend">
                <?php }else{ ?>
                <div class="product-content">
                    <?php }  ?>
                    <label for="" class="labelmed"><?php echo $rs["textHeadIcon"] ?></label> <br>
                    <p class="pevent"><?php echo $rs["descriptionIcon"] ?></p>
                    <img src="./product/<?php echo $rs["iconproduct"] ?>" width="100%" style="padding: 20px"
                        class="productIcon" alt=""> <br>
                </div>
                <a href="./productdetail.php?id=<?php echo $rs['productID'] ?>">
                    <div class=" discovermore">
                        Discover more
                    </div>
                </a>
            </div>

            <!-- </div> -->

            <?php $check++; } ?>
            <?php } ?>
        </div>
    </div>
</div>
<?php include('./contentfooter.php') ?>
<!-- //* Start ref slide -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.js"></script>
<script src="https://unpkg.com/flickity-fullscreen@1/fullscreen.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var elem = document.querySelector('.carousel-slide');
    var flkty = new Flickity(elem, {
        // options
        cellAlign: 'left',
        contain: true
    });
}, false);
</script>
<!-- //* End ref banner -->
<?php include('./footer.php') ?>