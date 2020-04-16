<!DOCTYPE html>
<html lang="ro">

<head>
  <title>Favorite | Impressed</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="../css/FavoriteGol.css" rel="stylesheet" />
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

    <p>Nu aveti niciun produs selectat ca si favorit !</p>
    <p>Pentru selectie intoarceti-va pe pagina de cumparaturi!</p>
    <p>Zi frumoasa !</p>

    <button id="inapoi-la-cump" type="button" onclick="window.location.href='./paginaPrincipala-view.php'">
      &lt Inapoi la cumparaturi
    </button>
  </main>
  <footer>
    <?php
    require 'footer.php';
    ?>
  </footer>

</html>