<!DOCTYPE html>
<html lang="ro">

<head>
    <title>Adauga produs | Impressed</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="../public/css/addProduct.css" rel="stylesheet" />
</head>

<body>


    <main>
        <div>
            <h1>Inregistrare produs </h1>
            <hr />
        </div>

        <form method="post">

            <div class="linie">
                <label for="form-nume"><a> Nume produs </a></label>
                <div class="input">
                    <input type="text" id="nume-produs" name="nume" placeholder="Skinny High Jeans" />
                </div>
            </div>
            <div class="linie">
                <label for="form-descriere"><a> Descriere produs </a></label>
                <div class="input">
                    <input type="text" id="descriere" name="descriere" placeholder="Jeans de denim elastic prespălat, cu cinci buzunare" />
                </div>
            </div>
            <div class="linie">
                <label for="form-pret"><a> Pret produs </a></label>
                <div class="input">
                    <input type="text" id="pret" name="pret" placeholder="150 lei" />
                </div>
            </div>
            <div class="linie">
                <label for="form-material"><a> Material produs </a></label>
                <div class="input">
                    <input type="text" id="material" name="material" placeholder="denim" />
                </div>
            </div>
            <div class="linie">
                <label for="form-culoare"><a> Culoare produs </a></label>
                <div class="input">
                    <input type="text" id="culoare" name="culoare" placeholder="albastru" />
                </div>
            </div>
            <div class="linie">
                <label for="form-gen"><a> Gen produs </a></label>
                <div class="input">
                    <input type="text" id="gen" name="gen" placeholder="femei" />
                </div>
            </div>
            <div class="linie">
                <label for="form-categorie"><a> Categorie produs </a></label>
                <div class="input">
                    <input type="text" id="categorie" name="categorie" placeholder="blugi" />
                </div>
            </div>
            <div class="linie">
                <label for="form-tip"><a> Tip produs </a></label>
                <div class="input">
                    <input type="text" id="tip" name="tip" placeholder="casual" />
                </div>
            </div>



            <button class="buton" type="submit">
                Inregistrare produs
            </button>
        </form>
    </main>

    <?php
    require 'footer.php';
    ?>

</body>

</html>