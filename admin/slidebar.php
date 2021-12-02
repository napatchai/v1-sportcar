<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<style>
@import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

:root {
    --header-height: 3rem;
    --nav-width: 68px;
    --first-color: #4723D9;
    --first-color-light: #AFA5D9;
    --white-color: #F7F6FB;
    --body-font: 'Nunito', sans-serif;
    --normal-font-size: 1rem;
    --z-fixed: 100
}

*,
::before,
::after {
    box-sizing: border-box
}

body {
    position: relative;
    margin: var(--header-height) 0 0 0;
    padding: 0 1rem;
    font-family: var(--body-font);
    font-size: var(--normal-font-size);
    transition: .5s
}

a {
    text-decoration: none
}

.header {
    width: 100%;
    height: var(--header-height);
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 1rem;
    background-color: var(--white-color);
    z-index: var(--z-fixed);
    transition: .5s
}

.header_toggle {
    color: var(--first-color);
    font-size: 1.5rem;
    cursor: pointer
}

.header_img {
    width: 35px;
    height: 35px;
    display: flex;
    justify-content: center;
    border-radius: 50%;
    overflow: hidden
}

.header_img img {
    width: 40px
}

.l-navbar {
    position: fixed;
    top: 0;
    left: -30%;
    width: var(--nav-width);
    height: 100vh;
    background-color: var(--first-color);
    padding: .5rem 1rem 0 0;
    transition: .5s;
    z-index: var(--z-fixed)
}

.nav {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: hidden
}

.nav_logo,
.nav_link {
    display: grid;
    grid-template-columns: max-content max-content;
    align-items: center;
    column-gap: 1rem;
    padding: .5rem 0 .5rem 1.5rem
}

.nav_logo {
    margin-bottom: 2rem
}

.nav_logo-icon {
    font-size: 1.25rem;
    color: var(--white-color)
}

.nav_logo-name {
    color: var(--white-color);
    font-weight: 700
}

.nav_link {
    position: relative;
    color: var(--first-color-light);
    margin-bottom: 1.5rem;
    transition: .3s
}

.nav_link:hover {
    color: var(--white-color)
}

.nav_icon {
    font-size: 1.25rem
}

.show {
    left: 0
}

.body-pd {
    padding-left: calc(var(--nav-width) + 1rem)
}

.active {
    color: var(--white-color)
}

.active::before {
    content: '';
    position: absolute;
    left: 0;
    width: 2px;
    height: 32px;
    background-color: var(--white-color)
}

.height-100 {
    height: 100vh
}

@media screen and (min-width: 768px) {
    body {
        margin: calc(var(--header-height) + 1rem) 0 0 0;
        padding-left: calc(var(--nav-width) + 2rem)
    }

    .header {
        height: calc(var(--header-height) + 1rem);
        padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
    }

    .header_img {
        width: 40px;
        height: 40px
    }

    .header_img img {
        width: 45px
    }

    .l-navbar {
        left: 0;
        padding: 1rem 1rem 0 0
    }

    .show {
        width: calc(var(--nav-width) + 156px)
    }

    .body-pd {
        padding-left: calc(var(--nav-width) + 188px)
    }
}
</style>

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

<body id="body-pd">
    <header class="header" id="header">
        <?php 
        $mem_id = "'" . $_COOKIE['mem_id'] . "'";
        $fname = "'" . $_COOKIE['Fname'] . "'";
        $lname = "'" . $_COOKIE['Lname'] . "'";
        $phone = "'" . $_COOKIE['phone'] . "'";
        $email = "'" . $_COOKIE['email'] . "'";
    ?>
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"><a href="" style="color: #000"
                onclick="setvalueProfile(<?php echo $mem_id . ','. $fname . ','. $lname . ','. $phone . ','. $email ?>)"
                data-bs-toggle="modal" data-bs-target="#exampleModalprofile">
                <i class="far fa-user-circle" style="font-size: 30px"></i></a> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <!-- <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span
                        class="nav_logo-name"></span> </a> -->
                <a href="../index.php" class="nav_logo"> <img src="../img/logo.png" width="25px" alt=""> <span
                        class="nav_logo-name"></span>
                </a>
                <div class="nav_list">
                    <?php if($_COOKIE['level'] == '1' || $_COOKIE['level'] == '3') {?>
                    <a href="./index.php" id="banner" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Banner</span>
                    </a>
                    <?php } ?>
                    <a href="./product.php" id="product" class="nav_link">
                        <i class='bx bx-car nav_icon'></i> <span class="nav_name">Product</span>
                    </a>
                    <a href="./blog.php" id="blog" class="nav_link"> <i class='bx bx-news nav_icon'></i> <span
                            class="nav_name">Blog</span>
                    </a>
                    <?php if($_COOKIE['level'] == '1') { ?>
                    <a href="./user.php" id="user" class="nav_link">
                        <i class='bx bx-user'></i> <span class="nav_name">User</span>
                    </a>
                    <?php } ?>
                    <a href="../index.php" class="nav_link"> <i class='bx bx-show-alt nav_icon'></i> <span
                            class="nav_name">Preview</span>
                    </a>
                </div>
            </div> <a href="../signOut.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span
                    class="nav_name">SignOut</span> </a>
        </nav>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function(event) {

        const showNavbar = (toggleId, navId, bodyId, headerId) => {
            const toggle = document.getElementById(toggleId),
                nav = document.getElementById(navId),
                bodypd = document.getElementById(bodyId),
                headerpd = document.getElementById(headerId)

            // Validate that all variables exist
            if (toggle && nav && bodypd && headerpd) {
                toggle.addEventListener('click', () => {
                    // show navbar
                    nav.classList.toggle('show')
                    // change icon
                    toggle.classList.toggle('bx-x')
                    // add padding to body
                    bodypd.classList.toggle('body-pd')
                    // add padding to header
                    headerpd.classList.toggle('body-pd')
                })
            }
        }

        showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

        /*===== LINK ACTIVE =====*/
        const linkColor = document.querySelectorAll('.nav_link')

        function colorLink() {
            if (linkColor) {
                linkColor.forEach(l => l.classList.remove('active'))
                this.classList.add('active')
            }
        }
        linkColor.forEach(l => l.addEventListener('click', colorLink))

        // Your code to run since DOM is loaded and ready
    });

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