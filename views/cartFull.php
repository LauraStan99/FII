<!DOCTYPE html>
<html lang="ro">

<head>
  <title>Cos | Impressed</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php echo URL; ?>public/css/cartFull.css" rel="stylesheet">
</head>

<body>
<header>
  <?php
  require 'header.php';
  ?>
</header>
<main>
 
  <table class="tabel-cos">
    <thead>
      <tr>
        <th style="width: 25%">Produs</th>
        <th style="width: 25%">Descriere</th>
        <th style="width: 15%">Pret</th>
        <th style="width: 10%">Cantitate</th>
        <th style="width: 20%">Subtotal</th>
        <th style="width: 5%"></th>

      </tr>
    </thead>

    <tbody>

      <tr>
        <td data-th="Produs">
          <div class="linie1">
            <div class="produs1"><img src="<?php echo URL; ?>public/poze/produs1.png" alt="produs1"></div>
          </div>
        <td data-th="Descriere">
          <div class="descriere-produs1">
            <h1 class="titlu-produs1">Rochie zi</h1>
            <p> Descrierea propriu-zisa</p>
          </div>
        </td>
        </td>
        <td data-th="Pret">100$</td>
        <td data-th="Cantitate">
          <input type="number" class="cantitate1" value="1">
        </td>
        <td data-th="Subtotal" class="subtotal">100$</td>
        <td data-th="">
          <button class="buton-stergere">
            <a>
              <img src="<?php echo URL; ?>public/poze/buton-stergere.png" alt="sterge">
            </a>
          </button>
        </td>
      </tr>

    </tbody>
    <tfoot>

      <tr>
        <td class="total"><strong>Total 100$</strong></td>
      </tr>
    </tfoot>

  </table>

  <div class="butoane">
    <div class="butoaneSt">
      <button id="Continua-cump" type="button" onclick="window.location.href='./home.php'">
        Continua cumparaturi
      </button>
    </div>
    <div class="butoaneDr">
      <button id="Comanda" type="submit" onclick="window.location.href='./checkout.php'">
        Checkout
      </button>
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