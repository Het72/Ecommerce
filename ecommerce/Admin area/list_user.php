<h3 class="text-center">All users</h3>
<table class="table table-bordered mt-4">
    <thead class="text-center">
        <?php
        $get_payment="Select * from user_table";
        $result=mysqli_query($con,$get_payment);
        $row_count=mysqli_num_rows($result);
        if($row_count==0){
            echo "<h3 class='text-center text-danger mt-4'>No Users</h3>";
          }  else{
        
        echo " <tr>
            <th>Sr no</th>
            <th>Username</th>
            <th>User Email</th>
            <th>User Address</th>
            <th>User Mobile</th>  
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='text-center'>";

        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $user_id=$row_data['user_id'];
            $username=$row_data['username'];
            $user_email=$row_data['user_email'];
            $user_address=$row_data['user_address'];
            $user_mobile=$row_data['user_mobile'];            
            $number++; 
            ?>
            <tr>
            <td><?php echo $user_id; ?></td>
            <td><?php echo $username; ?></td>
            <td><?php echo $user_email; ?></td>
            <td><?php echo $user_address; ?></td>
            <td><?php echo $user_mobile; ?></td>
                   
            <td><a href='index.php?all_orders=<?php echo $user_id; ?>' class='text-dark'><i class='fa-solid fa-trash' ></i></a></td>
        </tr>
      <?php  }
    }   ?>
       
        
    </tbody>
</table>