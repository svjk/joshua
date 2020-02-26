<?php
	require_once '../business_functions.php';
?>

<?php

if(isset($_GET["c_id"]))
{
	$country_id = $_GET["c_id"];
	$json_data = get_states_country_id($country_id);
	echo json_encode($json_data);
}

if(isset($_GET["s_id"]))
{
	$state_id = $_GET["s_id"];
	$json_data = get_cities_by_state_id($state_id);
	echo json_encode($json_data);
}

?>