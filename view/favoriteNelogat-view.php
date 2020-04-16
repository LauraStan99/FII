<!DOCTYPE html>
<html lang="ro">

<head>
  <title>Favorite | Impressed</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="../css/FavoriteNelogat.css" rel="stylesheet" />
</head>

<body>
  <header>
    <?php
    require 'header.php';
    ?>
  </header>

  <main>
    <div class="favorite">
      <a>
        <img id="inima-favorite" src="../Poze/inima-favorite.png" alt="favorite" />Lista de dorinte
      </a>
    </div>

    <p>Pentru a selecta produse trebuie sa fiti autentificat.</p>
    <p>Pentru autentificare sau inregistrare vizitati pagina de Logare.</p>
    <p>Zi frumoasa !</p>

    <button id="catre-logare" type="button" onclick="window.location.href='./inregistrare-view.php'">
      &lt Catre pagina de logare
    </button>
  </main>

  <footer>
    <?php
    require 'footer.php';
    ?>
  </footer>
</body>

</html>