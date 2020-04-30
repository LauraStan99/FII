<!DOCTYPE html>
<html lang="ro">

<head>
  <title>Favorite | Impressed</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="<?php echo URL; ?>public/css/wishlistSign.css" rel="stylesheet" />
</head>

<body>

  <?php
  require 'header.php';
  ?>


  <main>
    <div class="favorite">
      <a>
        <img id="inima-favorite" src="<?php echo URL; ?>public/poze/inima-favorite.png" alt="favorite" />Lista de dorinte
      </a>
    </div>

    <p>Pentru a selecta produse trebuie sa fiti autentificat.</p>
    <p>Pentru autentificare sau inregistrare vizitati pagina de Logare.</p>
    <p>Zi frumoasa !</p>

    <button id="catre-logare" type="button" onclick="window.location.href='<?php echo URL; ?>signIn'">
      &lt Catre pagina de logare
    </button>
  </main>


  <?php
  require 'footer.php';
  ?>

</body>

</html>