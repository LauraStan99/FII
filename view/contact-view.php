<?php
require '../controller/validare-controller.php';
$numeErr=$prenumeErr=$emailErr=$telefonErr=$mesajErr="";
$nume=$prenume=$email=$telefon=$mesaj="";
$date=new Validate();

if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $date->validateLastName($nume, $numeErr);
    $date->validateFirstName($prenume, $prenumeErr);
    $date->validateEmail($email, $emailErr);
    $date->validatePhone($telefon, $telefonErr);
    $date->validateMessage($mesaj,$mesajErr);
  }

?>
<!DOCTYPE html>
<html lang="ro">

<head>
  <title>Contact | Impressed</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="../css/Contact.css" rel="stylesheet" />
</head>

<body>
  <header>
    <?php
    require 'header.php';
    ?>
  </header>

  <main>
    <div class="info-contact">
      <h1>
        <strong>Contactati-ne</strong>
      </h1>
      <hr />
      <p>
        Va invitam sa utilizati formularul de mai jos pentru a putea lua
        legatura cu noi. In acest fel, veti putea primi un raspuns din partea
        noastra foarte rapid.
        <strong>
          Daca aveti intrebari in legatura cu o comanda pe care ati facut-o,
          va rugam sa specificati si numarul comenzii pe care il puteti gasi
          in e-mail-ul de confirmare al comenzii respective.
        </strong>
      </p>
      <p>
        Va asteptam sa ne contactati de luni pana vineri, intre orele
        9:00-17:00.
      </p>
    </div>

    <div class="formular-contact">
      <h2>
        <strong>Formular de contact</strong>
      </h2>
      <hr />
      <form method="post">
        <div class="linie">
          <label for="contact-nume">
            <a><img id="contact-nume" src="../Poze/register-tw.png" alt="contact-nume" />Nume </a>
            <a style="color: red;">*</a>
          </label>
          <div class="input">
            <input type="text" id="contact-nume" name="nume" placeholder="Popescu" value="<?php echo $nume; ?>" />
            <span class="error" style="color:red">* <?php echo $numeErr; ?></span>
          </div>
        </div>
        <div class="linie">
          <label for="contact-prenume">
            <a><img id="contact-prenume" src="../Poze/register-tw.png" alt="contact-nume" />Prenume</a>
            <a style="color: red;">*</a>
          </label>
          <div class="input">
            <input type="text" id="contact-prenume" name="prenume" placeholder=" Daniel" value="<?php echo $prenume; ?>" />
            <span class="error" style="color:red">* <?php echo $prenumeErr; ?></span>
          </div>
        </div>
        <div class="linie">
          <label for="contact-email">
            <a><img id="contact-email" src="../Poze/email-tw.png" alt="contact-email" />Email
            </a>
            <a style="color: red;">*</a>
          </label>
          <div class="input">
            <input type="text" id="contact-email" name="email" placeholder="popescu@gmai.com" value="<?php echo $email; ?>" />
            <span class="error" style="color:red">* <?php echo $emailErr; ?></span>
          </div>
        </div>
        <div class="linie">
          <label for="contact-telefon">
            <a><img id="contact-telefon" src="../Poze/telefon.png" alt="contact-telefon" />Telefon
            </a>
            <a style="color: red;">*</a>
          </label>
          <div class="input">
            <input type="text" id="contact-telefon" name="telefon" placeholder="0755-666-777" />
            <span class="error" style="color:red">* <?php echo $telefonErr; ?></span>
          </div>
        </div>
        <div class="linie">
          <label for="contact-subiect">
            <a><img id="contact-subiect1" src="../Poze/subiect.png" alt="contact-subiect" />Subiect
            </a>
          </label>
          <select id="contact-subiect" name="subiect">
            <option value="Intrebari despre un articol">Intrebari despre un articol</option>
            <option value="Intrebari despre comanda dvs.">Intrebari despre comanda dvs.</option>
            <option value="Intrebari despre factura dvs.">Intrebari despre factura dvs.</option>
            <option value="Altele">Altele</option>
          </select>
        </div>

        <div class="linie">
          <label for="contact-mesaj">
            <a><img id="contact-mesaj" src="../Poze/mesaj.png" alt="contact-mesaj" />Mesajul dvs.
            </a>
            <a style="color: red;">*</a>
          </label>
          <div class="input">
            <input type="mesaj" id="contact-mesaj" name="mesaj" value="<?php echo $mesaj; ?>" />
            <span class="error" style="color:red">* <?php echo $mesajErr; ?></span>
          </div>
        </div>
        <button class="buton-formular" type="submit" onclick="window.location.href='#'">
          Trimiteti
        </button>
      </form>
  </main>

  <footer>
    <?php
    require 'footer.php';
    ?>
  </footer>
</body>

</html>