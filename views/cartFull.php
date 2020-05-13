<!DOCTYPE html>
<html lang="ro">

<head>
  <title>Cos | Impressed</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php echo URL; ?>public/css/cartFullNew.css" rel="stylesheet">
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

          <th class="articol">Articol</th>
          <th class="descriere">Descriere</th>
          <th class="cantitate">Cantitate</th>
          <th class="pret">Pret</th>
          <th class="sterge-produs"></th>
        </tr>
        <br>
        <?php
        while ($row = $this->result->fetch()) {
        ?>
          <tr>
            <td>
              <img id="produs" src="<?php echo URL; ?>public/poze/<?php echo  $row['imagine']; ?>.png">
            </td>
            <td><?php echo $row['descriere']; ?></td>

            <td class="cantitate">
              <form>
                <button class="butonMinus">-</button>
                <input type="text" value="1" name="quantity">
                <button class="butonPlus">+</button>
              </form>
            </td>

            <td><?php echo $row['pret']; ?></td>

            <td>
              <button class="x-sterge">X</button>
            </td>

          </tr>

        <?php } ?>

      </table>

    </div>
    <div class="totalFinal">
      <p>Total</p>
    </div>


  </main>

  <footer>
    <?php
    require 'footer.php';
    ?>
  </footer>

</body>

</html>