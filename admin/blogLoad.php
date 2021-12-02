<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<?php 
    include('../condb.php');
    $sqlmore= '';
    if(Strlen($_POST['search']) > 1 ){
        $search = $_POST['search'];
$newDate = date("Y-m-d", strtotime($search));
        $sqlmore .= " WHERE subject LIKE '%$search%' OR subjectDes LIKE '%$search%' OR b.date LIKE '%$newDate%'";
    }
    $sql = "SELECT * FROM blog b INNER JOIN blog_detail d on d.blogID = b.blogID  $sqlmore GROUP BY d.blogID ORDER BY date";
    $result = mysqli_query($conn, $sql);
    @$numresult = mysqli_num_rows($result)
?>

<?php if($numresult > 0) { ?>
<div class="table-responsive">
    <table class="table" id="table1" style="display: block;max-width: 100vw;word-break: break-all;">
        <thead style="color: #4723D9">
            <tr>
                <th style="width:10%;min-width: 50px">#</th>
                <th style="width:10%;min-width: 150px">Name</th>
                <th style="width:45%;min-width: 250px">Shot Description</th>
                <th style="width:15%;min-width: 250px">Public at</th>
                <?php if($_COOKIE['level'] != 4) {?>
                <th style="width:5%;min-width: 50px">Pin</th>
                <th style="width:10%;min-width: 120px">Promotion<input type="radio" name="promotion" checked
                        onchange="changepromotion('')" id="">
                </th>
                <?php } ?>
                <th style="width:5%;min-width: 70px">View</th>
                <?php if($_COOKIE['level'] != 4) {?>
                <th style="width:5%;min-width: 50px"></th>
                <th style="width:5%;min-width: 50px"></th>
                <th style="width:5%;min-width: 50px"></th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php 
        
        foreach($result as $row) { ?>
            <tr>
                <th scope="row"><a href="../blog/<?php echo $row['thumbnail'] ?>" target="_blank"><img
                            src="../blog/<?php echo $row['thumbnail'] ?>" width="100px" alt=""></a></th>
                <td class="align-middle"><a href="../blogDetail.php?ID=<?php echo $row['blogID'] ?>"
                        style="color: #000"><?php echo $row['subject'] ?></a></td>
                <td class="align-middle"><?php echo $row['subjectDes'] ?></td>
                <td class="align-middle"><?php echo strtoupper(date('d M Y H:m:s', strtotime(@$row['date']))); ?></td>
                <?php if($_COOKIE['level'] != 4) {?>
                <?php if($row['blogpin'] == 1) {?>
                <td class="align-middle"><input type="radio" name="pin" checked
                        onchange="changepin('<?php echo $row['blogID'] ?>')" id="<?php echo $row['blogID'] ?>"></td>
                <?php }else{ ?>
                <td class="align-middle"><input type="radio" name="pin"
                        onchange="changepin('<?php echo $row['blogID'] ?>')" id="<?php echo $row['blogID'] ?>"></td>
                <?php } ?>
                <?php if($row['promotion'] == 2) {?>
                <td class="align-middle"><input type="radio" name="promotion" checked
                        onchange="changepromotion('<?php echo $row['blogID'] ?>')" id="<?php echo $row['blogID'] ?>">
                </td>
                <?php }else{ ?>
                <td class="align-middle"><input type="radio" name="promotion"
                        onchange="changepromotion('<?php echo $row['blogID'] ?>')" id="<?php echo $row['blogID'] ?>">
                </td>
                <?php } ?>
                <?php } ?>
                <td class="align-middle"><?php echo $row['view'] ?></td>
                <?php if($_COOKIE['level'] != 4) {?>
                <td class="align-middle">
                    <form action="./blogEdit.php" method="post" id="formedit">
                        <input type="hidden" name="productID" value="" id="productID123">
                        <a style="cursor: pointer;"
                            onclick="document.getElementById('productID123').value = '<?php echo $row['blogID'] ?>';document.getElementById('formedit').submit();"><i
                                class="fas fa-edit"></i></a>
                    </form>
                </td>
                <td class="align-middle">
                    <form action="./blogsql.php?type=delete" method="post" id="myForm" target="iframe_target">
                        <input type="hidden" name="blogID" id="productID1234">
                        <a style="cursor: pointer;"
                            onclick="document.getElementById('productID1234').value = '<?php echo $row['blogID'] ?>';document.getElementById('myForm').submit();"><i
                                class="far fa-trash-alt"></i></a>
                    </form>
                </td>
                <td class="align-middle">
                    <form action="./blogsql.php?type=updateStatus" method="post" id="myFormUpdateStatus"
                        target="iframe_target">
                        <input type="hidden" name="blogID" id="productIDUpdateStatus">
                        <input type="hidden" name="statusDefault" id="statusDefault">
                        <a style="cursor: pointer;"
                            onclick="document.getElementById('productIDUpdateStatus').value = '<?php echo $row['blogID'] ?>';document.getElementById('statusDefault').value = '<?php echo $row['statusblog'] ?>';document.getElementById('myFormUpdateStatus').submit();">
                            <?php if($row['statusblog'] == 1) { ?>
                            <i class="far fa-eye"></i>
                            <?php }else{ ?>
                            <i class="far fa-eye-slash"></i>
                            <?php } ?>

                        </a>
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

<script>
function changepin(id) {
    $.ajax({
        url: "./blogsql.php?type=changepin",
        method: "POST",
        data: {
            id: id
        }
    });
}

function changepromotion(id) {
    //alert('test')
    $.ajax({
        url: "./blogsql.php?type=changepromotion",
        method: "POST",
        data: {
            id: id
        }
    });
}
</script>