<!DOCTYPE html>
<html lang="ro">

<head>
  <title>Comanda | Impressed</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="../public/css/ComandaPlasata.css" rel="stylesheet" />
</head>

<body>
  <header>
    <?php
    require 'header.php';
    ?>
  </header>

  <main>
    <h1 id="mesaj-multumire">
      VA MULTUMIM PENTRU COMANDA PLASATA !
      <hr />
    </h1>

    <h2 id="mesaj-status">
      Mai multe detalii despre statusul comenzii se vor regasi pe email.
    </h2>

    <button id="inapoi-pagPrincipala" type="button" onclick="window.location.href='./home.php'">
      &lt Inapoi la pagina principala
    </button>
  </main>

  <!-- footerul -->
  <footer>
    <?php
    require 'footer.php';
    ?>
  </footer>
</body>

</html>