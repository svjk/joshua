<?php
?>
<div class="spacer" ></div>
<section class="register-section" style="background:transparent url('collage123.jpg') no-repeat center center /cover">
    <div class="register-page-body"></div>
    <div class="spacer"></div>
    <div class="container">
        <div class="row">
        <div><span class="error"> </span></div>
           <div class="col-sm-2" style="background-color:lavender;"></div>
           <div class="col-sm-3" style="background-color:lavenderblush;">
              <p>Already member? Login</p>
              <h3>Student Regisration form</h3>
              <form action="form.php" method="POST">
              <div class="form-group">
              <label for="usr">Name:</label><input type="text" class="form-control" name="name" required placeholder="Enter name">
           </div>
           <div class="form-group">
               <label for="email">Email address:</label>
               <input type="email" class="form-control" name="email" required placeholder="Enter email id">
            </div>
            <div class="form-group">
               <label for="phone">phone number:</label>
               <input type="tel" id="phone" name="phone" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required placeholder="0000000000">
            </div>
            <div class="form-group">
               <label for="pwd">Login Password:</label>
               <input type="password" class="form-control" name="pass" required placeholder="enter password">
            </div>
            <div class="form-group">
              <label for="confirm_password">Confirm Password:</label>
              <input type="password" class="form-control" name="cnfrm_password" required placeholder="enter password again">
            </div>
            <div class="form-group">
               <button style='font-size:24px'><i class='fas fa-angle-double-right'></i></button>
            </div>
          </form>
        </div>
        <div class="col-sm-3" style="background-color:lavender;"></div>
        <div class="col-sm-3" style="background-color:lavender;"> <p>Already member? Login</p>
          <h3>Faculty Regisration form</h3>
          <form action="form1.php">
          <div class="form-group">
            <label for="usr">Name:</label><input type="text" class="form-control" name="name" required placeholder="Enter name">
          </div>
          <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" class="form-control" name="email" required placeholder="Enter email id">
          </div>
          <div class="form-group">
             <label for="phone">phone number:</label>
             <input type="tel" id="phone" name="phone" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required placeholder="0000000000">
          </div>
          <div class="form-group">
              <label for="pwd">Login Password:</label>
              <input type="password" class="form-control" name="password" required placeholder="enter password">
          </div>
          <div class="form-group">
              <label for="confirm_password">Confirm Password:</label>
              <input type="password" class="form-control" name="confirm_password" required placeholder="enter password again">
          </div>
          <div class="form-group">
            <button style='font-size:24px'>>><i class='fas fa-angle-double-right'></i></button>
          </div>
        </form>
      </div>
          <div class="col-sm-1" style="background-color:lavender;"></div>
      </div>
  </div>
           }
               
                                                 
                                                    <input type="submit" name="submit" value="Submit" id="">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div
    </section>
<?php include "footer.php" ?>