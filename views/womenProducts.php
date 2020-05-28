<!DOCTYPE html>
<html lang="ro">

<head>
    <title>Produse Femei | Impressed</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="<?php echo URL; ?>public/css/products.css" rel="stylesheet" />
</head>

<body>
    <header>
        <?php
        require 'header.php';
        ?>
    </header>
    <main>


        <form method="POST" class="filter">
            <div class="prices">
                <h1>PRET</h1>
                <div class="check-price">
                    <label><input type="radio" name="pret" value="0,50" />Pana la 50 Lei</label>
                    <label><input type="radio" name="pret" value="50,100" />50 - 100 Lei</label>
                    <label><input type="radio" name="pret" value="100,150" />100 - 150 Lei</label>
                    <label><input type="radio" name="pret" value="150,200" />150 - 200 Lei</label>
                    <label><input type="radio" name="pret" value="200,250" />200 - 250 Lei</label>
                    <label><input type="radio" name="pret" value="250,1500" />Peste 250 Lei</label>
                </div>
            </div>
            <hr>
            <div class="size">
                <h1>MARIME</h1>
                <div class="check-size">
                    <label><input type="radio" name="marime" value="XS" />XS/34</label>
                    <label><input type="radio" name="marime" value="S" />S/36</label>
                    <label><input type="radio" name="marime" value="M" />M/38</label>
                    <label><input type="radio" name="marime" value="L" />L/40</label>
                    <label><input type="radio" name="marime" value="XL" />XL/42</label>
                    <label><input type="radio" name="marime" value="XXL" />XXL/44</label>
                </div>
            </div>
            <hr>
            <div class="colors">
                <h1> CULOARE </h1>
                <div class="check-colors">
                    <label id="rosu"><input type="radio" name="culoare" value="rosu" />rosu</label>
                    <label id="galben"><input type="radio" name="culoare" value="galben" />galben</label>
                    <label id="albastru"><input type="radio" name="culoare" value="albastru" />albastru</label>
                    <label id="negru"><input type="radio" name="culoare" value="negru" />negru</label>
                    <label id="verde"><input type="radio" name="culoare" value="verde" />verde</label>
                    <label id="maro"><input type="radio" name="culoare" value="maro" />maro</label>
                    <label id="portocaliu"><input type="radio" name="culoare" value="portocaliu" />porocaliu</label>
                    <label id="roz"><input type="radio" name="culoare" value="roz" />roz</label>
                    <label id="mov"><input type="radio" name="culoare" value="mov" />violet</label>
                    <label id="alb"><input type="radio" name="culoare" value="alb" />alb</label>
                    <label id="bej"><input type="radio" name="culoare" value="bej" />bej</label>
                </div>

            </div>
            <hr>
            <div class="fabrics">
                <h1>MATERIAL</h1>
                <div class="check-fabrics">
                    <label><input type="radio" name="material" value="bumbac" /> bumbac</label>
                    <label><input type="radio" name="material" value="matase" /> matase</label>
                    <label><input type="radio" name="material" value="vascoza" /> vascoza</label>
                    <label><input type="radio" name="material" value="catifea" /> catifea</label>
                    <label><input type="radio" name="material" value="satin" /> satin</label>
                    <label><input type="radio" name="material" value="stofa" /> stofa</label>
                    <label><input type="radio" name="material" value="denim" /> denim</label>
                    <label><input type="radio" name="material" value="sifon" /> sifon</label>
                    <label><input type="radio" name="material" value="poliester" /> poliester</label>
                    <label><input type="radio" name="material" value="tul" /> tul</label>
                    <label><input type="radio" name="material" value="poliamida" /> poliamida</label>
                    <label><input type="radio" name="material" value="piele" /> piele</label>
                    <label><input type="radio" name="material" value="in" /> in</label>
                    <label><input type="radio" name="material" value="sintetic" /> sintetic</label>
                </div>

            </div>
            <hr>
            <div class="occasions">
                <h1>OCAZIE</h1>
                <div class="check-occasions">
                    <label><input type="radio" name="tip" value="casual" /> casual</label>
                    <label><input type="radio" name="tip" value="sport" /> sport</label>
                    <label><input type="radio" name="tip" value="business" /> business</label>
                    <label><input type="radio" name="tip" value="festival" /> festival</label>
                    <label><input type="radio" name="tip" value="cocktail" /> cocktail</label>
                    <label><input type="radio" name="tip" value="bal" /> bal</label>
                </div>

            </div>
            </br>

            <button type="submit" class="aplica" name="aplica-filtre">Aplica</button>

        </form>
        <div class="page">

            <div class="order">
                <h2>
                    <?php
                    if ($this->category == "blugi") echo "Blugi";
                    else if ($this->category == "rochii") echo "Rochii";
                    else if ($this->category == "bluze") echo "Bluze";
                    else if ($this->category == "camasi") echo "Camasi";
                    else if ($this->category == "fuste") echo "Fuste";
                    else if ($this->category == "jachete") echo "Jachete";
                    else if ($this->category == "pantaloni") echo "Pantaloni";
                    ?>

                    <hr>
                </h2>
                <div class="sortare">
                    <button class="sortare-buton" onclick="Order()">Ordoneaza dupa ▼</button>
                    <div class="sortare-continut" id="ordonare">
                        <a href="<?php echo URL . 'produse/femeiOrder/' . $this->category . '/nr_accesari/desc' ?>">Cele mai populare</a>
                        <a href="<?php echo URL . 'produse/femeiOrder/' . $this->category . '/nume/asc' ?>">Ordonare alfabetica</a>
                        <a href="<?php echo URL . 'produse/femeiOrder/' . $this->category . '/pret/asc' ?>">Pret crescator</a>
                        <a href="<?php echo URL . 'produse/femeiOrder/' . $this->category . '/pret/desc' ?>">Pret descrescator</a>
                    </div>

                </div>
                <script src="<?php echo URL; ?>public/js/order.js"> </script>

            </div>
            <div class="products">
                <?php

                while ($row = $this->result->fetch()) {
                ?>

                    <div class="column">
                        <div class="card">
                            <a href="<?php echo URL . 'produse/produs/' . $row['id_produs'] ?>">
                                <img id="imagine" src="<?php echo URL; ?>public/poze/<?php echo  $row['imagine']; ?>.png">
                            </a>
                            <h1><?php echo  $row['nume']; ?></h1>
                            <p class="price"><?php echo  $row['pret']; ?> lei</p>
                            <form method="POST">
                                <button name="adauga-cos" type="submit" formaction="<?php echo URL; ?>produse/addToCartWomenPage/<?php echo $row['id_produs'] ?>/<?php echo $this->category ?>">Adauga in cos</button>
                            </form>
                        </div>
                    </div>

                <?php
                }
                ?>

            </div>

        </div>

    </main>
    <footer>
        <?php
        require 'footer.php';
        ?>
    </footer>
</body>

</html>