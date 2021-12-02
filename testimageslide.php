<?php include('./header.php') ?>
<style>
/* external css: flickity.css, fullscreen.css */



.carousel {
    background: #EEE;
}

.carousel-image {
    display: block;
    height: auto;
    /* set min-width, allow images to set cell width */
    width: 90%;
    margin-right: 10px;
    /* vertically center */
    top: 50%;
    transform: translateY(-50%)
}

.carousel.is-fullscreen .carousel-image {
    height: auto;
    max-height: 100%;
}
</style>
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.css">
<link rel="stylesheet" href="https://unpkg.com/flickity-fullscreen@1/fullscreen.css">
<!-- Start bammer -->

<!-- Flickity HTML init -->
<div class="carousel" data-flickity='{ "fullscreen": true, "lazyLoad": 2 }'>
    <img class="carousel-image" data-flickity-lazyload="./img/aston-martin-vulcan-2918114_1920.png" />
    <img class="carousel-image" data-flickity-lazyload="./img/productdetail2.png" />
    <img class="carousel-image" data-flickity-lazyload="./img/productdetail3.png" />
    <img class="carousel-image" data-flickity-lazyload="./img/productdetail4.png" />
    <img class="carousel-image" data-flickity-lazyload="./img/productdetail5.png" />
</div>


<!-- End banner -->
<?php include('./contentfooter.php') ?>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.js"></script>
<script src="https://unpkg.com/flickity-fullscreen@1/fullscreen.js"></script>

<?php include('./footer.php') ?>