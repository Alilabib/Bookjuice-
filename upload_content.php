<?php

  include"init.php";  

    $username = $_POST['username'];

    //Create uploads folder constant
define("CONTENT_DIR","includes\helpers\contents\$username\\");
if($_SERVER["REQUEST_METHOD"]=="POST"){

  if(isset($_POST['content'])){
    if(!empty($_FILES["content"])) {
        $myfile = $_FILES["content"];
        if($myfile['error'] !== UPLOAD_ERR_OK) {
            echo"<p>An error occured </p>";
            exit;
        }
    //ensure a safe filename 
    $name = preg_replace("/[^A-Z0-9._-]/i","_",$myfile["name"]);

    //Don't overwrite an existing file
    $i = 0;
    $parts = pathinfo($name);
    while(file_exists(CONTENT_DIR.$name)){
        $i++;
        $name = $parts['filename']."-".$i.".".$parts["extension"];
    }

    //Preserve file from temporary directory
    $success = move_uploaded_file($myfile["tmp_name"], CONTENT_DIR.$name);
     if(!$success){
         echo"<p> unable to save file  <p>";
         exit;
     }   

     echo "asdasfasdfas";
     header("Location:".$_SERVER['HTTP_REFERER']);

    }

}
}else{
    header("Location: login.php");
}
