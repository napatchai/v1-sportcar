<?php include('./header.php') ?>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<?php include('./navbar.php') ?>
<style>
html {
    scroll-behavior: smooth;
}
</style>
<?php 
include('./condb.php');
$queryProduct = "SELECT * FROM product ORDER BY date asc";
$resultProduct = mysqli_query($conn, $queryProduct);
$numresult = mysqli_num_rows($resultProduct);
?>

<script>
document.addEventListener("DOMContentLoaded", () => {
    document.cookie = "cookieName=" + screen.width;
});
</script>
<?php 
$widthScreen =  (int)$_COOKIE['cookieName'];
$per_page;
if($widthScreen > 1200){
    $per_page = 8;
}elseif($widthScreen <= 1200){
    $per_page = 4;
}
$pages = ceil($numresult/$per_page);
if(@$_GET['page']==""){
    $page="1";
    }else{
    $page=$_GET['page'];
    }
    $start    = ($page - 1) * $per_page;
    $sql     = $queryProduct." LIMIT $start,$per_page";
    $query2=mysqli_query($conn, $sql);

    $randomproduct = "SELECT * FROM product ORDER BY RAND ( ) LIMIT 3";
    $resultrandom = mysqli_query($conn, $randomproduct);
?>
<!-- //? Start Banner -->
<!-- <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="3500">
            <img src="./img/bannerproduct.png" class="d-block w-100" alt="..." id="bannerproduct">
        </div>
    </div>
</div> -->
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
        foreach($resultrandom as $row){ 
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
        foreach($resultrandom as $row){ 
            if($count == 0)
            {
            ?>

        <div class="carousel-item active" data-bs-interval="3500">
            <a href="./productdetail.php?id=<?php echo $row['productID'] ?>">
                <img src="./product/<?php echo $row['product_desktop'] ?>" class="test d-block w-100 imgdesktop"
                    alt="...">
                <img src="./product/<?php echo $row['product_Mobile'] ?>" class="test d-block w-100 imgmobile"
                    alt="...">
            </a>
            <!-- <div class="carousel-caption  d-md-block">
                <h1><?php echo $row['subject'] ?></h1>
                <h5><?php echo $row['description'] ?></h5>
                <a href="<?php echo $row['link'] ?>">
                    <div class="readmore">
                        Read more
                    </div>
                </a>
            </div> -->

        </div>

        <?php }else{ ?>
        <div class="carousel-item" data-bs-interval="3500">
            <a href="./productdetail.php?id=<?php echo $row['productID'] ?>">
                <img src="./product/<?php echo $row['product_desktop'] ?>" class="test d-block w-100 imgdesktop"
                    alt="...">
                <img src="./product/<?php echo $row['product_Mobile'] ?>" class="test d-block w-100 imgmobile"
                    alt="...">
            </a>
            <!-- <div class="carousel-caption  d-md-block">
                <h1><?php echo $row['subject'] ?></h1>
                <h5><?php echo $row['description'] ?></h5>
                <a href="<?php echo $row['link'] ?>">
                    <div class="readmore">
                        Read more
                    </div>
                </a>
            </div> -->

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
<input type="hidden" name="pages" value="<?php echo $pages ?>" id="pages">
<!-- //? End banner -->
<div class="container1">
    <div class="image-angled image-angled--top"></div>
    <div class="image-angled image-angled--background"></div>
    <div class="image-angled image-angled--text">
        <div class="texttest">
            <p>Lorem Ipsum is simply dummy
                text of the printing and Ipsum
                has been the industry’s</p>
            <h1 class="textproduct">
                Product
            </h1>
        </div>
    </div>
    <div class="image-angled image-angled--bottom"></div>
</div>
<!-- //? Start Filter -->
<div class="content-filter" id="product">
    <div class="filter">
        Filter > <span class="inputfilter">
            <?php 
        $queryBrand = "SELECT brand FROM product GROUP BY brand";
        $resultBrand = mysqli_query($conn, $queryBrand);
        ?>
            <span class="inputfilter">
                <select class="form-select selectBrand" aria-label="Default select example" id="brand"
                    onchange="load_data(1)">
                    <option value="">All Brand</option>
                    <?php foreach($resultBrand as $rsb) { ?>
                    <option value="<?php echo $rsb['brand'] ?>"><?php echo $rsb['brand'] ?></option>
                    <?php } ?>
                </select>
            </span>
            <span class="inputfilter">/</span>
            <span class="inputfilter">
                <?php 
        $queryBrand = "SELECT year FROM product GROUP BY year";
        $resultBrand = mysqli_query($conn, $queryBrand);
        ?>
                <select class="form-select" aria-label="Default select example" id="yearcar" onchange="load_data(1)">
                    <option value="">All Year</option>
                    <?php foreach($resultBrand as $rsb) { ?>
                    <option value="<?php echo $rsb['year'] ?>"><?php echo $rsb['year'] ?></option>
                    <?php } ?>
                </select>
            </span>
            <span class="inputfilter">/</span>
            <span class="inputfilter">
                <select class="form-select selectprice" id="selectprice" aria-label="Default select example"
                    onchange="load_data(1)">
                    <option value="">All Price</option>
                    <option value="1000000">1M-10M</option>
                    <option value="10000000">10M-20M</option>
                    <option value="20000000">Moreover 20M</option>
                </select>
            </span>
    </div>
</div>

<!-- //? End Filter -->
<!-- //? Start Product -->

<div class="row indexproduct" style="padding-left: 15px" id="result"></div>

<!-- //? Start message -->
<?php include('./message.php') ?>
<!-- //? End message -->
<!-- //? End Product -->
<?php include('./contentfooter.php') ?>
<script>
var width1 = screen.width;
load_data(1)
setimg(width1);

window.addEventListener("resize", function(event) {
    setimg(document.body.clientWidth);
})

function setimg(size) {
    load_data(1)
    if (size <= 600) {
        document.getElementById("bannerproduct").src = "./img/mc20-hero.png";
    } else {
        document.getElementById("bannerproduct").src = "./img/bannerproduct.png";
    }
}

function load_data(page) {
    var selectBrand = document.getElementById('brand');
    var valueBrand = selectBrand.options[selectBrand.selectedIndex].value;
    var selectYear = document.getElementById('yearcar');
    var valueYear = selectYear.options[selectYear.selectedIndex].value;
    var selectPrice = document.getElementById('selectprice');
    var valuePrice = selectPrice.options[selectPrice.selectedIndex].value;
    $.ajax({
        url: "./product_load.php",
        method: "POST",
        data: {
            screenwidth: screen.width,
            page: page,
            brand: valueBrand,
            yearcar: valueYear,
            price: valuePrice
        },
        success: function(data) {
            $('#result').html(data);
        }
    });
}
</script>
<?php include('./footer.php') ?>