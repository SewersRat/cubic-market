<?php
session_start();
require 'classes/Autoloader.php';
Autoloader::register();

$repo = new UserRepository();

if ($_POST) {
    $user = $repo->findByEmail($_POST['email']);

    if ($user && password_verify($_POST['password'], $_POST['password'])) {
        $_SESSION['user'] = $user;
        header('Location: index.php');
        exit;
    }
}

