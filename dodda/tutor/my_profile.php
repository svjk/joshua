<?php
include '.././db/db_config.php';
include '.././db/selects.php';
include 'selects_tutor_profile.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header_links.php'; ?>
    <style>
		.mandatory-label
		{
			color: red;
		}    	

    </style>
</head>
<body>
<?php
	require_once '../business_functions.php';
?>

<?php
	require_once 'check_auth_tutor.php';
?>    
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
                                                        
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label" style="width: 55px;">Name</label>
                                <label class="mandatory-label">*</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="<?php echo $tutName ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label" style="width: 50px;">Email</label>
                                <label class="mandatory-label">*</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="email" class="form-control" name="" value="<?php echo $tutEmail ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label" style="width: 56px;">Phone</label>
                                <label class="mandatory-label">*</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="" value="<?php echo $tutPhone ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label" style="width: 69px;">Addrees</label>
                                <label class="mandatory-label">*</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="<?php echo $tutLocation?>">
                                </div>
                            </div>                            
                        </fieldset>
                        <br/>
                        <fieldset class="fieldset">
                            <h3 class="fieldset-title">Information</h3>

                            <div class="form-group">
                                <label style="width: 95px; margin-left: 15px;">
                                    Qualification
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row" style="margin-left: 0px;">
                                                <select class="form-control" name="qualification">
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
                                <label style="width: 120px; margin-left: 15px;">
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
                                <label style="width: 108px; margin-left: 15px;">
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
                                <label style="width: 112px; margin-left: 15px;">
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
                                <label style="width: 145px; margin-left: 15px;">
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
                                <label style="width: 133px; margin-left: 15px;">
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
                                <label style="width: 68px; margin-left: 15px;">
                                    Job Type
                                </label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <select class="form-control" name="jobType">
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
                        <br/>
                        <fieldset class="fieldset">
                            <h3 class="fieldset-title">Contact Detail</h3>
                            <div class="form-group">
                                <label style="width: 145px; margin-left: 15px;">Permanent Addrees</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="permanentAddress" value="<?php echo $tutPermAddress ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label style="width: 117px; margin-left: 15px;">Choose ID Type</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <select class="form-control" name="proof_type_id">
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
                                <label style="width: 85px; margin-left: 15px;">ID Number</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="proofIdNumber" value="<?php echo $tutProofIdNum ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="width: 120px; margin-left: 15px;">Upload ID Proof</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <img src="<?php echo $tutProofDocUrl ?>" style="width: 250px;height: 150px;" alt="<?php echo $tutProofDoc ?>">
                                </div>
                            </div>
                        </fieldset>
                        <br/>
                        <fieldset class="fieldset">
                            <h3 class="fieldset-title">Experience</h3>
                            <div class="form-group">
                                <label style="width: 200px; margin-left: 15px;">
                                    Select Experience
                                </label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <select class="form-control" name="experienceID">
                                        <option value="">Select</option>
                                        <?php
                                        foreach ($experienceArray as $experience) {
                                        ?>
                                        <option value="<?php echo $experience['experience_id'] ?>"
                                        <?php
                                        if ($tutuExperID==$experience['experience_id']) {
                                            echo "selected=selected";
                                        }
                                        ?>>
                                            <?php echo $experience['experience_name'] ?> Year
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label style="width: 228px; margin-left: 15px;">Company / Organization Name</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="organization_name"  value="<?php echo $tutOrg?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="width: 90px; margin-left: 15px;">Designation</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="old_designation" value="<?php echo $tutDesig?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="width: 106px; margin-left: 15px;">Current Salary</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="current_sal" value="<?php echo $tutSal?>">
                                </div>
                            </div>
                        </fieldset>
                        <br/>
                        <fieldset class="fieldset">
                            <h3 class="fieldset-title">Others</h3>
                            <div class="form-group">
                                <label style="width: 135px; margin-left: 15px;">
                                    Languages Known
                                </label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <?php
                                                foreach ($tutLangKnownArray as $tutLangKnown) {
                                                
                                                foreach ($languagesArray as $languages) {
                                                    if ($languages['languages_id']==$tutLangKnown['languages_id']) {
                                                        $selectedLangKnown = $languages['languages_name'];
                                                    }
                                                }
                                                ?>
                                                <div class="col-md-3">
                                                    <div class="form-group form-check">                         
                                                        <label class="form-check-label checkbox-labels" for="">
                                                          <input type="checkbox" name="languagesKnown[]" class="form-check-input" id="" value="<?php echo $selectedLangKnown ?>" disabled="disabled" checked> <?php echo $selectedLangKnown ?> 
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
                                <label style="width: 85px; margin-left: 15px;">Question 1</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <label style="color: rgb(0,0,0,.5);">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</label>
                                </div>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <textarea class="form-control" name="answer1" placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod"><?php echo $tutAns1 ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="width: 85px; margin-left: 15px;">Question 2</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <label style="color: rgb(0,0,0,.5);">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</label>
                                </div>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <textarea class="form-control" name="answer2" placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod"><?php echo $tutAns2 ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="width: 85px; margin-left: 15px;">Question 3</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <label style="color: rgb(0,0,0,.5);">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</label>
                                </div>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <textarea class="form-control" name="answer3" placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod"><?php echo $tutAns3 ?></textarea>
                                </div>
                            </div>                          
                        </fieldset>
                        <hr>
                        <div class="form-group">
                            <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                <a href="section1_update.php" class="btn btn-primary">
                                    Go to Update <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                                </a>
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