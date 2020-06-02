<!DOCTYPE html>

<head>
    <link href="<?php echo URL; ?>public/css/fluxRSS.css" rel="stylesheet" />
    <title>Produse populare Impressed</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
    <header>
        <?php
        require 'header.php';
        ?>
    </header>
    <main>
        <h1>Clasamentul celor mai populare produse din magazinul Impressed</h1>
        <div class="produse">

            <?php
            define('XPATH', '/channel/item');
            foreach ($this->result->xpath(XPATH) as $item) {
            ?>

                <div class="produs">
                    <p class="titlu"><?php echo $item->title ?></p>
                    <a class="link" href="<?php echo $item->link ?>">CATRE PRODUS</a>
                    <p class="descriere"><?php echo $item->description ?></p>
                </div>

            <?php } ?>
        </div>
    </main>
    <footer>
        <?php require 'footer.php';
        ?>
    </footer>
</body>

</html>