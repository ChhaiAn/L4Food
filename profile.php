<?php session_start(); ob_start(); date_default_timezone_set('America/Los_Angeles');?>
<?php
$userName = $_SESSION['username'];
$pictureDefault = true;


//mysqli_connect('localhost','username','password','database_name')
$connection = mysqli_connect("localhost", 'root' , 'root' , 'project1');
if ($connection) {
   
    $query = "SELECT * FROM `users` WHERE `userName` = '".$userName."'";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $db_gender = $row['gender'];
        $db_email = $row['email'];
        $_SESSION['email'] = $db_email;
        $db_id = $row['id'];
        $_SESSION['id']=$db_id;
        $db_picture =$row['picture'];
        $db_userName = $row['username'];
        $_SESSION['username']=$db_userName;
    }
    if ($db_picture === ""){
        $pictureDefault = 0;
      
    }

   
   
}
else {
    die("connection failed");


}


   ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
            crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
            crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
            crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
        <title>Profile Page</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img class="user-default" src="images/icon/logo.png" width="100" height="100" alt="">
                </a>
                <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <form action="index.php" method="post" class="form-inline ml-auto px-2">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#myModal">Edit Profile</button>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header ">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>

                                        </button>
                                        <h4 class="modal-title m-auto" id="myModalLabel">Edit Your Profile</h4>

                                    </div>
                                    <div class="modal-body">
                                        <div role="tabpanel">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs">
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#bioTab" aria-controls="browseTab" data-toggle="tab">Brief Bio</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#foodTab" aria-controls="browseTab" data-toggle="tab">Food Choice</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#browseTab" aria-controls="browseTab" data-toggle="tab">Browse</a>
                                                </li>

                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="bioTab">
                                                    <h4 class="text-center">Your Brief Bio </h4>
                                                    <form class="form-group" action="" method="post">
                                                        <div class="form-group">
                                                            <textarea class="form-control my-textarea" id="exampleFormControlTextarea1" rows="5"></textarea>
                                                        </div>
                                                    </form>

                                                </div><!--BIO TABS-->
                                                <div role="tabpanel" class="tab-pane" id="foodTab">
                                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="card">
                                                                    <div class="card-body">
                                                                        <h4 class="card-title">Special title treatment</h4>
                                                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <div class="col-sm-6">
                                                                <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Special title treatment</h4>
                                                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100" src="..." alt="Second slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100" src="..." alt="Third slide">
                                                        </div>
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary save">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <button class="btn btn-myOutline-logOut mx-1 my-1" method="post" name="logOut" type="submit">Log Out</button>
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
       
        if ($db_gender == " female ") {
            echo 'images/icon/userProfile/girl.svg';
        } else {
            echo 'images/icon/userProfile/boy.svg';
        }
         
    }  else {
        echo "uploads/ ".strtolower($userName).'/userprofile/'.$db_picture;
            
    
    }
    
    ?>" alt="" class="profile-image">
                    <button id="upload-picture" type="button" class="btn btn-lg btn-upload-picture" data-toggle="modal" data-target="#exampleModal">
                    Edit Profile Picture
                    </button>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-center">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button">SEARCH!</button>
                            </span>
                            <input type="text" class="form-control" placeholder="Search for..." aria-label="Search for...">
                        </div>
                    </div>
                </div>
                <!--Profile Background -->
            </div>

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
                            <form action="profile.php" enctype="multipart/form-data" method="post">
                                <p>Selec a picture:</p>
                                <input type="hidden" name="MAX_FILE_SIZE" value="300000">
                                <p>
                                    <input class="" type="file" name="the_file">
                                </p>
                                <p>
                                    <input class="" type="submit" id="modalUpload" name="upload" value="Upload my picture!">
                                </p>
                            </form>
                        </div>

                        <div class="modal-footer my-modal-footer">
                            <button type="button" class="btn btn-secondary btn-modal-close" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                    <!--MODAL CONTENT-->
                </div>
                <!--MODAL DIALOG-->
            </div>
            <!--MODAL END-->

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
            <footer>
                <div class="text-center myFooter ">
                    <p>&copy; L4Food 2017</p>
                </div>
            </footer>

            <script>
                $(document).ready(function () {
                    var uploadPic = document.getElementById("profile-image-wrapper-id");
                    var uploadPicButton = document.getElementById("upload-picture");

                    uploadPic.addEventListener('mouseover', function () {
                        uploadPicButton.style.display = "block";

                    });
                    uploadPic.addEventListener('mouseleave', function () {
                        uploadPicButton.style.display = "none";

                    });
                    var gender = "<?php echo $db_gender; ?>";

                    var defautlPicture = "<?php echo $pictureDefault; ?>";

                    if (defautlPicture == 0) {

                        if (gender == "female") {

                            $('#default-profile-image').attr("src", "images/icon/userProfile/girl.svg");

                        }

                    } else {
                        $('#default-profile-image').attr("src", "uploads/<?php echo $userName." / userprofile / ".$db_picture ?>");

                    }
                    $('#modalUpload').click(function (e) {


                        var search = "<?php echo $db_email; ?>";
                        var picturePath = $('#the_file').val();


                        var index = picturePath.lastIndexOf("/") + 1;
                        alert(index);
                        var filename = picturePath.substr(index);
                        alert(filename);

                        alert(search);

                        e.preventDefault();
                        $.ajax({

                            datatype: 'JSON',
                            async: false,
                            url: 'changeProfilePicture.php',
                            data: {
                                search: search,
                                picture: picture
                            },
                            type: 'POST',
                            success: function (result) {
                                try {
                                    response = JSON.parse(result);
                                    user = response.user;
                                    pictureName = response.picture;
                                    alert(pictureName);
                                    var src = " src='uploads/" + user + "/userprofile/" + pictureName + "'>";
                                    $('#default-profile-image').attr("src", src);


                                }
                                catch (e) {

                                    alert("something wrong");
                                }
                            },
                            error: function (jqXHR, exception) {
                                alert(error);
                            }

                        });//ajax

                    });//click modal




                });//document ready

            </script>
    </body>

    </html>