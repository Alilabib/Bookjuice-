<?php

  include"init.php";  
    //Create uploads folder constant

if($_SERVER["REQUEST_METHOD"]=="POST"){

  if(isset($_POST['submit'])){

    if(!empty($_FILES["myfile"])) {
        $myfile = $_FILES["myfile"];

        if($myfile['error'] !== UPLOAD_ERR_OK) {
            echo"<p>An error occured </p>";
            exit;
        }
    //ensure a safe filename 
    $name = preg_replace("/[^A-Z0-9._-]/i","_",$myfile["name"]);

    //Don't overwrite an existing file
    $i = 0;
    $parts = pathinfo($name);
    while(file_exists(UPLOAD_DIR.$name)){
        $i++;
        $name = $parts['filename']."-".$i.".".$parts["extension"];
    }

    //Preserve file from temporary directory
    $success = move_uploaded_file($myfile["tmp_name"], UPLOAD_DIR.$name);
     if(!$success){
         echo"<p> unable to save file  <p>";
         exit;
     }   

     $user_name= $_POST['user_name'];
     $email    = $_POST['email'    ];
     $pass     = $_POST['password' ];
     $pic      = $name              ;
     $bio      = $_POST['bio'      ];

    $new_user_query = "INSERT INTO users (name,email,pass,profile_pic,bio)
                        VALUES('$user_name','$email',password('$pass'),'$pic','$bio');
    ";

    
    $path = getcwd();
    echo $path;
    mkdir($path."\includes\helpers\contents\\".$user_name,0777);

    
    $db->insert_user($new_user_query);
        
   
    
    
    header("Location: login.php");

        }
  
}
}else{
    $error =" You can't access This page directly";
    header("Location: login.php?error=".urlencode($error));
}
 ?>