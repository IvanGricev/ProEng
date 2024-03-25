<?php

require_once __DIR__.'/config.php';

$stmt = $pdo->prepare("SELECT * FROM `users` WHERE `email` = :email");
$stmt->execute(['email' => $_POST['email']]);
if (!$stmt->rowCount()) {
    Lflash('Пользователь с такими данными не зарегистрирован');
    header('Location: textpaje.php');
    die;
}
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (password_verify($_POST['password'], $user['password'])) {

    if (password_needs_rehash($user['password'], PASSWORD_DEFAULT)) {
        $newHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt = $pdo->prepare('UPDATE `users` SET `password` = :password WHERE `email` = :email');
        $stmt->execute([
            'email' => $_POST['email'],
            'password' => $newHash,
        ]);
    }
    $_SESSION['user_id'] = $user['email'];

    header('Location: index.php');
    Lflash("Успешно авторизованы");
    
    die;
}

Lflash('Пароль неверен');
header('Location: login.php');