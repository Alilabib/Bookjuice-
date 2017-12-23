<?php 
    include 'init.php';
    include $tpl.'header.php';
    
   
?>


        <!-- Login Page -->
        <div class="warp">
          <div class="container">
            <div class="my-nav">
                
            </div>
            <div class="row">
            <?php
                 if(isset($_GET['msg'])){
                   $msg = $_GET['msg'];
                echo"<p class='alert alert-success'> $msg </p>";
                }elseif(isset($_GET['error'])){
                    $error =$_GET['error'];
                    echo"<p class='alert alert-danger'> $error </p>";
                }
            ?>    
            
            <div class="col-md-1">
                
            </div>
            <div class="auth_board well  col-md-5">
                <form role="form" class="form-horizontal" action="login.php" method="post">
                    <div class="form-group">
                        <label for="inputemail" class="col-sm-2 control-label"> Email </label>
                        <div class="col-sm-10">
                            <input type="email" name="email" id="inputemail" class="form-control" placeholder="Enter Your Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputpassword" class="col-sm-2 form-check-label"> Password </label>
                        <div class="col-sm-10">
                            <input type="password" name="password" id="inputpassword" class="form-control" placeholder="Enter Your Password">
                        </div>
                    </div>
                   <div class="form-group">
                       <div class="col-sm-offset-2 col-sm-10">
                           <div class="checkbox">
                               <label>
                                   <input type="checkbox">Remember me
                               </label>
                           </div>
                        </div>
                    </div> 
                    
                    <div class="form-group">
                       <div class="col-sm-offset-2 col-sm-10">
                           <input type="submit" name="submit" class="btn btn-default" value="Login">
                           
                           <a href="register.php" class="btn btn-primary col-md-offset-1"> sign up </a>
                        </div>
                    </div> 

                    <div class="form-group">
                       <div class="col-sm-offset-4 col-sm-6">
                         <p id="error_auth" class="error"></p> 
                        </div>
                    </div> 
                    
                </form>
            </div>
           </div>     
          </div> 
        </div>
            
        <!-- Login Page -->


<?php
    // Create Data base object
    
    // Create Select Query for select users from database where email and password are match the inputs
    
    if(isset($_POST['submit'])){
            $email = $_POST['email'   ];
            $pass  = $_POST['password'];
            $query = "SELECT * FROM users WHERE email = '$email' AND pass = password('$pass')";
            $user  = $db->select($query);
            if($user){
                $data = $user->fetch_array();
                $id = $data['id'];

                echo"<script>window.location='profile.php?id='+$id;</script>";
            }else{
                echo"<script>invalid_input();</script>";
            }
    }
?>

<?php 
include $tpl.'footer.php';
?>