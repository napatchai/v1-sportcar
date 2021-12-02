<?php include('./header.php') ?>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<?php include('./navbar.php') ?>
<?php 
include('./condb.php');
$query = "SELECT * FROM blog b inner join blog_detail d on d.blogID = b.blogID group by d.blogID ORDER by d.blogDesID asc ";
$resule = mysqli_query($conn, $query);
$numresultBlog = mysqli_num_rows($resule);
?>
<?php 
$widthScreen =  (int)$_COOKIE['cookieName'];
$per_page = 4;
$pages = ceil($numresultBlog/$per_page);
if(@$_GET['page']==""){
    $page="1";
    }else{
    $page=$_GET['page'];
    }
    $start    = ($page - 1) * $per_page;
    $sql     = $query." LIMIT  $start,$per_page";
    $query2=mysqli_query($conn, $sql);

    $sqlpin = "SELECT * FROM blog b inner JOIN blog_detail d on d.blogID = b.blogID WHERE blogpin = 1 group by d.blogID ORDER by d.blogDesID asc";
    $reqpin = mysqli_query($conn, $sqlpin);
    $rowpin = mysqli_fetch_array($reqpin);
?>
<!-- //? Start Banner -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="3500">
            <img src="./img/bannerblog.png" class="d-block w-100" alt="..." id="bannerblog">
        </div>
    </div>
</div>
<!-- //? End banner -->
<div class="container" style="margin-top: 50px">
    <!-- //? Start New header -->
    <h5>NEWS</h5>

    <div class="test" style="margin-bottom: 50px">
        <?php if(mysqli_num_rows($reqpin) > 0) {?>
        <div class="headernew">
            <h2 style="margin-bottom: 20px;margin-top: 20px;font-size: 35px"><?php echo $rowpin['subject'] ?></h2>
            <img src="./blog/<?php echo $rowpin['thumbnail'] ?>" width="100%" alt="">
        </div>
        <div class="row">
            <div class="col-12">
                <h5 style="margin-top: 20px">
                    <?php echo strtoupper(date('d M Y', strtotime(@$rowpin['date']))); ?>
                </h5>
            </div>
            <div class="col-12 col-sm-10" style="word-break: break-all;">
                <a href="./blogDetail.php?ID=<?php echo $rowpin['blogID'] ?>" id="headerlink">
                    <h4 style="margin-top: 20px;"><?php echo strtoupper($rowpin['subjectDes']) ?></h4>
                </a>
                <h4 style="margin-top: 20px" id="headerunlink"><?php echo strtoupper($rowpin['subjectDes']) ?></h4>
                <div class="discriptionnew">
                    <?php echo strtoupper($rowpin['description']) ?>
                </div>
            </div>
            <div class="col-sm-2">
                <a href="./blogDetail.php?ID=<?php echo $rowpin['blogID'] ?>">
                    <div class="readmoreblog">
                        Read more
                    </div>
                </a>
            </div>
        </div>
        <?php } ?>
        <!-- //? End New header -->
        <!-- //? Start filter -->
        <div class="row" style="margin-top: 20px">
            <div class="col-12">
                Filter >
                <span class="inputfilter">
                    <select class="form-select attfilter" id="type" onchange="load_data(1)"
                        aria-label="Default select example">
                        <option value="">All Article</option>
                        <option value="New">New</option>
                        <option value="Popular">Popular</option>
                    </select>
                </span>
                <span class="inputfilter">/</span>
                <span class="inputfilter">
                    <select class="form-select yearfilter" id="year" onchange="load_data(1)"
                        aria-label="Default select example">
                        <option value="">Year</option>
                        <?php $yearfile = date('Y'); ?>
                        <?php for($i=0; $i <= 15 ; $i++){ ?>
                        <option value="<?php echo $yearfile ?>"><?php echo $yearfile ?></option>
                        <?php $yearfile -- ?>
                        <?php } ?>
                    </select>
                </span>
                <span class="inputfilter">/</span>
                <span class="inputfilter">
                    <select class="form-select monfilter" id="price" onchange="load_data(1)"
                        aria-label="Default select example">
                        <option value="">Month</option>
                        <option value="01">Jan.</option>
                        <option value="02">Feb.</option>
                        <option value="03">Mar.</option>
                        <option value="04">Apr.</option>
                        <option value="05">May.</option>
                        <option value="06">Jun.</option>
                        <option value="07">Jul.</option>
                        <option value="08">Aug.</option>
                        <option value="09">Sep.</option>
                        <option value="10">Oct.</option>
                        <option value="11">Nov.</option>
                        <option value="12">Dec.</option>
                    </select>
                </span>
            </div>
        </div>
        <!-- //? End filter -->


        <div id="result"></div>
    </div>
</div>
<?php include('./message.php') ?>
<?php include('./contentfooter.php') ?>
<script>
var width1 = screen.width;
setimg(width1);
load_data(1);

window.addEventListener("resize", function(event) {
    setimg(document.body.clientWidth);
})

function setimg(size) {
    if (size <= 600) {
        document.getElementById("bannerblog").src = "./img/bannerblogMobile.png";
        document.getElementById("bannerblog").style.height = "auto";
    } else {
        document.getElementById("bannerblog").src = "./img/bannerblog.png";
    }
}

function load_data(page) {
    var selectType = document.getElementById('type');
    var valueType = selectType.options[selectType.selectedIndex].value;
    var selectyear = document.getElementById('year');
    var valueYear = selectyear.options[selectyear.selectedIndex].value;
    var selectPrice = document.getElementById('price');
    var valuePrice = selectPrice.options[selectPrice.selectedIndex].value;
    $.ajax({
        url: "./blogLoad.php",
        method: "POST",
        data: {
            screenwidth: screen.width,
            page: page,
            type: valueType,
            price: valuePrice,
            year: valueYear
        },
        success: function(data) {
            $('#result').html(data);
        }
    });
}
</script>
<?php include('./footer.php') ?>