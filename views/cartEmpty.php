<!DOCTYPE html>
<html lang="ro">

<head>
    <title>Cos gol | Impressed</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="<?php echo URL; ?>public/css/cartEmpty.css" rel="stylesheet" />
</head>

<body>

    <?php
    require 'header.php';
    ?>

    <main>
        <div>
            <h1>Cos de cumparaturi</h1>
            <hr>
        </div>

        <p>Nu aveti niciun produs adaugat in cosul de cumparaturi!</p>
        <p>Pentru selectie intoarceti-va pe pagina de cumparaturi!</p>
        <p>Zi frumoasa !</p>

        <button id="inapoi-la-cump" type="button" onclick="window.location.href='<?php echo URL; ?>home'">
         ◄ Inapoi la cumparaturi
        </button>
    </main>

    <?php
    require 'footer.php';
    ?>


</html>