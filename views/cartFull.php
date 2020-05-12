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

    <div class="tabel">
      <table>
        <tr>
          <th>Articol</th>
          <th>Descriere</th>
          <th>Cantitate</th>
          <th>Pret</th>
          <th>Total</th>
        </tr>
        <tr>
          <td>
            <img id="imagine" src="<?php echo URL; ?>public/poze/f-bluze1.png" />
          </td>
          <td>Descrierea propriu zisa</td>
          <td>Cantitate</td>
          <td>Pret</td>
          <td>Total</td>
        </tr>
      </table>
    </div>
    <div class="total">

    </div>


  </main>

  <footer>
    <?php
    require 'footer.php';
    ?>
  </footer>

</body>

</html>