<?php

if(isset($_POST['add_user']))
{
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    
//    $post_image = $_FILES['post_image']['name'];
//    $post_image_temp = $_FILES['post_image']['tmp_name'];
//    
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    //    $post_date = date('d-m-y h:m:s');
    
    
//    move_uploaded_file($post_image_temp, "./images/$post_image");

    
    $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password, user_date)";
    $query .= "VALUES('$user_firstname', '$user_lastname', '$user_role', '$username', '$user_email', '$user_password', now())";
    
    $add_user_query = mysqli_query($connection, $query);
    if(!$add_user_query)
    {
        die ("Query failed!!!!!". mysqli_error($connection));
    }
    echo "User Created:"." "."<a href = 'users.php'>View Users</a>";
}

?>



<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="firstname" >Firstname</label>
    <input type="text" id="firstname" class="form-control" name="user_firstname" value="<?php if(isset($_POST['user_firstname'])) {echo "$user_firstname";} ?>" placeholder="Enter firstname">
</div>

<div class="form-group">
    <label for="lastname">Lastname</label>
    <input type="text" id = "lastname" class="form-control" name="user_lastname" value="<?php if(isset($_POST['user_lastname'])){ echo $user_lastname;} ?>" placeholder="Enter your lastname">
</div>

<div class="form-group">
    <label>Username
    <input type="text" class="form-control" name="username" value="<?php if(isset($_POST['username'])){ echo $username;} ?>" placeholder="Enter your username">
    </label>
</div>

<div class="form-group">
    <label>User Role
    <select name="user_role">
        <option value = 'Subscriber'>Select Option</option>
        <option value = 'Admin'>Admin</option>
        <option value = 'subscriber'>subscriber</option>
        
    </select>
    </label>

</div>

<div class="form-group">
    <label for = "emailid">User Email</label>
    <input type="email" id="emailid" class="form-control " name = "user_email" value="<?php if(isset($_POST['user_email'])) {echo "$user_email";} ?>" placeholder="Enter email address">
</div>
<!--
<div class="form-group">
    <label for="image">Post Image</label>
    <input type="file" id="image" name = "post_image" >
</div>
-->

<div class="form-group">
    <label for="pass">Password</label>
    <input type="password" id="pass" class="form-control" name = "user_password">
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" name="add_user" value="Add User">
</div>
</form>

