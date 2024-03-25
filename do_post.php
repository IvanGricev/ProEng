<?php
require_once __DIR__.'/config.php';
//переписать под нужды
$stmt = $pdo->prepare("UPDATE `orders` SET `dateD` = :dateD, `taken` = :taken, `emailV` = :emailV WHERE `id` = :id");
$stmt->execute([
  'dateD' => $_POST['dateD'],
  'taken' => isset($_POST['taken']) ? 1 : 0,
  'emailV'=> $_POST['emailV'],
  'id' => $_POST['id'],
]);
flash("Успешно изменено");
header('Location: admin.php');

/*ПРИМЕР

        <form id="deliveryForm" action='do_delivery.php' method='post'>
          <?php if (!isset($_SESSION['user_id'])): ?>
            <h3 class="Alarm">Для заказа необходимо войти в учётную запись!</h3>
          <?php else: ?>
            <input type="hidden" id="email" name="email" value="<?php echo $_SESSION['user_id']; ?>">
          <?php endif; ?>

          <label for="typeD" class="fs-4 pt-2">Выберите тип доставки:</label><br>
          <select id="typeD" name="typeD" class="w-75">
            <option value="Легкий груз">Легкий груз</option>
            <option value="Тяжелый груз">Тяжелый груз</option>
            <option value="Массивный груз">Массивный груз</option>
            <option value="Переезд">Переезд</option>
          </select>

          <label for="pickupAddress" class="fs-4 pt-2">Адрес погрузки:</label><br>
          <input type="text" id="addresP" name="addresP" class="w-75">
          <label for="deliveryAddress" class="fs-4 pt-2">Адрес доставки:</label>
          <input type="text" id="addresD" name="addresD" class="w-75"><br>
          <?php if (!isset($_SESSION['user_id'])): ?>
            <div class="mt-2 pt-2 bntBlocked">Подтвердить</div>
          <?php else: ?>
            <button type="submit" class="mt-2 pt-2">Подтвердить</button>
          <?php endif; ?>
        </form>

*/