<!DOCTYPE html>
<html lang="ro">

<head>
  <title>Inregistrare | Impressed</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="css/Inregistrare.css" rel="stylesheet" />
</head>

<body>
  <?php
  require 'header.php';
  ?>
  <main>
    <div>
      <h1>
        Creati contul
      </h1>
      <hr />
      <p>
        Date logare
      </p>
    </div>

    <form method="post">
      <div class="linie">
        <label for="inregistrare-nume">
          <a><img id="register1" src="../Poze/register-tw.png" alt="register" />Nume
          </a>

        </label>
        <div class="input">
          <input type="text" id="inregistrare-nume" name="nume" placeholder="Popescu " value="<?php echo $nume; ?>" />
          <span class="error" style="color:red">* <?php if (isset($numeErr)) {
                                                    echo $numeErr;
                                                  } ?></span>
        </div>
      </div>
      <br />

      <div class="linie">
        <label for="inregistrare-prenume">
          <a><img id="register2" src="../Poze/register-tw.png" alt="register" />Prenume</a>
        </label>
        <div class="input">
          <input type="text" id="inregistrare-prenume" name="prenume" placeholder="Daniel" value="<?php echo $prenume; ?>" />
          <span class="error" style="color:red">* <?php echo $prenumeErr; ?></span>
        </div>
      </div>
      <br />

      <div class="linie">
        <label for="inregistrare-email">
          <a><img id="email" src="../Poze/email-tw.png" alt="email" />Email </a>
        </label>
        <div class="input">
          <input type="text" id="inregistrare-email" name="email" placeholder="popescu@gmail.com" value="<?php echo $email; ?>" />
          <span class="error" style="color:red">* <?php echo $emailErr; ?></span>
        </div>
      </div>
      <br />

      <div class="linie">
        <label for="inregistrare-telefon">
          <a><img id="telefon" src="../Poze/telefon.png" alt="telefon" />Telefon</a>
        </label>
        <div class="input">
          <input type="text" id="inregistrare-telefon" name="telefon" placeholder=" 07** *** *** " value="<?php echo $telefon; ?>" />
          <span class="error" style="color:red">* <?php echo $telefonErr; ?></span>
        </div>
      </div>
      <br />

      <div class="linie">
        <label for="inregistrare-adresa">
          <a><img id="adresa" src="../Poze/adresaCheckout.png" alt="adresa" />Adresa</a>
        </label>
        <div class="input">
          <input type="text" id="inregistrare-email" name="adresa" placeholder="Str. Primaverii nr.8" value="<?php echo $adresa; ?>" />
          <span class="error" style="color:red">* <?php echo $adresaErr; ?></span>
        </div>
      </div>
      <br />

      <div class="linie">
        <label for="inregistrare-parola">
          <a><img id="parola" src="../Poze/parola-tw.png" alt="parola" />Parola
          </a>
        </label>
        <div class="input">
          <input type="text" id="inregistrare-parola" name="parola" placeholder="********" value="<?php echo $parola; ?>" />
          <span class="error" style="color:red">* <?php echo $parolaErr; ?></span>
        </div>
      </div>
      <br />
      <button type="submit" name="submit" value="Submit" class="buton-inregistrare">
        Inregistrare
      </button>
      <span class="text-success">
        <?php
          echo $success_message;
        ?>
      </span>
    </form>
  </main>
  <footer>
    <?php
    require 'footer.php';
    ?>
  </footer>
</body>

</html>