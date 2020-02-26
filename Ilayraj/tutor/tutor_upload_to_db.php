<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<style>
	body
	{
		font-family: verdana;
		font-size: 12px;
		margin: 15px;
		height: 700px;
	}	
	
	.mandatory-label
	{
		color: red;
	}
	
	select
	{
		border-radius: 3px;		
		width: 150px;
		height: 25px;
		border-style: solid;
		border-width: 1px;
		padding: 5px;
	}
	
	.text-box
	{
		border-radius: 3px;			
		width: 150px;
		height: 12px;
		border-style: solid;
		border-width: 1px;
		border-color: gray;
		padding: 5px;
	}
	
	.text-area
	{
		border-radius: 3px;		
		border-style: solid;
		border-width: 1px;
		border-color: #E8E8E8;
		padding: 5px;
		font-family: verdana;
		font-size: 12px;
	}
	
	
	#upload_file_to_db
	{
		border-radius: 5px;
		width: 150px;
		padding: 5px;		
		border-width: 1px;
		border-color: gray;
		
	}	
	#fs_info
	{	
		border-style: solid;
		border-width: 1px;
		border-color: #E8E8E8;
		width: 265px;
		padding: 10px;
		border-radius: 5px;
	}
	
	.div_box1
	{
		border-style: solid;
		border-width: 1px;
		border-radius: 5px;	
		border-color: #E8E8E8;
	}
	
	#error_msg, .error_msg
	{
		color: Red;
	}
	
	.msg, #msg
	{
		color: Black;
		font-weight: bold;
		margin-bottom: 10px;
	}
    </style>
	
	<script src="../js/jquery-3.3.1.min.js"></script>
</head>
<body>
<?php
	require_once '../business_functions.php';
?>

<?php
	require_once 'check_auth_tutor.php';
?>

<?php
	
	$insert_count = 0;
	$skip_count = 0;
	
	if(isset($_POST["upload_file_to_db"]))
	{	
		$target_dir = "tutor_csvs/";
		$file_fullpath = $target_dir . basename($_POST["upload_file"]);

		$myfile = fopen($file_fullpath, "r") 
			or die("Unable to open file!");
			
		$i=0;
		$arr_tutors = array();
		
		while(!feof($myfile))
		{
		  if($i == 0)
		  {
			fgets($myfile);
		  }
		  else
		  {
			 $arr_tutors[] = fgets($myfile);
		  }
		  $i++;
		}
		fclose($myfile);
		
		$arr_tutor = array();		
		for($i=0; $i<count($arr_tutors); $i++)
		{
			$arr_tutor[] = explode(",", $arr_tutors[$i]);
		}
				
		$return_val_records_count = insert_tutors_to_db($arr_tutor);
		
		$total_records_in_db = get_total_tutors_count();		
		$total_records = count($arr_tutor);
		$insert_count = $return_val_records_count[0]['records_insert_count'];
		$skip_count = $return_val_records_count[0]['records_skip_count'];
	}	
?>

<div>
	<div style="width: 340px; margin: 0 auto; border-style: solid; border-width: 0px; width: 292px;">
		<form id="form_add_to_db" name="form_add_to_db" method="post">
			<div id="error_msg"></div>
			<div id="msg">
				<?php
					if(isset($_POST["upload_file_to_db"]))
					{
						echo "Total records in database table: $total_records_in_db<br/>";
						echo "Total records in the file: $total_records<br/>";
						echo "Total records inserted: $insert_count<br/>";
						echo "Total records skiped: $skip_count";
					}
				?>
			</div>
			<?php
				require_once '../dropdown_menu.php';
			?>
			<fieldset id="fs_info">
				<legend style="font-weight: bold;">Add Tutors To Database</legend>
				<div>
				<label>Select CSV file to upload to database:</label>
				<label class="mandatory-label">*</label>				
				<div class="div_box1"
					style="height: 30px; width: 260px; border-style: solid; border-width: 1px; padding: 5px;">
					<select id="upload_file" name="upload_file" type="text">
						<option value="0">--Select--</option>
						<?php
							$dir = "tutor_csvs/";
							
							if (is_dir($dir))
							{
							  if ($dh = opendir($dir))
							  {
								$i = 0;
								while (($file = readdir($dh)) !== false)
								{
								  if($i==0 OR $i==1)
								  {
								  }
								  else
								  {
									  echo "<option value='" . $file . "'>" . $file . "</option>";
								  }
								  $i++;
								}
								closedir($dh);
							  }
							}					
						?>
					</select>
				</div>
				<div style="margin-top: 5px;">
					<input type="submit" id="upload_file_to_db" name="upload_file_to_db" value="Upload To Database" />
				<div>
				</div>
		</fieldset>
		</form>
	</div>
</div>
</body>
</html>