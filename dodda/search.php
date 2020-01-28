<?php
include './db/selects.php';
include './db/search_actions.php';
include './PHPMailer/PHPMailerAutoload.php';
// *********** Send SMS ****************** 
if (isset($_POST['sendSMS'])) {
	$checkedTutors = $_POST['tutorPhone'];
	for ($i=0; $i <COUNT($checkedTutors) ; $i++) {
		$checkedTutorsID = $checkedTutors[$i];
		$selectTutorsPhones = mysqli_query($db_connect, "SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, tut.tutor_email, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
			FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
			WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id AND tutor_id='".$checkedTutorsID."' ");
		
		$tutorsPhoneEmailArray = array();
		while ($row = mysqli_fetch_array($selectTutorsPhones)) {
			$tutorsPhoneEmailArray[] = $row;
		}
		foreach ($tutorsPhoneEmailArray as $tutorsPhoneEmail) {
			$YourAPIKey='33119aa2-46a6-11e9-8806-0200cd936042';
			$From='TFCTOR';
			$To=$tutorsPhoneEmail['tutor_phone'];

			$Msg='Dear Sir/Medam this is doddanna from svjk';


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
		$selectTutorsEmail = mysqli_query($db_connect, "SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, tut.tutor_email, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
			FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
			WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id AND tutor_id='".$checkedTutorsID."' ");
		
		$tutorsPhoneEmailArray = array();
		while ($row = mysqli_fetch_array($selectTutorsEmail)) {
			$tutorsPhoneEmailArray[] = $row;
		}
		foreach ($tutorsPhoneEmailArray as $tutorsPhoneEmail) {
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
			$mail->Body = 'Test Mail from SVJK';

			if (!$mail->send()) {
				echo "ERROR: " . $mail->ErrorInfo;
			} else {
				echo "SUCCESS  ";
			}
			
		}
	}		
}
// ************ End Email ****************

?>
<!DOCTYPE html>
<html>
<head>
	<title>ADavance Search</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
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
										<th colspan="5" class="text-center">All Tutors</th>
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
										<th><input type="checkbox" id="checkAllTutor"></th>
										<th>Name</th>
										<th>Phone Number</th>
										<th>Qualificaton</th>
										<th>Subject</th>
										<th>Gender</th>
										<th>Experience</th>
										<th>Location</th>
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