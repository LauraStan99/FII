<!DOCTYPE html>
<html lang="ro">

<head>
    <title>Favorite | Impressed</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo URL; ?>public/css/wishlistFavorite.css" rel="stylesheet">
</head>

<body>
    <header>
        <?php
        require 'header.php';
        ?>
    </header>
    <main>
        <div class="titlu">
            <h1>Favorite</h1>
            <hr>
        </div>
        <button class="continua-cumparaturi" onclick="window.location.href='<?php echo URL; ?>home'">
            ◄ Continua cumparaturi
        </button>

        <div class="tabel">

            <table>
                <tr>

                    <th class="articol"></th>
                    <th class="detalii"></th>
                    <th class="add"></th>

                </tr>
                <br>
                <?php
                while ($row = $this->result->fetch()) {
                ?>
                    <tr>
                        <td>
                            <a href="<?php echo URL . 'produse/produs/' . $row['id_produs'] ?>">
                                <img id="produs" src="<?php echo URL; ?>public/poze/<?php echo  $row['imagine']; ?>.png">
                            </a>
                        </td>
                        <td class="coloana-detalii">
                            <h2><?php echo $row['nume']; ?> </h2>
                            <a>Material : <?php echo $row['material']; ?> </a>
                            <a>Culoare : <?php echo $row['culoare']; ?></a>
                            <a>Marime : <?php echo $row['marime']; ?></a>

                        </td>
                        <td class="coloana-stergere">    
                                <a class="sterge-produs" href="<?php echo URL; ?>wishlist/deleteFromWishlist/<?php echo $row['id_produs'] ?>/<?php echo $row['marime'] ?>">X Sterge produs</a>
                                <p>Disponibilitate: <a class="stock">in stock</a></p>
                                <a>Pret : <?php echo $row['pret']; ?> </a>
                                <form method="POST">
                                    <button class="adauga-in-cos" name="adauga-in-cos" type="submit" formaction="<?php echo URL; ?>wishlist/addToCart/<?php echo $row['id_produs'] ?>/<?php echo $row['marime'] ?>">Adauga in cos</button>
                                </form>
                        </td>
                    </tr>

                <?php } ?>

            </table>

        </div>
    </main>

    <footer>
        <?php

        require 'footer.php';
        ?>
    </footer>

</body>

</html>