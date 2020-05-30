<!DOCTYPE html>
<html lang="ro">

<head>
    <title>Account | Impressed</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="<?php echo URL; ?>public/css/admin.css" rel="stylesheet" />
</head>

<body>
    <header>
        <?php
        require 'header.php';
        ?>
    </header>


    <main>
        <div>
            <h1>CONT ADMINISTRATOR</h1>
            <p>Bun venit!</p>
            <?php if (Session::get('loggedIn') == true) : ?>
                <button type="button" class="logout" onclick="window.location.href='<?php echo URL; ?>admin/logout' ">Deconecteaza-te</button>
            <?php endif; ?>
            <hr>
        </div>

        <div class="administrare">
            <div class="administrare-utilizatori">
                <h2>ADMINISTRARE UTILIZATORI</h2>
                <a href="<?php echo URL; ?>admin/listareUtilizatori">• Vezi utilizatori</a>
                <h2>STATISTICI</h2>
                <a href="<?php echo URL; ?>admin/statisticaComenzi">• Vezi statistica comenzi</a>
                <a href="<?php echo URL; ?>admin/statisticaProduseFemei">• Vezi statistica produse femei</a>
                <a href="<?php echo URL; ?>admin/statisticaCeleMaiPopulareProduse">• Vezi statistica produselor populare </a>
                <a href="<?php echo URL; ?>admin/statisticaPlataComenzi">• Vezi statistica plata comenzi</a>
                <a>• Vezi statistica comenzi</a>
            </div>
            <div class="line"></div>
            <div class="administrare-produse">
                <h3>ADMINISTRARE PRODUSE</h3>
                <a href="<?php echo URL; ?>admin/stergereProdusDupaId">• Sterge produs</a>
                <a href="<?php echo URL; ?>admin/adaugaProdus">• Adauga produs</a>
                <a href="<?php echo URL; ?>admin/modificaProdus">• Modifica produs</a>
                <a href="<?php echo URL; ?>admin/listareProduse">• Vezi produse</a>
            </div>
        </div>
    </main>

    <?php
    require 'footer.php';
    ?>

</body>

</html>