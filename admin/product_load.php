<?php 
    include('../condb.php');
    $sqlmore= '';
    if(Strlen($_POST['brand']) > 1 || Strlen($_POST['year']) > 1 || Strlen($_POST['price']) > 1){
        $sqlmore .= " WHERE ";
    }
    if($_POST['brand']){
        $brand = $_POST['brand'];
        $sqlmore .= " brand = '$brand'";
    }
    if($_POST['year']){
        if(Strlen($_POST['brand']) >= 1 ){
            $sqlmore .= " AND ";
        }
        $year = $_POST['year'];
        $sqlmore .= " year = '$year'";
    }
    if($_POST['price'] >= 1){
        $price = $_POST['price'];
        if(Strlen($_POST['brand']) >= 1 || Strlen($_POST['year']) >= 1){
            $sqlmore .= " AND ";
        }
        if($_POST['price'] == 1000000){
            $endprice = 10000000;
            $sqlmore .= "price BETWEEN $price AND $endprice";
        }elseif($_POST['price'] == 10000000){
            $endprice = 20000000;
            $sqlmore .= "price BETWEEN $price AND $endprice";
        }else{
            $endprice = 20000000;
            $sqlmore .= "price >= 20000000";
        }
    }
    $sql = "SELECT * FROM product $sqlmore ORDER BY date desc";
    $result = mysqli_query($conn, $sql);
    @$numresult = mysqli_num_rows($result)
?>

<?php if($numresult > 0) { ?>
<div class="table-responsive">
    <table class="table" id="table1" style="display: block;max-width: 100vw;word-break: break-all;">
        <thead style="color: #4723D9">
            <tr>
                <th style="width: 10%;min-width: 50px">#</th>
                <th style="width: 10%;min-width: 150px">Brand</th>
                <th style="width: 25%;min-width: 270px">Model</th>
                <th style="width: 5%;min-width: 100px">Year</th>
                <th style="width: 10%;min-width: 150px">Price(Bath)</th>
                <th style="width: 10%;min-width: 150px">Publice at</th>
                <th style="width: 10%;min-width: 70px">View</th>
                <?php if($_COOKIE['level'] != 4) {?>
                <th style="width: 10%;min-width: 50px"></th>
                <th style="width: 10%;min-width: 50px"></th>
                <th style="width: 10%;min-width: 50px"></th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php 
        
        foreach($result as $row) { ?>
            <tr>
                <th scope="row"><a href="../product/<?php echo $row['product_desktop'] ?>" target="_blank"><img
                            src="../product/<?php echo $row['product_desktop'] ?>" width="100px" alt=""></a></th>
                <td class="align-middle"><a href="../productdetail.php?id=<?php echo $row['productID'] ?>"
                        style="color: #000"><?php echo $row['brand'] ?></a>
                </td>
                <td class="align-middle"><?php echo $row['model'] ?></td>
                <td class="align-middle"><?php echo $row['year'] ?></td>
                <td class="align-middle"><?php echo $row['price'] ?></td>
                <td class="align-middle"><?php echo strtoupper(date('d M Y H:m:s', strtotime(@$row['date']))); ?></td>
                <td class="align-middle"><?php echo $row['View'] ?></td>
                <?php if($_COOKIE['level'] != 4) {?>
                <td class="align-middle">
                    <form action="./productEdit.php" method="post" id="formedit">
                        <input type="hidden" name="productID" value="" id="productID123">
                        <a style="cursor: pointer;"
                            onclick="document.getElementById('productID123').value = '<?php echo $row['productID'] ?>';document.getElementById('formedit').submit();"><i
                                class="fas fa-edit"></i></a>
                    </form>
                </td>
                <td class="align-middle">
                    <form action="./productsql.php?type=delete" method="post" id="myForm" target="iframe_target">
                        <input type="hidden" name="productID" value="" id="productID12">
                        <a style="cursor: pointer;"
                            onclick="document.getElementById('productID12').value = '<?php echo $row['productID'] ?>';document.getElementById('myForm').submit();"><i
                                class="far fa-trash-alt"></i></a>
                    </form>
                </td>
                <td class="align-middle">
                    <form action="./productsql.php?type=updateStatus" method="post" id="myFormUpdateStatus"
                        target="iframe_target">
                        <input type="hidden" name="productID" value="" id="productIDupdate">
                        <input type="hidden" name="statusDefaule" value="" id="statusDefaule">
                        <a style="cursor: pointer;"
                            onclick="document.getElementById('productIDupdate').value = '<?php echo $row['productID'] ?>';document.getElementById('statusDefaule').value = '<?php echo $row['status'] ?>';document.getElementById('myFormUpdateStatus').submit();">
                            <?php if($row['status'] == '1'){ ?>
                            <i class="far fa-eye"></i></a>
                        <?php }else{ ?>
                        <i class="far fa-eye-slash"></i>
                        <?php } ?>
                    </form>
                </td>
                <?php } ?>
            </tr>
            <?php }} else {
            echo "<div style='width: 100%;text-align: center'>Data Not Found</div>";
        } ?>
        </tbody>
    </table>
</div>