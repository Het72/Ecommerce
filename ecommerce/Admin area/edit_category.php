<?php
if(isset($_GET['edit_category'])){
    $edit_category=$_GET['edit_category'];
    // echo $edit_category;

    $get_categories="Select * from categories where category_id=$edit_category";
    $result=mysqli_query($con,$get_categories);
    $row=mysqli_fetch_assoc($result);
    $category_title=$row['category_title'];
    // echo $category_title;
}

if(isset($_POST['edit_cat'])){
    $cat_title=$_POST['category_title'];

    $update_query="Update categories set category_title='$cat_title' where category_id=$edit_category";
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat);
    echo "<script>alert('Category updated successfully')</script>";
    echo "<script>window.open('./view_categories.php','_self')</script>";

}

?>

<div class="container mt-3">
    <h3 class="text-center">Edit Category</h3>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-3 w-50 m-auto">
            <label for="category_title" class="form-label">Category Title</label>
            <input type="text" name="category_title" id="category_title" class="form-control" required="required"
            value="<?php echo $category_title; ?>">
        </div>
        <input type="submit" name="edit_cat" id="" value="Update Category" class="btn btn-secondary px-2 mb-3">
    </form>
</div>