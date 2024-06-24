<h3 class="text-center">All Categories</h3>
<table class="table table-bordered mt-4">
    <thead class="bg-info ">
        <tr class="text-center">
            <th>Sr no</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="text-center">

        <?php

        $select_category="Select * from categories";
        $result=mysqli_query($con,$select_category);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $category_id=$row['category_id'];
            $category_title=$row['category_title'];
            $number++;
        
    ?>
        <tr>
            <td><?php echo $number; ?></td>
            <td><?php echo $category_title; ?></td>
            <td><a href='index.php?edit_category=<?php echo $category_id; ?>' class='text-dark'>
                <i class='fa-solid fa-pen-to-square'></i></a></td>

            <td><a href='index.php?delete_category=<?php echo $category_id; ?>' class='text-dark'>
                <i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
        }
    ?>
    </tbody>
</table>