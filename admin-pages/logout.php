<?php
session_start();
require_once '../lib/config.inc.php';

unset($_SESSION['username']);

header('Location: '.SITE_URL);
?>