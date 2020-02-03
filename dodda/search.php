<?php
include './db/selects.php';
include './db/search_actions.php';
include './PHPMailer/PHPMailerAutoload.php';
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


?>
<!DOCTYPE html>
<html>
<head>
	<title>ADavance Search</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
</head>
<body>
	<section>
		<div class="container">
			<div class="col-md-12">
				<div class="row 1">
					<div class="col-md-12">
						<div class="text-center">
							<h1>SVJK TUTORS</h1>
						</div>
					</div>
				</div>
				<div class="row 2">
					<div class="col-md-12">
						<div class="text-center">
							<h3>Search Tutor's</h3>

							<a href="tel://+91 9739981327" class="phoneMe">Call</a>

  							<a href="https://api.whatsapp.com/send?phone=+91 9739981327" class="whatsapp">WhatsApp</a>
						</div>
					</div>
					<div class="col-md-12">
						<form action="" method="POST">
							<table class="table table-bordered">
								<tr>
									<td>
										<input type="text" class="form-control" name="location" required list="localityList" placeholder="Location" value="<?php
										if(isset($_POST['advSearchBtn']) AND $_POST['location']){
											echo $_POST['location'];
										}
										?>">
										<datalist id="localityList">
											<?php
											foreach ($allTutorsArray as $allTutors) {
											?>
											<option value="<?php echo $allTutors['tutor_location'] ?>">
											<?php }?>
										</datalist>
									</td>
									<td>
										<select class="form-control" name="qualification">
											<option value="">Select Qualification</option>
											<?php
											foreach ($qualificationsArray as $qualifications) {
												?>
												<option value="<?php echo $qualifications['qualification_id'] ?>"
												<?php 
												if (isset($_POST['advSearchBtn']) AND $_POST['qualification']==$qualifications['qualification_id']) {
													echo "selected=selected";
												}
												?>>
													<?php echo $qualifications['qualification_name'] ?>
												</option>
											<?php }?>
										</select>
									</td>
									<td>
										<select class="form-control" name="subject">
											<option value="">Select Subjects</option>
											<?php
											foreach ($subjectsArray as $subject) {
												?>
												<option value="<?php echo $subject['ID'] ?>"
												<?php 
												if (isset($_POST['advSearchBtn']) AND $_POST['subject']==$subject['ID']) {
													echo "selected=selected";
												}
												?>>
													<?php echo $subject['Subject'] ?>
												</option>
											<?php }?>
										</select>
									</td>
									<td>
										<select class="form-control" name="gender">
											<option value="">Select Gender</option>
											<?php
											foreach ($genderArray as $gender) {
												?>
												<option value="<?php echo $gender['gender_id'] ?>"
												<?php 
												if (isset($_POST['advSearchBtn']) AND $_POST['gender']==$gender['gender_id']) {
													echo "selected=selected";
												}
												?>>
													<?php echo $gender['gender_name'] ?>
												</option>
											<?php }?>
										</select>
									</td>
									<td>
										<select class="form-control" name="experience">
											<option value="">Select Experience</option>
											<?php
											foreach ($experienceArray as $experience) {
												?>
												<option value="<?php echo $experience['experience_id'] ?>"
												<?php 
												if (isset($_POST['advSearchBtn']) AND $_POST['experience']==$experience['experience_id']) {
													echo "selected=selected";
												}
												?>>
													<?php echo $experience['experience_name'] ?>
												</option>
											<?php }?>
										</select>
									</td>
									<td>
										<button class="btn btn-primary" name="advSearchBtn">
											Search
										</button>
									</td>
								</tr>
							</table>
						</form>
					</div>
				</div><!-- end row 2 -->
				<div class="row 3">
					<div class="col-md-12">
						<form action="" method="POST">
							<table class="table table-bordered" id="searchedTutorsTable">
								<thead>
									<tr>
										<th colspan="5" class="text-center">
											<h3>Filtered Results</h3>
										</th>
										<th>
											<button class="btn btn-primary btn-sm" name="sendSMS">
												<i class="fas fa-sms"></i> SMS
											</button>
										</th>
										<th>
											<button class="btn btn-info btn-sm" name="sendEmail">
												<i class="fa fa-envelope" aria-hidden="true"></i> E-Mail
											</button>
										</th>
										<th><a href="" class="btn btn-success btn-sm"><i class="fa fa-download" aria-hidden="true"></i> Download</a></th>
									</tr>
									<tr>
										<th><input type="checkbox" name=""></th>
										<th>Name</th>
										<th>Phone</th>
										<th>Qualificaton</th>
										<th>Subject</th>
										<th>Gender</th>
										<th>Experience</th>
										<th>Location</th>
									</tr>
								</thead>
								<?php
								foreach ($searchedTutorsdArray as $searchedTutors) {
									?>
									<tr>
										<td><input type="checkbox" name=""></td>
										<td><?php echo $searchedTutors['tutor_name'] ?></td>
										<td><?php echo $searchedTutors['tutor_phone'] ?></td>
										<td><?php echo $searchedTutors['qualification_name'] ?></td>
										<td><?php echo $searchedTutors['Subject'] ?></td>
										<td><?php echo $searchedTutors['gender_name'] ?></td>
										<td><?php echo $searchedTutors['experience_name'] ?> Year</td>
										<td><?php echo $searchedTutors['tutor_location'] ?></td>
									</tr>
								<?php }?>
							</table>
						</form>
					</div>					
				</div><!--end row 3-->
			</div>
		</div>
	</section><hr>
	<section style="padding-top: 30px;">
		<div class="container">
			<div class="col-md-12">
				<div class="row 1">
					<div class="col-md-12">
						<form action="" method="POST">
							<table id="allTutorsTable" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th colspan="6" class="text-center">All Tutors</th>
										<th>
											<button class="btn btn-primary btn-sm" name="sendSMS">
												<i class="fas fa-sms"></i> SMS
											</button>
										</th>
										<th>
											<a href="https://api.whatsapp.com/send?phone=919739981327&text=Hi%20Dear%20Sir%20/%20Madam">Whats App</a>
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
										<th><input type="checkbox" id="checkAllTutor"></th>
										<th>Name</th>
										<th>Phone Number</th>
										<th>Qualificaton</th>
										<th>Subject</th>
										<th>Gender</th>
										<th>Experience</th>
										<th>Location</th>
										<th>SEND SMS</th>
										<th>SEND EMAIL</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($allTutorsArray as $allTutors) {
										?>
										<tr>
											<td>
												<input type="checkbox" name="tutorPhone[]" value="<?php echo $allTutors['tutor_id'] ?>">
											</td>
											<td><?php echo $allTutors['tutor_name'] ?></td>
											<td><?php echo $allTutors['tutor_phone'] ?></td>
											<td><?php echo $allTutors['qualification_name'] ?></td>
											<td><?php echo $allTutors['Subject'] ?></td>
											<td><?php echo $allTutors['gender_name'] ?></td>
											<td><?php echo $allTutors['experience_name'] ?> Year</td>
											<td><?php echo $allTutors['tutor_location'] ?></td>
											<td>
												<a href="#" class="btn btn-sm btn-primary sendSmsLink" id="<?php echo $allTutors['tutor_id'] ?>"><?php echo $allTutors['tutor_id'] ?> Send SMS Link</a>
											</td>
											<td>
												<a href="#" class="btn btn-sm btn-info sendMailLink" id="<?php echo $allTutors['tutor_id'] ?>"><?php echo $allTutors['tutor_id'] ?> Send Email Link</a>
											</td>
										</tr>
									<?php }?>
								</tbody>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>
<script type="text/javascript">
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

<script type="text/javascript">
	$(document).ready(function() {
		

		$('#allTutorsTable').DataTable();
	} );
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#searchedTutorsTable').DataTable();
	} );
</script>
<script type="text/javascript">
	$(".smsBtn").on('click', function () {
		var selectedTut = $("#selectedTutors").val();
		alert(selectedTut);
	})
</script>
<script>
	$("#checkAllTutor").click(function () {
		$('input:checkbox').not(this).prop('checked', this.checked);
	});
</script>

<!-- The Modal -->
<div class="modal" id="sendIndiviualSmsModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Send SMS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
        	<div class="row">
        		<div class="col-md-12">
        			<div class="form-group">
        				<input type="text" class="form-control" name="tutor_id" id="sms_tutor_id" readonly>
        			</div>
        		</div>
        		<div class="col-md-12">
        			<div class="modal-footer">
        				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        				<button class="btn btn-primary" name="indviSMSBtn">SEND</button>
        			</div>
        		</div>
        	</div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="sendIndiviualSmsModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Send SMS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
        	<div class="row">
        		<div class="col-md-12">
        			<div class="form-group">
        				<input type="text" class="form-control" name="tutor_id" id="tutor_id" readonly>
        			</div>
        		</div>
        		<div class="col-md-12">
        			<div class="modal-footer">
        				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        				<button class="btn btn-primary" name="indviSMSBtn">SEND</button>
        			</div>
        		</div>
        	</div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="sendIndiviualMailModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Send MAIL</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
        	<div class="row">
        		<div class="col-md-12">
        			<div class="form-group">
        				<input type="text" class="form-control" name="tutor_id" id="mail_tutor_id" readonly>
        			</div>
        		</div>
        		<div class="col-md-12">
        			<div class="modal-footer">
        				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        				<button class="btn btn-primary" name="indviMailBtn">SEND</button>
        			</div>
        		</div>
        	</div>
        </form>
      </div>
    </div>
  </div>
</div>