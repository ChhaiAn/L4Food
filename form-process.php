<?php 

session_start();

include 'function.php';

$username = $_POST['userName'];
$email = $_POST['email'];
$password = $_POST['password'];
$conpass = $_POST['conPassword'];
$birthDate = $_POST['day'];
$birthMonth = $_POST['month'];
$birthYear = $_POST['year'];
$gender = $_POST['gender'];
$flag = true;               

   $connection = mysqli_connect("localhost", 'root' , 'root' , 'project1');


    if ($connection) {
        
    }
    else {
        die ("connection failed");
    }

    
    


    /* CLEAN UP THE INPUT */

    $username = mysqli_escape_string($connection,$username);
    $password = mysqli_escape_string($connection,$password);
    $conpass = mysqli_escape_string($connection,$conpass);
    $email = mysqli_escape_string($connection,$email);

    

    $query = "SELECT `email` FROM `users` WHERE `email` = '".$email."'";
    $result = mysqli_query($connection, $query);
    $b = mysqli_num_rows($result);
    
    if ($b > 0) {
        echo "<p> This email is already exist. </p>";
        $flag = false;
    }

    $query = "SELECT `username` FROM `users` WHERE `username` = '".$username."'";
    $result = mysqli_query($connection, $query);
    $b = mysqli_num_rows($result);
    
    if ($b > 0) {
        echo "<p> This username is already exist. </p>";
        $flag = false;
    }
 
    if($password !== $conpass){
        echo "password not match";
        $flag = false;
    }

    if ($flag) {
        $query = "INSERT INTO users(`username`,`password`,`email`) VALUES ('$username','$password','$email')";
        $result = mysqli_query($connection, $query);
        
        $_SESSION['username'] = $username;
        header("Location: profile.php");






        /*KILL QUERY*/
        if(!$result) {
            die('Query FAILED!');
        }
    }
        
       


    

?>

