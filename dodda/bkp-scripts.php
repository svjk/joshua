<?php
// *****************Date 28-01-2020*******************
//  1,2,3,4,5
	if ($loc AND $qfication AND $subj AND $genr AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' AND tut.gender_id='$genr' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 1,2,3,4
	else if ($loc AND $qfication AND $subj AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' AND tut.gender_id='$genr'  ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 1,2,3
	else if ($loc AND $qfication AND $subj) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}

	//  1,2,4,5
	else if ($loc AND $qfication AND $genr AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.gender_id='$genr' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	//  1,2,5
	else if ($loc AND $qfication AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	//  1,2,4
	else if ($loc AND $qfication AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.gender_id='$genr' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	//  1,2
	else if ($loc AND $qfication) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	//  1,3,4,5
	else if ($loc AND $subj AND $genr AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.subject_id='$subj' AND tut.gender_id='$genr' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	//  1,3,5
	else if ($loc AND $subj AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.subject_id='$subj' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	//  1,3,4
	else if ($loc AND $subj AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.subject_id='$subj' AND tut.gender_id='$genr'  ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	//  1,3
	else if ($loc AND $subj) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.subject_id='$subj' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	//  1,4,5
	else if ($loc AND $genr AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc'AND tut.gender_id='$genr' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	//  1,4
	else if ($loc AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc'AND tut.gender_id='$genr' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	//  1,5
	else if ($loc AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc'AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 1
	else if ($loc) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
}
// *****************End Date 28-01-2020****************
include './db/selects.php';
include './db/search_actions.php';

if(isset($_POST['save'])){
	$checkbox = $_POST['check'];
	for($i=0;$i<count($checkbox);$i++){
		$del_id = $checkbox[$i]; 
		mysqli_query($conn,"DELETE FROM employee WHERE userid='".$del_id."'");
		$message = "Data deleted successfully !";
	}
}
// $result = mysqli_query($conn,"SELECT * FROM employee");

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<title>Delete employee data</title>
</head>
<body>
	<div><?php if(isset($message)) { echo $message; } ?>
</div>
<form method="post" action="">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th><input type="checkbox" id="checkAl"> Select All</th>
				<th>Tutor Id</th>
				<th>Name</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Location</th>
			</tr>
		</thead>
		<?php
		// $i=0;
		foreach ($allTutorsArray as $allTutors) {
			?>
			<tr>
				<td>
					<input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["userid"]; ?>">
				</td>
				<td><?php echo $allTutors["tutor_id"]; ?></td>
				<td><?php echo $allTutors["tutor_name"]; ?></td>
				<td><?php echo $allTutors["tutor_phone"]; ?></td>
				<td><?php echo $allTutors["tutor_location"]; ?></td>
				<td><?php echo $allTutors["gender_name"]; ?></td>
			</tr>
			<?php
			// $i++;
		}
		?>
	</table>
	<p align="center"><button type="submit" class="btn btn-success" name="save">DELETE</button></p>
</form>
<script>
	$("#checkAl").click(function () {
		$('input:checkbox').not(this).prop('checked', this.checked);
	});
</script>
</body>
</html>
<?php
if ($loc AND $qfication AND $subj AND $genr AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' AND tut.gender_id='$genr' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication AND $subj AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' AND tut.gender_id='$genr' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication AND $subj) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $subj) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.subject_id='$subj' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.gender_id='$genr' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	if ($loc AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}




// ***********	Tested Adavnce Search ************
if (isset($_POST['advSearchBtn'])) {
	$loc = $_POST['location'];
	$qfication = $_POST['qualification'];
	$subj = $_POST['subject'];
	$genr = $_POST['gender'];
	$expernce = $_POST['experience'];

	if ($loc AND $qfication AND $subj AND $genr AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, qf.qualification_name, sb.subject_name, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subject AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' AND tut.gender_id='$genr' AND tut.experience_id='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication AND $subj AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, qf.qualification_name, sb.subject_name, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subject AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' AND tut.gender_id='$genr' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication AND $subj AND $genr AND $expnc) {
		$searchTutors = "";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication AND $subj) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, qf.qualification_name, sb.subject_name, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subject AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, qf.qualification_name, sb.subject_name, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subject AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, qf.qualification_name, sb.subject_name, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subject AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}

	
}
// ***********	End Advanced Search **************

// 1). 1,2,3,4,5
	if ($loc AND $qfication AND $subj AND $genr AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' AND tut.gender_id='$genr' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $subj AND $genr AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.subject_id='$subj' AND tut.gender_id='$genr' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication AND $genr AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.gender_id='$genr' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}

	else if ($loc AND $qfication AND $subj AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication AND $subj AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' AND tut.gender_id='$genr' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication AND $subj) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication  AND $genr ) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.gender_id='$genr' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $subj AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.subject_id='$subj' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $subj AND $genr ) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.subject_id='$subj' AND tut.gender_id='$genr' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}



	// 2). 1,2,4,5
	else if ($loc AND $qfication AND $genr AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.gender_id='$genr' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 3). 1,2,5
	else if ($loc AND $qfication AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 4). 1,2,4
	else if ($loc AND $qfication AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.gender_id='$genr' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 5). 1,2
	else if ($loc AND $qfication) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 6). 1,3,4,5
	else if ($loc AND $subj AND $genr AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.subject_id='$subj' AND tut.gender_id='$genr' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 7). 1,3,5
	else if ($loc AND $subj AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.subject_id='$subj' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 8). 1,3,4
	else if ($loc AND $subj AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.subject_id='$subj' AND tut.gender_id='$genr'  ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 9). 1,3
	else if ($loc AND $subj) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.subject_id='$subj' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 10). 1,4,5
	else if ($loc AND $genr AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc'AND tut.gender_id='$genr' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 11). 1,4
	else if ($loc AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc'AND tut.gender_id='$genr' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 12). 1,5
	else if ($loc AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc'AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
// 1). 1,2,3,4
	else if ($loc AND $qfication AND $subj AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' AND tut.gender_id='$genr' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 1). 1,2,3
	else if ($loc AND $qfication AND $subj) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
?>