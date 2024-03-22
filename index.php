<?php
require_once __DIR__.'/config.php';

$user = null;

if (check_auth()) {
    // Получим данные пользователя по сохранённому идентификатору
    $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `email` = :email");
    $stmt->execute(['email' => $_SESSION['user_email']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProfEnglish</title>
</head>
<body>
    
<?php if (!isset($_SESSION['user_id'])): ?>
    <li class="nav-item">
        <a href="login.php" class="nav-link link-body-emphasis px-2 text-white fw-bold">Вход</a>
    </li>
    <li class="nav-item">
        <a href="registration.php" class="nav-link link-body-emphasis px-2 text-white fw-bold">Регистрация</a>
    </li>
<?php else: ?>
    <li class="nav-item">
        <div class="userID pt-2 "><?php echo $_SESSION['user_id'] ?></divs>
    </li>
    <li class="nav-item">
        <a href="logout.php" class="nav-link link-body-emphasis px-2 text-white fw-bold">Выход</a>
    </li>
<?php endif; ?>


</body>
</html>