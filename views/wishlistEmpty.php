<!DOCTYPE html>
<html lang="ro">

<head>
  <title>Favorite | Impressed</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="../public/css/FavoriteGol.css" rel="stylesheet" />
</head>

<body>

  <?php
  require 'header.php';
  ?>

  <main>
    <div class="favorite">
      <a>
        <img id="inima-favorite" src="../public/poze/inima-favorite.png" alt="favorite" />Lista de dorinte
      </a>
    </div>

    <p>Nu aveti niciun produs selectat ca si favorit !</p>
    <p>Pentru selectie intoarceti-va pe pagina de cumparaturi!</p>
    <p>Zi frumoasa !</p>

    <button id="inapoi-la-cump" type="button" onclick="window.location.href='./home.php'">
      &lt Inapoi la cumparaturi
    </button>
  </main>

  <?php
  require 'footer.php';
  ?>


</html>