<?php
session_start();

try {
	$pdo = new PDO('mysql:dbname=livespace; host=localhost', 'root', '');
} catch (PDOException $e) {
	die($e->getMessage());
}

////////////////////////////////////////////////

function flash(?string $message = null)
{
    if ($message) {

        $_SESSION['flash'] = $message;
    } else {
        if (!empty($_SESSION['flash'])) { ?>
          <div class="alert alert-danger mb-3">
              <?=$_SESSION['flash']?>
          </div>
        <?php }
        unset($_SESSION['flash']);
    }
}

function Lflash(?string $message = null)
{
    if ($message) {
        $_SESSION['Lflash'] = $message;
    } else {
        if (!empty($_SESSION['Lflash'])) { ?>
          <div class="alert alert-danger mb-3">
              <?=$_SESSION['Lflash']?>
          </div>
        <?php }
        unset($_SESSION['Lflash']);
    }
}

function Rflash(?string $message = null)
{
    if ($message) {
        $_SESSION['Rflash'] = $message;
    } else {
        if (!empty($_SESSION['Rflash'])) { ?>
          <div class="alert alert-danger mb-3">
              <?=$_SESSION['Rflash']?>
          </div>
        <?php }
        unset($_SESSION['Rflash']);
    }
}

function check_auth(): bool
{
    return !!($_SESSION['user_email'] ?? false);
}








