<?php
if(isset($_GET['delete_brand'])){
    $delete_brand=$_GET['delete_brand'];
    // echo $delete_brands;

    $delete_query="Delete from brands where brand_id=$delete_brand";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('Brand deleted successfully')</script>";
        echo "<script>window.open('./view_brands.php','_self')</script>";
    
    }
}


?>