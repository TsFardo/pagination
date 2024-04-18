<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Музыканты | Пагинация</title>
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
$rows = $Music_band->getAll();
$countTabl = $Music_band->allRecords();
$countMus_Pag = 5;
$page_count = (int)ceil((int)$countTabl['kol'] / $countMus_Pag);
?>


<body>
<h1 style="text-align: center;">Музыканты</h1>
<hr>
<main>
    <?php
    if (count($_GET) == 0) {
        $page = 0;
    } else {
        $page = $_GET['page'];
    }

    for ($i = $page * $countMus_Pag; $i < ($page + 1) * $countMus_Pag; $i++) {
        if (TRUE) {
            ?>
            <div class='cardt'>
                <div class='inner'>
                    <p><?= $rows[$i]['name'] ?></p>
                    <p><?= $rows[$i]['year'] ?></p>
                    Солист: <?= $rows[$i]['frontman'] ?><br>
                    <p><img src='<?= $rows[$i]['imаge'] ?>'></p>
                    <? $x = $rows[$i]['id_band']; ?>
                    <p><a id="dalee" href='pageone.php?param=<?=$x ?>'></a></p></div>
                <div class="description">
                    <p>
                        <?= $rows[$i]['discription'] ?>
                    </p>
                    <p><a href='pageone.php?param=<?=$x ?>'>Далее</a></p></div>
            </div>
            </div>
            <?
        }
        echo '</div>';
        if ($i >= ((int)$countTabl['kol'] - 1)) break;
    }
    ?>
</main>
<div class="page_list" style='text-align: center'>
    <?php for ($p = 0; $p < $page_count; $p++) : ?>
        <?
        if ($page == $p) {
            ?>
            <a href="?page=<?= $p; ?>">
                <button class='page_button'><?= $p + 1 ?></button>
            </a>
        <? } else {
            ?>
            <a href="?page=<?= $p; ?>">
                <button class='page_button_inactive'><?= $p + 1 ?></button>
            </a>
        <? }endfor ?>
</div>
<div id="callback">
    <p>
        Обратитесь к нам! Предлагаем нашу помощь.
    </p>
</div>
</body>
</html>