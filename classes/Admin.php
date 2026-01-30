<?php
session_start();
require 'classes/Autoloader.php';
Autoloader::register();

if (!isset($_SESSION['user']) || $_SESSION['user']->getRole() !== 'ROLE_ADMIN') {
    die('Accès refusé');
}
