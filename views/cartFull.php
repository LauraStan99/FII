<!DOCTYPE html>
<html lang="ro">

<head>
  <title>Cos | Impressed</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php echo URL; ?>public/css/cart.css" rel="stylesheet">
</head>

<body>
  <header>
    <?php
    require 'header.php';
    ?>
  </header>
  <main>
    <div class="titlu">
      <h1>( Cosul dvs. de cumparaturi )</h1>
      <hr>
    </div>
    <button class="continua-cumparaturi">
      ◄ Continua cumparaturi
    </button>
    <div class="body">
      <div class="tabel">

        <table>
          <tr>

            <th class="articol">Articol</th>
            <th class="denumire">Denumire</th>
            <th class="marime">Marime</th>
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
                <a href="<?php echo URL . 'produse/produs/' . $row['id_produs'] ?>">
                  <img id="produs" src="<?php echo URL; ?>public/poze/<?php echo  $row['imagine']; ?>.png">
                </a>
              </td>
              <td><?php echo $row['nume']; ?></td>
              <td><?php echo $row['marime']; ?></td>

              <td class="cantitate">
                <form method="POST">
                  <button formaction="<?php echo URL; ?>cart?id=<?php echo $row['id_produs'] ?>&marime=<?php echo $row['marime'] ?>" name="buttonMinus" class="butonMinus">-</button>
                  <input type="text" value=<?php echo $row['cantitate']; ?> name="quantity">
                  <button formaction="<?php echo URL; ?>cart?id=<?php echo $row['id_produs'] ?>&marime=<?php echo $row['marime'] ?>" name="buttonPlus" class="butonPlus">+</button>
                </form>
              </td>

              <td><?php echo $row['pretTotal']; ?> lei</td>

              <td>
                <form method="POST">
                  <button formaction="<?php echo URL; ?>cart?id=<?php echo $row['id_produs'] ?>&marime=<?php echo $row['marime'] ?>" type="submit" name="x-sterge" class="x-sterge">X</button>
                  <form>
              </td>

            </tr>

          <?php } ?>

        </table>

      </div>

      <div class="totalFinal">
        <p>Subtotal: <?php echo $this->totalPrice; ?> lei </p>
        <p>Cost transport: <?php echo $this->livrare; ?> lei </p>

        <p> Totalul comenzii: <?php echo $this->totalPrice + $this->livrare; ?> lei </p>
        <form>
          <button id="finalizare-comanda" type="submit" formaction='<?php echo URL; ?>cart/addCommand'>
            Catre finalizare ►
          </button>
        </form>
        <br />
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