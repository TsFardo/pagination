<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Музыканты | Карточка</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<?php
require_once 'dbConnect.php';
require_once 'MusicGroup.php';

$connect = new DbConnect();
$db = $connect->connect_pdo();

$Music_band = new MusicGroup($db);
$id = $_GET['param'];
$rows = $Music_band->readName($id);
?>
<body>
<h1 style="text-align: center;"><a id = "back" href="index.php">Назад</a></h1>
<hr>
<main id = "main">
<div class="card">
    <?php if (is_array($rows)): ?>
        <h1>Карточка <?=$rows['frontman']?></h1>
        <div class="inner_info">
            <img id = "img_card" src="<?=$rows['imаge']?>" class='img_card' alt="">
            <div class="text">
                <p><?=$rows['name']?></p>
                <p><?=$rows['year']?></p>
                <p><?=$rows['discription']?></p>
            </div>
        </div>
    <?php else: ?>
        <p>Запись не найдена.</p>
    <?php endif; ?>
</div>
</main>
</body>
</html>