<?php
function executeResult($sql)
{
	//save data into table
	// open connection to database
	$con = mysqli_connect(DB_HOST,DB_USER, DB_PASS, DB_NAME);
	//insert, update, delete
	$result = mysqli_query($con, $sql);
	$data   = [];
	while ($row = mysqli_fetch_array($result, 1)) {
		$data[] = $row;
	}
	mysqli_close($con);
	return $data;
}
?>