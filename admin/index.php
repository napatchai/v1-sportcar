<?php 
include('./header.php');
include('./slidebar.php');
include('../condb.php');
$sql = "SELECT * FROM banner ORDER BY number asc";
$result = mysqli_query($conn, $sql);
?>
<!-- //?Start pop up add -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Banner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form name="frmMain" method="post" action="./bannersql.php?type=add" target="iframe_target"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <iframe id="iframe_target" name="iframe_target" src="#"
                        style="width:0;height:0;border:0px solid #fff;"></iframe>
                    <label for="">Banner Desktop</label>
                    <input type="file" name="bannerDesktop" class="form-control" required>
                    <br>
                    <label for="">Banner Mobile</label>
                    <input type="file" name="bannerMobile" class="form-control" required>
                    <br>
                    <label for="">Link</label>
                    <input type="text" name="link" class="form-control">
                    <br>
                    <label for="">Subject</label>
                    <input type="text" name="subject" class="form-control">
                    <br>
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control">
                    <br>
                    <label for="">Number</label>
                    <input type="number" name="number" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- //? End popup add -->

<!-- //?Start pop up Edit -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Banner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form name="frmMain" method="post" action="./bannersql.php?type=edit" target="iframe_target"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <iframe id="iframe_target" name="iframe_target" src="#"
                        style="width:0;height:0;border:0px solid #fff;"></iframe>
                    <label for="">Banner Desktop</label>
                    <input type="file" style="margin-top:20px" name="bannerDesktop" class="form-control">
                    <br>
                    <label for="">Banner Mobile</label>
                    <br>
                    <input type="file" style="margin-top:20px" name="bannerMobile" class="form-control">
                    <br>
                    <label for="">Link</label>
                    <input type="text" name="link" class="form-control" id="link">
                    <br>
                    <label for="">Subject</label>
                    <input type="text" name="subject" class="form-control" id="subject1">
                    <br>
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control" id="description1">
                    <br>
                    <label for="">Number</label>
                    <input type="number" name="number" class="form-control" id="number">
                    <input type="hidden" name="banner_id" id="banner_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                        onclick="document.getElementById('formdelete').submit();">Delete</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
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
    <h4>Manage Banner</h4>
    <div class="row">
        <?php foreach($result as $row){  
             $subject = "'" . $row['subject'] . "'";
             $description = "'" . $row['description'] . "'";
             $banner_id = "'" . $row['banner_id'] . "'";
             $link = "'" . $row['link'] . "'";
            ?>
        <div class="col-md-4 test">
            <a href="#" data-bs-toggle="modal"
                onclick="setinput(<?php echo  $banner_id . ',' . $subject . ',' . $description . ',' . $row['number'] . ',' . $link ?>)"
                data-bs-target="#exampleModal1">
                <div class="managerbanner">
                    <img src="../banner/<?php echo $row['banner_desktop'] ?>" class="imgbanner" alt="">
                    <div class="detailbanner">
                        <h1><?php echo $row['subject'] ?></h1>
                        <h3><?php echo $row['description'] ?></h3>
                    </div>
                </div>
            </a>
        </div>
        <?php }  ?>
        <div class="col-md-4 test">
            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
    document.getElementById("banner").classList.add('active')
})

function showResult(result) {
    if (result == 1) {
        swal({
            title: "Save Success",
            type: "success",
            icon: "success",
        });
        setTimeout(function() {
            window.location = "./index.php"
        }, 1500);
    } else if (result == 2) {
        swal("Error", "Some Thing Warnning", "error");
    }
}

function setinput(banner_id, subject, description, number, link) {
    document.getElementById('subject1').value = subject;
    document.getElementById('description1').value = description;
    document.getElementById('banner_id2').value = banner_id;
    document.getElementById('banner_id').value = banner_id;
    document.getElementById('link').value = link;
    document.getElementById('number').value = number;
}
</script>