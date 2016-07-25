<?php

function nota_din_db($username) {

		$data = mysql_query("SELECT * FROM `notite` WHERE `user` = '".$username."' ");

		while($row = mysql_fetch_array($data)){

			$nota = $row['continut'];

			$nota = sanitize($nota);

			return $nota;

		}

}



function note_update($username, $note) {

	mysql_query("UPDATE notite SET continut='$note' WHERE `user` = '".$username."' ");

}



function note_exists($username, $note){

	$username = sanitize($username);

	$note = sanitize($note);

	$query = mysql_query("SELECT * FROM `notite` WHERE `user` = '".$username."' ");

	return (mysql_num_rows($query));

}



function note_submit($note, $username) {

	mysql_query("INSERT INTO `notite` (user, continut) VALUES ('$username', '$note')");

}



function score_update($category, $username, $score) {

	mysql_query("UPDATE user_answer SET punctaj='$score' WHERE `username` = '".$username."' AND `categorie` = '".$category."' ");

}



function exam_exists($username, $category){

	$username = sanitize($username);

	$query = mysql_query("SELECT * FROM `user_answer` WHERE `username` = '".$username."' AND `categorie` = '".$category."' ");

	return (mysql_num_rows($query));

}



function score_submit($category, $username, $score) {

	mysql_query("INSERT INTO `user_answer` (username, categorie, punctaj) VALUES ('$username', '$category', '$score')");

}



function adaugare_lectie_submit($adaugare_data) {

	array_walk($adaugare_data, 'array_sanitize');



	$fields = '`' . implode('`, `', array_keys($adaugare_data)) . '`';

	$data = '\'' . implode('\', \'', $adaugare_data) . '\'';



	mysql_query("INSERT INTO `lectii_useri` ($fields) VALUES ($data)");

}



function contact_submit($contact_data) {

	array_walk($contact_data, 'array_sanitize');



	$fields = '`' . implode('`, `', array_keys($contact_data)) . '`';

	$data = '\'' . implode('\', \'', $contact_data) . '\'';



	mysql_query("INSERT INTO `contact` ($fields) VALUES ($data)");

}



function update_user($update_data) {

	global $user_id;

	$update = array();

	array_walk($update_data, 'array_sanitize');



	foreach ($update_data as $field => $data) {

		$update[] = '`' . $field . '` = \'' . $data . '\'';

	}



	mysql_query("UPDATE `users` SET " . implode(', ', $update) . " WHERE `user_id` = " . $user_id . " ");

}



function change_password($user_id, $password) {

	$user_id = (int)$user_id;

	$password = md5($password);



	mysql_query("UPDATE `users` SET `password` = '$password' WHERE `user_id`  = $user_id ");

}



function register_user($register_data) {

	array_walk($register_data, 'array_sanitize');

	$register_data['password'] = md5($register_data['password']);



	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';

	$data = '\'' . implode('\', \'', $register_data) . '\'';



	mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");

}



function id_from_username($username) {

		$data = mysql_query("SELECT * FROM `users` WHERE `username` = '".$username."' ");

		while($row = mysql_fetch_array($data)){

			$user_id = $row['user_id'];

			return $user_id;

		}

}



function logged_in() {

	return (isset($_SESSION['user_id'])) ? true : false;

}



function user_exists($username){

	$username = sanitize($username);

	$query = mysql_query("SELECT * FROM `users` WHERE `username` = '".$username."' ");

	return (mysql_num_rows($query));

}



function email_exists($email){

	$email = sanitize($email);

	$query = mysql_query("SELECT * FROM `users` WHERE `email` = '".$email."' ");

	return (mysql_num_rows($query));

}



function user_active($username) {

    $username = sanitize($username);

    $query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'  AND `ACTIVE` = 1");

    return(mysql_result($query, 0) == 1) ?  TRUE : FALSE;    

}



function login($username, $password) {

	$ok = 0;

	$username = sanitize($username);

	$password = md5($password);

	$query1 = mysql_query("SELECT * FROM `users` where `username` ='".$username."' ");

	while($row = mysql_fetch_array($query1))

	{			

		$password_array = $row['password'];

		if($password === $password_array)

			$ok = 2;

	}

	return $ok;

}



function ok_us($username) {

	$username = sanitize($username);

	$query = mysql_query("SELECT * FROM `users` where `username` = '".$username."' ");

	return (mysql_num_rows($query));

}



function ok_pw($username, $password) {

	$query = mysql_query("SELECT * FROM `users` where `username` = '".$username."' ");

	$res = mysql_fetch_assoc($query);

	$result = password_verify($password, $res['password']);

	return $result;

}



function type_from_username($username) {

		$data = mysql_query("SELECT * FROM `users` WHERE `username` = '".$username."' ");

		while($row = mysql_fetch_array($data)){

			$type = $row['type'];

			return $type;

		}

}



?>