<!DOCTYPE html>
<html lang="ro">

<head>
    <title>Produse | Impressed</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="<?php echo URL; ?>public/css/cauta1.css" rel="stylesheet" />
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
                    <button name="popularitate" formaction="<?php echo URL; ?>cauta/ordonare/nr_accesari/desc">Cele mai populare</button>
                    <button name="alfabetic" formaction="<?php echo URL; ?>cauta/ordonare/nume/asc">Ordonare alfabetica</button>
                    <button name="crescator" formaction="<?php echo URL; ?>cauta/ordonare/pret/asc">Pret crescator</button>
                    <button name="descrescator" formaction="<?php echo URL; ?>cauta/ordonare/pret/desc">Pret descrescator</button>
                </form>
            </div>

        </div>
        <script src="<?php echo URL; ?>public/js/order.js"> </script>

        <div class="produse">
            <?php
            while ($row = $this->result->fetch()) {
            ?>
                 <div class="column">
                        <div class="card">
                            <a href="<?php echo URL . 'produse/produs/' . $row['id_produs'] ?>">
                                <img id="imagine" src="<?php echo URL; ?>public/poze/<?php echo  $row['imagine']; ?>.png">
                            </a>
                            <h1><?php echo  $row['nume']; ?></h1>
                            <p class="price"><?php echo  $row['pret']; ?> lei</p>
                            <form method="POST">
                                    <button name="adauga-cos" type="submit" formaction="<?php echo URL; ?>cauta?id=<?php echo $row['id_produs']; ?>">Adauga in cos</button>
                            </form>
                        </div>
                    </div>
            <?php }
            ?>
            <p class="mesaj"><?php if (isset($this->message)) echo $this->message; ?></p>

        </div>
    </main>

    <?php
    require 'footer.php';
    ?>

</body>

</html>