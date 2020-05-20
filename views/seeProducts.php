<!DOCTYPE html>
<html lang="ro">

<head>
    <title>Produse | Impressed</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="../public/css/seeProducts.css" rel="stylesheet" />
</head>

<body>

    <main>
        <div>
            <h1>Lista produse</h1>
            <hr>
        </div>

        <table>
            <tr>
                <th class="idProdus"></th>
                <th class="imagine"></th>
                <th class="denumire"></th>
                <th class="material"></th>
                <th class="pret"></th>
                <th class="sterge"></th>

            </tr>
            <br>
            <tr>
                <td>
                    id produs
                </td>
                <td>
                    <img id="produs" src="../public/poze/f-rochie10.png">
                </td>

                <td>
                    Denumirea produsului
                </td>
                <td>
                    material
                </td>
                <td>
                    pret$
                </td>
                <td>
                    <button id="stergere-produs">Sterge</button>
                </td>
            </tr>

        </table>

    </main>

    <?php
    require 'footer.php';
    ?>


</html>