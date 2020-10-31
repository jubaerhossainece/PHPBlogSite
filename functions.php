    <?php    
    function categories()
    {
    global $connection; 
    $query = 'SELECT * FROM category';
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result))
    {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<li><a href = 'category.php?category={$cat_id}'>$cat_title</a></li>";
    }
    }

                    
                    
    ?>