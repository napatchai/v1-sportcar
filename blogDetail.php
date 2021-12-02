<?php include('./header.php') ?>
<?php include('./navbar.php') ?>
<?php include('./condb.php'); ?>
<?php 
$blogID = $_GET['ID'];
$query = "SELECT * FROM blog b INNER JOIN blog_detail d ON d.blogID = b.blogID WHERE b.blogID = '$blogID'";
$result = mysqli_query($conn, $query);
?>
<div class="blogdetail">
    <div class="container">
        <?php 
        $z = 0;
        foreach($result as $rs) { 
        if($z == 0) {
            $newView = $rs['view'] + 1;
            $sqlUpdate = "UPDATE blog SET view = $newView WHERE blogID = '$blogID'";
            $resultUpdate = mysqli_query($conn, $sqlUpdate);
        ?>
        <h2><?php echo $rs['subject'] ?></h2>
        <?php }  ?>
        <div class="blogimgheader">
            <!-- <img src="./blog/<?php echo $rs['blog_desktop'] ?>" width="100%" alt=""> -->
            <img src="./blog/<?php echo $rs['blog_desktop'] ?>" class="imgdesktop"
                style="width: 100%;object-fit: contain;" alt="...">
            <img src="./blog/<?php echo $rs['blog_mobile'] ?>" class="imgmobile" style="width: 100%" alt="...">
        </div>
        <div class="textheader" style="word-break: break-word;">
            <?php if($z == 0) { ?>
            <h5><?php echo strtoupper(date('d M Y', strtotime($rs['date']))); ?></h5>
            <?php } ?>
            <h3><?php echo $rs['subjectDes'] ?></h3>
            <p><?php echo $rs['description'] ?></p>
        </div>
        <?php $z++ ?>
        <?php } ?>
    </div>
</div>

<?php 
$query = "SELECT * FROM blog b inner join blog_detail d on d.blogID = b.blogID WHERE blogpin = '2' group by d.blogID ORDER BY date desc LIMIT 2";
$resulequery = mysqli_query($conn, $query);
?>

<div class="blogmore">
    <h2 class="lineh2"><span class="linespan">Other News</span></h2>
    <br>
    <?php foreach($resulequery as $rs){ ?>
    <div class="row" style="margin-top: 30px">
        <div class="col-sm-6">
            <img src="./blog/<?php echo $rs['thumbnail'] ?>" width="100%" height="240px" style="object-fit: cover;"
                alt="">
        </div>
        <div class="col-sm-6 paddingnews">
            <h5 class="newdescription"><?php echo strtoupper(date('d M Y', strtotime($rs['date']))) ?></h5>
            <a href="./blogDetail.php?ID=<?php echo $rs['blogID'] ?>" id="headerlink">
                <h2 class="newssub"><?php echo strtoupper($rs['subjectDes']) ?></h2>
            </a>
            <h2 class="newssub" id="headerunlink"><?php echo strtoupper($rs['subjectDes']) ?></h2>
            <a href="./blogDetail.php?ID=<?php echo $rs['blogID'] ?>">
                <div class="readmoreblognews">Read more</div>
            </a>
        </div>
    </div>
    <?php } ?>
</div>
<?php include('./message.php') ?>
<?php include('./contentfooter.php') ?>
<?php include('./footer.php') ?>