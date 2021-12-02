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

<body>
    <form name="add_product" method="post" action="./blogsql.php?type=add" enctype="multipart/form-data"
        id="add_product" name="frmMain" target="iframe_target">
        <br>
        <div class="price">
            <h3 class="bannertext"><input type="text" class="inputbannertext" placeholder="Subject" name="Subject" id=""
                    required>
                <br><br>
                <select name="pinblog" id="" style="width: 200px;margin:auto" class="form-select" required>
                    <option value="">Select Type</option>
                    <option value="1">Pin blog</option>
                    <option value="2">Nonal blog</option>
                </select>
                <br>
                <input type="number" class="form-control" style="width: 250px;margin:auto" placeholder="Price"
                    name="price" id="" required>
            </h3>
        </div>
        <br>
        <div class="wrapper">
            <div class="box" style="height: 300px">
                <h5 style="margin-top: 20px;margin-left: 10px">Thumbnail</h5>
                <div class="js--image-preview" style="height: 65%" id="iconProduct"></div>
                <div class="upload-options" style="margin-top: 20px;">
                    <label>
                        <input type="file" name="Thumbnail" class="image-upload form-control" accept="image/*" />
                        <br><br>
                        <br>
                    </label>
                </div>
            </div>
        </div>
        <br>
        <div id="addmore">
            <div class="wrapper" style="margin-top: 30px">
                <div class="box" style="height: 80vh">
                    <h4 style="margin-top: 20px;margin-left: 10px">Banner Desktop</h4>
                    <div class="js--image-preview"></div>
                    <div class="upload-options" style="margin-top: 20px;">
                        <label>
                            <input type="file" name="bannerDesktop[]" class="image-upload form-control" accept="image/*"
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
                            <input type="file" name="bannerMobile[]" class="image-upload form-control" accept="image/*"
                                required />
                            <br><br>
                            <br>
                        </label>
                    </div>
                </div>
            </div>
            <div class="subjectblog">
                <input type="text" name="subject[]" class="subject" placeholder="Subject" required>

                <br><br>
                <textarea name="description[]" id="textedit" rows="5" class="textareaBlog"></textarea>

            </div>
        </div>

        <div class="addBlogMore" id="added">
            +
        </div>

        <br>
        <div class="col-12">
            <div class="btnsave">
                <input type="submit" id="submit" class="btn btn-success"></input>
            </div>
        </div>
        <br>
        <iframe id="iframe_target" name="iframe_target" src="#"
            style="width:0;height:0;border:0px solid #fff;"></iframe>
    </form>
</body>

<script src="../ckeditor/ckeditor.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById("blog").classList.add('active')
})

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
        $('#addmore').append(
            ' <div id="row1' + i +
            '"><div class="wrapper" style="margin-top: 30px"> <div class="box" style="height: 80vh"> <h4 style="margin-top: 20px;margin-left: 10px">Banner Desktop</h4> <div class="js--image-preview"></div> <div class="upload-options" style="margin-top: 20px;"> <label> <input type="file" name="bannerDesktop[]" class="image-upload form-control" accept="image/*" required /> <br><br> <br> </label> </div> </div> <div class="box" style="height: 80vh"> <h4 style="margin-top: 20px;margin-left: 10px">Banner Mobile</h4> <div class="js--image-preview"></div> <div class="upload-options" style="margin-top: 20px;"> <label> <input type="file" name="bannerMobile[]" class="image-upload form-control" accept="image/*" required /> <br><br> <br> </label> </div> </div> </div> <div class="test">  <textarea name="description[]" id="textedit' +
            i +
            '" rows="5" class="textareaBlog"></textarea> <div class="deleteBlog btn_remove btn_removeimg" id="' +
            i + '">Delete <i class="bx bx-up-arrow-alt " ></i></div> </div>'
        );
        CKEDITOR.replace('textedit' + i, {
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
        test();
    });
    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row1' + button_id + '').remove();
    });
});
</script>

<script>
CKEDITOR.replace('textedit', {
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