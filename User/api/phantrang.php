<?php
//TÌM KIẾM
if(isset($_GET['search']))
{
    $search=$_GET['search'];
    $query_total_search="SELECT COUNT(prodID) AS total FROM product WHERE prodName LIKE '%".$search."%'";
    $total=DP::run_query($query_total_search,[],2);
 
}
//PHÂN LOẠI
else if(isset($_GET['cat']) && $_GET['cat']!=0)
{
    $cat=$_GET['cat'];
    $query_total_cat="SELECT COUNT(prodID) AS total FROM product WHERE catID=?";
    $total=DP::run_query($query_total_cat,[$cat],2);
}
else if(isset($_GET['price1']) && $_GET['price1']!=0)
{
    $price=$_GET['price1'];
    $query_price="SELECT COUNT(prodID) AS total FROM product WHERE prodPrice >= $price";
    $total=DP::run_query($query_price,[],2);
}
else if(isset($_GET['price2']) && $_GET['price2']!=0)
{
    $price=$_GET['price2'];
    $query_price="SELECT COUNT(prodID) AS total FROM product WHERE prodPrice >= $price";
    $total=DP::run_query($query_price,[],2);
}
else if(isset($_GET['price3']) && $_GET['price3']!=0)
{
    $price=$_GET['price3'];
    $query_price="SELECT COUNT(prodID) AS total FROM product WHERE prodPrice >= $price";
    $total=DP::run_query($query_price,[],2);
}
else if(!isset($_GET['search']) || !isset($_GET['cat']) || !isset($_GET['price1']) || !isset($_GET['price2']) || !isset($_GET['price3']) || $_GET['cat']==0)
{
    $query_total="SELECT COUNT(prodID) AS total FROM product";
    $total=DP::run_query($query_total,[],2);
}

// kiểm tra bảng đã có dữ liệu chưa
if($total!=null && count($total)>0)
{
    $number_product=$total[0]['total'];
}

    $page=ceil($number_product/9);

$current_page=1;
if(isset($_GET['page']))
{
    $current_page=$_GET['page'];
}
$index=($current_page-1)*9;





?>