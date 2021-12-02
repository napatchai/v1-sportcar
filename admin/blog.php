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
<h4>List of Blog
    <?php if($_COOKIE['level'] != '4') {?>
    <a href="./blogAdd.php"><span class="btnadd">+ Create Blog</span></a>
    <?php } ?>
</h4>
<br>
<div class="row">
    <div class="col-sm-5">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
            rel="stylesheet" />

        <input type="text" class="form-control" onkeyup="load_data()" id="search" placeholder="&#xF002; Search"
            style="font-family:Arial, FontAwesome" />
        <br>
    </div>


    <div class="row indexproduct" style="padding-left: 15px" id="result"></div>
</div>

<?php include('../footer.php') ?>

<script>
document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById("blog").classList.add('active')
    load_data();
})

window.addEventListener("resize", function(event) {
    setimg(document.body.clientWidth);
})

// function setimg(size) {
//     if (size <= 800) {
//         document.getElementById("table1").style.display = "block";
//     } else {
//         document.getElementById("table1").style.removeProperty('display');
//     }
// }

function load_data() {
    var search = document.getElementById("search").value
    // var search = document.getElementById('search').value
    // alert(search)
    // var selectBrand = document.getElementById('brand');
    // var valueBrand = selectBrand.options[selectBrand.selectedIndex].value;
    // var selectYear = document.getElementById('yearcar');
    // var valueYear = selectYear.options[selectYear.selectedIndex].value;
    // var selectPrice = document.getElementById('selectprice');
    // var valuePrice = selectPrice.options[selectPrice.selectedIndex].value;
    $.ajax({
        url: "./blogLoad.php",
        method: "POST",
        data: {
            search: search
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
            window.location = "./blog.php"
        }, 1500);
    } else if (result == 2) {
        swal("Error", "Some Thing Warnning", "error");
    }
}
</script>