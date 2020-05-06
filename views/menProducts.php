<!DOCTYPE html>
<html lang="ro">

<head>
    <title>Produse Barbati | Impressed</title>
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
                </div>

            </div>
            <hr>
            <div class="fabrics">
                <h1>MATERIAL</h1>
                <div class="check-fabrics">
                    <label><input type="checkbox" /> bumbac</label>
                    <label><input type="checkbox" /> matase</label>
                    <label><input type="checkbox" /> sintetic</label>
                    <label><input type="checkbox" /> catifea</label>
                    <label><input type="checkbox" /> satin</label>
                    <label><input type="checkbox" /> stofa</label>
                    <label><input type="checkbox" /> blug</label>
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
                    <label><input type="checkbox" /> aniversare</label>
                    <label><input type="checkbox" /> bal</label>
                </div>

            </div>
            </br>

            <button type="submit" class="aplica">Aplica</button>
        </div>


        <div class="products">

            <h2>
                <?php
                     if($this->category == "blugi") echo "Blugi";
                     else if($this->category == "bluze") echo "Bluze";
                     else if($this->category == "camasi") echo "Camasi";
                     else if($this->category == "jachete") echo "Jachete";
                     else if($this->category == "pantaloni") echo "Pantaloni";
                     else if($this->category == "tricouri") echo "Tricouri";
                ?>
            </h2>
            <hr>
            <div class="sortare">
                <p>Ordoneaza dupa: </p>

                <?php

                (isset($_POST['tip-ordonare'])) ? $ordonare = $_POST['tip-ordonare'] : $ordonare = 1;
                ?>

                <form>
                    <select id="ordonare" name="tip-ordonare">
                        <option <?php if ($ordonare == 1) echo 'a fost ales nr 1'; ?> value="1">Cele mai populare</option>
                        <option <?php if ($ordonare == 2) echo 'a fost ales nr 2'; ?>value="2">Sortare alfabetica</option>
                        <option <?php if ($ordonare == 3) echo 'a fost ales nr 3'; ?>value="3">Pret crescator</option>
                        <option <?php if ($ordonare == 4) echo 'a fost ales nr 4'; ?>value="4">Pret descrescator</option>
                    </select>

                </form>
            </div>
            <?php
                
                while($row = $this->result->fetch()){
            ?>

                <div class="column">
                    <div class="card">
                        <img id="imagine" src="<?php echo URL; ?>public/poze/<?php echo  $row['imagine']; ?>.png" alt="Denim Jeans">
                        <h1><?php echo  $row['nume']; ?></h1>
                        <p class="price"><?php echo  $row['pret']; ?> lei</p>
                        <p><?php echo  $row['descriere']; ?></p>
                        <p><button>Adauga in cos</button></p>
                    </div>
                </div>

            <?php
                }
                ?>

            
        </div>


    </main>
    <footer>
        <?php
        require 'footer.php';
        ?>
    </footer>
</body>

</html>