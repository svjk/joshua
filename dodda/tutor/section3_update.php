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
                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        <fieldset class="fieldset">
                            <h3 class="fieldset-title">Contact Detail</h3>
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Permanent Addrees</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="permanentAddress">
                                    <p class="help-block">Enter Your Permanent Address</p>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Choose ID Type</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <select class="form-control" name="proof_type_id">
                                        <option value="">Select</option>
                                        <?php
                                        foreach ($addressProofArray as $addressProofs) {
                                        ?>
                                        <option value="<?php echo $addressProofs['address_proof_id'] ?>">
                                            <?php echo $addressProofs['address_proof_name'] ?> <?php echo $addressProofs['address_proof_id'] ?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Enter ID Number</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="proofIdNumber" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Upload ID Proof</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="file" name="addressProofDocument" class="form-control">                  
                                </div>
                            </div>
                        </fieldset>
                        <hr>
                        <div class="form-group">
                            <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                <button class="btn btn-primary" name="update3">NEXT <i class="fa fa-arrow-right"></i></button>
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