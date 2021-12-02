<?php include('./header.php') ?>
<?php include('./navbar.php') ?>
<!-- //? Start Banner -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="3500">
            <img src="./img/Hero_Banner.png" class="d-block w-100 imgcoversingup" id="bannersignup" alt="...">
        </div>
    </div>
</div>
<!-- //? End banner -->

<!-- //? Start Content Sing up -->
<form name="frmMain" method="post" action="./signUpSql.php" target="iframe_target">
    <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
    <div class="singup">
        <div class="row">
            <div class="col-12 form headsignup">
                <h2>Sign Up</h2>
            </div>
            <div class="col-4 col-sm-2 form">
                Name
            </div>
            <div class="col-8 col-sm-4 form">
                <input name="Fname" type="text" class="forminput" required>
            </div>
            <div class="col-4 col-sm-2 form surname" required>
                Surname
            </div>
            <div class="col-8 col-sm-4 form">
                <input name="Lname" type="text" class="forminput" required>
            </div>
            <div class="col-4 col-sm-2 form">
                Phone
            </div>
            <div class="col-8 col-sm-10 form">
                <input name="phone" type="text" class="forminput" required>
            </div>
            <div class="col-4 col-sm-2 form">
                Email
            </div>
            <div class="col-8 col-sm-10 form">
                <input name="email" type="email" class="forminput" required>
            </div>
            <div class="col-4 col-sm-2 form">
                Password
            </div>
            <div class="col-8 col-sm-10 form">
                <input name="password" type="password" class="forminput" required>
            </div>
            <div class="col-4 col-sm-2 form">
                Objective for <br>
                member
            </div>
            <div class="col-8 col-sm-10 form">
                <div class="flex_container">
                    <div class="current_items">
                        <div class="wrapper_input">
                            <input type="radio" name="type-use" id="radio1" checked="checked" value="Purchase Car">
                            <label for="radio1" class="labelradio">Purchase Car</label>
                        </div>
                        <div class="wrapper_input">
                            <input type="radio" name="type-use" id="radio2" value="Offer for sale">
                            <label for="radio2" class="labelradio">Offer for sale</label>
                        </div>
                        <div class="wrapper_input">
                            <input type="radio" name="type-use" id="radio3" value="Dealer">
                            <label for="radio3" class="labelradio">Dealer</label>
                        </div>
                        <div class="wrapper_input">
                            <input type="radio" name="type-use" id="radio4" value="Other">
                            <label for="radio4" class="labelradio">Other</label>
                            <span><input type="text" class="forminputother"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 formsubmit">
                <button type="submit" class="btn btn-dark" style="padding: 6px 22px">Submit</button>

            </div>
        </div>
    </div>
</form>
<!-- //? Start popup message -->
<?php include('./message.php') ?>
<!-- //? pop message -->
<!-- //? End Content Sing up -->
<?php include('./contentfooter.php') ?>
<script>
var width1 = screen.width;
setimg(width1);

window.addEventListener("resize", function(event) {
    setimg(document.body.clientWidth);
})

function setimg(size) {
    if (size <= 600) {
        document.getElementById("bannersignup").src = "./img/car-5840866_192021.png";
        document.getElementById("bannersignup").style.height = "auto";
    } else {
        document.getElementById("bannersignup").src = "./img/Hero_Banner.png";
    }
}

function showResult(result) {
    if (result == 1) {
        swal({
            title: "Singup Success",
            type: "success",
            icon: "success",
        });
        setTimeout(function() {
            window.location = "./login.php"
        }, 1500);
    } else if (result == 2) {
        swal("Error", "Email has been used", "error");
    } else if (result == 3) {
        swal("Error", "Eomething weaning", "error");
    }
}
</script>
<?php include('./footer.php') ?>