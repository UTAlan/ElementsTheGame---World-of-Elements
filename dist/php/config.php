<?php
session_start();
require_once("local_settings.php");

$db = new mysqli($CONFIG['db']['hostname'], $CONFIG['db']['username'], $CONFIG['db']['password'], $CONFIG['db']['database']);

if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
}

/*
$etg_db = new mysqli($CONFIG['etg_db']['hostname'], $CONFIG['etg_db']['username'], $CONFIG['etg_db']['password'], $CONFIG['etg_db']['database']);

if ($etg_db->connect_error) {
    die('Connect Error (' . $etg_db->connect_errno . ') ' . $etg_db->connect_error);
}
*/