<?php 
include('./header.php');
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

<div class="height-100">
    <br><br>
    <h4>Manage Product</h4>
    <div class="row">
        <?php foreach($result as $row){  
             $product_id = "'" . $row['productID'] . "'";
            ?>
        <div class="col-md-4 test">
            <a href="#" data-bs-toggle="modal" onclick="setinput(<?php echo  $product_id ?>)"
                data-bs-target="#exampleModal1">
                <div class="managerbanner">
                    <img src="../product/<?php echo $row['product_desktop'] ?>" class="imgbanner" alt="">
                    <div class="detailbanner">
                        <h1><?php echo $row['model'] ?></h1>
                        <!-- <h3><?php echo $row['description'] ?></h3> -->
                    </div>
                </div>
            </a>
        </div>
        <?php }  ?>
        <div class="col-md-4 test">
            <a href="./productAdd.php">
                <div class="managerbanner added">
                    <div class="Addbanner">
                        <h1>+</h1>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<?php include('../footer.php') ?>

<script>
document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById("product").classList.add('active')
})

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

function setinput(productID) {
    document.getElementById('productID').value = productID;
    document.getElementById('productID1').value = productID;
}
</script>