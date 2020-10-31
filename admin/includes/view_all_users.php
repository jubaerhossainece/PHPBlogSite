
<table class="table table-brdered table-hover">
<thead>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Role</th>
        <th>Date</th>
    </tr>
</thead>
<tbody>

<?php
    
    $query = "SELECT * FROM users";
    $select_users = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_users))
    {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
        $user_date = $row['user_date'];
        echo "<tr>";
        echo "<td>$user_id</td>";
        echo "<td>$username</td>";
        echo "<td>$user_firstname</td>";
        echo "<td>$user_lastname</td>";
        echo "<td>$user_email</td>";
        echo "<td>$user_role</td>";
        echo "<td>$user_date</td>";
        echo "<td><a href = 'users.php?change_to_admin={$user_id}'>Admin</a></td>";
        echo "<td><a href = 'users.php?change_to_sub={$user_id}'>Subscriber</a></td>";
        echo "<td><a href = 'users.php?source=edit_user&edit_user={$user_id}'>Edit</td>";
        echo "<td><a onClick=\" javascript: return confirm('Are you sure you want to delete!');\" href = 'users.php?delete={$user_id}'>Delete</a></td>";
        echo "<tr>";
    }
    
    ?>
                           
   
</tbody>
</table>     

<?php
if(isset($_GET['change_to_admin']))
{
    $the_user_id = $_GET['change_to_admin'];
    $query = "UPDATE users SET user_role = 'Admin' WHERE user_id = {$the_user_id}";
    $change_role_query = mysqli_query($connection, $query);
    if(!$change_role_query)
    {
        die("Query failed!!" . mysqli_query($connection));
    }
    header('location:users.php');
}

if(isset($_GET['change_to_sub']))
{
    $the_user_id = $_GET['change_to_sub'];
    $query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = {$the_user_id}";
    $change_sub_query = mysqli_query($connection, $query);
    if(!$change_sub_query)
    {
        die("Query failed!!" . mysqli_error($connection));
    }
    header('Location:users.php');
    
}

if(isset($_GET['delete']))
{
    $the_user_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
    $delete_user_query = mysqli_query($connection, $query);
    if(!$delete_user_query)
    {
        die("Query Failed!!" . mysqli_error(delete_user_query));
    }
    header("Location: users.php"); 
}

?>

