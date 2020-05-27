<!DOCTYPE html>
<html lang="ro">

<head>
    <title>Produse Femei | Impressed</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="<?php echo URL; ?>public/css/productsNew.css" rel="stylesheet" />
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
                    <label><input type="radio" name="pret" value="" />Pana la 50 Lei</label>
                    <label><input type="radio" name="pret" value="100"/>50 - 100 Lei</label>
                    <label><input type="radio" name="pret" />100 - 150 Lei</label>
                    <label><input type="radio" name="pret" />150 - 200 Lei</label>
                    <label><input type="radio" name="pret" />200 - 250 Lei</label>
                    <label><input type="radio" name="pret" />Peste 250 Lei</label>
                </div>
            </div>
            <hr>
            <div class="size">
                <h1>MARIME</h1>
                <div class="check-size">
                    <label><input type="radio" name="marime" />XS/34</label>
                    <label><input type="radio" name="marime" />S/36</label>
                    <label><input type="radio" name="marime" />M/38</label>
                    <label><input type="radio" name="marime" />L/40</label>
                    <label><input type="radio" name="marime" />XL/42</label>
                    <label><input type="radio" name="marime" />XXL/44</label>
                </div>
            </div>
            <hr>
            <div class="colors">
                <h1> CULOARE </h1>
                <div class="icons-colors">
                    <a> <img src="<?php echo URL; ?>public/poze/red.png" alt="red" /> </a>
                    <a> <img src="<?php echo URL; ?>public/poze/yellow.png" alt="yellow" /></a>
                    <a> <img src="<?php echo URL; ?>public/poze/blue.png" alt="blue" /></a>
                    <a> <img src="<?php echo URL; ?>public/poze/black.png" alt="black" /></a>
                    <a> <img src="<?php echo URL; ?>public/poze/white.png" alt="white" /> </a>
                    <a> <img src="<?php echo URL; ?>public/poze/green.png" alt="green" /> </a>
                    <a> <img src="<?php echo URL; ?>public/poze/brown.png" alt="brown" /> </a>
                    <a> <img src="<?php echo URL; ?>public/poze/nude.png" alt="nude" /> </a>
                    <a> <img src="<?php echo URL; ?>public/poze/orange.png" alt="orange" /> </a>
                    <a> <img src="<?php echo URL; ?>public/poze/pink.png" alt="pink" /> </a>
                    <a> <img src="<?php echo URL; ?>public/poze/purple.png" alt="purple" /> </a>
                </div>

            </div>
            <hr>
            <div class="fabrics">
                <h1>MATERIAL</h1>
                <div class="check-fabrics">
                    <label><input type="radio" name="material" /> bumbac</label>
                    <label><input type="radio" name="material" /> matase</label>
                    <label><input type="radio" name="material" /> vascoza</label>
                    <label><input type="radio" name="material" /> catifea</label>
                    <label><input type="radio" name="material" /> satin</label>
                    <label><input type="radio" name="material" /> stofa</label>
                    <label><input type="radio" name="material" /> denim</label>
                    <label><input type="radio" name="material" /> sifon</label>
                    <label><input type="radio" name="material" /> poliester</label>
                    <label><input type="radio" name="material" /> tul</label>
                    <label><input type="radio" name="material" /> poliamida</label>
                    <label><input type="radio" name="material" /> piele</label>
                    <label><input type="radio" name="material" /> in</label>
                </div>

            </div>
            <hr>
            <div class="occasions">
                <h1>OCAZIE</h1>
                <div class="check-occasions">
                    <label><input type="radio" name="tip" value="casual"/> casual</label>
                    <label><input type="radio" name="tip" value="sport"/> sport</label>
                    <label><input type="radio" name="tip" value="business" /> business</label>
                    <label><input type="radio" name="tip" value="festival"/> festival</label>
                    <label><input type="radio" name="tip" value="cocktail"/> cocktail</label>
                    <label><input type="radio" name="tip" value="bal"/> bal</label>
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
                        <a href="">Cele mai populare</a>
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