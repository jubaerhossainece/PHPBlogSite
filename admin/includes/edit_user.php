<?php
if(isset($_GET['edit_user']))
{
    $the_user_id = $_GET['edit_user'];
}
$query = "SELECT * FROM users WHERE user_id = {$the_user_id}";

$select_user_query = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($select_user_query))
{
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_role = $row['user_role'];
    $username = $row['username'];
    $user_email = $row['user_email'];
    $user_password = $row['user_password'];
    
}
if(isset($_POST['update_user']))
{
    $the_user_id = $_GET['edit_user'];
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
    $query = "SELECT randsalt FROM users";
    $select_randsalt_query = mysqli_query($connection, $query);
    if(!$select_randsalt_query)
    {
        die("select_randsalt_query is failed!" . mysqli_error($connection));
    }
    $row = mysqli_fetch_array($select_randsalt_query);
    $salt = $row['randsalt'];
    $hashed_password = crypt($user_password, $salt);

    
    $query = "UPDATE users SET ";
    $query .="user_firstname = '$user_firstname', "; $query .="user_lastname ='$user_lastname', ";
    $query .="user_role = '$user_role', ";
    $query .="username = '$username', ";
    $query .="user_email = '$user_email', ";
    $query .="user_password = '$hashed_password', ";
    $query .="user_date = now() ";
    $query .="WHERE user_id = $the_user_id";

    $edit_user_query = mysqli_query($connection, $query);
    if(!$edit_user_query)
    {
        die ("Query failed!!!!!". mysqli_error($connection));
    }
    echo "User Updated! <a href = 'users.php'>View Users</a>";
}

?>



<form action="" method="post" enctype="multipart/form-data">

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
    <input class="btn btn-primary" type="submit" name="update_user" value="Update User">
</div>
</form>

