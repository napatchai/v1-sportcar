<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.container {
    position: relative;
    width: 100%;
    height: 400px;
}

.image-angled {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.image-angled--top {
    background: url(./img/bannerproduct.png) no-repeat center center;
    -webkit-clip-path: polygon(0 0, 0% 100%, 100% 20%);
    clip-path: polygon(0 0, 0% 200%, 100% 0);
}

.image-angled--bottom {
    background: url(./img/bannerblog.png) no-repeat center center;
    -webkit-clip-path: polygon(0 100%, 100% 100%, 100% 0);
    clip-path: polygon(45% 100%, 100% 100%, 100% -350%);
}
</style>

<body>
    <div class="container">
        <div class="image-angled image-angled--top"></div>
        <div class="image-angled image-angled--bottom"></div>
    </div>
</body>

</html>