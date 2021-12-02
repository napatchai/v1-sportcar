<?php 
include('./condb.php');
$output = '';

$queryMore = '';
$queryWhereMore = '';
if(Strlen($_POST['type']) >= 1){
    $queryMore .= 'ORDER by';
    $type = $_POST['type'];
    if($type == 'New'){
        $queryMore .= " date DESC";
    }else{
        $queryMore .= " view DESC";
    }
}
if(Strlen($_POST['price']) >= 1){
    $queryWhereMore .= ' AND ';
    $price = $_POST['price'];
    // if($_POST['price'] == 1000000){
    //     $endprice = 10000000;
    //     $queryWhereMore .= "price BETWEEN $price AND $endprice";
    // }elseif($_POST['price'] == 10000000){
    //     $endprice = 20000000;
    //     $queryWhereMore .= "price BETWEEN $price AND $endprice";
    // }else{
    //     $endprice = 20000000;
    //     $queryWhereMore .= "price >= 20000000";
    // }
    $queryWhereMore .= "date LIKE '_____$price%'";
}

if(Strlen($_POST['year']) >= 1){
    $queryWhereMore .= ' AND ';
    $year = $_POST['year'];
    // if($_POST['price'] == 1000000){
    //     $endprice = 10000000;
    //     $queryWhereMore .= "price BETWEEN $price AND $endprice";
    // }elseif($_POST['price'] == 10000000){
    //     $endprice = 20000000;
    //     $queryWhereMore .= "price BETWEEN $price AND $endprice";
    // }else{
    //     $endprice = 20000000;
    //     $queryWhereMore .= "price >= 20000000";
    // }
    $queryWhereMore .= "date LIKE '$year%'";
}

$queryWhereMore .= " AND statusblog = '1' ";


$query = "SELECT * FROM blog b inner join blog_detail d on d.blogID = b.blogID  WHERE blogpin = '2' $queryWhereMore group by d.blogID   $queryMore  ";
$resule = mysqli_query($conn, $query);
@$numresultBlog = mysqli_num_rows($resule);
?>
<?php 
if($numresultBlog > 0){
$widthScreen =  (int)$_COOKIE['cookieName'];
$page = $_POST['page'] ;
$per_page = 4;
$pages = ceil($numresultBlog/$per_page);
if($page=="" || $page == 1){
    $page="1";
    }else{
    $page=$page;
    }
    $start    = ($page - 1) * $per_page;
    $sql     = $query." LIMIT  $start,$per_page";
    $query2=mysqli_query($conn, $sql);
    foreach($query2 as $row){
        $output .= 
        '<div class="row" style="margin-top: 30px">
        <div class="col-sm-6">
        <img src="./blog/'. $row['thumbnail'] .'" width="100%" height="240px" style="object-fit: cover;" alt="">
        </div>
        <div class="col-sm-6 paddingnews">
        <h5 class="newdescription">'. strtoupper(date('d M Y', strtotime($row['date']))) .'</h5>
        <a href="./blogDetail.php?ID='. $row['blogID'] .'" id="headerlink">
        <h2 class="newssub">'. strtoupper($row['subjectDes']) .'</h2>
        </a>
        <h2 class="newssub" id="headerunlink">'. strtoupper($row['subjectDes']) .'</h2>
        <a href="./blogDetail.php?ID='. $row['blogID'] .'">
        <div class="readmoreblognews">Read more</div>
        </a>
        </div>
        </div>';
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
}else{
    echo "<div style='width: 100%;text-align: center'>Data Not Found</div>";
}
?>