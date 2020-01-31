<?php
include '.././db/db_config.php';
include '.././db/selects.php';
include 'selects.php';
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
                    <h2 class="title">My Profile<span class="pro-label label label-warning">
                        <a href="section1_update.php" class="btn btn-primary">Update</a>
                    </span></h2>
                    <form class="form-horizontal">
                        <fieldset class="fieldset">
                            <h3 class="fieldset-title">Personal Info</h3>
                            <!-- <div class="form-group avatar">
                                <figure class="figure col-md-2 col-sm-3 col-xs-12">
                                    <img class="img-rounded img-responsive" src="tutor_upload_images/avatar1.png" alt="">
                                </figure>
                                <div class="form-inline col-md-10 col-sm-9 col-xs-12">
                                    <input type="file" class="file-uploader pull-left">
                                    <button type="submit" class="btn btn-sm btn-default-alt pull-left">Update Image</button>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Name</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="<?php echo $tutName ?>" readonly>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Email</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="email" class="form-control" name="" value="<?php echo $tutEmail ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Phone</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="" value="<?php echo $tutPhone ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Addrees</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="<?php echo $tutLocation?>" readonly>
                                </div>
                            </div>
                            
                        </fieldset>
                        <fieldset class="fieldset">
                            <h3 class="fieldset-title">Information</h3>

                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">
                                    Qualification
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <select class="form-control" name="qualification" readonly>
                                                    <option value="">Select</option>
                                                    <?php
                                                    foreach ($qualificationsArray as $qualifications) {
                                                    ?>
                                                    <option value="<?php echo $qualifications['qualification_id'] ?>"
                                                        <?php
                                                        if ($tutQfc == $qualifications['qualification_id']) {
                                                            echo "selected=selected";
                                                        }
                                                        ?>>
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
                                    Selected Boards
                                </label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <?php
                                                foreach ($tutorBoardsArray as $tutorBoards) {
                                                foreach ($boardsArray as $boards) {
                                                    if ($boards['ID']==$tutorBoards['boards_id']) {
                                                        $selectedBoards = $boards['Boards'];
                                                    }
                                                }   
                                                ?>
                                                <div class="col-md-3">
                                                    <div class="form-group form-check">           
                                                        <label class="form-check-label checkbox-labels" for="">
                                                          <input type="checkbox" name="boards[]" class="form-check-input" id="" value="<?php echo $selectedBoards ?>" disabled="disabled" checked="checked">
                                                          <?php echo $selectedBoards ?>
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
                                    Selected Class
                                </label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <?php
                                                foreach ($tutorClassArray as $tutorClass){
                                                foreach ($classCategoryArray as $classCategory) {
                                                    if ($classCategory['ID']==$tutorClass['classnames_id']) {
                                                        $selectedClass = $classCategory['Classes'];
                                                    }
                                                }
                                                ?>
                                                <div class="col-md-4">
                                                    <div class="form-group form-check">                         
                                                        <label class="form-check-label checkbox-labels" for="">
                                                          <input type="checkbox" name="classStandards[]" class="form-check-input" id="" value="<?php echo $selectedClass ?>" disabled="disabled" checked="checked"> <?php echo $selectedClass ?> 
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
                                                foreach ($tutorSubjectsArray as $tutorSubjects) {
                                                foreach ($subjectsArray as $subjects) {
                                                    if ($subjects['ID']==$tutorSubjects['subject_id']) {
                                                        $selectedSubjects = $subjects['Subject'];
                                                    }
                                                }
                                                ?>
                                                <div class="col-md-4">
                                                    <div class="form-group form-check">                         
                                                        <label class="form-check-label checkbox-labels" for="">
                                                          <input type="checkbox" name="subjectsTeach[]" class="form-check-input" id="" value="<?php echo $selectedSubjects ?>" disabled="disabled" checked="checked"> <?php echo $selectedSubjects ?> 
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
                                                foreach ($tutorTeachingModesArray as $tutorTeachingModes) {
                                                foreach ($teachingModeArray as $teachingMode) {
                                                    if ($teachingMode['teaching_mode_id']==$tutorTeachingModes['teaching_mode_id']) {
                                                        $selectedTutionModes = $teachingMode['teaching_mode_name'];
                                                    }
                                                }
                                                ?>
                                                <div class="col-md-4">
                                                    <div class="form-group form-check">                         
                                                        <label class="form-check-label checkbox-labels" for="">
                                                          <input type="checkbox" name="teachingMode[]" class="form-check-input" id="" value="<?php echo $selectedTutionModes ?>" disabled="disabled" checked="checked"> <?php echo $selectedTutionModes ?> 
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
                                                foreach ($tutorTeachingMediumArray as $tutorTeachingMedium) {
                                                foreach ($teachingMediumArray as $teachingMediums) {
                                                    if ($teachingMediums['teaching_medium_id']==$tutorTeachingMedium['teaching_medium_id']) {
                                                        $selectedTeachingMediums = $teachingMediums['teaching_medium_name'];
                                                    }
                                                }
                                                ?>
                                                <div class="col-md-3">
                                                    <div class="form-group form-check">                         
                                                        <label class="form-check-label checkbox-labels" for="">
                                                          <input type="checkbox" name="teachingMedium[]" class="form-check-input" id="" value="<?php echo $selectedTeachingMediums ?>" disabled="disabled" checked="checked"> <?php echo $selectedTeachingMediums ?> 
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
                                    <select class="form-control" name="jobType" readonly>
                                        <option value="">Select</option>
                                        <?php 
                                        foreach ($jobTypesArray as $jobTypes) {

                                        ?>
                                        <option value="<?php echo $jobTypes['job_type_id'] ?>"
                                        <?php 
                                        if ($tutJobType==$jobTypes['job_type_id']) {
                                            echo "selected=selected";
                                        }
                                        ?>>
                                            <?php echo $jobTypes['job_type_name'] ?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        
                        <fieldset class="fieldset">
                            <h3 class="fieldset-title">Contact Detail</h3>
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Permanent Addrees</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="permanentAddress" value="<?php echo $tutPermAddress ?>" readonly>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Choose ID Type</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <select class="form-control" name="proof_type_id" readonly>
                                        <option value="">Select</option>
                                        <?php
                                        foreach ($addressProofArray as $addressProofs) {
                                        ?>
                                        <option value="<?php echo $addressProofs['address_proof_id'] ?>"
                                        <?php
                                        if ($tutAddProofID==$addressProofs['address_proof_id']) {
                                            echo "selected=selected";
                                        }
                                        ?>>
                                            <?php echo $addressProofs['address_proof_name'] ?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">ID Number</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="proofIdNumber" readonly value="<?php echo $tutProofIdNum ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Upload ID Proof</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <img src="<?php echo $tutProofDocUrl ?>" style="width: 250px;height: 150px;">
                                </div>
                            </div>
                        </fieldset>
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

                        <fieldset class="fieldset">
                            <h3 class="fieldset-title">Others</h3>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">
                                    Languages Known
                                </label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                        <?php
                                        foreach ($languagesArray as $languages) {
                                        ?>
                                        <div class="col-md-3">
                                            <div class="form-group form-check">                         
                                                <label class="form-check-label checkbox-labels" for="">
                                                  <input type="checkbox" name="languagesKnown" class="form-check-input" id="" value="<?php echo $languages['languages_id'] ?>"> <?php echo $languages['languages_name'] ?> 
                                                </label>
                                            </div>
                                        </div>
                                        <?php }?>
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
                        
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
<?php include 'script_links.php'; ?>
</body>
</html>