<?php

require_once("connect.php");


?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>

<body>
  <?php
  $con = connectDB();
  if (!connectDB()) {
    die();
  }

  ?>
  <img src="logo.png">

  <div class="table">
    <div class="thead">
      <div class="row">
        <div class="cell">№</div>
        <div class="cell">Имя Фамилия</div>
        <div class="cell">Направление обучения</div>
      </div>
    </div>
    <div class="tbody">
      <?php
      try {

        $sql = $con->prepare("SELECT * FROM students");
        $res = $sql->execute();
        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
          echo '<div class="row">';
          echo '<div class="cell">' . $row->id . '</div>';
          echo '<div class="cell">' . $row->name . '</div>';
          echo '<div class="cell">' . $row->vector . '</div>';

      ?>

          <div id="openModal<?= $row->id ?>" class="modal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title"><?= $row->name ?></h3>
                  <a href="#close" title="Close" class="close">x</a>
                </div>
                <div class="modal-body">
                  <p>Дата рождения: <?= date('d-m-Y', strtotime($row->date)) ?></p><br>
                  <p><?= $row->personal ?></p>

                </div>
              </div>
            </div>
          </div>


          <a href="#openModal<?= $row->id ?>" class="button">Дополнительная информация</a>
      <?php
          echo '</div>';
        }
      } catch (Exception $e) {
        $e->getMessage();
      }

      ?>




    </div>
  </div>
</body>

</html>