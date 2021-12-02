<?php include('./header.php') ?>
<?php include('./navbar.php') ?>
<!-- //? Start Banner -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="3500">
            <img src="./img/servicebanner.png" class="d-block w-100" alt="..." id="servicefirst">
        </div>
    </div>
</div>
<!-- //? End banner -->

<!-- //? Start Second banner -->
<div class="who">
    <img src="./img/Layer_01.png" alt="Snow" class="imgwho" id="servicesec">
    <div class="centered">
        <div class="row">
            <!-- <div class="col-sm-4">
                <img src="./img/fix.png" alt="" class="imgservice">
            </div> -->
            <div class="col-sm-12 textservice">
                <h1>Service</h1>
                <p>Lorem Ipsum is simply dummy text of the printing
                    and typesetting industry. Lorem Ipsum has been
                    the industry’s standard dummy text ever since the
                    1500s, when an</p>
            </div>
        </div>
    </div>
</div>
<!-- //? End Second banner -->

<!-- //? Start Banner -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="margin-top: 0px !important">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="3500">
            <div class="row" style="border: 1px solid #707070;margin: 0px">
                <div class="col-sm-6" style="padding: 0px !important" id="changeimg">
                    <img src="./img/aston-martin-vulcan-2918114_1920.png" width="108%" height="100%"
                        style="object-fit: cover;" alt="" id="rightfirst">
                </div>
                <div class="col-sm-6" style="padding: 0px;">
                    <img src="./img/Layer_04.png" width="100%" alt="" id="leftfirst"><br>
                    <img src="./img/wh1.png" width="100%" alt="" id="leftsec">
                </div>
                <div class="col-sm-6" style="padding: 0px !important" id="rightfirst12">
                    <img src="./img/aston-martin-vulcan-2918114_1920.png" width="108%" height="100%"
                        style="object-fit: cover;" alt="">
                </div>
            </div>

        </div>
    </div>
</div>
<div class="" style="text-align:center;padding: 10px 0px">
    <a href="./contact.php" style="text-align:center">
        <button type="button" class="btn btn-light newstylebtn">สนใจสอบถามบริการเพิ่มเติม</button>
    </a>
</div>
<?php include('./message.php') ?>
<!-- //? End banner -->
<?php include('./contentfooter.php') ?>

<script>
var width1 = screen.width;
setimg(width1);

window.addEventListener("resize", function(event) {
    setimg(document.body.clientWidth);
})

function setimg(size) {
    if (size <= 600) {
        document.getElementById("changeimg").style.display = "block";
        document.getElementById("rightfirst12").style.display = "none";
        document.getElementById("rightfirst").src = "./img/aston-martin-vulcan-2918114_1920123.png";
        document.getElementById("servicefirst").src = "./img/Layer03_mobile.png";
        document.getElementById("servicesec").src = "./img/Layer01_mobile.png";
    } else {
        document.getElementById("changeimg").style.display = "none";
        document.getElementById("rightfirst12").style.display = "block";
        document.getElementById("rightfirst").src = "./img/aston-martin-vulcan-2918114_1920.png";
        document.getElementById("servicefirst").src = "./img/servicebanner.png";
        document.getElementById("servicesec").src = "./img/Layer_01.png";
    }
}
</script>
<?php include('./footer.php') ?>