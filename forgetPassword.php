<?php 
 $connection = mysqli_connect("localhost", 'root' , 'root' , 'project1');
 $db_question = '';

     if ($connection) {
        
     }
     else {
         die ("connection failed");
     }



     if(isset($_POST['search'])){
         $forgetEmail = $_POST['search'];
         $forgetEmail = mysqli_real_escape_string($connection, $forgetEmail);
        
         $query = "SELECT * FROM users WHERE email = '$forgetEmail'";
         $result = mysqli_query($connection,$query);
         $a = mysqli_fetch_array($result);
         
         $db['user'] = $a['username'];
         $db['email'] = $a['email'];
         $db['picture'] = $a['picture'];
         $db['secuQuestion'] = $a['secuQuestion'];
         $db['secuAnswer'] = $a['secuAnswer'];
         $db['password'] = $a['password'];
        if ($db['email'] !== $forgetEmail) {
            echo "Bad Json";
        } else{
            echo json_encode($db);
        }
        
        
    }

    if(isset($POST['answer'])) {
        
        header("Location: resetPassword.php");


        // $body = "Hi, ".$db['user'].". You are recieving this email because you have asked for your account password.";
        // $body = $body. "<p> Your password is ".$db['password']."</p>" ;
        // mail($email, 'Account Password Request',
        // $body, 'From: lee.supermonkey@gmail.com');
        
    }
   
   
   
    

?>