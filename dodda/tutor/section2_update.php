<?php 
include '.././db/selects.php';
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
                    <form class="form-horizontal">
                        <fieldset class="fieldset">
                            <h3 class="fieldset-title">Information</h3>
                            
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">
                                    Select Boards
                                </label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                        for ($i=1; $i <=3 ; $i++) { 
                                        ?>
                                        <div class="col-md-3">
                                            <div class="form-group form-check">                         
                                                <label class="form-check-label checkbox-labels" for="">
                                                  <input type="checkbox" name="" class="form-check-input" id="" > Boards name
                                                </label>
                                            </div>
                                        </div>
                                        <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">
                                    Select Class
                                </label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                        for ($i=1; $i <=3 ; $i++) { 
                                        ?>
                                        <div class="col-md-3">
                                            <div class="form-group form-check">                         
                                                <label class="form-check-label checkbox-labels" for="">
                                                  <input type="checkbox" name="" class="form-check-input" id="" > Class name
                                                </label>
                                            </div>
                                        </div>
                                        <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">
                                    Select Tution Mode
                                </label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                        for ($i=1; $i <=3 ; $i++) { 
                                        ?>
                                        <div class="col-md-3">
                                            <div class="form-group form-check">                         
                                                <label class="form-check-label checkbox-labels" for="">
                                                  <input type="checkbox" name="" class="form-check-input" id="" > Tution Mode name
                                                </label>
                                            </div>
                                        </div>
                                        <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">
                                    Teaching Medium
                                </label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                        for ($i=1; $i <=3 ; $i++) { 
                                        ?>
                                        <div class="col-md-3">
                                            <div class="form-group form-check">                         
                                                <label class="form-check-label checkbox-labels" for="">
                                                  <input type="checkbox" name="" class="form-check-input" id="" > Medium name
                                                </label>
                                            </div>
                                        </div>
                                        <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">
                                    Job Type
                                </label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <select class="form-control">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <hr>
                        <div class="form-group">
                            <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                <button class="btn btn-primary">NEXT <i class="fa fa-arrow-right"></i></button>
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