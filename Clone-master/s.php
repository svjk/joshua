<?php include "header.php" ?>
<div class="login-page-background-image">
<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-3">
            <div class=" login-form-container">
                <div class="login-form">
                    <form action="services.php" >
                        <h2>Login Form</h2>
                        <div class="imgcontainer">
                            <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
                        </div>

                        <div class="input--with-icon">
                            <i class="fa fa-user"></i>
                            <input type="text" class="form-control" name="uname" placeholder=" Email Id..">
                        </div>

                        <div class="input--with-icon">
                            <i class="fa fa-lock"></i>
                            <input type="password" class="form-control" name="" placeholder="Password..">
                            
                        </div>

                        <div class="login-checkbox">
                            <label>
                                <input type="checkbox" checked="checked" name="remember"> Remember me
                            </label>
                        </div>
                        <div>
                            <button type="submit" class="btn-login">Login</button>
                        <div class="login-checkbox">
                            <p class="psw">Forgot <a href="#">password?</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php include "footer.php"?>