<?php 
include '.././db/selects.php';
include 'add_edits.php';
include 'selects_tutor_profile.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header_links.php'; ?>
</head>
<body>
    <div class="container">
        <div class="view-account">
            <section class="module">
                <div class="module-inner">
                    <?php include 'side_bar.php'; ?>
                   <div class="content-panel">
                    <h2 class="title">My Profile<span class="pro-label label label-warning">Update</span></h2>
                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        <fieldset class="fieldset">
                            <h3 class="fieldset-title">Personal Info</h3>
                            <div class="form-group avatar">
                                <figure class="figure col-md-2 col-sm-3 col-xs-12">
                                    <img class="img-rounded img-responsive" src="tutor_upload_images/avatar1.png" alt="">
                                </figure>
                                <div class="form-inline col-md-10 col-sm-9 col-xs-12">
                                    <input type="file" name="profile-image" class="file-uploader pull-left">
                                    <!-- <button type="submit" class="btn btn-sm btn-default-alt pull-left">Update Image</button> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Name</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Email</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Gender</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <select class="form-control" name="gender" required>
                                        <option value="">Select</option>
                                        <?php
                                        foreach ($genderArray as $gender) {
                                        ?>
                                        <option value="<?php echo $gender['gender_id'] ?>">
                                           <?php echo $gender['gender_name'] ?> 
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">DOB</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="date" class="form-control dobdatepicker" name="dob" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Addrees</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" name="current_address" class="form-control">
                                    <p class="help-block">Enter Your Current Address</p>
                                </div>
                            </div>
                            
                        </fieldset>
                        
                        <hr>
                        <div class="form-group">
                            <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                <button class="btn btn-primary" name="update1">NEXT <i class="fa fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
<?php include 'script_links.php'; ?>
</body>
</html>
<script type="text/javascript">
    $('.dobdatepicker').datepicker();
</script>