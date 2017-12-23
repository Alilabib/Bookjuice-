<?php 
    include 'init.php';
    include $tpl.'header.php';
?>

        <!-- Login Page -->
        <div class="warp">
            <div class="my-nav">
                
            </div>
            <div class="row">
                
            
            <div class="col-md-1">
                
            </div>
            <div class="sign_board well  col-md-4">
                <form role="form" class="form-horizontal" action="upload.php" onsubmit="return check_password()" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="inputuser" class="col-sm-2 control-label"> Name </label>
                        <div class="col-sm-10">
                            <input type="text" name="user_name" id="inputuser" class="form-control" placeholder="Enter Your user name">
                        </div>
                    </div>

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
                        <label for="inputconfpassword" class="col-sm-2 form-check-label">Re-Type Password </label>
                        <div class="col-sm-10">
                            <input type="password" name="conf_password" id="inputconfpassword" class="form-control" placeholder="Confrm Password">
                        </div>
                    </div>
            
                   <div class="form-group">
                       <label for="inputfile" class="col-sm-2 form-check-label"> Choose Your Picture </label>
                        <input type="file" id="inputfile" name="myfile"  >
                        <p class="help-block">Choose  Image</p>
                    </div> 
                    <div class="form-group">
                         <label for="input_bio" class="col-sm-1 form-check-label">  Biography </label> 
                              <textarea  id="input_bio" rows="5" cols="80" class="form-control" name="bio">   
                              </textarea>
                    </div>
                    
                    <div class="form-group">
                       <div class="col-sm-offset-3 col-sm-9">
                           <input type="submit" name="submit"  class="btn btn-success" value="Sign Up">
                           <input type="reset"  name="reset"  class="btn btn-warning col-sm-offset-1" value="clear">
                        </div>
                    </div> 

                    <div class="form-group">
                       <div class="col-sm-offset-4 col-sm-6">
                         <p id="error_sign" class="error"></p> 
                        </div>
                    </div> 
                    
                </form>
            </div>
           </div>     
        </div>
            
        <!-- Login Page -->

<?php 
include $tpl.'footer.php';
?>