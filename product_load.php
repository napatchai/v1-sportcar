<link rel="stylesheet" href="style.css">
<?php
// print_r($_POST);
$output = '';
include('./condb.php');
$queryMore = '';
if(Strlen($_POST['brand']) >= 1 || Strlen($_POST['yearcar']) >= 1 || Strlen($_POST['price']) >= 1){
    $queryMore .= 'WHERE ';
}
if(Strlen($_POST['brand']) >= 1){
    $brand = $_POST['brand'];
    $queryMore .= "brand = '$brand' ";
}
if(Strlen($_POST['yearcar']) >= 1){
    $year = $_POST['yearcar'];
    if(Strlen($_POST['brand']) >= 1){
        $queryMore .= " AND ";
    }
    $queryMore .= "year = '$year' ";
}
if(Strlen($_POST['price']) >= 1){
    $price = $_POST['price'];
    if(Strlen($_POST['brand']) >= 1 || Strlen($_POST['yearcar']) >= 1){
        $queryMore .= " AND ";
    }
    if($_POST['price'] == 1000000){
        $endprice = 10000000;
        $queryMore .= "price BETWEEN $price AND $endprice";
    }elseif($_POST['price'] == 10000000){
        $endprice = 20000000;
        $queryMore .= "price BETWEEN $price AND $endprice";
    }else{
        $endprice = 20000000;
        $queryMore .= "price >= 20000000";
    }
}

if($queryMore != ''){
    $queryMore .= " AND status = '1'";
}else{
    $queryMore .= " WHERE status = '1'";
}


$queryProduct = "SELECT * FROM product $queryMore ORDER BY date asc";
$resultProduct = mysqli_query($conn, $queryProduct);
$numresult = mysqli_num_rows($resultProduct);

$widthScreen =  $_POST['screenwidth'];
$page = $_POST['page'] ;
$per_page;
if($widthScreen > 1200){
    $per_page = 8;
}elseif($widthScreen <= 1200){
    $per_page = 4;
}
$pages = ceil($numresult/$per_page);
if($page=="" || $page == 1){
    $page="1";
    }else{
    $page=$page;
    }
    $start    = ($page - 1) * $per_page;
    $sql     = $queryProduct." LIMIT $start,$per_page";
    $query2=mysqli_query($conn, $sql);
    $numresult2 = mysqli_num_rows($resultProduct);

        $setNumPro;
        if($widthScreen > 1200){
            $setNumPro = 4;
        } elseif($widthScreen <= 1200){
            $setNumPro = 2;
        }
        $check = 1;
        if($numresult2 > 0){
        foreach($query2 as $rs) {
            $output .= 
            '<div class="col-6 col-xl-3" style="padding-left: 20px">
            <label for="" class="labelproduct">'. $rs["model"] .'</label> <br>';
             if(($check)%$setNumPro == 0) { 
$output .= '<div class="product-contentend">';
             }else{
                $output .= '<div class="product-content">';
             }
    $output .= '<label for="" class="labelmed">'.$rs["textHeadIcon"] .'</label> <br>
<p class="pevent">'. $rs["descriptionIcon"] .'</p>
<img src="./product/'. $rs["iconproduct"] .'" width="100%" style="padding: 20px" class="productIcon" alt=""> <br>
</div>
<a href="./productdetail.php?id='. $rs['productID'] .'">
    <div class=" discovermore">
        Discover more
    </div>
</a>
</div>';
$check++;
}

$output .= 
'<div class="pageNavigation">
<test aria-label="Page navigation example">
<ull class="pagination justify-content-center">';
if($page == 1){
$output .= '<li class="page-item disabled" id="previous">';
}else{
$output .= '<li class="page-item " id="previous">';
}
$output .= '<a class="page-link" onclick="load_data('.($page-1).')">Previous</a>
</li>';
for($i = 1; $i <= $pages; $i++) { 
    if($i == $page){
        $output .= '<li class="page-item active"><a class="page-link" onclick="load_data('.$i .')">'. $i .'</a>';
}else{
    $output .= '<li class="page-item"><a class="page-link" onclick="load_data('.$i .')">'. $i .'</a>';
}
$output .= '</li>';
}
if($page == $pages){
$output .= '<li class="page-item disabled" id="next">';
}else{
$output .= '<li class="page-item " id="next">';
}
$output .= '<a class=" page-link" onclick="load_data('.($page+1) .')">Next</a>
</li>
</ull>
</test>
</div>';

echo $output;
        }
        else{
            echo "<div style='width: 100%;text-align: center'>Data Not Found</div>";
        }
?>

<script>
var test = '<?php echo $page ?>';
</script>