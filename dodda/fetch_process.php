<?php
include './db/selects.php';

if(!empty($_POST["ID"])) 
{
	$query =mysqli_query($db_connect,"SELECT * FROM subjects WHERE classnames_id='".$_POST["ID"]."'");
	?>
	<option value="">Select Subjectsssssss</option>
	<?php
	while($row=mysqli_fetch_array($query))  
	{?>
		<option value="<?php echo $row["ID"]; ?>"><?php echo $row["Subject"]; ?></option>
	<?php
	}
}
?>