<?php
$conn = mysql_connect("localhost","root","");
	if($selectdb = mysql_select_db('zaomedia_database_control')) {
		$sql = "SET NAMES 'utf8'";
		mysql_query($sql, $conn);
		}
?>
