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
                <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form name="frmMain" method="post" action="./usersql.php?type=add" target="iframe_target"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <iframe id="iframe_target" name="iframe_target" src="#"
                        style="width:0;height:0;border:0px solid #fff;"></iframe>
                    <label for="">First Name</label>
                    <input type="text" name="fname" class="form-control" required>
                    <br>
                    <label for="">Last Name</label>
                    <input type="text" name="lname" class="form-control" required>
                    <br>
                    <label for="">Phone</label>
                    <input type="text" name="phone" class="form-control" required>
                    <br>
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" required>
                    <br>
                    <label for="">Level</label>
                    <select name="level" class="form-select" id="" required>
                        <option value="">Select Level</option>
                        <option value="1">Admin</option>
                        <option value="3">Editor</option>
                        <option value="4">Sale</option>
                    </select>
                    <br>
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" required>
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

<!-- //? Start form delete -->
<form name="frmMain" method="post" id="formdelete" action="./bannersql.php?type=delete" target="iframe_target"
    enctype="multipart/form-data">
    <input type="hidden" name="banner_id1" id="banner_id2">
</form>
<!-- //? End form Delete -->

<div class="height-100">
    <br><br>
    <br>
    <h4>List of Admin<a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><span class="btnadd">+ Create
                Admin</span></a></h4>
    <br>
    <div class="col-3">
        <select name="" id="level" onchange="load_data()" class="form-select">
            <option value="">All type</option>
            <option value="1">Admin</option>
            <option value="2">User</option>
            <option value="3">Editor</option>
            <option value="4">Sale</option>
        </select>
    </div>

    <br>
    <br>
    <div id="result"></div>
</div>

<?php include('../footer.php') ?>

<script>
document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById("user").classList.add('active')
    load_data();
})

function load_data() {
    var selectlevel = document.getElementById('level');
    var valuelevel = selectlevel.options[selectlevel.selectedIndex].value;
    // var selectYear = document.getElementById('yearcar');
    // var valueYear = selectYear.options[selectYear.selectedIndex].value;
    // var selectPrice = document.getElementById('selectprice');
    // var valuePrice = selectPrice.options[selectPrice.selectedIndex].value;
    $.ajax({
        url: "./user_load.php",
        method: "POST",
        data: {
            level: valuelevel
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