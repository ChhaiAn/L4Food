<?php 
 session_start();
 $connection = mysqli_connect("localhost", 'root' , 'root' , 'project1');
 $db_question = '';
 $user_id = $_SESSION['id'];
 $user_name = $_SESSION['username'];
 $user_email = $_SESSION['email'];
 $hh = "";
     if ($connection) {
        
     }
     else {
         die ("connection failed");
     }

if(isset($_POST['upload'])) {
    $hh = "ehllo";
    // $structure = 'uploads/'.strtolower($user_name).'/userprofile/';
    // $file_name = strtolower(basename($_FILES['the_file']['name']));
    // $tmp_name = $_FILES['the_file']['tmp_name'];
    // // Make folder
    // mkdir($structure, 0777, true);
       
    // $image = ($_FILES['the_file']['name']);
    
    // $image = mysqli_real_escape_string($connection,$image);
    
    // //Store image name inside database
    // $query = "UPDATE `users` SET `picture` = '$image' WHERE `id` = \"$user_id\"";
    // $result = mysqli_query($connection, $query);
    
    
    
    // if(!$result) {
    //     echo mysqli_error($connection);
    // } 
    //      // Try to move the uploaded file:
    //         if (move_uploaded_file ($tmp_name, $structure.basename($_FILES['the_file']['name']))) {
    
    //             //email confirmation for profile
    //             $body = "Thank you, ".$user_name." This is a confirmation that we have successfully uploaded your profile picture!!";
                
    //             mail($user_email, 'Profile Picture Confirmation',
    //             $body, 'From: lee.supermonkey@gmail.com');        
    //             echo '<p class="profile-conf">Your file has been uploaded.</p>';


            
    //         } else { // Problem!
        
    //             print '<p style="color: red;">Your file could not be uploaded because: ';
                
    //             // Print a message based upon the error:
    //             switch ($_FILES['the_file']['error']) {
    //                 case 1:
    //                     print 'The file exceeds the upload_max_filesize setting in php.ini';
    //                     break;
    //                 case 2:
    //                     print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form';
    //                     break;
    //                 case 3:
    //                     print 'The file was only partially uploaded';
    //                     break;
    //                 case 4:
    //                     print 'No file was uploaded';
    //                     break;
    //                 case 6:
    //                     print 'The temporary folder does not exist.';
    //                     break;
    //                 default:
    //                     print 'Something unforeseen happened.';
    //                     break;
    //             }
                
    //             print '.</p>'; // Complete the paragraph.
        
    //         } // End of move_uploaded_file() IF.
    //         // header("Location: profile.php");
    //    // End of submission IF.
            
    //      // End of submission IF.
        
    //     // Leave PHP and display the form:
} else if (!isset($_POST['upload'])) {
    $hh ="non";
}

if(isset($_POST['search'])){
         

         $userEmail = $_POST['search'];
         $userEmail = mysqli_real_escape_string($connection, $userEmail);
        
         $query = "SELECT * FROM users WHERE email = '$userEmail'";
         $result = mysqli_query($connection,$query);
         $a = mysqli_fetch_array($result);
         
         $db['user'] = $a['username'];
         $db['email'] = $a['email'];
         $db['picture'] = $hh;
         $db['secuQuestion'] = $a['secuQuestion'];
         $db['secuAnswer'] = $a['secuAnswer'];
         $db['password'] = $a['password'];
         echo json_encode($db);
        
        
        
    }


   
   
   
    

?>