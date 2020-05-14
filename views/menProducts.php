<!DOCTYPE html>
<html lang="ro">

<head>
    <title>Produse Barbati | Impressed</title>
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


        <div class="filter">
            <div class="prices">
                <h1>PRET</h1>
                <div class="check-price">
                    <label><input type="checkbox" />Pana la 50 Lei</label>
                    <label><input type="checkbox" />50 - 100 Lei</label>
                    <label><input type="checkbox" />100 - 150 Lei</label>
                    <label><input type="checkbox" />150 - 200 Lei</label>
                    <label><input type="checkbox" />200 - 250 Lei</label>
                    <label><input type="checkbox" />Peste 250 Lei</label>
                </div>
            </div>
            <hr>
            <div class="size">
                <h1>MARIME</h1>
                <div class="check-size">
                    <label><input type="checkbox" />XS/34</label>
                    <label><input type="checkbox" />S/36</label>
                    <label><input type="checkbox" />M/38</label>
                    <label><input type="checkbox" />L/40</label>
                    <label><input type="checkbox" />XL/42</label>
                    <label><input type="checkbox" />XXL/44</label>
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
                    <label><input type="checkbox" /> bumbac</label>
                    <label><input type="checkbox" /> matase</label>
                    <label><input type="checkbox" /> vascoza</label>
                    <label><input type="checkbox" /> catifea</label>
                    <label><input type="checkbox" /> satin</label>
                    <label><input type="checkbox" /> stofa</label>
                    <label><input type="checkbox" /> denim</label>
                    <label><input type="checkbox" /> sifon</label>
                    <label><input type="checkbox" /> poliester</label>
                    <label><input type="checkbox" /> tul</label>
                    <label><input type="checkbox" /> poliamida</label>
                    <label><input type="checkbox" /> piele</label>
                    <label><input type="checkbox" /> in</label>
                </div>

            </div>
            <hr>
            <div class="occasions">
                <h1>OCAZIE</h1>
                <div class="check-occasions">
                    <label><input type="checkbox" /> casual</label>
                    <label><input type="checkbox" /> sport</label>
                    <label><input type="checkbox" /> business</label>
                    <label><input type="checkbox" /> festival</label>
                    <label><input type="checkbox" /> cocktail</label>
                    <label><input type="checkbox" /> bal</label>
                </div>

            </div>
            </br>

            <button type="submit" class="aplica">Aplica</button>
        </div>

        <div class="page">

            <div class="order">
                <h2>
                    <?php
                    if ($this->category == "blugi") echo "Blugi";
                    else if ($this->category == "bluze") echo "Bluze";
                    else if ($this->category == "camasi") echo "Camasi";
                    else if ($this->category == "tricouri") echo "Tricouri";
                    else if ($this->category == "jachete") echo "Jachete";
                    else if ($this->category == "pantaloni") echo "Pantaloni";
                    ?>

                    <hr>
                </h2>
                <div class="sortare">
                    <button class="sortare-buton" onclick="Order()">Ordoneaza dupa ▼</button>
                    <div class="sortare-continut" id="ordonare">
                        <a href="">Cele mai populare</a>
                        <a href="<?php echo URL . 'produse/barbatiOrder/' . $this->category . '/nume/asc' ?>">Ordonare alfabetica</a>
                        <a href="<?php echo URL . 'produse/barbatiOrder/' . $this->category . '/pret/asc' ?>">Pret crescator</a>
                        <a href="<?php echo URL . 'produse/barbatiOrder/' . $this->category . '/pret/desc' ?>">Pret descrescator</a>
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
                                <img id="imagine" src="<?php echo URL; ?>public/poze/<?php echo  $row['imagine']; ?>.png" >
                            </a>
                            <h1><?php echo  $row['nume']; ?></h1>
                            <p class="price"><?php echo  $row['pret']; ?> lei</p>
                            <form method="POST">
                            <button name = "adauga-cos" type="submit" formaction="<?php echo URL; ?>produse/addToCart/<?php echo $row['id_produs'] ?>">Adauga in cos</button>
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