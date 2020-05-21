<!DOCTYPE html>
<html lang="ro">

<head>
  <title>Finalizare comanda | Impressed</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="<?php echo URL; ?>/public/css/confirmationOrder.css" rel="stylesheet" />
</head>

<body>

  <?php

  require 'header.php';

  ?>

  <main>

   <h1>Comanda realizata cu succes!</h1>
   <hr>

   <div class="mesaj">
       
       <img src="<?php echo URL; ?>/public/poze/orderBox.png">
       
       <p>Va multumim pentru alegerea facuta!Veti primi in cel mai scurt timp un email de confirmare cu detaliile privitoare la comanda dumneavostra! O zi frumoasa!</p>
   </div>

  </main>

  <?php
  require 'footer.php';
  ?>

</body>

</html>