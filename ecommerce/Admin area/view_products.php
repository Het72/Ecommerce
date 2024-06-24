<h2 class="text-center text-success">All Products</h2>
<table class="table table-bordered mt-4">
    <thead class="text-center bg-info">
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary-subtle text-dark">
        <?php 
$get_product="Select * from product";
$result=mysqli_query($con,$get_product);
$number=0;
while($row=mysqli_fetch_assoc($result)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_image_1=$row['product_image_1'];
    $product_price=$row['product_price'];
    $status=$row['status'];
    $number++;
    ?>
    <tr class='text-center'>
            <td><?php echo $number; ?></td>
            <td><?php echo $product_title; ?></td>
            <td><img src='./product images/<?php echo $product_image_1; ?>' class='p_img'/></td>
            <td><?php echo $product_price; ?></td>
            <td><?php 
            $get_count="Select * from orders_pending where product_id=$product_id";
            $result_count=mysqli_query($con,$get_count);
            $rows_count=mysqli_num_rows($result_count);
            echo $rows_count;

            ?></td>
            <td><?php echo $status; ?></td>

            <td><a href='index.php?edit_products=<?php echo $product_id; ?>' class='text-dark'>
                <i class='fa-solid fa-pen-to-square'></i></a></td>

            <td><a href='index.php?delete_products=<?php echo $product_id; ?>' class='text-dark'>
                <i class='fa-solid fa-trash'></i></a></td>
        </tr>
 <?php
    }    
                
    ?>
        
    </tbody>
</table>