
<table class="table table-brdered table-hover">
<thead>
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Email</th>
        <th>Status</th>
        <th>In Response To</th>
        <th>Date</th>
        <th>Aprroved</th>
        <th>Unapproved</th>
<!--        <th>Edit</th>-->
        <th>Delete</th>
    </tr>
</thead>
<tbody>

<?php
    
    $query = "SELECT * FROM comments";
    $select_comments = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_comments))
    {
        $comment_id = $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_author = $row['comment_author'];
        $comment_content = $row['comment_content'];
        $comment_email = $row['comment_email'];
        
        $comment_status = $row['comment_status'];
        $comment_date = $row['comment_date'];
        
        echo "<tr>";
        echo "<td>$comment_id</td>";
        echo "<td>$comment_author</td>";
        echo "<td>$comment_content</td>";
        
//        $query = "SELECT * FROM category WHERE cat_id = {$post_category_id}";
//        $select_category = mysqli_query($connection, $query);
//        while($row = mysqli_fetch_assoc($select_category))
//        {
//            $cat_id = $row['cat_id'];
//            $cat_title = $row['cat_title'];
//        }
//        
//        echo "<td>$cat_title</td>";
        
        
        echo "<td>$comment_email</td>";
        echo "<td>$comment_status</td>";
        
        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
        $select_post_id_query = mysqli_query($connection, $query);
        if(!$select_post_id_query)
        {
            die("Title query failed!!" . mysqli_error($connection));
        }
        
        while($row = mysqli_fetch_assoc($select_post_id_query))
        {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
        }
        echo "<td><a href = '../post.php?p_id=$post_id'>{$post_title}</a></td>";
        echo "<td>$comment_date</td>";
        
        echo "<td><a href = 'comments.php?approve={$comment_id}'>Approve</a></td>";
        echo "<td><a href = 'comments.php?unapprove= {$comment_id}'>Unapprove</a></td>";
//        echo "<td><a href = 'comments.php?source=edit_post&p_id=#'>Edit</a></td>";
        echo "<td><a href = 'comments.php?delete={$comment_id}'>Delete</a></td>";
        echo "<tr>";
    }
    
    ?>
                           
   
</tbody>
</table>     

<?php
if(isset($_GET['approve']))
{
    $comment_id = $_GET['approve'];
    $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = {$comment_id}";
    $approve_status_query = mysqli_query($connection, $query);
    if(!$approve_status_query)
    {
        die("Query failed!!" . mysqli_query($connection));
    }
    header('location:comments.php');
}

if(isset($_GET['unapprove']))
{
    $comment_id = $_GET['unapprove'];
    $query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = {$comment_id}";
    $unapprove_status_query = mysqli_query($connection, $query);
    if(!$unapprove_status_query)
    {
        die("Query failed!!" . mysqli_error($connection));
    }
    header('Location:comments.php');
    
}

if(isset($_GET['delete']))
{
    $the_comment_id = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
    $delete_query = mysqli_query($connection, $query);
    if(!$delete_query)
    {
        die("Query Failed!!" . mysqli_error($delete_query));
    }
    header("Location: comments.php"); 
}

?>

