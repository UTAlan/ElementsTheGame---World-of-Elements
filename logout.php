<?php
require_once("dist/php/config.php");

session_destroy();

header("Location: index.php");
die();
