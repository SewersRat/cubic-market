<?php
session_start();
require 'classes/Autoloader.php';
Autoloader::register();

$repo = new UserRepository();

if ($_POST) {
    $userData = $repo->findByEmail($_POST['email']);

    if ($userData && password_verify($_POST['password'], $userData['password'])) {

        $user = $userData['role'] === 'ROLE_ADMIN'
            ? new Admin($userData['id'], $userData['pseudo'], $userData['email'])
            : new User($userData['id'], $userData['pseudo'], $userData['email']);

        $_SESSION['user'] = $user;
        header('Location: index.php');
        exit;
    }
}

