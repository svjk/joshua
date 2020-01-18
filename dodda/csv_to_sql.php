<?php
if (isset($_POST['uploCSV'])) {
	$allowed = array('csv');
	$file_name = $_FILES['csv_data']['name'];
	$ext = pathinfo($file_name, PATHINFO_EXTENSION);
	if (!in_array($ext, $allowed)) {
	    echo 'Please Upload CSV ONLY';
	}
	else if (in_array($ext, $allowed)){
		
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CSV to SQL UPLOAD</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
</head>
<body>
	<section style="padding: 20px;background: #fff;">
		<div class="container">
			<div class="col-md-12">
				<div class="row 1">
					<div class="col-md-12">
						<div class="text-center">
							<h3>Upload File</h3>
						</div>
					</div>
					<div class="col-md-12">
						<form action="" method="POST" enctype="multipart/form-data">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<input type="file" name="csv_data" class="form-control">
										</div>
									</div>
									<div class="col-md-3">
										<button class="btn btn-primary" name="uploCSV">
											UPLOAD
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="col-md-12">
						<form enctype="multipart/form-data" method="post" action="upload.php">
							<table border="1">
							<tr >
							<td colspan="2" align="center"><strong>Import CSV file</strong></td>
							</tr>
							<tr>
							<td align="center">CSV File:</td><td><input type="file" name="file" id="file"></td></tr>
							<tr >
							<td colspan="2" align="center"><input type="submit" value="submit"></td>
							</tr>
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