<?php
require_once("dist/php/config.php");

if(!empty($_POST)) {
	$username = $db->real_escape_string($_POST['username']);
	$unique = false;
	while(!$unique) {
		$activation_code = bin2hex(mcrypt_create_iv(15, MCRYPT_DEV_URANDOM));
		$result = $db->query("SELECT id FROM users WHERE approved = 0 AND activation_code = '$activation_code'");
		if($result->num_rows == 0) {
			$unique = true;
		}
	}

	$db->query("INSERT INTO users SET username = '$username', activation_code = '$activation_code'");

	/*
	$result = $etg_db->query("SELECT email FROM users WHERE username = '$username'");
	// Send email with link: http://<host_name>/activate.php?activation_code=$activation_code
	*/

	header("Location: activate.php?activation_code=$activation_code");
	//header("Location: index.php?register_successful=1");
	die();
}

header("Location: index.php?register_attempted=1");
die();
