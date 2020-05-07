<!DOCTYPE html>
<html lang="ro">

<head>
    <title>Detalii produs | Impressed</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="<?php echo URL; ?>/public/css/productPage.css" rel="stylesheet" />
</head>

<body>
    <?php
    require 'header.php';
    ?>

    <main>
        <?php
        while ($row = $this->result->fetch()) {
        ?>
            <div class="imagine-produs">
                <img id="imagine" src="<?php echo URL; ?>public/poze/<?php echo  $row['imagine']; ?>.png">
            </div>
            <div class="detalii">

                <h1><?php echo  $row['nume']; ?></h1>
                <div>
                    <hr>
                </div>
                <div class="pret">
                    <div class="valoare">
                        <p>Pret : <?php echo  $row['pret']; ?> lei</p>
                    </div>
                    <div class="stock">
                        <img id="inStock" src="<?php echo URL; ?>public/poze/inStock.png">
                    </div>
                </div>
                <div>
                    <hr>
                </div>
                <p>Culoare : <?php echo  $row['culoare']; ?> </p>
                <div>
                    <hr>
                </div>
                <p>Marime : ... </p>
                <div class="butoane-marime">
                    <button id="buton">XS/34</button>
                    <button id="buton">S/36</button>
                    <button id="buton">M/38</button>
                    <button id="buton">L/40</button>
                    <button id="buton">XL/42</button>
                    <button id="buton">XXL/44</button>
                </div>
                </br>

                <button type="submit" id="adauga-cos">Adauga in cos</button>
                <button type="submit" id="adauga-favorite">Adauga la favorite </button>

            </div>
            <div class="descriere-produs">
                <div>
                    <hr class="limita-descriere">
                </div>
                <h1>Descriere</h1>
                <p><?php echo  $row['descriere']; ?></p>
                </br>
                <h1>Material și îngrijire</h1>
                <p>Material : <?php echo  $row['material']; ?></p>
                <img id="imagine" src="<?php echo URL; ?>public/poze/indicatiiIngrijire.png">

            </div>
        <?php } ?>
    </main>

    <?php
    require 'footer.php';
    ?>
</body>

</html>