<!DOCTYPE html>
<html lang="ro">

<head>
    <title>Produse | Impressed</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="<?php echo URL; ?>public/css/istoricComenzi1.css" rel="stylesheet" />
</head>

<body>
    <header>
        <?php
        require 'header.php';
        ?>
    </header>
    <main>
        <div>
            <h1>Istoric comenzi</h1>
            <hr />
        </div>

        <table>
            <tr>
                <th class="th-idComanda">ID comanda</th>
                <th>Utilizator</th>
                <th>Adresa de livrare</th>
                <th>Status comanda</th>
                <th>Metoda plata</th>
                <th>Data plasare</th>
                <th>Metoda livrare</th>
            </tr>
            <?php while ($row = $this->result->fetch()) { ?>
                <tr>
                    <td><?php echo $row['id_comanda']; ?>
                        <form method="POST">
                            <button class="detalii-comanda" formaction="<?php echo URL; ?>account/detaliiComanda/<?php echo $row['id_comanda']; ?>">Detalii</button>
                        </form>
                    </td>
                    <td><?php echo $row['nume']; ?> <?php echo $row['prenume']; ?></td>
                    <td><?php echo $row['adresa']; ?></td>
                    <td>Finalizat</td>
                    <td><?php echo $row['metoda_plata']; ?></td>
                    <td><?php echo $row['data_plasare']; ?></td>
                    <td><?php echo $row['metoda_livrare']; ?></td>
                </tr>
            <?php } ?>


        </table>
    </main>

    <?php
    require 'footer.php';
    ?>

</body>

</html>