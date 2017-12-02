<?php session_start(); ob_start(); date_default_timezone_set('America/Los_Angeles');
include("cdb.php")?>
<?php
$userName = $_SESSION['username'];
$pictureDefault = true;


if ($connection) {

    $query = "SELECT * FROM `USER_REGISTRATION` WHERE `userName` = '".$userName."'";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $db_gender = $row['gender'];
        $db_email = $row['email'];
        $db_id = $row['user_id'];
        $db_picture =$row['profile_image'];


    }
    if ($db_picture == ""){
        $pictureDefault = false;
    }



}
else {
    die("connection failed");


}
/*******************************************************upload pic******************/
if (isset($_POST['upload'])) { // Handle the form.


// Desired folder structure
$structure = 'uploads/'.strtolower($userName).'/userprofile/';

$tmp_file = $_FILES['the_file']['tmp_name'];
// Make folder
mkdir($structure, 0777, true);

$image = ($_FILES['the_file']['name']);

$image = mysqli_real_escape_string($connection,$image);

//Store image name inside database
$query = "UPDATE `USER_REGISTRATION` SET `profile_image` = '$image' WHERE `user_id` = \"$db_id\"";
$result = mysqli_query($connection, $query);
$tmp_file = $_FILES['the_file']['tmp_name'];


if(!$result) {
    echo mysqli_error($connection);
}
     // Try to move the uploaded file:
        if (move_uploaded_file ($tmp_file, $structure.$image)) {

            //email confirmation for profile
            $body = "Thank you, ".$userName." This is a confirmation that we have successfully uploaded your profile picture!!";

            mail($db_email, 'Profile Picture Confirmation',
            $body, 'From: lee.supermonkey@gmail.com');
            print '<p class="profile-conf">Your file has been uploaded.</p>';

        } else { // Problem!

            print '<p style="color: red;">Your file could not be uploaded because: ';

            // Print a message based upon the error:
            switch ($_FILES['the_file']['error']) {
                case 1:
                    print 'The file exceeds the upload_max_filesize setting in php.ini';
                    break;
                case 2:
                    print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form';
                    break;
                case 3:
                    print 'The file was only partially uploaded';
                    break;
                case 4:
                    print 'No file was uploaded';
                    break;
                case 6:
                    print 'The temporary folder does not exist.';
                    break;
                default:
                    print 'Something unforeseen happened.';
                    break;
            }

            print '.</p>'; // Complete the paragraph.

        } // End of move_uploaded_file() IF.
        header("Location: profile.php");
    } // End of submission IF.

     // End of submission IF.

    // Leave PHP and display the form:

   ?>

<!--
$file = $_FILES['image']['tmp_name'];


if(!isset($file)){
    echo "Please select an image.";
}
    else {
       echo  $image = file_get_contents($_FILES['image']['tmp_name']);
    }

   $errors= array();
   $file_name = $_FILES['image']['name'];
   $file_size =$_FILES['image']['size'];
   $file_tmp =$_FILES['image']['tmp_name'];
   $file_type=$_FILES['image']['type'];
   $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
   $expensions= array("jpeg","jpg","png");
   if(in_array($file_ext,$expensions)=== false){
      $errors[]="extension not allowed, please choose a JPEG or PNG file.";
   }

   if($file_size > 2097152){
      $errors[]='File size must be excately 2 MB';
   }

   if(empty($errors)==true){
    $query = "INSERT INTO users (picture) VALUES ('$file_name')";
    $result = mysqli_query($connection, $query);

   }else{
      print_r($errors);
   }
-->






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Profile Page</title>
</head>
<body>
        <nav class="navbar navbar-expand-md navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img class="user-default" src="images/icon/logo.png" width="100" height="100" alt="">
                      </a>
                <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                  <form action="index.php" method="post" class="form-inline ml-auto px-2">

                            <fieldset class="text-center">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success mr-2 my-2 my-sm-0" type="submit">Search</button>
                            </fieldset>


                      <button class="btn btn-myOutline-logOut mx-1 my-1" method="post" name = "logOut" type="submit">Log Out</button>
                                    </div>
                                    </div>

                      <?php
                        if (isset($_POST['logOut'])) {
                          session_destroy();
                      }
                      ?>


                  </form>
                </div>
                </div>
              </div>
              </nav>

        <div class="profile-background">
            <div class="container">

                <?php
                    $now = getdate();

                    if ($now['hours'] < 11) {
                        echo "<h1> Good Morning, </h1>";
                    }
                    else if ($now['hours'] < 17){
                        echo "<h1> Good Afternoon, </h1>";
                    }
                    else {
                        echo "<h1> Good Evening, </h1>";
                    }

                ?>
                <?php echo "<span class='display-1'>".$userName."</span>";?>

                <div id="profile-image-wrapper-id" class="container profile-image-wrapper text-center">
                <img id="default-profile-image" src="<?php
            if ($pictureDefault == false) {

                if ($db_gender == "female") {
                    echo 'images/icon/userProfile/girl.svg';
                } else {
                    echo 'images/icon/userProfile/boy.svg';
                }

            }  else {
                echo "uploads/".strtolower($userName).'/userprofile/'.$db_picture;


            }

            ?>" alt="" class="profile-image">
                <button id="upload-picture" type="button" class="btn btn-lg btn-upload-picture" data-toggle="modal" data-target="#exampleModal"> Edit Profile Picture
                </button>
            </div>
    </div>
            </div>
        </div><!--Profile Background -->

        <!--*****************************************************************************************************************************-->




        <!-- ***************************************** Modal-UPLOAD-PROF-PIC ******************************************************** -->

         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">

                    <div class="modal-header my-modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Profile Picture</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                         <form action="#" enctype="multipart/form-data" method="post">
                             <p>Selec a picture:</p>
                                <input type="hidden" name="MAX_FILE_SIZE" value="300000">
                                <p><input class="" type="file" name="the_file"></p>
                                <p><input class="" type="submit" name="upload" value="Upload my picture!"></p>
                         </form>
                    </div>

                     <div class="modal-footer my-modal-footer">
                         <button type="button" class="btn btn-secondary btn-myOutline-logOut" data-dismiss="modal">Close</button>

                     </div>
                </div> <!--MODAL CONTENT-->
            </div> <!--MODAL DIALOG-->
        </div><!--MODAL END-->

    <!--*****************************************************************************************************************************-->







        <section class="friend-suggestion">
            <h1 class="text-center">People you might want to know</h1>
            <div class="container">
                <div class="row ">
                    <div class="col-lg">
                        <div class="pic-suggestion-box">

                        </div>
                    </div>
                    <div class="col-lg ">
                        <div class="pic-suggestion-box">

                        </div>
                    </div>
                    <div class="col-lg ">
                        <div class="pic-suggestion-box">

                        </div>
                    </div>
                    <div class="col-lg ">
                            <div class="pic-suggestion-box">

                            </div>
                        </div>
                </div>
            </div>
        </section>
        <section class="food-suggestion">
                <h1 class="text-center">People you might want to know</h1>
                <div class="container">
                    <div class="row ">
                        <div class="col-lg">
                            <div class="pic-suggestion-box">

                            </div>
                        </div>
                        <div class="col-lg ">
                            <div class="pic-suggestion-box">

                            </div>
                        </div>
                        <div class="col-lg ">
                            <div class="pic-suggestion-box">

                            </div>
                        </div>
                        <div class="col-lg ">
                                <div class="pic-suggestion-box">

                                </div>
                            </div>
                    </div>
                </div>
            </section>


<footer>
    <div class="text-center myFooter ">
        <p>&copy; L4Food 2017</p>
    </div>
</footer>

<script>
    var gender = " male";
    var profilePic = document.getElementById("default-profile-image");

    if (gender === ' female') {

           profilePic.setAttribute("src","images/icon/userProfile/girl.svg");
    }

    var uploadPic = document.getElementById("profile-image-wrapper-id");
    var uploadPicButton = document.getElementById("upload-picture");

    uploadPic.addEventListener('mouseover', function () {
        uploadPicButton.style.display="block";
        profilePic.style.opacity =".5";
        });
    uploadPic.addEventListener('mouseleave', function () {
           uploadPicButton.style.display="none";
           profilePic.style.opacity ="1";
        });

</script>
</body>
</html>
