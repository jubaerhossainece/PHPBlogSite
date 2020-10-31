   <!--blog sidebar widget column-->
    <div class="col-md-4">
               
               
        <!-- Blog Search Well -->
        <div class="well">
        <h4>Blog Search</h4>
        <form action="" method="post">
        <div class="input-group">
        <input name="search" type="text" class="form-control">
        <span class="input-group-btn">
        <button name="submit" class="btn btn-default" type="submit">
        <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
        </div>
        </form>    <!--search from-->
                    
                    
                    <!-- /.input-group -->
                </div>

       <!--Login Form -->
               <div class="well">
        <h4>Login Here</h4>
        <form action="includes/login.php" method="post">
        <div class="form-group">
            <label for="uname">Username</label>
        <input name="username" type="text" class="form-control" placeholder="Enter Username" id="uname">
          
        </div>
        <label for="pass">
            Password</label>
        <div class="input-group">
        <input name="password" type="password" class="form-control" placeholder="Enter Password" id="pass">
        
        <span class="input-group-btn">
           <button class="btn btn-primary" name="login" type="submit">Login
               
           </button>
            
        </span>
        </div>        
                                
        </form>    <!--search from-->
                    
                    
                    <!-- /.input-group -->
                </div>
       
        <!-- Blog Categories Well -->
        <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
        <div class="col-lg-6">
        <ul class="list-unstyled">
        
        <?php
            include('./functions.php');
            categories();
            ?>
        
        </ul>
        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>