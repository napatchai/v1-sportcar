<?php include('./header.php') ?>
<?php include('./navbar.php') ?>
<div class="who">
    <img src="./img/bannerblog.png" alt="Snow" class="bglogin" id="bannerlogin">
    <form name="frmMain" method="post" action="./checklogin.php" target="iframe_target">
        <iframe id="iframe_target" name="iframe_target" src="#"
            style="width:0;height:0;border:0px solid #fff;"></iframe>
        <div class="centered-login">
            <h2 style="margin-top: 40px">Login</h2>
            <div class="row">
                <div class="col-5 col-sm-3 form" style="padding-left: 50px">
                    Email
                </div>
                <div class="col-7 col-sm-9 form" style="padding-right: 40px">
                    <input name="email" type="email" class="forminput" required>
                </div>
                <div class="col-5 col-sm-3 form" style="padding-left: 50px">
                    password
                </div>
                <div class="col-7 col-sm-9 form" style="padding-right: 40px;text-align: right">
                    <input name="password" type="password" class="forminput" required><br>
                    <a href="#" style="color: #000">
                        <span style="font-size: 13px">

                        </span>
                    </a>
                </div>
                <div class="col-12 formsubmit-login">
                    <button type="submit" class="btn btn-dark" style="padding: 6px 22px">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include('./message.php') ?>
<?php include('./contentfooter.php') ?>
<script>
var width1 = screen.width;
setimg(width1);

window.addEventListener("resize", function(event) {
    setimg(document.body.clientWidth);
})

function setimg(size) {
    if (size <= 600) {
        document.getElementById("bannerlogin").src = "./img/bannerblogMobile.png";
    } else {
        document.getElementById("bannerlogin").src = "./img/bannerblog.png";
    }
}

function showResult(result) {
    if (result == 1) {
        swal("error", "Invalid Email or Password !!", "error");
    } else if (result == 0) {
        swal({
            title: "Login Success",
            type: "success",
            icon: "success",
        });
        setTimeout(function() {
            window.location = "./index.php"
        }, 1500);
    } else if (result == 2) {
        swal({
            title: "Login Success",
            type: "success",
            icon: "success",
        });
        setTimeout(function() {
            window.location = "./index.php"
        }, 1500);
    }
}
</script>
<?php include('./footer.php') ?>