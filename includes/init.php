<?php
session_start();

require 'includes/connect.php';
require 'includes/general.php';
require 'includes/users.php';

if(logged_in() === true) {
	/*$username = $_SESSION['username'];
	$logged_in = $_SESSION['logged_in'];
	$user_id = id_from_username($username);
 	$password = password_from_username($username);
 	$nume = nume_from_username($username);
 	$prenume = prenume_from_username($username);
 	$email = email_from_username($username);
 	$type = type_from_username($username);
 	$nota = nota_din_db($username);*/
}

$errors = array();
?>