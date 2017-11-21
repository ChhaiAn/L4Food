<?php include("adminHeader.php"); ?>

<div id="wrapper">
          <div class="row mt-3 mx-3 justify-content-around">

              <!--LEFT ASIDE CONTENT-->
              <div class="col-md-2 my-aside "> 
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
              <div class="col-md-9 my-right-content">
                    <div class="list-group ">
                            <a href="#" class="list-group-item list-group-item-action active bg-danger text-center">
                                USERS &amp; PRIIVLEGES
                            </a>

                            <div class="container">
                                    <table class="user-table">
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th>Active</th>
                                        </tr>
                                        <tr>
                                            <td><span id="lastName">An, </span><span id="firstName">Chhai</span></td>
                                            <td><span id="email">Chhaily_an@yahoo.com</span></td>
                                            <td>5</td>
                                            <td>Y</td>
                                        </tr>
                                        <tr>
                                            <td><span id="lastName">John, </span><span id="firstName">Rambo</span></td>
                                            <td><span id="email">John_rambo@yahoo.com</span></td>
                                            <td>1</td>
                                            <td>N</td>
                                        </tr>
                                       
                                    </table> 
                            
                            </div>                                
                    </div>
              </div>
          </div>

</div><!--WRAPPER-->


<?php include("adminFooter.php"); ?>


