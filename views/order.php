<!DOCTYPE html>
<html lang="ro">

<head>
  <title>Comanda | Impressed</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="<?php echo URL; ?>public/css/order.css" rel="stylesheet" />
</head>

<body>
    <?php
    require 'header.php';
    ?>

  <main>
    <h1 id="mesaj-multumire">
      VA MULTUMIM PENTRU COMANDA PLASATA !
      <hr />
    </h1>

    <h2 id="mesaj-status">
      Mai multe detalii despre statusul comenzii se vor regasi pe email.
    </h2>

    <button id="inapoi-pagPrincipala" type="button" onclick="window.location.href='<?php echo URL; ?>home'">
      &lt Inapoi la pagina principala
    </button>
  </main>

    <?php
    require 'footer.php';
    ?>

</body>

</html>