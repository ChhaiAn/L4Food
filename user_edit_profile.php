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
                          <form action="" method="post">
                            <fieldset class="form-group">
                                <label for="userFirstName">First Name</label>
                                <input class="" id="userFirstName" type="email" name="adminEmail" placeholder="Chhai">
                            </fieldset>
                          </form>
                           
                    </div>
              </div>
          </div>
        </div><!--WRAPPER-->
   <?php 
   include("adminFooter.php");
   ?>