<script>
function checkrepassword() {
    var checkbox = document.getElementById('changepassword')
    if (checkbox.checked == false) {
        document.getElementById('oldpassword').type = 'hidden';
        document.getElementById('laoldpassword').style.display = 'none';
        document.getElementById('newpassword').type = 'hidden';
        document.getElementById('lanewpassword').style.display = 'none';
        document.getElementById('confirmpassword').type = 'hidden';
        document.getElementById('laconfirmpassword').style.display = 'none';
        document.getElementById('br1').style.display = 'none';
        document.getElementById('br2').style.display = 'none';
    } else {
        document.getElementById('oldpassword').type = 'password';
        document.getElementById('laoldpassword').style.display = 'block';
        document.getElementById('newpassword').type = 'password';
        document.getElementById('lanewpassword').style.display = 'block';
        document.getElementById('confirmpassword').type = 'password';
        document.getElementById('laconfirmpassword').style.display = 'block';
        document.getElementById('br1').style.display = 'block';
        document.getElementById('br2').style.display = 'block';
    }
}
</script>
<!-- //?Start pop up Edit -->
<div class="modal fade" id="exampleModalprofile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form name="frmMain" method="post" action="./profileSql.php" id="submitprofile" target="iframe_target"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <iframe id="iframe_target" name="iframe_target" src="#"
                        style="width:0;height:0;border:0px solid #fff;"></iframe>
                    <label for="">First Name</label>
                    <input type="text" name="fname" id="fname" class="form-control" required>
                    <br>
                    <label for="">Last Name</label>
                    <input type="text" name="lname" id="lname" class="form-control" required>
                    <br>
                    <label for="">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                    <br>
                    <label for="">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                    <br>
                    <input type="checkbox" onchange="checkrepassword()" name="" id="changepassword"><span> Change
                        Password</span>
                    <br id="br1"><br id="br2">
                    <label for="" id="laoldpassword">Old Password</label>
                    <input type="password" name="oldpassword" id="oldpassword" class="form-control" required>
                    <br>
                    <label for="" id="lanewpassword">New Password</label>
                    <input type="password" name="newpassword" id="newpassword" class="form-control" required>
                    <br>
                    <label for="" id="laconfirmpassword">Confirm Password</label>
                    <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" required>
                    <!-- <br>
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" required> -->
                    <input type="hidden" name="mem_id" id="mem_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="saveProfile()" class="btn btn-primary">Save
                        changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- //? End popup Edit -->
<script>
function setvalueProfile(mem_id, fname, lname, phone, email) {
    document.getElementById('oldpassword').type = 'hidden';
    document.getElementById('laoldpassword').style.display = 'none';
    document.getElementById('newpassword').type = 'hidden';
    document.getElementById('lanewpassword').style.display = 'none';
    document.getElementById('confirmpassword').type = 'hidden';
    document.getElementById('laconfirmpassword').style.display = 'none';
    document.getElementById('br1').style.display = 'none';
    document.getElementById('br2').style.display = 'none';
    document.getElementById('mem_id').value = mem_id;
    document.getElementById('fname').value = fname;
    document.getElementById('lname').value = lname;
    document.getElementById('phone').value = phone;
    document.getElementById('email').value = email;
}
</script>
<?php 
        @$mem_id = "'" . $_COOKIE['mem_id'] . "'";
        @$fname = "'" . $_COOKIE['Fname'] . "'";
        @$lname = "'" . $_COOKIE['Lname'] . "'";
        @$phone = "'" . $_COOKIE['phone'] . "'";
        @$email = "'" . $_COOKIE['email'] . "'";
    ?>
<nav>
    <input type="checkbox" id="check" onclick="calc()">
    <label for="check" class="checkbtn" id="fontcheck">
        <i class="fas fa-bars" id="first" style="line-height: 55px;"></i>
        <i class="fas fa-times" style="display:none;z-index: 99999999;margin-top: 13px" id="cancel1"></i>
    </label>
    <a href="./">
        <label class="logo"><img src="./img/logo.png" width="45px" alt=""></label>
    </a>
    <ul>
        <li><a href="./index.php">Home</a></li>
        <li><a href="./product.php">Product</a></li>
        <li><a href="./service.php">Service</a></li>
        <li><a href="./blog.php">Blog</a></li>
        <li><a href="./contact.php">Contact</a></li>
        <?php 
        // session_start();
        if(!@$_COOKIE["mem_id"]){ 
        ?>
        <li><a href="./login.php">Login </a><span class="btnlogin-sign">|</span><a href="./signup.php">Sign up</a></li>
        <?php }else{ 
            if($_COOKIE['level'] != 2){    
        ?>
        <li><a href="./admin">Back End</a></li>
        <?php } ?>
        <li><a href="" data-bs-toggle="modal" data-bs-target="#exampleModalprofile"
                onclick="setvalueProfile(<?php echo $mem_id . ','. $fname . ','. $lname . ','. $phone . ','. $email ?>)">Profile</a>
        </li>
        <li><a href="./signOut.php">Sign out</a></li>
        <?php } ?>
    </ul>
</nav>

<script>
function calc() {
    var checkvalue = document.getElementById("check").checked
    if (checkvalue) {
        document.getElementById("first").style.display = "none";
        document.getElementById("cancel1").style.display = "block";

    } else {
        document.getElementById("first").style.display = "block";
        document.getElementById("first").style.marginTop = "13px";
        document.getElementById("cancel1").style.display = "none";
    }
}

function saveProfile() {
    var checkbox = document.getElementById('changepassword')
    if (document.getElementById('fname').value == '') {
        swal("Error", "Please Fill First Name", "error");
    } else if (document.getElementById('lname').value == '') {
        swal("Error", "Please Fill Last Name", "error");
    } else if (document.getElementById('phone').value == '') {
        swal("Error", "Please Fill Phone", "error");
    } else if (document.getElementById('email').value == '') {
        swal("Error", "Please Fill Email", "error");
    } else if (checkbox.checked == true) {
        if (document.getElementById('oldpassword').value == '') {
            swal("Error", "Please Fill Old Password", "error");
        } else if (document.getElementById('newpassword').value == '') {
            swal("Error", "Please Fill New Password", "error");
        } else if (document.getElementById('newpassword').value.length < 4) {
            swal("Error", "Please File Less 4 Alphabet", "error");
        } else if (document.getElementById('confirmpassword').value == '') {
            swal("Error", "Please Fill Confirm Password", "error");
        } else if (document.getElementById('newpassword').value != document.getElementById('confirmpassword')
            .value) {
            swal("Error", "New Password And Confirm Password Not Match", "error");
        } else {
            document.getElementById("submitprofile").submit();
        }
    } else {
        document.getElementById("submitprofile").submit();
    }
}


function showResultProfile(result) {
    if (result == 1) {
        swal({
            title: "Save Success",
            type: "success",
            icon: "success",
        });
        setTimeout(function() {
            location.reload();
        }, 1500);
    } else if (result == 0) {
        swal("Error", "Old Password In Correct", "error");
    } else if (result == 2) {
        swal("Error", "Some Thing Warnning", "error");
    }
}
</script>