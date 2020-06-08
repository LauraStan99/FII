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
            <a class="imagine-produs" href="<?php echo URL; ?>public/poze/<?php echo  $row['imagine']; ?>.png">
                <img id="imagine" src="<?php echo URL; ?>public/poze/<?php echo  $row['imagine']; ?>.png">
            </a>
            <div class="detalii">

                <h1><?php echo  $row['nume']; ?></h1>
                <div>
                    <hr>
                </div>
                <div class="pret">
                    <div class="valoare">
                        <p>Pret : <?php echo  $row['pret']; ?> lei</p>
                        <p>Stoc: <?php if (isset($_GET['size']) && $_GET['size'] == 'XS') echo $this->stocXS;
                                    else if (isset($_GET['size']) && $_GET['size'] == 'S') echo $this->stocS;
                                    else if (isset($_GET['size']) && $_GET['size'] == 'M') echo $this->stocM;
                                    else if (isset($_GET['size']) && $_GET['size'] == 'L') echo $this->stocL;
                                    else if (isset($_GET['size']) && $_GET['size'] == 'XL') echo $this->stocXL;
                                    else if (isset($_GET['size']) && $_GET['size'] == 'XXL') echo $this->stocXXL;
                                    else echo $this->stocTotal; ?></p>
                    </div>
                </div>
                <div>
                    <hr>
                </div>
                <p>Culoare : <?php echo  $row['culoare']; ?> </p>
                <div>
                    <hr>
                </div>
                <p>Marime: <?php if (isset($_GET['size'])) echo $_GET['size'];
                            else echo 'Alegeti o marime!'; ?></p>
                <div class="butoane-marime">
                    <form method="POST">
                        <button id="buton" name="XS">XS/34</button>
                        <button id="buton" name="S">S/36</button>
                        <button id="buton" name="M">M/38</button>
                        <button id="buton" name="L">L/40</button>
                        <button id="buton" name="XL">XL/42</button>
                        <button id="buton" name="XXL">XXL/44</button>
                    </form>
                </div>
                </br>
                <form method="POST">
                    <button type="submit" name="adauga-cos" id="adauga-cos">Adauga in cos</button>
                    <button type="submit" name="adauga-favorite" id="adauga-favorite">Adauga la favorite </button>

                    <?php if (Session::get('tip_utilizator') == "admin") {  ?>
                        <button type="submit" name="sterge-produs" id="sterge-produs" formaction="<?php echo URL; ?>produse/deleteProductAsAdmin/<?php echo $row['id_produs']; ?>/<?php echo $row['gen']; ?>/<?php echo $row['categorie']; ?>">Sterge produs</button>
                    <?php } ?>
                </form>
                <?php
                if (isset($this->message)) {
                    echo $this->message;
                }
                ?>
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