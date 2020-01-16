<?php
include './db/selects.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Advanced Search Test</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
</head>
<body>
	<section style="padding: 20px;background: #fff;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="text-center">
						<h3>Search Tutors</h3>
					</div>
				</div>
				<div class="col-md-12">
					<form action="" method="post">
						<div class="row">
							<div class="col-md-12">
								<table class="tabl table-bordered">
									<thead>
										<tr>
											<th>Location</th>
											<th>Qualification</th>
											<th>Subject</th>									
											<th>Gender</th>
											<th>Exerieance</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<input type="text" class="form-control" name="location" required="">
											</td>
											<td>
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
											</td>
											<td>
												<select class="form-control" name="subject">
													<option value="">Select</option>
													<?php
													foreach ($subjectsArray as $subject) {
													?>
													<option value="<?php echo $subject['ID'] ?>">
														<?php echo $subject['Subject'] ?>
													</option>
													<?php }?>
												</select>
											</td>
											<td>
												<select class="form-control" name="gender">
													<option value="">Select</option>
													<?php
													foreach ($genderArray as $gender) {
													?>
													<option value="<?php echo $gender['gender_id'] ?>">
														<?php echo $gender['gender_name'] ?>
													</option>
													<?php }?>
												</select>
											</td>
											<td>
												<select class="form-control" name="experience">
													<option value="">Select</option>
													<?php
													foreach ($experienceArray as $experience) {
													?>
													<option value="<?php echo $experience['experience_id'] ?>">
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
									</tbody>
								</table>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="text-center">
					<h3>Results</h3>
				</div><hr>
			</div>
			<div class="col-md-12">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Name</th>
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
						<td><?php echo $searchedTutors['tutor_name'] ?></td>
						<td><?php echo $searchedTutors['qualification_name'] ?></td>
						<td><?php echo $searchedTutors['Subject'] ?></td>
						<td><?php echo $searchedTutors['gender_name'] ?></td>
						<td><?php echo $searchedTutors['experience_name'] ?></td>
						<td><?php echo $searchedTutors['tutor_location'] ?></td>
					</tr>
					<?php }?>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="text-center">
					<h3>All Tutors</h3>
				</div>
			</div>
		</div><hr>
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>Name</th>
					<th>Qualificaton</th>
					<th>Subject</th>
					<th>Gender</th>
					<th>Experience</th>
					<th>Location</th>
				</tr>
			</thead>
			<?php
			foreach ($allTutorsArray as $allTutors) {
			?>
			<tr>
				<td><?php echo $allTutors['tutor_name'] ?></td>
				<td><?php echo $allTutors['qualification_name'] ?></td>
				<td><?php echo $allTutors['Subject'] ?></td>
				<td><?php echo $allTutors['gender_name'] ?></td>
				<td><?php echo $allTutors['experience_name'] ?></td>
				<td><?php echo $allTutors['tutor_location'] ?></td>
			</tr>
			<?php }?>
		</table>
	</div>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

	<!-- https://code.jquery.com/jquery-3.3.1.js -->


</body>
</html>

<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	} );
</script>