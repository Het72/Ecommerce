
    <h3 class="text-secondary-subtle mb-4">Delete Account</h3>
    <form action="" method="post"class="mt-4">
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete Account">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="dont_delete" value="Don't delete (Tussi jaa rahe ho? tussi naa jao)">
        </div>
    </form>

    <?php
    $username_session=$_SESSION['username'];
    if(isset($_POST['delete'])){
        $delete_query="Delete from user_table where username='$username_session'";
        $result=mysqli_query($con,$delete_query);
        if($result){
            session_destroy();
            echo "<script>alert('Account deleted successfully')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
    if(isset($_POST['dont_delete'])){
        echo "<Script>window.open('profile.php','_self')</Script>";
    }

?>