<!DOCTYPE html>
<html lang="ro">

<head>
    <title>Users | Impressed</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="<?php echo URL; ?>public/css/seeUsers.css" rel="stylesheet" />
</head>

<body>

    <main>
        <div>
            <h1>Lista utilizatori</h1>
            <hr>
        </div>

        <table>
            <tr>
                <th class="imagine"></th>
                <th class="numeSiPrenume"></th>
                <th class="email"></th>
                <th class="telefon"></th>
                <th class="sterge"></th>
            </tr>
            <br>
            <?php
            while ($row = $this->result->fetch()) {
            ?>
                <tr>
                    <td>
                        <img id="produs" src="<?php echo URL; ?>public/poze/user.png">
                    </td>
                    <td>
                        <?php echo $row['nume'] . " " . $row['prenume'] ?>
                    </td>
                    <td>
                        <?php echo $row['email'] ?>
                    </td>
                    <td>
                        <?php echo $row['telefon'] ?>
                    </td>
                    <td>
                        <form>
                            <button id="stergere-user" formaction="<?php echo URL; ?>admin/stergeUtilizator/<?php echo $row['id_utilizator'] ?>" type="submit">Sterge</button>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>

    </main>

    <?php
    require 'footer.php';
    ?>


</html>