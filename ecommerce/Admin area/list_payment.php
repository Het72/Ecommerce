<h3 class="text-center">All Payments</h3>
<table class="table table-bordered mt-4">
    <thead class="text-center">
        <?php
        $get_payment="Select * from user_payments";
        $result=mysqli_query($con,$get_payment);
        $row_count=mysqli_num_rows($result);
        if($row_count==0){
            echo "<h3 class='text-center text-danger mt-4'>No payments received yet</h3>";
          }  else{
        
        echo " <tr>
            <th>Sr no</th>
            <th>Invoice number</th>
            <th>Amount</th>
            <th>Payment Mode</th>
            <th>Order Date</th>  
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='text-center'>";

        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id=$row_data['order_id'];
            $payment_id=$row_data['payment_id'];
            $invoice_number=$row_data['invoice_number'];
            $amount=$row_data['amount'];
            $payment_mode=$row_data['payment_mode'];
            $date=$row_data['date'];
            
            $number++; 
            ?>
            <tr>
            <td><?php echo $number; ?></td>
            <td><?php echo $invoice_number; ?></td>
            <td><?php echo $amount; ?></td>
            <td><?php echo $payment_mode; ?></td>
            <td><?php echo $date; ?></td>
           
            <td><a href='index.php?all_orders=<?php echo $payment_id; ?>' class='text-dark'><i class='fa-solid fa-trash' ></i></a></td>
        </tr>
      <?php  }
    }   ?>
       
        
    </tbody>
</table>