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
        <input type="hidden" name="username" value="<?php echo $data['name']; ?>"/>
        <div class="form-group">    
            <label for="fileinput">File Input</label>
            <input type="file" name="content" id="fileinput">
            <p class="help-block">You just Can upload files here </p>
        </div>
        <input type="submit" class="btn btn-primary" value="Upload Files"> 
    </form>
    <table class="table table-hover">
        <tr>
            <th> Id      </th>
            <th> Title   </th>
            <th class=""> Actions </th>
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
            <td> <?php echo $count++; ?> </td>
            <td><a href="<?php echo"http://localhost/BOOKJUICE/includes/helpers/contents/".$data['name']."/".$entry; ?>"> <?php echo $entry; ?>  </a>  </td>
            <td>
                <a href="" class="btn btn-success">Share</a>
                <a href="del_file.php?path=includes\helpers\contents\<?php echo $data['name']."\\".$entry; ?>" class="btn btn-danger">Delete</a>
            </td>    
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