<?php 
    include'init.php';
    include $tpl."header.php";
?>
<?php 
     if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM users WHERE id = '$id' ";
        $user  = $db->select($query);
        $data  = $user->fetch_array();  
      }
?>

<div class="profile_data" >
  <div class="container">
    <div class="row">
        <div class="profile_pic">
            <img src="<?php echo UPLOAD_DIR.$data['profile_pic']; ?>" class="img-circle">
        </div>
        <h3 class="name"> <?php echo $data['name'];?> </h3>
    </div>
    <div class="profile_details row">

    <form class="" action="upload_content.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type ="hidden" name="username" vlaue="<?php echo $data['name']; ?>">
            <label for="fileinput">File Input</label>
            <input type="file" name="content" id="fileinput">
            <p class="help-block">You just Can upload files here </p>
        </div>
        <button type="submit" class="btn btn-primary">Upload Files <i class="fa fa-upload"></i></button>
    </form>
    <table class="table table-hover">
        <tr>
            <th> Id     </th>
            <th> Title   </th>
            <th> Path </th>
        </tr>
        <?php 
         $path = getcwd();
         $user_folder = $path."\includes\helpers\contents\\".$data['name'];
            if($handle = opendir($path."\includes\helpers\contents\\".$data['name'])){
                 $count =1;
                while(false !== ($entry = readdir($handle))){
                    
                    if($entry !== '.' && $entry !== '..') {
        ?>
        <tr>
            <td> <?php echo $count; ?> </td>
            <td><?php echo $entry?> </td>
            <td> <?php echo $user_folder.$entry ?> </td>
        </tr>
       <?php  
                    }
                }
                closedir($handle);
            }
       
        ?> 

      
    </table>

    </div>

  </div>   
</div>


<?php 
   include $tpl."footer.php";   
?>