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
    <title>TrafiCo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/TrafiCo/index.css">
    <!-- <link type="Image/x-icon" href="http://localhost/TrafiCo/img/logo.svg" rel="icon"> -->
  </head>
<body class="">

    <nav class="py-2  border-bottom bg-pink">
        <div class="container d-flex flex-wrap bg-pink"  bis_skin_checked="1" >
        <a href="index.php" class="nav-link link-body-emphasis px-2 active" aria-current="page"><img src="http://localhost/TrafiCo/img/logo.svg" alt="err" srcset="" sizes="" width="65%"></a>
        <ul class="nav me-auto">
            <li class="nav-item"><a href="about.php" class="nav-link link-body-emphasis px-2 text-white fw-bold">О нас</a></li>
            <li class="nav-item"><a href="howto.php" class="nav-link link-body-emphasis px-2 text-white fw-bold">Как заказать</a></li>
            <li class="nav-item"><a href="faqs.php" class="nav-link link-body-emphasis px-2 text-white fw-bold">FAQs</a></li>
        </ul>
        <ul class="nav">
            <li class="nav-item">
            <a href="login.php" class="nav-link link-body-emphasis px-2 text-white fw-bold">Вход</a>
            </li>
        </ul>
        </div>
    </nav>

    <div class="w-50 mt-5 ml-4">
    <h2 class="mb-5">Регистрация</h2>

    <div class="w-50">
        <?php Rflash(); ?> 
    </div> 

    <form method="post" action="do_register.php" id="signupForm">
        <div class="mb-3 w-50">
        <label for="email" class="form-label">email</label>
        <input type="text" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3 w-50">
        <label for="password" id="password1" class="form-label">Пароль</label>
        <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3 w-50">
        <label class="form-label">Повторите пароль</label>
        <input type="password" class="form-control" id="password2" name="password2" required>
        </div>
        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
    </form>
    </div>



  <footer class="container mt-5">
    <p class="float-end">
      <a href="https://www.instagram.com"><img src="http://localhost/Profenglish/ProEng/img/i.svg" alt="" srcset=""></a>
      <a href="https://ru-ru.facebook.com"><img src="http://localhost/Profenglish/ProEng/img/f.svg" alt="" srcset="" class="ml-1"></a>
      <a href="https://twitter.com/?lang=ru"><img src="http://localhost/Profenglish/ProEng/img/t.svg" alt="" srcset="" class="ml-1"></a>

    </p>
    <a href="#" class="text-decoration-none">Обратно наверх</a>
    <p class="text-black">© 2023 ProEng</p>

  </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</html>