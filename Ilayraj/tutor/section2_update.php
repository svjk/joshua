<?php 
include '.././db/selects.php';
include 'add_edits.php';
include 'selects_tutor_profile.php';
$selectTutorSelectedBoards = mysqli_query($db_connect, "SELECT * FROM tutor_selected_boards WHERE tutor_id='$tutorID' ");
$tutorSelectedBoardsArray = array();
while ($row = mysqli_fetch_array($selectTutorSelectedBoards)) {
    $tutorSelectedBoardsArray[] = $row;
}
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
                            <h3 class="fieldset-title">Information</h3>

                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">
                                    Select Your Qualification
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <select class="form-control" name="qualification">
                                                    <option value="">Select</option>
                                                    <?php
                                                    foreach ($qualificationsArray as $qualifications) {
                                                    ?>
                                                    <option value="<?php echo $qualifications['qualification_id'] ?>">
                                                        <?php echo $qualifications['qualification_name'] ?>
                                                    </option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">
                                    Select Boards
                                </label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <?php
                                                foreach ($boardsArray as $boards) {   
                                                ?>
                                                <div class="col-md-3">
                                                    <div class="form-group form-check">           
                                                        <label class="form-check-label checkbox-labels" for="">
                                                          <input type="checkbox" name="boards[]" class="form-check-input" id="" value="<?php echo $boards['ID'] ?>">
                                                          <?php echo $boards['Boards'] ?>
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
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">
                                    Select Class
                                </label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <?php
                                                foreach ($classCategoryArray as $classCategory) {
                                                ?>
                                                <div class="col-md-4">
                                                    <div class="form-group form-check">                         
                                                        <label class="form-check-label checkbox-labels" for="">
                                                          <input type="checkbox" name="classStandards[]" class="form-check-input" id="" value="<?php echo $classCategory['ID'] ?>"> <?php echo $classCategory['Classes'] ?> 
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
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">
                                    Select Subjects
                                </label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <?php
                                                foreach ($subjectsArray as $subjects) {
                                                ?>
                                                <div class="col-md-4">
                                                    <div class="form-group form-check">                         
                                                        <label class="form-check-label checkbox-labels" for="">
                                                          <input type="checkbox" name="subjectsTeach[]" class="form-check-input" id="" value="<?php echo $subjects['ID'] ?>"> <?php echo $subjects['Subject'] ?> 
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
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">
                                    Select Tution Mode
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <?php
                                                foreach ($teachingModeArray as $teachingMode) {
                                                ?>
                                                <div class="col-md-4">
                                                    <div class="form-group form-check">                         
                                                        <label class="form-check-label checkbox-labels" for="">
                                                          <input type="checkbox" name="teachingMode[]" class="form-check-input" id="" value="<?php echo $teachingMode['teaching_mode_id'] ?>"> <?php echo $teachingMode['teaching_mode_name'] ?> 
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
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">
                                    Teaching Medium
                                </label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <?php
                                                foreach ($teachingMediumArray as $teachingMediums) {
                                                ?>
                                                <div class="col-md-3">
                                                    <div class="form-group form-check">                         
                                                        <label class="form-check-label checkbox-labels" for="">
                                                          <input type="checkbox" name="teachingMedium[]" class="form-check-input" id="" value="<?php echo $teachingMediums['teaching_medium_id'] ?>"> <?php echo $teachingMediums['teaching_medium_name'] ?> 
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
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">
                                    Job Type
                                </label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <select class="form-control" name="jobType">
                                        <option value="">Select</option>
                                        <?php 
                                        foreach ($jobTypesArray as $jobTypes) {
                                        ?>
                                        <option value="<?php echo $jobTypes['job_type_id'] ?>">
                                            <?php echo $jobTypes['job_type_name'] ?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <hr>
                        <div class="form-group">
                            <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                <button class="btn btn-primary" name="update2">NEXT <i class="fa fa-arrow-right"></i></button>
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
    $('select').selectpicker();
</script>