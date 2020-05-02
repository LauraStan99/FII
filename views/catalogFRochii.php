<!DOCTYPE html>
<html lang="ro">

<head>
    <title>Cont | Impressed</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="<?php echo URL; ?>public/css/catalogFRochii.css" rel="stylesheet" />
</head>

<body>
    <header>
        <?php
        require 'header.php';
        ?>
    </header>
    <main>


        <?php

        while ($row = mysqli_fetch_array($this->result)) {
        ?>
            <div class="row">
                <div class="column">
                    <div class="card">
                        <img src="<?php echo URL; ?>public/poze/<?php echo  $row['imagine']; ?>.png" alt="Denim Jeans" style="width:70% ; height:70%;">
                        <h1><?php echo  $row['nume']; ?></h1>
                        <p class="price"><?php echo  $row['pret']; ?> lei</p>
                        <p><?php echo  $row['descriere']; ?></p>
                        <p><button>Adauga in cos</button></p>
                    </div>
                </div>
            <?php  } ?>


    </main>
    <footer>
        <?php
        require 'footer.php';
        ?>
    </footer>
</body>

</html>