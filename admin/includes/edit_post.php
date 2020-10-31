<?php
if(isset($_GET['p_id']))
{
    $the_post_id = $_GET['p_id'];
}
    $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
    $select_posts_by_id = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_posts_by_id))
    {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_content = $row['post_content'];
        $post_date = $row['post_date'];

    }
    
    if(isset($_POST['update_post']))
    {
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_category = $_POST['post_category'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        move_uploaded_file($post_image_temp, "../images/$post_image");
        
        //image showing for empty case
        if(empty($post_image))
        {
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
            $select_image = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_image))
            {
                $post_image = $row['post_image'];
            }
        }
        
        
        $query = "UPDATE posts SET post_title = '{$post_title}', ";
        $query .="post_author = '{$post_author}', ";
        $query .="post_category_id = '{$post_category}', ";
        $query .= "post_date = now(), ";
        $query .="post_status = '{$post_status}', ";
        $query .="post_tags = '{$post_tags}', ";
        $query .="post_content = '{$post_content}', ";
        $query .="post_image = '{$post_image}' "; 
        $query .="WHERE post_id = {$the_post_id}" ;
        $update_post = mysqli_query($connection, $query);
        if(!$update_post)
        {
            die("Query Failed!!" . mysqli_error($connection));
        }
        
        echo "<p class = 'bg-success'>Post Updated! <a href = '../post.php?p_id=$the_post_id'>View Post</a> Or <a href = 'posts.php'>Edit More Posts</a></p>";
    }

?>





<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="title" >Post Title</label>
    <input type="text" id="title" class="form-control " name="post_title" value="<?php echo $post_title; ?>" placeholder="Enter your name">
</div>

<div class="form-group">
    <label for="post_category">Post Category</label>
    <select name="post_category">
       
       <?php
        $query = "SELECT * FROM category";
        $select_categories = mysqli_query($connection, $query);
        
        if(!$select_categories)
        {
            die("Query Failed!!!" . mysqli_error($connection));
        }
        while($row = mysqli_fetch_assoc($select_categories))
        {  
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            echo "<option value = '{$cat_id}'>{$cat_title}</option>";
        }
        
        
        
        ?>

    </select>
</div>
<div class="form-group">
    <label for="author">Post Author</label>
    <input type="text" id="author" class="form-control" name = "post_author" value="<?php echo $post_author; ?>" placeholder="Enter author name" >
</div>

<div class="form-group">
    <label for = "status">Post Status</label>
    <select name="post_status" id="status">
        <?php
        
        echo "<option value = '$post_status'>$post_status</option>";
        if($post_status == 'Draft')
        {
            echo "<option value = 'Published'>Published</option>";
        }
        else
        {
            echo "<option value = 'Draft'>Draft</option>";
        }
        
        ?>
    </select>
    </div>
<div class="form-group">
    <label for="image">Post Image</label>
    <img width="100" src="../images/<?php echo $post_image ?>" alt="">
    <input type="file" id="image" name = "post_image" value="<?php echo "$post_image"; ?>">
</div>

<div class="form-group">
    <label for="tags">Post Tags</label>
    <input type="text" id="tags" class="form-control" name = "post_tags" value="<?php echo $post_tags; ?>" placeholder="Enter post tags">
</div>

<div class="form-group">
    <label for="content">Post Content</label>
    <textarea name="post_content" id="content" cols="30" rows="10" class="form-control"><?php echo $post_content; ?></textarea>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_post" value="Publish Post">
</div>
</form>
