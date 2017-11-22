<?php
include("adminHeader.php");



?>
    <!--GRID START-->
    <div id="wrapper">
          <div class="row mt-3 mx-3 justify-content-around">

              <!--LEFT ASIDE CONTENT-->
              <div class="col-sm-2 my-aside">
                    <div class="list-group ">
                            <a href="#" class="list-group-item list-group-item-action active bg-info text-center">
                              Welcome, <span>Chhai!</span>
                            </a>


                            <a href="#" class="list-group-item list-group-item-action"><span><i class="fa fa-user" aria-hidden="true"></i>
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
                                    <label for="userFirstName">First Name</label><br>
                                    <input class="form-control" id="userFirstName" type="text" name="userFirstName" placeholder="Chhai">
                                  </div>
                                  <div class="col-sm-4">
                                    <label for="userLastName">Last Name</label><br>
                                    <input class="form-control" id="userLastName" type="text" name="userLastName" placeholder="An">
                                  </div>
                                  <div class="col-sm-4">
                                    <label for="userEmail">Email</label><br>
                                    <input class="form-control" id="userEmail" type="email" name="userEmail" placeholder="chhaily_an@yahoo.com">
                                  </div>
                                  <div class="col-sm-4">
                                    <label for="userTitle">Title</label><br>
                                    <input class="form-control" id="userTiile" type="text" name="userTitle" placeholder="BOSS">
                                  </div>
                                  <div class="col-sm-4">
                                    <label for="userLastName">User Level</label><br>
                                    <select class="form-control" id="userLevel" name="userLevel">
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
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
                                  <textarea class="form-control"></textarea>

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
