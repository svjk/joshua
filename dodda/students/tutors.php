<?php
session_start();
include '.././db/selects.php';
include 'selects_all.php';
include '.././PHPMailer/PHPMailerAutoload.php';
// *********** Send SMS ****************** 
if (isset($_POST['sendSMS'])) {
    $checkedTutors = $_POST['tutorPhone'];
    for ($i=0; $i <COUNT($checkedTutors) ; $i++) {
        $checkedTutorsID = $checkedTutors[$i];
        $selectTutorsPhones = mysqli_query($db_connect, "SELECT *
            FROM tutors
            WHERE tutor_id='".$checkedTutorsID."' ");
        
        $tutorsPhoneEmailArray = array();
        while ($row = mysqli_fetch_array($selectTutorsPhones)) {
            $tutorsPhoneEmailArray[] = $row;
        }
        foreach ($tutorsPhoneEmailArray as $tutorsPhoneEmail) {
            $p = $_SESSION['tutor_phone']=$tutorsPhoneEmail['tutor_phone'];

            $YourAPIKey='33119aa2-46a6-11e9-8806-0200cd936042';
            $From='TFCTOR';
            $To=$tutorsPhoneEmail['tutor_phone'];

            $Msg='Dear Sir/Madam '.$tutorsPhoneEmail['tutor_name'].' Please Login and Update Your Profile to get Part/Full Time Job By Clicking Below'.' '."http://localhost/joshua/dodda/tutor/index.php?phone=$p";


            ### DO NOT Change anything below this line
            $agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
            $url = "https://2factor.in/API/V1/$YourAPIKey/ADDON_SERVICES/SEND/PSMS"; 
            $ch = curl_init(); 
            curl_setopt($ch,CURLOPT_URL,$url); 
            curl_setopt($ch,CURLOPT_POST,true); 
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); 
            curl_setopt($ch,CURLOPT_POSTFIELDS,"From=$From&To=$To&Msg=$Msg"); 
            curl_setopt($ch, CURLOPT_USERAGENT, $agent);
            echo curl_exec($ch); 
            curl_close($ch);
        }
    }       
}
// ************ End SMS ****************

// *********** Send Email ****************** 
if (isset($_POST['sendEmail'])) {
    $checkedTutors = $_POST['tutorPhone'];
    for ($i=0; $i <COUNT($checkedTutors) ; $i++) {
        $checkedTutorsID = $checkedTutors[$i];
        $selectTutorsEmail = mysqli_query($db_connect, "SELECT *
            FROM tutors AS tut
            WHERE tutor_id='".$checkedTutorsID."' ");
        
        $tutorsPhoneEmailArray = array();
        while ($row = mysqli_fetch_array($selectTutorsEmail)) {
            $tutorsPhoneEmailArray[] = $row;
        }
        foreach ($tutorsPhoneEmailArray as $tutorsPhoneEmail) {
            $p = $_SESSION['tutor_phone']=$tutorsPhoneEmail['tutor_phone'];
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPAuth = true;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->Username = 'testsvjk@gmail.com'; //svjktutor@gmail.com
            $mail->Password = 'test@SVJK70'; //svjk123!@#
            $mail->setFrom('testsvjk@gmail.com');
            $mail->addBCC($tutorsPhoneEmail['tutor_email']);
            $mail->addReplyTo('testsvjk@gmail.com');
            $mail->isHTML(true);
            $mail->Subject = "Test Message From Svjk";
            $mail->Body = 'Dear Sir/Madam '.$tutorsPhoneEmail['tutor_name'].' Please Login and Update Your Profile to get Part/Full Time Job By Clicking Below'.'<br>'."http://localhost/joshua/dodda/tutor/index.php?phone=$p".' <br>'.'WhatsApp for More Detail '. "https://api.whatsapp.com/send?phone=+919731263208";

            if (!$mail->send()) {
                echo "ERROR: " . $mail->ErrorInfo;
            } else {
                echo "SUCCESS  ";
            }
            
        }
    }       
}
// ************ End Email ****************

if (isset($_POST['indviSMSBtn'])) {
    $tutID = $_POST['tutor_id'];
    $selectOneTut = mysqli_query($db_connect, "SELECT * FROM tutors WHERE tutor_id='$tutID' ");
    $row = mysqli_fetch_array($selectOneTut);
    echo $p = $_SESSION['tutor_phone'] =$row['tutor_phone'];
    $tutName = $row['tutor_name'];

    $YourAPIKey='33119aa2-46a6-11e9-8806-0200cd936042';
    $From='TFCTOR';
    $To=$p;

    $Msg='Dear Sir/Madam '.$tutName.' Please Login and Update Your Profile to get Part/Full Time Job By Clicking Below'.' '."http://localhost/joshua/dodda/tutor/index.php?phone=$p";


            ### DO NOT Change anything below this line
    $agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
    $url = "https://2factor.in/API/V1/$YourAPIKey/ADDON_SERVICES/SEND/PSMS"; 
    $ch = curl_init(); 
    curl_setopt($ch,CURLOPT_URL,$url); 
    curl_setopt($ch,CURLOPT_POST,true); 
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); 
    curl_setopt($ch,CURLOPT_POSTFIELDS,"From=$From&To=$To&Msg=$Msg"); 
    curl_setopt($ch, CURLOPT_USERAGENT, $agent);
    echo curl_exec($ch); 
    curl_close($ch);
}
// *********** End Single Message Sending ********

// ********** Start Single Tutor Mail Sending ***********
if (isset($_POST['indviMailBtn'])) {
    $tutID = $_POST['tutor_id'];
    $selectOneTut = mysqli_query($db_connect, "SELECT * FROM tutors WHERE tutor_id='$tutID' ");
    $row = mysqli_fetch_array($selectOneTut);
    $p = $_SESSION['tutor_phone']=$row['tutor_phone'];
    $tutName = $row['tutor_name'];
    $tutEmail = $row['tutor_email'];
    
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->Username = 'testsvjk@gmail.com'; //svjktutor@gmail.com
    $mail->Password = 'test@SVJK70'; //svjk123!@#
    $mail->setFrom('testsvjk@gmail.com');
    $mail->addBCC($tutEmail);
    $mail->addReplyTo('testsvjk@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = "Test Message From Svjk";
    $mail->Body = 'Dear Sir/Madam '.$tutName.' Please Login and Update Your Profile to get Part/Full Time Job By Clicking Below'.'<br>'."http://localhost/joshua/dodda/tutor/index.php?phone=$p".' <br>'.'WhatsApp for More Detail '. "https://api.whatsapp.com/send?phone=+919731263208";

    if (!$mail->send()) {
        echo "ERROR: " . $mail->ErrorInfo;
    } else {
        echo "SUCCESS  ";
    }
    
}

if (isset($_POST['sendMultiSMS'])) {
    $tutsPhone = $_POST['tutorPh']; 
    $smsMessage = $_POST['smsMessage']; 
// use of explode 
    $string = "$tutsPhone"; 
    $str_arr = explode (",", $string);
    foreach ($str_arr as $str_phon) {
        $selectTuts = mysqli_query($db_connect, "SELECT * FROM tutors WHERE tutor_phone='$str_phon' ");
        $checkedTuts = array();
        while ($row = mysqli_fetch_array($selectTuts)) {
            $checkedTuts[] = $row;
        }
        foreach ($checkedTuts as $checkedTutors) {
            $p = $_SESSION['tutor_phone']=$checkedTutors['tutor_phone'];
            $YourAPIKey='33119aa2-46a6-11e9-8806-0200cd936042';
            $From='TFCTOR';
            $To=$p;

            $Msg='Shri '.$checkedTutors['tutor_name'].' '. $smsMessage ;


            ### DO NOT Change anything below this line
            $agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
            $url = "https://2factor.in/API/V1/$YourAPIKey/ADDON_SERVICES/SEND/PSMS"; 
            $ch = curl_init(); 
            curl_setopt($ch,CURLOPT_URL,$url); 
            curl_setopt($ch,CURLOPT_POST,true); 
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); 
            curl_setopt($ch,CURLOPT_POSTFIELDS,"From=$From&To=$To&Msg=$Msg"); 
            curl_setopt($ch, CURLOPT_USERAGENT, $agent);
            echo curl_exec($ch); 
            curl_close($ch);
        }
    }
}
/*
tutor_id, tutor_name, tutor_phone, tutor_email, gender_id, tutor_dob, tutor_location, tutor_profile_image, tutor_age, qualification_id, boards_id, classnames_id, subject_id, teaching_mode_id, teaching_medium_id, job_type_id, permanent_address, address_proof_id, proof_id_number, address_proof_front, address_proof_back, experience_id, institution_name, tutor_designation, tutor_salary, languages_id, question1_answer, question2_answer, question3_answer, tutor_lat, tutor_lng, city_id, tutor_desired_city, tutor_svjk_score, tutor_rating, passport_status, tutor_specialization, teaching_certification, criminal_cases_complaints, tutor_created_datetime, tutor_updated_datetime
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header_links.php'; ?>
    <style type="text/css">
        .table-action-btns{
            width: 120px;
            display: inline-block;
        }
        .table-action-btns .act-btns{
            display: inline-block;
            cursor: pointer;
        }
    </style>
</head>
<body>
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <div class="view-account">
            <section class="module">
                <div class="module-inner">
                    <?php include 'side_bar_svjk.php'; ?>
                   <div class="content-panel">
                    <!-- <h2 class="title">My Profile<span class="pro-label label label-warning">Update</span></h2> -->
                    <form class="form-horizontal" action="" method="POST" id="allTutorsForm">
                        <fieldset class="fieldset">
                            <h3 class="fieldset-title">All Tutors</h3>
                            <div class="row" style="">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="" id="selectedTuts">
                                </div>
                                <div class="col-md-12">
                                    <table id="allTutorsTable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th colspan="4" class="text-center">All Tutors</th>
                                                <th>
                                                    <button type="button" class="btn btn-primary btn-sm sendSMS" name="">
                                                        <i class="fas fa-sms"></i> SMS
                                                    </button>
                                                </th>
                                                <th>
                                                    <button class="btn btn-success btn-sm" name="sendWhatsApp">
                                                        <i class="fab fa-whatsapp"></i> WhatsApp
                                                    </button>
                                                </th>
                                                <th>
                                                    <button class="btn btn-info btn-sm" name="sendEmail">
                                                        <i class="fa fa-envelope" aria-hidden="true"></i> E-Mail
                                                    </button>
                                                </th>
                                                <th><a href="" class="btn btn-secondary btn-sm"><i class="fa fa-download" aria-hidden="true"></i> Download</a></th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <input type="checkbox" id="checkAllTutor">
                                                </th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Qualificaton</th>
                                                <th>Gender</th>
                                                <th>Experience</th>
                                                <th>Location</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=0;
                                            foreach ($tutorsArray as $allTutors) {
                                                $i++;
                                                $tutsName = $allTutors['tutor_name'];
                                                $tutsPhone = $allTutors['tutor_phone'];

                                                foreach ($qualificationsArray as $qualifications) {
                                                    if (!$allTutors['qualification_id']=='') {
                                                        if ($qualifications['qualification_id']==$allTutors['qualification_id']) {
                                                            $tutsQualification = $qualifications['qualification_name'];
                                                        }
                                                    }
                                                    else if ($allTutors['qualification_id']=='') {
                                                        $tutsQualification = '';
                                                    }
                                                    
                                                }

                                                foreach ($tutorSubjectsArray as $tutorSubjects) {
                                                    if (!$tutorSubjects['tutor_id']=='') {
                                                        if ($tutorSubjects['tutor_id'] == $allTutors['tutor_id']) {
                                                            foreach ($subjectsArray as $subjects) {
                                                                if ($subjects['ID']==$tutorSubjects['subject_id']) {
                                                                   $tutsSubjects = $subjects['Subject'].'</br>';
                                                                }
                                                            }
                                                        }
                                                    }
                                                    elseif ($tutorSubjects['tutor_id']=='') {
                                                        $tutsSubjects = '';
                                                    }                                           
                                                }

                                                foreach ($genderArray as $gender) {
                                                    if (!$allTutors['gender_id']=='') {
                                                        if ($gender['gender_id']==$allTutors['gender_id']) {
                                                            $tutsGender = $gender['gender_name'];
                                                        }
                                                    }
                                                    else if ($allTutors['gender_id']=='') {
                                                        $tutsGender = '';
                                                    }
                                                }

                                                foreach ($experienceArray as $experience) {
                                                    if (!$allTutors['experience_id']=='') {
                                                        if ($experience['experience_id']==$allTutors['experience_id']) {
                                                            $tutsExper = $experience['experience_name'].' Year';
                                                        }
                                                    }
                                                    else if ($allTutors['experience_id']=='') {
                                                        $tutsExper = '';
                                                    }
                                                }

                                                $tutsLocation = $allTutors['tutor_location'];
                                            ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="tutorPhone[]" value="<?php echo $allTutors['tutor_phone'] ?>" id="tutorPhone">
                                                </td>
                                                <td><?php echo $tutsName ?></td>
                                                <td><?php echo $tutsPhone ?></td>
                                                <td><?php echo $tutsQualification ?></td>
                                                <td><?php echo $tutsGender ?></td>
                                                <td><?php echo $tutsExper ?></td>
                                                <td><?php echo $tutsLocation ?></td>
                                                <td>
                                                    <div class="table-action-btns">
                                                        <a class="act-btns sendSmsLink" id="<?php echo $allTutors['tutor_id'] ?>" title="Send SMS">
                                                            <i class="fas fa-sms"></i>
                                                        </a> |
                                                        <a class="act-btns sendMailLink" id="<?php echo $allTutors['tutor_id'] ?>" title="Send Mail">
                                                            <i class="fa fa-envelope"></i>
                                                        </a> |
                                                        <a href="index.php?phone=<?php echo $allTutors['tutor_phone'] ?>" class="act-btns" title="Update">
                                                            <i class="fa fa-edit"></i>
                                                        </a> |
                                                        <a href="tutor_delete.php?tutor_id=<?php echo $allTutors['tutor_id'] ?>" onclick="deleteTutor()" class="act-btns" title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>  
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>                            
                        </fieldset>                        
                        <hr>
                        <div class="form-group">
                            <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                <button class="btn btn-primary"> <i class="fa fa-search"></i> Search Tutors <i class="fa fa-arrow-right"></i></button>
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
    $(document).ready(function() {
        $('#allTutorsTable').DataTable();
    } );
</script>
<script type="text/javascript">
    function getChcked(){
    var form = document.getElementById('myform');
    var chks = form.querySelectorAll('input[type="checkbox"]');
    var checked = [];
    for(var i = 0; i < chks.length; i++){
        if(chks[i].checked){
            checked.push(chks[i].value)
        }
    }
    return checked;
}
</script>
<script type="text/javascript">
    $(".sendSMS").click(function () {
        var form = document.getElementById('allTutorsForm');
        var chks = form.querySelectorAll('input[type="checkbox"]');
        var checked = [];
        for(var i = 0; i < chks.length; i++){
            if(chks[i].checked){
                checked.push(chks[i].value);
                $("#smsSelectedTuts").val(checked);
            }
        }
        $("#sendMultipleSMS").modal('show');
        return checked;
        // var ph = $("#tutorPhone").val();
        // alert(ph);


    })
    $('.sendSmsLink').click(function () {
        var tutID = $(this).attr('id');
        $("#sms_tutor_id").val(tutID);
        $("#sendIndiviualSmsModal").modal('show');
    })
    $('.sendMailLink').click(function () {
        var tutID = $(this).attr('id');
        $("#mail_tutor_id").val(tutID);
        $('#sendIndiviualMailModal').modal('show');
    })
</script>
<script>
    $("#checkAllTutor").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>