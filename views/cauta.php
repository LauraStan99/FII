<!DOCTYPE html>
<html lang="ro">

<head>
    <title>Produse | Impressed</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="<?php echo URL; ?>public/css/cauta.css" rel="stylesheet" />
</head>

<body>
    <header>
        <?php
        require 'header.php';
        ?>
    </header>
    <main>
        <div>
            <h1>Rezultatele cautarii dvs.</h1>
            <hr>
        </div>

        <div class="sortare">
            <button class="sortare-buton" onclick="Order()">Ordoneaza dupa ▼</button>
            <div class="sortare-continut" id="ordonare">
                <form method="POST" class="form-ordonare">
                    <button name="popularitate" formaction="<?php echo URL;?>cauta/sortare" >Cele mai populare</button>
                    <button name="alfabetic">Ordonare alfabetica</button>
                    <button name="crescator">Pret crescator</button>
                    <button name="descrescator">Pret descrescator</button>
                </form>
            </div>

        </div>
        <script src="<?php echo URL; ?>public/js/order.js"> </script>

        <div class="produse">
            <?php
            if (!isset($this->message)) {
                while ($row = $this->result->fetch()) {
            ?>
                    <div class="produs">
                        <img id="produs" src="<?php echo URL; ?>public/poze/<?php echo  $row['imagine']; ?>.png">

                        <a id="nume"><?php echo $row['nume']  ?></a>

                        <a id="pret"> <?php echo $row['pret']  ?> lei</a>

                        <form class="adauga-produs" method="POST">
                            <button class="adauga">Adauga in cos</button>
                        </form>

                    </div>
                <?php }
            } else { ?>
                <p class="mesaj"><?php echo $this->message; ?></p>
            <?php } ?>
        </div>
    </main>

    <?php
    require 'footer.php';
    ?>

</body>

</html>