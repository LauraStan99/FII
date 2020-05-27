<!DOCTYPE html>
<html lang="ro">

<head>
    <title>Adauga produs | Impressed</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="<?php echo URL; ?>public/css/modifyProductNew.css" rel="stylesheet" />
</head>

<body>
    <header>
        <?php
        require 'header.php';
        ?>
    </header>

    <main>
        <div>
            <h1>Modifica date produs</h1>
            <hr />
        </div>

        <form method="post" class="input-cauta">
            <input type="text" name="cauta-produs" placeholder="Intoduce-ti ID-ul produsului" />
            <button class="buton-cauta" type="submit" name="cauta">Cauta</button>
        </form>

        <?php if (isset($this->result) && $this->result != null) {  ?>
            <form method="post">
                <?php while ($row = $this->result->fetch()) { ?>

                    <div class="linie">
                        <label for="form-nume"><a> Nume produs: <?php echo $row['nume'] ?> </a></label>
                        <div class="input">
                            <input type="text" id="nume-produs" name="nume" />
                        </div>
                    </div>
                    <div class="linie">
                        <label for="form-descriere"><a> Descriere produs: <?php echo $row['descriere'] ?></a></label>
                        <div class="input">
                            <input type="text" id="descriere" name="descriere" />
                        </div>
                    </div>
                    <div class="linie">
                        <label for="form-pret"><a> Pret produs: <?php echo $row['pret'] ?></a></label>
                        <div class="input">
                            <input type="text" id="pret" name="pret" />

                        </div>
                    </div>
                    <div class="linie">
                        <label for="form-material"><a> Material produs: <?php echo $row['material'] ?></a></label>
                        <div class="input">
                            <input type="text" id="material" name="material" />
                        </div>
                    </div>
                    <div class="linie">
                        <label for="form-culoare"><a> Culoare produs: <?php echo $row['culoare'] ?></a></label>
                        <div class="input">
                            <input type="text" id="culoare" name="culoare" />

                        </div>
                    </div>
                    <div class="linie">
                        <label for="form-gen"><a> Gen produs: <?php echo $row['gen'] ?></a></label>
                        <div class="input">
                            <input type="text" id="gen" name="gen" />
                        </div>
                    </div>
                    <div class="linie">
                        <label for="form-categorie"><a> Categorie produs: <?php echo $row['categorie'] ?></a></label>
                        <div class="input">
                            <input type="text" id="categorie" name="categorie" />

                        </div>
                    </div>
                    <div class="linie">
                        <label for="form-tip"><a> Tip produs: <?php echo $row['tip'] ?></a></label>
                        <div class="input">
                            <input type="text" id="tip" name="tip" />
                        </div>
                    </div>

                    <div class="upload">
                        Fotografie actuala: <?php echo $row['imagine'] ?>.png
                        <p> Incarca o fotografie:</p>
                        <input type="file" name="imagine" id="fileToUpload">
                    </div>
                <?php } ?>

                <button id="buton" type="submit" name="submit">Modifica</button>




            </form>
        <?php } ?>
    </main>

    <?php
    require 'footer.php';
    ?>

</body>

</html>