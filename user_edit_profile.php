<?php
session_start(); ob_start();
include("adminHeader.php");
include("cdb.php");
$_GET['user_id'];

$query = "SELECT * FROM USER_REGISTRATION WHERE user_id = '".$_GET['user_id']."'";
$result = mysqli_query($connection,$query);
if (!$result){
  echo mysqli_error($connection);
}
$row = mysqli_fetch_assoc($result);

$username = $row['username'];
$email = $row['email'];
$userlevel = $row['user_level'];
$active = $row['active'];
$userid = $row['user_id'];

//UPDATE THE DATABASE

if(isset($_POST['submit'])) {
  $update_username = $_POST['userName'];
  $update_email = $_POST['userEmail'];
  $update_userlevel = $_POST['userLevel'];
  $update_active = $_POST['userActive'];
  $update_bio = $_POST['userBio'];

  $query = "UPDATE USER_REGISTRATION SET
            username = '$update_username',
            email = '$update_email',
            user_level='$update_userlevel',
            active='$update_active',
            about_me='$update_bio'
            WHERE user_id ='$userid'";

  $result = mysqli_query($connection,$query);
  if(!$result) {
    echo mysqli_error($connection);
  }

  if ($update_userlevel == 5){
    header("Location: user_edit_profile.php?user_id=$userid");
    exit();
  }
  else {
    header("Location: index1.php");
    exit();
  }
}




?>
    <!--GRID START-->
    <div id="wrapper">
          <div class="row mt-3 mx-3 justify-content-around">

              <!--LEFT ASIDE CONTENT-->
              <div class="col-sm-2 my-aside">
                    <div class="list-group ">
                            <a href="#" class="list-group-item list-group-item-action active bg-info text-center">
                              Welcome, <?php echo $username; ?>
                            </a>


                            <a href="view-user.php" class="list-group-item list-group-item-action"><span><i class="fa fa-user" aria-hidden="true"></i>
                            </span>Users &amp; Privileges</a>
                            <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
                            <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                            <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
                    </div>
              </div><!--LEFT ASIDE CONTENT END-->



              <div class="col-sm-9 my-right-content">

                    <div class="list-group ">
                            <a href="#" class="list-group-item list-group-item-action active bg-danger text-center">
                                USER EDIT
                            </a>
                          <img class="mt-3" src="images/icon/userProfile/boy.svg" width ="200" height ="200">
                          <div class="container">
                            <form action="upload.php" method="post" enctype="multipart/form-data">
                              Select image to upload:
                              <input type="file" name="fileToUpload" id="fileToUpload">
                              <input type="submit" value="Upload Image" name="submit">
                            </form>
                          </div>
                          <form class="mt-3" action="" method="post">
                            <fieldset class="form-group">
                              <div class="container">
                                <div class="row">
                                  <div class="col-sm-4">
                                    <label for="userFirstName">User Name</label><br>
                                    <input class="form-control" id="userFirstName" type="text" name="userName"
                                    value="<?php echo $username; ?>">
                                  </div>

                                  <div class="col-sm-4">
                                    <label for="userEmail">Email</label><br>
                                    <input class="form-control" id="userEmail" type="email" name="userEmail" value="<?php echo $email; ?>">
                                  </div>
                                  <div class="col-sm-4">
                                    <label for="userTitle">Title</label><br>
                                    <input class="form-control" id="userTiile" type="text" name="userTitle" placeholder="BOSS">
                                  </div>
                                  <div class="col-sm-4">
                                    <label for="userLastName">User Level</label><br>
                                    <select class="form-control" id="userLevel" name="userLevel">
                                      <?php
                                        echo "<option selected='selected' value='$userlevel'>".$userlevel."</option>";
                                        if ($userlevel == 5){
                                          echo "<option value='0'>0</option>";
                                        }
                                        else {
                                          echo "<option value='5'>5</option>";
                                        }


                                      ?>

                                    </select>
                                  </div>
                                  <div class="col-sm-4">
                                    <label for="userFirstName">Active</label><br>
                                    <select class="form-control" id="userActive" name="userActive">
                                      <option value="Y">Y</option>
                                      <option value="N">N</option>
                                    </select>
                                  </div>
                                </div><!--ROW-->
                              </div>
                            </fieldset>
                            <div class="container">
                              <fieldset class="mt-3">

                                  <label for="userBio">Biography </label><br>
                                  <textarea class="form-control" name="userBio"></textarea>

                              </fieldset>
                              <button type="submit" class="btn btn-primary my-2" name="submit">Submit</button>
                            </div>
                          </form>

                    </div>
              </div>
          </div>
        </div><!--WRAPPER-->
   <?php
   include("adminFooter.php");
   ?>
