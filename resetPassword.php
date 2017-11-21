<?php
$connection = mysqli_connect("localhost", 'root' , 'root' , 'project1');

    if ($connection) {
       
    }
    else {
        die ("connection failed");
    }


    if(isset($_POST["answer"])) {

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Passsword</title>
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
    crossorigin="anonymous"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="images/icon/logo.png" width="100" height="100" alt="">
              </a>
      </div>
</nav>


<div class="background">
    <div class="darkOverlay">
        <div class="container">
            
                    <form action="resetPassword.php" class="myForm p-4 resetPassword" method="post">
                        <h1>Reset Password</h1>
                        <p>Don't get hangry, go ahead and reset! </p>
                            <fieldset class="form-group">
                                <input class="form-control" id="newPassword" type="password" name="password" placeholder="New Password" required>
                            </fieldset>
                            <fieldset class="form-group">
                                <input  class="form-control" id="confirmNewPassword" type="password" name="conPassword" placeholder="Confirm Password" required>
                               
                                
                            </fieldset>
                            <p id="resetPasswordMsg"></p>
                        <button id="reset" class="btn btn-myOutline-logIn" name="submit" type="submit">Reset</button>
                     </form>
         
        </div>
    </div>
</div>

<footer>
    <div class="text-center myFooter">
      <p>&copy; L4Food 2017</p>
    </div>
  </footer>



<script>
    $(document).ready (function (){
        var newPassword =  "";
        var length = 0;
        $('#reset').prop("disabled", true);

        $("#newPassword").focusout( function(){
        
            newPassword = $('#newPassword').val();
        
        });
     
       
        $('#confirmNewPassword').keyup(function (){
            var confirmNewPassword = this.value;
            
            if (newPassword != confirmNewPassword) {
                $("#resetPasswordMsg").addClass("alert alert-danger");
                $("#resetPasswordMsg").removeClass("alert alert-success");
                $("#resetPasswordMsg").html("Passwords do not match!");
                $('#reset').prop("disabled", true);
            } else {
                $("#resetPasswordMsg").addClass("alert alert-success");
                $("#resetPasswordMsg").removeClass("alert alert-danger");
                $("#resetPasswordMsg").html("Good to go!");
                $('#reset').prop("disabled", false);
            }
            
        });


    //     $('#reset').prop("disabled", true);
      
       
    //     $('#reset').click ( function () {
          
    //         alert("oh Yeah");

     

    //     });//reset click function
    //     $("#newPassword").focusout( function(){
    //         newPassword = $('#newPassword').keyup();
            
    //         if (confirmNewPassword !== ""){
    //             if ( newPassword !== confirmNewPassword) {
    //                     $("#resetPasswordMsg").addClass("alert alert-danger");
    //                     $("#resetPasswordMsg").removeClass("alert alert-success");
    //                     $("#resetPasswordMsg").html("Passwords do not match!");
                       
    //                 }
    //                 else {
    //                     $("#resetPasswordMsg").addClass("alert alert-success");
    //                     $("#resetPasswordMsg").removeClass("alert alert-danger");
    //                     $("#resetPasswordMsg").html("Good to go!");
                        
    //                 }
    //         }
    //     });//newpassword focusout
    //     $("#confirmNewPassword").focusout( function(){
            
    //         confirmNewPassword = $('#confirmNewPassword').keyup();
     
    //             if ( newPassword !== confirmNewPassword) {
    //                 $("#resetPasswordMsg").addClass("alert alert-danger");
    //                 $("#resetPasswordMsg").removeClass("alert alert-success");
    //                 $("#resetPasswordMsg").html("Passwords do not match!");
    //             }
    //             else {
    //                 $("#resetPasswordMsg").addClass("alert alert-success");
    //                 $("#resetPasswordMsg").removeClass("alert alert-danger");
    //                 $("#resetPasswordMsg").html("Good to go!");
                    
    //             }
            
    //     });//confirmnewpassword focusout   
    //    if (newPassword === confirmNewPassword && newPassword != "")  {
    //     $('#reset').prop("disabled", false);
    //    }
    });//document ready
  

</script>
</body>
</html>

