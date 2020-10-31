<?php
include('includes/db.php');
include('includes/header.php');
?>

<body>

    <!-- Navigation -->

 
 <?php 
    include('includes/navigation.php');
    ?>

   
    <!-- Page Content -->
    <div class="container">

    <div class="row">

            <!-- Blog Entries Column -->
    <div class="col-md-8">
            
    
            
                    
<?php

if(isset($_POST['submit']))
{
    $search = $_POST['search'];
    $query = "SELECT * FROM posts WHERE post_status ='Published' AND post_tags LIKE '%$search%' or post_author LIKE '%$search%'";
    $search_query = mysqli_query($connection, $query);
    if(!$search_query)
    {
        die("Query Failed!".mysqli_error($connection));
    }

    $count = mysqli_num_rows($search_query);
    if($count==0)
    {
        echo "<h1>No Results Found!";
    }

    else
    {
    while($row = mysqli_fetch_assoc($search_query))
    {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = substr($row['post_content'],0,300); 
        ?>
        

        <h1 class="page-header">
        Page Heading
        <small>Secondary Text</small>
        </h1>

        <!-- First Blog Post -->
        <h2>
        <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo "$post_title"; ?></a>
        </h2>
        <p class="lead">
        by <a href="index.php"><?php echo "$post_author"; ?></a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo "$post_date"; ?></p>
        <hr>
        <a href="post.php?p_id=<?php echo $post_id; ?>">
            <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt=""></a>
        <hr>
        <p> <?php echo $post_content; ?> </p>
        <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>     
                   
                      
        <?php                
        }



        }
}
        else
        {    
        $query = "SELECT * FROM posts WHERE post_status = 'Published'";
        $select_all_posts_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_all_posts_query))
        {
        $post_id = $row['post_id'];    
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = substr($row['post_content'],0,300);
        ?>

        
        <h1 class="page-header">
            Page Heading
            <small>Secondary Text</small>
        </h1>

        <!--Blog Post -->
        <h2>
            <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo "$post_title"; ?></a>
        </h2>
        <p class="lead">
            by <a href="author_posts.php?author=<?php echo $post_author; ?>&p_id=<?php echo $post_id; ?>"><?php echo "$post_author"; ?></a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo "$post_date"; ?></p>
        <hr>        
           <a href="post.php?p_id=<?php echo $post_id; ?>">
            <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt=""></a>
        <hr>
        <p> <?php echo $post_content; ?> </p>
        <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>

        <?php
        }
}
        ?>
                

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->

        <?php
            
            include('includes/sidebar.php');
            ?>
        
        

        </div>
        <!-- /.row -->

        <hr>

       
       
       
        <!-- Footer -->
        
       
      <?php
        include('includes/footer.php');
        
        ?>