<?php

if(isset($_POST['create_post']))
{
    $post_id = 
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category_id'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y h:m:s');
    $post_comment_count = 4;
    
    
    move_uploaded_file($post_image_temp, "../images/$post_image");

    
    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status)";
    $query .= "VALUES($post_category_id, '$post_title', '$post_author', now(), '$post_image', '$post_content', '$post_tags', '$post_status')";
    
    $create_post_query = mysqli_query($connection, $query);
    if(!$create_post_query)
    {
        die ("failed!!!!!". mysqli_error($connection));
    }
    $the_post_id = mysqli_insert_id($connection);
    echo "<p class='bg-success'>Post Added. <a href='../post.php?p_id=$the_post_id'>View Post</a> Or <a href = 'posts.php'>Edit More Posts</a></p>";
}

?>



<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="title" >Post Title</label>
    <input type="text" id="title" class="form-control " name="post_title" value="<?php if(isset($_POST['post_title'])) {echo "$post_title";} ?>" placeholder="Enter Post Title">
</div>

<div class="form-group">
    <label for="post_category">Post Category</label>
    <select name="post_category_id">
        <?php
        $query = "SELECT * FROM category";
        $select_categories = mysqli_query($connection, $query);
        if(!$select_categories)
        {
            die("Query Failed!!" . mysqli_error($connection));
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
    <input type="text" id="author" class="form-control" name = "post_author" value="<?php if(isset($_POST['post_author'])) {echo "$post_author";} ?>" placeholder="Enter author name" >
</div>

<div class="form-group">
    <label for = "status">Post Status</label>
   <select name="post_status" id="status">
       <option value="Draft">Select Option</option>
       <option value="Draft">Draft</option>
       <option value="Published">Published</option>
   </select>
</div>
<div class="form-group">
    <label for="image">Post Image</label>
    <input type="file" id="image" name = "post_image" value="<?php if(isset($_POST['post_image'])) {echo "$post_image";} ?>">
</div>

<div class="form-group">
    <label for="tags">Post Tags</label>
    <input type="text" id="tags" class="form-control" name = "post_tags" value="<?php if(isset($_POST['post_tags'])) {echo "$post_tags";} ?>" placeholder="Enter post tags">
</div>

<div class="form-group">
    <label for="content">Post Content</label>
    <textarea name="post_content" id="content" cols="30" rows="10" class="form-control"><?php if(isset($_POST['post_content'])) {echo "$post_content";} ?></textarea>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
</div>
</form>

