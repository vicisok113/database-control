<?php

function admin_protect() {

	global $type;

	if($type != 1) {

		header('Location: index.php');

		exit();

	}

}



function logged_in_redirect() {

	if(logged_in() === true) {

		header('Location: login_form.php');

		exit();

	}

}



function protect_page() {

	if(logged_in() === false){

		header('Location: protected.php');

		exit();

	}

}



function array_sanitize(&$item){

	$item = htmlentities(strip_tags(mysql_real_escape_string($item)));

}



function sanitize($data){

	return htmlentities(strip_tags(mysql_real_escape_string($data)));

}



function output_errors($errors){

	$output = array();

	foreach ($errors as $error) {

		$output[] =  $error . '<br>';

	}

	return '<ul>' . implode('', $output) . '</ul>';

}

function db_exists($db, $user) {
	$query = mysql_query("SELECT * FROM `baze_de_date` WHERE `nume` = '".$db."' AND `user` = '".$user."' ");
	if(mysql_num_rows($query) > 0) {
		return 0;
	} else {
		return 1;
	}
}

function verificare_tip($tip, $variabila) { //returneaza 0 daca nu e tipul setat si 1 daca e
	if($tip === "INT") {
		if(is_int($variabila)) {
			return 1;
		} else {
			return 0;
		}
	} elseif($tip === "VARCHAR") {
		if(is_string($variabila)) {
			return 1;
		} else {
			return 0;
		}
	} elseif($tip === "TEXT") {
		if(is_string($variabila)) {
			return 1;
		} else {
			return 0;
		}
	} elseif($tip === "DATE") {
		if(is_string($variabila)) {
			return 1;
		} else {
			return 0;
		}
	}
}

?>