<!DOCTYPE html>
<html>
<head>
	<title>Excel file in database</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<?php include('database.php'); ?>
<?php 
	if(isset($_POST['uploadBtn'])){
	$fileName=$_FILES['myfile']['name'];
	$fileTmpName=$_FILES['myfile']['tmp_name'];
	//Lets find the extension of file
	$fileExtention = pathinfo($fileName,PATHINFO_EXTENSION);
	
	
	$allowedType = array('csv');
	if(!in_array($fileExtention,$allowedType))
	
	
	
	}
	<form action="" method="POST" enctype="multipart/form-data"> 
		<h3 class="text-center">
			Upload Your file
		</h3><hr/>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<input type="file" name="myfile" class="form-control">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<input type="submit" name="uploadBtn" class="btn btn-info">
				</div>
			</div>
		</div>
	</form>
</div>
</body>
</html>