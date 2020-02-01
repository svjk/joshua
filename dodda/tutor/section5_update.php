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
                            <h3 class="fieldset-title">Others</h3>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">
                                    Languages Known
                                </label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <?php
                                                foreach ($languagesArray as $languages) {
                                                ?>
                                                <div class="col-md-3">
                                                    <div class="form-group form-check">                         
                                                        <label class="form-check-label checkbox-labels" for="">
                                                          <input type="checkbox" name="languagesKnown[]" class="form-check-input" id="" value="<?php echo $languages['languages_id'] ?>"> <?php echo $languages['languages_name'] ?> 
                                                        </label>
                                                    </div>
                                                </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Question 1</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <label style="color: rgb(0,0,0,.5);">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</label>
                                </div>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <textarea class="form-control" name="answer1" placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Question 3</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <label style="color: rgb(0,0,0,.5);">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</label>
                                </div>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <textarea class="form-control" name="answer2" placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Question 3</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <label style="color: rgb(0,0,0,.5);">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</label>
                                </div>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <textarea class="form-control" name="answer3" placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod"></textarea>
                                </div>
                            </div>                          
                        </fieldset>
                        <hr>
                        <div class="form-group">
                            <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                <button class="btn btn-primary" name="update5">NEXT <i class="fa fa-arrow-right"></i></button>
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