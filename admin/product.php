<?php 
include('./header.php'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<?php
include('./slidebar.php');
include('../condb.php');
$sql = "SELECT * FROM product ORDER BY date desc";
$result = mysqli_query($conn, $sql);
?>
<iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
<!-- //?Start pop up Edit -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Banner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <iframe id="iframe_target" name="iframe_target" src="#"
                    style="width:0;height:0;border:0px solid #fff;"></iframe>
                <form action="./productsql.php?type=delete" method="post" target="iframe_target">
                    <input type="hidden" name="productID" id="productID">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <form action="./productEdit.php" method="post">
                    <input type="hidden" name="productID" id="productID1">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>
<!-- //? End popup Edit -->

<!-- //? Start form delete -->
<form name="frmMain" method="post" id="formdelete" action="./bannersql.php?type=delete" target="iframe_target"
    enctype="multipart/form-data">
    <input type="hidden" name="banner_id1" id="banner_id2">
</form>
<!-- //? End form Delete -->
<br>
<h4>List of product
    <?php if($_COOKIE['level'] != '4') {?>
    <a href="./productAdd.php"><span class="btnadd">+ Create Product</span></a>
    <?php } ?>
</h4>
<br>
<div class="row">
    <div class="col-sm-4">
        Brand
        <br>
        <select name="brand" class="form-select" style="width: 50%" aria-label="Default select example" id="brand"
            onchange="load_data()">
            <option value="">Select Brand</option>
            <option value="Geo">Geo</option>
            <option value="VOLKSWAGEN">VOLKSWAGEN</option>
            <option value="Volvo">Volvo</option>
            <option value="Mercedes-Benz">Mercedes-Benz</option>
            <option value="Maserati">Maserati</option>
            <option value="Mazda">Mazda</option>
            <option value="MINI">MINI</option>
            <option value="LOTUS">LOTUS</option>
            <option value="Suzuki">Suzuki</option>
            <option value="Nissan">Nissan</option>
            <option value="Triumph">Triumph</option>
            <option value="LEXUS">LEXUS</option>
            <option value="Porsche">Porsche</option>
            <option value="Lamborghini">Lamborghini</option>
            <option value="Thairung">Thairung</option>
            <option value="TATA Motors">TATA Motors</option>
            <option value="SUBARU">SUBARU</option>
            <option value="TOYOTA">TOYOTA</option>
            <option value="GMC">GMC</option>
            <option value="Hillman">Hillman</option>
            <option value="JEEP">JEEP</option>
            <option value="Jaguar">Jaguar</option>
            <option value="Hudson">Hudson</option>
            <option value="Hyundai">Hyundai</option>
            <option value="Isuzu">Isuzu</option>
            <option value="Infiniti">Infiniti</option>
            <option value="KIA">KIA</option>
            <option value="HUMMER">HUMMER</option>
            <option value="Hino">Hino</option>
            <option value="Honda">Honda</option>
            <option value="Holden">Holden</option>
            <option value="Ferrari">Ferrari</option>
            <option value="Fiat">Fiat</option>
            <option value="Eagle">Eagle</option>
            <option value="Ford">Ford</option>
            <option value="Daimler">Daimler</option>
            <option value="Alpine">Alpine</option>
            <option value="De Tomaso">De Tomaso</option>
            <option value="Edsel">Edsel</option>
            <option value="Dodge">Dodge</option>
            <option value="Daihatsu">Daihatsu</option>
            <option value="DAF Trucks">DAF Trucks</option>
            <option value="Daewoo">Daewoo</option>
            <option value="Chrysler">Chrysler</option>
            <option value="Bugatti">Bugatti</option>
            <option value="Dacia">Dacia</option>
            <option value="Buick">Buick</option>
            <option value="Citroen">Citroen</option>
            <option value="Chevrolet">Chevrolet</option>
        </select>
        <br>
    </div>
    <div class="col-sm-4">
        Year
        <?php 
        $queryBrand = "SELECT year FROM product GROUP BY year";
        $resultBrand = mysqli_query($conn, $queryBrand);
        ?>
        <select class="form-select" aria-label="Default select example" id="yearcar" onchange="load_data()"
            style="width: 50%">
            <option value="">Select Year</option>
            <?php foreach($resultBrand as $rsb) { ?>
            <option value="<?php echo $rsb['year'] ?>"><?php echo $rsb['year'] ?></option>
            <?php } ?>
        </select>
        <br>
    </div>
    <div class="col-sm-4">
        Price
        <br>
        <select class="form-select selectprice" id="selectprice" style="width: 50%" aria-label="Default select example"
            onchange="load_data()">
            <option value="">Select Price</option>
            <option value="1000000">1M-10M</option>
            <option value="10000000">10M-20M</option>
            <option value="20000000">Moreover 20M</option>
        </select>
        <br>
    </div>
    <div class="row indexproduct" style="padding-left: 15px" id="result"></div>
</div>

<?php include('../footer.php') ?>

<script>
document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById("product").classList.add('active')
    load_data();
})

// window.addEventListener("resize", function(event) {
//     setimg(document.body.clientWidth);
// })

// function setimg(size) {
//     if (size <= 800) {
//         document.getElementById("table1").style.display = "block";
//     } else {
//         document.getElementById("table1").style.removeProperty('display');
//     }
// }

function load_data() {
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
            brand: valueBrand,
            year: valueYear,
            price: valuePrice
        },
        success: function(data) {
            $('#result').html(data);
        }
    });
}

function showResult(result) {
    if (result == 1) {
        swal({
            title: "Save Success",
            type: "success",
            icon: "success",
        });
        setTimeout(function() {
            window.location = "./product.php"
        }, 1500);
    } else if (result == 2) {
        swal("Error", "Some Thing Warnning", "error");
    }
}
</script>