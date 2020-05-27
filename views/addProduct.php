<!DOCTYPE html>
<html lang="ro">

<head>
    <title>Adauga produs | Impressed</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="<?php echo URL; ?>public/css/addProductNew.css" rel="stylesheet" />
</head>

<body>
    <header>
        <?php
        require 'header.php';
        ?>
    </header>

    <main>
        <div>
            <h1>Inregistrare produs </h1>
            <hr />
        </div>

        <form method="post">

            <div class="linie">
                <label for="form-nume"><a> Nume produs </a></label>
                <div class="input">
                    <input type="text" id="nume-produs" name="nume" placeholder="Skinny High Jeans" value="<?php if (isset($this->nume)) echo $this->nume; ?>" />
                    <span class="error"><?php if (isset($this->numeErr)) echo $this->numeErr; ?></span>
                </div>
            </div>
            <div class="linie">
                <label for="form-descriere"><a> Descriere produs </a></label>
                <div class="input">
                    <input type="text" id="descriere" name="descriere" placeholder="Jeans de denim elastic prespălat, cu cinci buzunare" value="<?php if (isset($this->descriere)) echo $this->descriere; ?>" />
                    <span class="error"><?php if (isset($this->descriereErr)) echo $this->descriereErr; ?></span>
                </div>
            </div>
            <div class="linie">
                <label for="form-pret"><a> Pret produs </a></label>
                <div class="input">
                    <input type="text" id="pret" name="pret" placeholder="150" value="<?php if (isset($this->pret)) echo $this->pret; ?>"/>
                    <span class="error"><?php if (isset($this->pretErr)) echo $this->pretErr; ?></span>

                </div>
            </div>
            <div class="linie">
                <label for="form-material"><a> Material produs </a></label>
                <div class="input">
                    <input type="text" id="material" name="material" placeholder="denim" value="<?php if (isset($this->material)) echo $this->material; ?>" />
                    <span class="error"><?php if (isset($this->materialErr)) echo $this->materialErr; ?></span>

                </div>
            </div>
            <div class="linie">
                <label for="form-culoare"><a> Culoare produs </a></label>
                <div class="input">
                    <input type="text" id="culoare" name="culoare" placeholder="albastru" value="<?php if (isset($this->culoare)) echo $this->culoare; ?>"/>
                    <span class="error"><?php if (isset($this->culoareErr)) echo $this->culoareErr; ?></span>

                </div>
            </div>
            <div class="linie">
                <label for="form-gen"><a> Gen produs </a></label>
                <div class="input">
                    <input type="text" id="gen" name="gen" placeholder="femei" value="<?php if (isset($this->gen)) echo $this->gen; ?>"/>
                    <span class="error"><?php if (isset($this->genErr)) echo $this->genErr; ?></span>
                </div>
            </div>
            <div class="linie">
                <label for="form-categorie"><a> Categorie produs </a></label>
                <div class="input">
                    <input type="text" id="categorie" name="categorie" placeholder="blugi" value="<?php if (isset($this->categorie)) echo $this->categorie; ?>"/>
                    <span class="error"><?php if (isset($this->categorieErr)) echo $this->categorieErr; ?></span>

                </div>
            </div>
            <div class="linie">
                <label for="form-tip"><a> Tip produs </a></label>
                <div class="input">
                    <input type="text" id="tip" name="tip" placeholder="casual" value="<?php if (isset($this->tip)) echo $this->tip; ?>"/>
                    <span class="error"><?php if (isset($this->tipErr)) echo $this->tipErr; ?></span>

                </div>
            </div>

            <div class="linie">
                Incarca o fotografie:
                <input type="file" name="imagine" id="fileToUpload">
            </div>


            <input id="buton" type="submit" name="submit" value="Inregistreaza produs" />
            <span class="error"><?php if (isset($this->succes)) echo $this->succes; ?></span>




        </form>
    </main>

    <?php
    require 'footer.php';
    ?>

</body>

</html>