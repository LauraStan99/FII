<!DOCTYPE html>
<html lang="ro">

<head>
    <title>Users | Impressed</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="../public/css/seeUsers.css" rel="stylesheet" />
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
                <tr>
                    <td>
                        <img id="produs" src="../public/poze/user.png">
                    </td>
                    <td>
                        Nume si prenume
                    </td>
                    <td>
                        email@gmail.com
                    </td>
                    <td>
                        0766666666
                    </td>
                    <td>
                        <button id="stergere-user">Sterge</button>
                    </td>
                </tr>
        </table>

    </main>

    <?php
    require 'footer.php';
    ?>


</html>