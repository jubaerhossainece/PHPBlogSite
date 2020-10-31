<?php session_start();  ?>
    

            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php">CMS Front</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
    
    
    <?php    
 
    $query = 'SELECT * FROM category';
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result))
    {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<li><a href = 'category.php?category={$cat_id}'>$cat_title</a></li>";
    }
    
    ?>
        <li><a href="registration.php">Registration</a></li>
        <?php
        if(isset($_SESSION['user_role']))
        {   if(isset($_GET['p_id']))
        {
            $the_post_id =$_GET['p_id'];
            echo "<li><a href='admin/index.php'>Admin</a></li>";
            echo "<li><a href = 'admin/posts.php?source=edit_post&p_id=$the_post_id'>Edit Post</a></li>";            
        }

        }
        
        ?>
<!--
        <li>
        <a href="#">About</a>
        </li>
        <li>
        <a href="#">Services</a>
        </li>
        
-->

        </ul>
        </div>
        <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
        </nav>