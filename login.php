<?php
require_once("dist/php/config.php");

if(!empty($_POST)) {
	$username = $db->real_escape_string($_POST['username']);
	$password = sha1($db->real_escape_string($_POST['password']));

	$result = $db->query("SELECT id, username, admin FROM users WHERE username = '$username' AND password = '$password' AND approved = 1");
	if($result->num_rows == 1) {
		$user = $result->fetch_assoc();
		$_SESSION['user']['id'] = $user['id'];
		$_SESSION['user']['username'] = $user['username'];
		$_SESSION['user']['admin'] = $user['admin'];

		$db->query("UPDATE users SET last_seen = NOW() WHERE id = " . $user['id']);

		header("Location: map_world.php");
  		die();
	}
}

header("Location: index.php?login_attempted=1");
die();
