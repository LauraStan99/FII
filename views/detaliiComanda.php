<!DOCTYPE html>
<html lang="ro">

<head>
    <title>Produse | Impressed</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="<?php echo URL; ?>public/css/detaliiComanda.css" rel="stylesheet" />
</head>

<body>
    <header>
        <?php
        require 'header.php';
        ?>
    </header>
    <main>
        <div>
            <h1>Detaliile comenzii cu numarul : <?php echo $this->title; ?></h1>
            <hr />
        </div>

        <div class="continut">
            <p>Total pret comanda : <?php echo $this->totalPrice; ?> lei</p>
            <p>Produsele comenzii :</p>

            <table>
                <tr>
                    <th class="imagine">Imagine</th>
                    <th class="denumire">Denumire</th>
                    <th class="culoare">Culoare</th>
                    <th class="material">Material</th>
                    <th class="marime">Marime</th>
                    <th class="pret">Pret</th>

                </tr>
                <?php while ($row = $this->result->fetch()) { ?>
                    <tr>

                        <td>
                            <a href="<?php echo URL . 'produse/produs/' . $row['id_produs'] ?>">
                                <img id="produs" src="<?php echo URL; ?>public/poze/<?php echo  $row['imagine']; ?>.png" /></a>
                        </td>
                        <td><?php echo $row['nume']; ?></td>
                        <td><?php echo $row['culoare']; ?></td>
                        <td><?php echo $row['material']; ?></td>

                        <td><?php echo $row['marime']; ?></td>
                        <td><?php echo $row['pret']; ?> lei</td>

                    </tr>
                <?php } ?>


            </table>
        </div>
    </main>

    <?php
    require 'footer.php';
    ?>

</body>

</html>