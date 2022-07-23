<?php
require_once '../lib_config.php';

// check session
ob_start();
session_start();

$username = $_SESSION['username'];

require_once ROOT . DS . 'services' . DS . 'GuestServices.php';
$service = new GuestServices();
$service->delete($username);
