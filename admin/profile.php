<?php 
include('includes/admin_header.php');
?>
<?php

   if(isset($_SESSION['username']))
   {
        $username = $_SESSION['username'];
       $query = "SELECT * FROM users WHERE username = '{$username}'";
       $select_user_profile_query = mysqli_query($connection, $query);
       while($row = mysqli_fetch_array($select_user_profile_query))
       {
           $session_username = $row['username'];
           $user_firstname = $row['user_firstname'];
           $user_lastname = $row['user_lastname'];
           $user_email = $row['user_email'];
           $user_role = $row['user_role'];
           $user_password = $row['user_password'];
       }
   }
   ?>
   
    <?php
            if(isset($_POST['update_profile']))
    {
        $username = $_POST['username'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];
        $user_password = $_POST['user_password'];
//        $user_image = $_FILES['image']['name'];
//        $user_image_temp = $_FILES['image']['tmp_name'];
//        move_uploaded_file($user_image_temp, "./images/$user_image");
        
        
        $query = "UPDATE users SET ";
        $query .="username = '{$username}', ";
        $query .="user_firstname = '$user_firstname', ";
        $query .="user_lastname = '$user_lastname', ";
        $query .="user_email = '$user_email', ";
        $query .="user_role = '$user_role', ";
        $query .="user_password = '$user_password' ";
        $query .="WHERE username = '$session_username'";
        $update_profile_query = mysqli_query($connection, $query);
        if(!$update_profile_query)
        {
            die("Update Query Failed!!!" . mysqli_error($connection));
        }
    }

    
    ?>
    
    <body>

    <div id="wrapper">

       
       
        <!-- Navigation -->
    <?php
    
        include('includes/admin_navigation.php');
        ?>
        
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
Welcome to Admin
<small>Author</small>
</h1>

 
     
<form action="" method="post" enctype="multipart/form data">

<div class="form-group">
    <label for="firstname" >Firstname</label>
    <input type="text" id="firstname" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>" placeholder="Enter firstname">
</div>

<div class="form-group">
    <label for="lastname">Lastname</label>
    <input type="text" id = "lastname" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>" placeholder="Enter your lastname">
</div>

<div class="form-group">
    <label>Username
    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" placeholder="Enter your username">
    </label>
</div>

<div class="form-group">
    <label>User Role
    <select name="user_role">
        <option value = '<?php echo $user_role; ?>'><?php echo $user_role; ?></option>
        <?php 
        if($user_role == 'Admin')
        {
            echo "<option value = 'Subscriber'>Subscriber</option>";
        }
        else
        {
            echo "<option value = 'Admin'>Admin</option>";        
        }
         ?>       
        
    </select>
    </label>

</div>

<div class="form-group">
    <label for = "emailid">User Email</label>
    <input type="email" id="emailid" class="form-control " name = "user_email" value="<?php echo "$user_email"; ?>" placeholder="Enter email address">
</div>
<!--
<div class="form-group">
    <label for="image">Post Image</label>
    <input type="file" id="image" name = "post_image" >
</div>
-->

<div class="form-group">
    <label for="pass">Password</label>
    <input type="password" id="pass" class="form-control" name = "user_password" value="<?php echo $user_password; ?>">
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_profile" value="Update Profile">
</div>
</form>

      

</div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
    include('includes/admin_footer.php');
    ?>