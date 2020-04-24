
<!DOCTYPE html>
<html lang="ro">

<head>
  <title>Contact | Impressed</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="<?php echo URL; ?>public/css/contact.css" rel="stylesheet" />
</head>

<body>

  <?php
  require 'header.php';
  ?>

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
      </div>
      <form method="post">

        <div class="linie">
          <label for="contact-nume">
            <a><img id="contact-nume" src="<?php echo URL; ?>public/poze/register-tw.png" alt="contact-nume" />Nume </a>
            <a style="color: red;">*</a>
          </label>
          <div class="input">
            <input type="text" id="contact-nume" name="nume" placeholder="Popescu" value="<?php if(isset($this->nume)) echo $this->nume; ?>" />
            <span class="error" style="color:red; margin-left:20px;"> <?php if(isset($this->numeErr)) echo $this->numeErr; ?></span>
          </div>
        </div>

        <div class="linie">
          <label for="contact-prenume">
            <a><img id="contact-prenume" src="<?php echo URL; ?>public/poze/register-tw.png" alt="contact-nume" />Prenume</a>
            <a style="color: red;">*</a>
          </label>
          <div class="input">
            <input type="text" id="contact-prenume" name="prenume" placeholder=" Daniel" value="<?php if(isset($this->prenume)) echo $this->prenume; ?>" />
            <span class="error" style="color:red; margin-left:20px;"> <?php if(isset($this->prenumeErr)) echo $this->prenumeErr; ?></span>
          </div>
        </div>

        <div class="linie">
          <label for="contact-email">
            <a><img id="contact-email" src="<?php echo URL; ?>public/poze/email-tw.png" alt="contact-email" />Email
            </a>
            <a style="color: red;">*</a>
          </label>
          <div class="input">
            <input type="text" id="contact-email" name="email" placeholder="popescu@gmai.com" value="<?php if(isset($this->email)) echo $this->email; ?>" />
            <span class="error" style="color:red; margin-left:20px;"> <?php if(isset($this->emailErr)) echo $this->emailErr; ?></span>
          </div>
        </div>

        <div class="linie">
          <label for="contact-telefon">
            <a><img id="contact-telefon" src="<?php echo URL; ?>public/poze/telefon.png" alt="contact-telefon" />Telefon
            </a>
            <a style="color: red;">*</a>
          </label>
          <div class="input">
            <input type="text" id="contact-telefon" name="telefon" placeholder="0755-666-777" value="<?php if(isset($this->telefon)) echo $this->telefon; ?>"/>
            <span class="error" style="color:red; margin-left:20px;"> <?php if(isset($this->telefonErr)) echo $this->telefonErr; ?></span>
          </div>
        </div>

        <div class="linie">
          <label for="contact-subiect">
            <a><img id="contact-subiect1" src="<?php echo URL; ?>public/poze/subiect.png" alt="contact-subiect" />Subiect
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
            <a><img id="contact-mesaj" src="<?php echo URL; ?>public/poze/mesaj.png" alt="contact-mesaj" />Mesajul dvs.
            </a>
            <a style="color: red;">*</a>
          </label>
          <div class="input">
            <input type="mesaj" id="contact-mesaj" name="mesaj" value="<?php if(isset($this->mesaj)) echo $this->mesaj; ?>" />
            <span class="error" style="color:red; margin-left:20px;"> <?php if(isset($this->mesajErr)) echo $this->mesajErr; ?></span>
          </div>
        </div>
        
        <button class="buton-formular" type="submit" onclick="window.location.href='#'">
          Trimiteti
        </button>
      </form>
  </main>

  <?php
  require 'footer.php';
  ?>

</body>

</html>