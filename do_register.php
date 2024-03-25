<?php
require_once __DIR__.'/config.php';

$stmt = $pdo->prepare("SELECT * FROM `users` WHERE `email` = :email");
$stmt->execute(['email' => $_POST['email']]);
if ($stmt->rowCount() > 0) {
    Rflash('Пользователь с такой почтой уже зарегистрирован.');
    header('Location: registration.php');
    die;
}


///////////////////////////////////////////////////////////////////////////////////////////////////



function validateEmail($email) {
    
    $allowedDomains = [
        "gmail.com",
        "rambler.ru",
        "mail.ru",
        "yahoo.com",
        "outlook.com",
    ];

    $emailDomain = explode('@', $email)[1];
    Rflash("Домен почты должен быть из списка разрешенных (gmail.com, rambler.ru, mail.ru, yahoo.com, outlook.com).") ; 
    return in_array($emailDomain, $allowedDomains);
}

function validatePassword($password) {
    if (!preg_match('/[a-z]/', $password)) {
        Rflash("Пароль должен включать букву нижнего регистра.") ; 
        return false;
    }
    else if (!preg_match('/[A-Z]/', $password)) {
        Rflash("Пароль должен включать букву верхнего регистра.") ;  
        return false;
    }
    else if (!preg_match('/[0-9]/', $password)) {
        Rflash("Пароль должен включать числа.") ; 
        return false;
    }
    else if (!preg_match('/[!@#$%^&*(),.?":{}|<>_-]/', $password)) {
        Rflash("Пароль должен включать специальный символ.") ; 
        return false;
    }
    else{
        return true;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password1 = $_POST["password"];
    $password2 = $_POST["password2"];

    if (validateEmail($email)) {
        if (validatePassword($password1)) {
            if ($password1 == $password2) {
                echo 'Passwords entered successfully.';

            } else {
                // Rflash("Passwords have to be same") ;
                header('Location: registration.php');
                die;
            }
        } else {
            // Rflash("Please enter valid password.") ;    
            header('Location: registration.php');
            die;
        }
    } else {
        // Rflash("Please enter valid email.") ;
        header('Location: registration.php');
        die;
    }
}



///////////////////////////////////////////////////////////////////////////////////////////////////

$stmt = $pdo->prepare("INSERT INTO `users` (`email`, `password`) VALUES (:email, :password)");
$stmt->execute([
    'email' => $_POST['email'],
    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
]);

Rflash("Успешно зарегестрированны");
header('Location: index.php');