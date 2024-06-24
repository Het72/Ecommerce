<h3 class="text-center">All Brands</h3>
<table class="table table-bordered mt-4">
    <thead class="bg-info ">
        <tr class="text-center">
            <th>Sr no</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="text-center">
        
      <?php
      $select_brands="Select * from brands";
      $result=mysqli_query($con,$select_brands);
      $number=0;
      while($row=mysqli_fetch_assoc($result)){
          $brand_id=$row['brand_id'];
          $brand_title=$row['brand_title'];
          $number++;
        
  ?>
        <tr>
            <td><?php echo $number; ?></td>
            <td><?php echo $brand_title; ?></td>
            <td><a href='index.php?edit_brands=<?php echo $brand_id; ?>' class='text-dark'>
                <i class='fa-solid fa-pen-to-square'></i></a></td>

            <td><a href='index.php?delete_brands=<?php echo $brand_id; ?>'
                type="button" class="text-dark" data-bs-toggle="modal" 
                data-bs-target="#exampleModal"><i class='fa-solid fa-trash' ></i></a></td>
        </tr>
        <?php
        }
    ?>
    </tbody>
</table>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="./index.php?view_brands"
        class="text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a  href='index.php?delete_brands=<?php echo $brand_id; ?>'
                class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>