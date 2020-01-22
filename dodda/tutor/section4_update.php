<?php 
include '.././db/selects.php';
include 'add_edits.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header_links.php'; ?>
</head>
<body>
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <div class="view-account">
            <section class="module">
                <div class="module-inner">
                    <?php include 'side_bar.php'; ?>
                   <div class="content-panel">
                    <h2 class="title">My Profile<span class="pro-label label label-warning">Update</span></h2>
                    <form class="form-horizontal" action="" method="POST">
                        <fieldset class="fieldset">
                            <h3 class="fieldset-title">Experience</h3>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">
                                    Select Experience
                                </label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <select class="form-control" name="experienceID">
                                        <option value="">Select</option>
                                        <?php
                                        foreach ($experienceArray as $experience) {
                                        ?>
                                        <option value="<?php echo $experience['experience_id'] ?>">
                                            <?php echo $experience['experience_name'] ?> Year
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Company / Organization Name</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="organization_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Designation</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="old_designation">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Current Salary</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="current_sal">
                                </div>
                            </div>
                        </fieldset>
                        <hr>
                        <div class="form-group">
                            <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                <button class="btn btn-primary" name="update4">NEXT <i class="fa fa-arrow-right"></i></button>
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