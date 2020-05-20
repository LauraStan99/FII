<!DOCTYPE html>
<html lang="ro">

<head>
    <title>Account | Impressed</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="../public/css/adminAccountNew.css" rel="stylesheet" />
</head>

<body>

    

    <main>
        <div>
            <h1>CONT ADMINISTRATOR</h1>
            <p>Bun venit!</p>
            <hr>
        </div>

        <div class="administrare">
            <div class="administrare-utilizatori">
                <h2>ADMINISTRARE UTILIZATORI</h2>
                <a>• Vezi utilizatori</a>
            </div>
            <div class="line"></div>
            <div class="administrare-produse">
                <h3>ADMINISTRARE PRODUSE</h3>
                <a id="stergeProdus">• Sterge produs</a>
                <a>• Adauga produs</a>
                <a>• Modifica produs</a>
                <a>• Vezi produse</a>
            </div>
            <div id="modalStergereProdus" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <form method="post" class="sectiune">
                        <a>Introduce-ti id-ul produsului pe care doriti sa il stergeti</a>
                        <br />
                        <div class="input-id">
                            <input type="text" placeholder="1001">
                            <button type="submit">Sterge</button>
                        </div>
                    </form>
                </div>
            </div>
            <script type="text/javascript" src="../public/js/modal-stergereProdus.js"></script>
        </div>
    </main>

    <?php
    require 'footer.php';
    ?>


</html>