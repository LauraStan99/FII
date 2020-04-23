
<!DOCTYPE html>
<html lang="ro">

<head>
  <title>Payment | Impressed</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="<?php echo URL; ?>public/css/payment.css" rel="stylesheet" />
</head>

<body>

  <?php
  require 'header.php';
  ?>
  <main>
      <h2>Detalii mod plata</h2>
      <div class="metoda-plata">
        <p>
          Medota de plata: Ramburs<input type="checkbox" id="ramburs" />
          Online cu card bancar<input type="checkbox" id="card" />
          <a style="color: red;">*</a>
        </p>
      </div>

      <label for="numeCard">Nume card <a style="color: red;">*</a> </label>
      <input type="text" id="numeCard" name="nume-card" placeholder="Popescu Daniel" />

      <label for="numarCard">Numarul cardului de credit <a style="color: red;">*</a></label>
      <input type="text" id="numarCard" name="numar-card" placeholder="1111-2222-3333-4444" />

      <label for="lunaExpCard">Luna expirarii <a style="color: red;">*</a></label>
      <input type="text" id="lunaExpCard" name="luna-card" placeholder="October" />

      <label for="anExpCard">Anul expirarii <a style="color: red;">*</a></label>
      <input type="text" id="anExpCard" name="an-card" placeholder="2025" />

      <label for="CVVCard">CVV <a style="color: red;">*</a></label>
      <input type="text" id="CVVCard" name="CVV-card" placeholder="729" />

      <input id="plaseaza-comanda" type="submit" onclick="window.location.href='<?php echo URL; ?>order'">

      </input>

  </main>


  <?php
  require 'footer.php';
  ?>

</body>

</html>