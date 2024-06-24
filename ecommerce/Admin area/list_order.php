<h3 class="text-center">All orders</h3>
<table class="table table-bordered mt-4">
    <thead class="text-center">
        <?php
        $get_order="Select * from user_orders";
        $result=mysqli_query($con,$get_order);
        $row_count=mysqli_num_rows($result);
        echo " <tr>
            <th>Sr no</th>
            <th>Due Amount</th>
            <th>Invoice number</th>
            <th>Total Products</th>
            <th>Order Date</th>  
            <th>Status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='text-center'>";


    if($row_count==0){
        echo "<h3 class='text-center text-danger mt-4'>No orders yet</h3>";
    }
    else{
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id=$row_data['order_id'];
            $user_id=$row_data['user_id'];
            $amount_due=$row_data['amount_due'];
            $invoice_number=$row_data['invoice_number'];
            $total_products=$row_data['total_products'];
            $order_date=$row_data['order_date'];
            $order_status=$row_data['order_status'];
            $number++; 
            ?>
            <tr>
            <td><?php echo $number; ?></td>
            <td><?php echo $amount_due; ?></td>
            <td><?php echo $invoice_number; ?></td>
            <td><?php echo $total_products; ?></td>
            <td><?php echo $order_date; ?></td>
            <td><?php echo $order_status; ?></td>
            <td><a href='index.php?all_orders=<?php echo $user_id; ?>' class='text-dark'><i class='fa-solid fa-trash' ></i></a></td>
        </tr>
      <?php  }
    }   ?>
       
        
    </tbody>
</table>