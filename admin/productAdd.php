<?php include('./header.php') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<?php include('./slidebar.php') ?>

<style>
@import url(https://fonts.googleapis.com/icon?family=Material+Icons);
@import url('https://fonts.googleapis.com/css?family=Raleway');

// variables
$base-color: cadetblue;
$base-font: 'Raleway',
sans-serif;



::-webkit-scrollbar {
    -webkit-appearance: none;
    width: 7px;
}

::-webkit-scrollbar-thumb {
    border-radius: 4px;
    background-color: rgba(0, 0, 0, .5);
    box-shadow: 0 0 1px rgba(255, 255, 255, .5);
}

body {
    font-family: $base-font;
    height: 100vh;
    /* display: flex; */
    /* justify-content: center; */
    /* align-items: center; */
    /* flex-direction: column; */
    background-color: lighten($base-color, 45%);
}

.wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    overflow-x: scroll;
}

.wrappermore {
    display: flex;
    overflow-x: scroll;
}

h1 {
    font-family: inherit;
    margin: 0 0 .75em 0;
    color: desaturate($base-color, 15%);
    text-align: center;
}

.box {
    display: block;
    min-width: 300px;
    height: 300px;
    margin: 10px;
    background-color: white;
    border-radius: 5px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
    overflow: hidden;
}

.boxadd1 {
    display: block;
    min-width: 300px;
    height: 300px;
    margin: 10px;
    background-color: white;
    border-radius: 5px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
    overflow: hidden;
}

.upload-options {
    position: relative;
    height: 75px;
    background-color: $base-color;
    cursor: pointer;
    overflow: hidden;
    text-align: center;
    transition: background-color ease-in-out 150ms;

    &:hover {
        background-color: lighten($base-color, 10%);
    }

    & input {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    & label {
        display: flex;
        align-items: center;
        width: 100%;
        height: 100%;
        font-weight: 400;
        text-overflow: ellipsis;
        white-space: nowrap;
        cursor: pointer;
        overflow: hidden;

        &::after {
            content: 'add';
            font-family: 'Material Icons';
            position: absolute;
            font-size: 2.5rem;
            color: rgba(230, 230, 230, 1);
            top: calc(50% - 2.5rem);
            left: calc(50% - 1.25rem);
            z-index: 0;
        }

        & span {
            display: inline-block;
            width: 50%;
            height: 100%;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            vertical-align: middle;
            text-align: center;

            &:hover i.material-icons {
                color: lightgray;
            }
        }
    }
}


.js--image-preview {
    height: 78%;
    width: 100%;
    position: relative;
    overflow: hidden;
    background-image: url('');
    background-color: white;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;

    &::after {
        content: "photo_size_select_actual";
        font-family: 'Material Icons';
        position: relative;
        font-size: 4.5em;
        color: rgba(230, 230, 230, 1);
        top: calc(50% - 3rem);
        left: calc(50% - 2.25rem);
        z-index: 0;
    }

    &.js--no-default::after {
        display: none;
    }

    &:nth-child(2) {
        background-image: url('http://bastianandre.at/giphy.gif');
    }
}

i.material-icons {
    transition: color 100ms ease-in-out;
    font-size: 2.25em;
    line-height: 55px;
    color: white;
    display: block;
}

.drop {
    display: block;
    position: absolute;
    background: transparentize($base-color, .8);
    border-radius: 100%;
    transform: scale(0);
}

.animate {
    animation: ripple 0.4s linear;
}

@keyframes ripple {
    100% {
        opacity: 0;
        transform: scale(2.5);
    }
}
</style>


</head>

<body style="background-color: #F6F6FB">
    <br>
    <div class="boxtest">
        <form name="add_product" method="post" style="padding-left: 20px;padding-right: 20px"
            action="./productsql.php?type=add" id="add_product" enctype="multipart/form-data" name="frmMain"
            target="iframe_target">
            <iframe id="iframe_target" name="iframe_target" src="#"
                style="width:0;height:0;border:0px solid #fff;"></iframe>
            <br>
            <div class="addicon">
                <!-- <h4 id="modelIcon"></h4> -->
                <h5 style="margin-top: 20px">
                    Brand <br>
                    <!-- <select name="brand" class="form-select" style="margin-top: 10px"
                        aria-label="Default select example" id="">
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
                    </select> -->
                    <input type="text" name="brand" style="text-align: center;margin-top: 10px">

                </h5>

                <h5 style="margin-top: 20px">
                    Model <br>
                    <input type="text" name="headTexticon" style="text-align: center;margin-top: 10px" required id="">
                </h5>

                <p style="margin-top: 30px">
                <h5>Short Description</h5><input type="text" name="descriptionicon"
                    style="text-align: center;width: 30%" required id=""></p>
                <div class="" style="margin-top: 30px"></div>
                <h5 style="margin-bottom: 10px">Year</h5>
                <select id="" class="form-select" name="year" style="width: 150px;margin: auto" required>
                    <option value="">Select Year</option>
                    <?php 
                    $now=date("Y")+543; 
                    $start = $now - 100;
                    echo $start;
                    echo $now;
                    for($i = $now; $i >= $start; $i--){
                        ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php  }
                    ?>

                </select>
                <br>
                <div class="wrapper">
                    <div class="box" style="height: 300px">
                        <h5 style="margin-top: 20px;margin-left: 10px">Icon Car</h5>
                        <div class="js--image-preview" style="height: 65%" id="iconProduct"></div>
                        <div class="upload-options" style="margin-top: 20px;">
                            <label>
                                <input type="file" name="iconProduct" class="image-upload form-control"
                                    accept="image/*" />
                                <br><br>
                                <br>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="wrapper">
                <div class="box" style="height: 80vh">
                    <h4 style="margin-top: 20px;margin-left: 10px">Banner Desktop</h4>
                    <div class="js--image-preview"></div>
                    <div class="upload-options" style="margin-top: 20px;">
                        <label>
                            <input type="file" name="bannerDesktop" class="image-upload form-control" accept="image/*"
                                required />
                            <br><br>
                            <br>
                        </label>
                    </div>
                </div>
                <div class="box" style="height: 80vh">
                    <h4 style="margin-top: 20px;margin-left: 10px">Banner Mobile</h4>
                    <div class="js--image-preview"></div>
                    <div class="upload-options" style="margin-top: 20px;">
                        <label>
                            <input type="file" name="bannerMobile" class="image-upload form-control" accept="image/*"
                                required />
                            <br><br>
                            <br>
                        </label>
                    </div>
                </div>
            </div>
            <div class="price">

                <h2 class="bannertext"><input type="text" class="inputbannertext" placeholder="Model" name="model"
                        onkeyup="setModelIcon()" id="model" required></h2>
                <h5 class="pricetext">CONDITION: <span style="font-weight: bold;">
                        <select name="condition" id="" required>
                            <option value="New">New</option>
                            <option value="New">New</option>
                        </select></span> |
                    PRICE:
                    <input type="number" style="width: 120px" name="price" required>
                    BAHT
                </h5>
            </div>
            <div class="wrappermore" id="imageproduct">
                <div class="boxadd1" style="height: 80vh;text-align: center">
                    <div class="boxadd" id="added">
                        <div class="addproducr">+</div>
                    </div>
                </div>
                <div class="box" style="height: 80vh">
                    <h4 style="margin-top: 20px;margin-left: 10px">Image more </h4>
                    <div class="js--image-preview"></div>
                    <div class="upload-options" style="margin-top: 20px;">
                        <label>
                            <input type="file" class="image-upload form-control" name="imageproduct[]" accept="image/*"
                                required />
                            <br><br>
                            <br>
                        </label>
                    </div>
                </div>
            </div>
            <!-- <div class="price">
            <h2 class="bannertext">EXTERIOR + INTERIOR</h2>
            <p class="pricetext"><input type="text" name="exterior" style="width: 80%;text-align: center" id=""></p>
        </div> -->
            <br>
            <div class="price">
                <textarea name="exterior" required></textarea>
            </div>
            <br>
            <div class="wrapper">
                <div class="box" style="height: 80vh">
                    <h4 style="margin-top: 20px;margin-left: 10px">Banner Desktop</h4>
                    <div class="js--image-preview"></div>
                    <div class="upload-options" style="margin-top: 20px;">
                        <label>
                            <input type="file" name="bannerDesktopDes" class="image-upload form-control"
                                accept="image/*" required />
                            <br><br>
                            <br>
                        </label>
                    </div>
                </div>
                <div class="box" style="height: 80vh">
                    <h4 style="margin-top: 20px;margin-left: 10px">Banner Mobile</h4>
                    <div class="js--image-preview"></div>
                    <div class="upload-options" style="margin-top: 20px;">
                        <label>
                            <input type="file" name="bannerMobileDes" class="image-upload form-control" accept="image/*"
                                required />
                            <br><br>
                            <br>
                        </label>
                    </div>
                </div>
            </div>

            <br>
            <div class="price">
                <textarea name="exterior2" required></textarea>
            </div>
            <br>

            <!-- <div class="price">
            <h2 class="bannertext">EQUIPMENT HIGHLIGHTS</h2>
        </div> -->

            <!-- //? Start ref -->
            <!-- <div class="container" style="margin-bottom: 30px;margin-top: 50px">
            <div class="row" id="detail">
                <div class="col-md-12 ">
                    <div class="ref refadded" id="refadded">
                        + Add New
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="ref" style="padding-top: 5px">
                        <input type="text" name="equipment[]" style="padding-left: 10px;height: 20px;width: 90%" id=""
                            required>
                    </div>
                </div>

            </div>
        </div> -->
            <!-- //? End ref -->
            <!-- <br>
        <div class="addicon">
            <h4 id="modelIcon"></h4>
            <h5 style="margin-top: 30px"><input type="text" name="headTexticon" style="text-align: center;" required
                    id=""></h5>
            <p style="margin-top: 30px"><input type="text" name="descriptionicon" style="text-align: center;" required
                    id=""></p>
            <div class="wrapper">
                <div class="box" style="height: 300px">
                    <h5 style="margin-top: 20px;margin-left: 10px">Icon Car</h5>
                    <div class="js--image-preview" style="height: 65%" id="iconProduct"></div>
                    <div class="upload-options" style="margin-top: 20px;">
                        <label>
                            <input type="file" name="iconProduct" class="image-upload form-control" accept="image/*" />
                            <br><br>
                            <br>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <br> -->
            <div class="col-12">
                <div class="btnsave">
                    <input type="submit" id="submit" class="btn btn-success"></input>
                </div>
            </div>
            <br>
        </form>
    </div>
</body>


<script src="../ckeditor/ckeditor.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById("product").classList.add('active')
})

function setModelIcon() {
    // var model = document.getElementById("model").value;
    // document.getElementById("modelIcon").innerHTML = model
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

function initImageUpload(box) {
    let uploadField = box.querySelector('.image-upload');

    uploadField.addEventListener('change', getFile);

    function getFile(e) {
        let file = e.currentTarget.files[0];
        checkType(file);
    }

    function previewImage(file) {
        let thumb = box.querySelector('.js--image-preview'),
            reader = new FileReader();

        reader.onload = function() {
            thumb.style.backgroundImage = 'url(' + reader.result + ')';
        }
        reader.readAsDataURL(file);
        thumb.className += ' js--no-default';
    }

    function checkType(file) {
        let imageType = /image.*/;
        if (!file.type.match(imageType)) {
            throw 'Datei ist kein Bild';
        } else if (!file) {
            throw 'Kein Bild gewählt';
        } else {
            previewImage(file);
        }
    }

}

// initialize box-scope
var boxes = document.querySelectorAll('.box');

for (let i = 0; i < boxes.length; i++) {
    let box = boxes[i];
    initDropEffect(box);
    initImageUpload(box);
}

function test() {
    var boxes = document.querySelectorAll('.box');

    for (let i = 0; i < boxes.length; i++) {
        let box = boxes[i];
        initDropEffect(box);
        initImageUpload(box);
    }
}


/// drop-effect
function initDropEffect(box) {
    let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;

    // get clickable area for drop effect
    area = box.querySelector('.js--image-preview');
    area.addEventListener('click', fireRipple);

    function fireRipple(e) {
        area = e.currentTarget
        // create drop
        if (!drop) {
            drop = document.createElement('span');
            drop.className = 'drop';
            this.appendChild(drop);
        }
        // reset animate class
        drop.className = 'drop';

        // calculate dimensions of area (longest side)
        areaWidth = getComputedStyle(this, null).getPropertyValue("width");
        areaHeight = getComputedStyle(this, null).getPropertyValue("height");
        maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));

        // set drop dimensions to fill area
        drop.style.width = maxDistance + 'px';
        drop.style.height = maxDistance + 'px';

        // calculate dimensions of drop
        dropWidth = getComputedStyle(this, null).getPropertyValue("width");
        dropHeight = getComputedStyle(this, null).getPropertyValue("height");

        // calculate relative coordinates of click
        // logic: click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center
        x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10) / 2);
        y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10) / 2) - 30;

        // position drop and animate
        drop.style.top = y + 'px';
        drop.style.left = x + 'px';
        drop.className += ' animate';
        e.stopPropagation();

    }
}
</script>

<script>
$(document).ready(function() {
    var i = 1
    var d = 1
    $('#added').click(function() {
        i++;
        $('#imageproduct').append(
            '<div id="row1' + i +
            '" class="box" style="height: 80vh"><h4 style="margin-top: 20px;margin-left: 10px">Image more <span style = "float: right;padding-right: 15px;font-size: 20px;cursor: pointer;" > <i class ="far fa-trash-alt btn_remove" id = "' +
            i +
            '"></i></span></h4><div class="js--image-preview"></div><div class="upload-options" style="margin-top: 20px;"><label><input type="file" class="image-upload form-control" name="imageproduct[]" accept="image/*" required /><br><br><br></label></div></div>'
        );
        test();
    });
    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row1' + button_id + '').remove();
    });



    $('#refadded').click(function() {
        d++;
        $('#detail').append(
            '<div class="col-md-6 " id="row' + d +
            '"><div class="ref" style="padding-top: 5px"><input type="text" name="equipment[]" style="padding-left: 10px;height: 20px;width: 90%" id="" required><span style="margin-left: 10px"><i class="far fa-trash-alt btn_removeDes" id="' +
            d + '"></i></div></div>'
        );
    });
    $(document).on('click', '.btn_removeDes', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
});


// $('#submit').click(function() {
//     $.ajax({
//         url: "name.php",
//         method: "POST",
//         data: $('#add_name').serialize(),
//         success: function(data) {
//             alert(data);
//             $('#add_name')[0].reset();
//         }
//     });
// });
</script>

<script>
CKEDITOR.replace('exterior', {
    height: 300,
    // extraPlugins: 'youtube',
    uiColor: '#ffffff',

    // Configure your file manager integration. This example uses CKFinder 3 for PHP.
    // filebrowserBrowseUrl: './upload',
    filebrowserUploadMethod: 'form',
    // filebrowserImageBrowseUrl: './upload',
    filebrowserUploadUrl: './testupload.php'
    // filebrowserImageUploadUrl: '/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Images',
    // removeButtons: 'PasteFromWord'
});

CKEDITOR.replace('exterior2', {
    height: 300,
    // extraPlugins: 'youtube',
    uiColor: '#ffffff',

    // Configure your file manager integration. This example uses CKFinder 3 for PHP.
    // filebrowserBrowseUrl: './upload',
    filebrowserUploadMethod: 'form',
    // filebrowserImageBrowseUrl: './upload',
    filebrowserUploadUrl: './testupload.php'
    // filebrowserImageUploadUrl: '/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Images',
    // removeButtons: 'PasteFromWord'
});
</script>

</html>