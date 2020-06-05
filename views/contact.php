<!DOCTYPE html>
<html lang="ro">

<head>
  <title>Contact | Impressed</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="<?php echo URL; ?>public/css/contact1.css" rel="stylesheet" />
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
          <a class="neccessary">*</a>
        </label>
        <div class="input">
          <input type="text" id="contact-nume" name="nume" placeholder="Popescu" value="<?php if (isset($this->lastName)) echo $this->lastName; else echo SESSIOn::get('nume'); ?>" />
          <span class="error"> <?php if (isset($this->lastNameErr)) echo $this->lastNameErr; ?></span>
        </div>
      </div>

      <div class="linie">
        <label for="contact-prenume">
          <a><img id="contact-prenume" src="<?php echo URL; ?>public/poze/register-tw.png" alt="contact-nume" />Prenume</a>
          <a class="neccessary">*</a>
        </label>
        <div class="input">
          <input type="text" id="contact-prenume" name="prenume" placeholder=" Daniel" value="<?php if (isset($this->firstName)) echo $this->firstName; else echo SESSIOn::get('prenume'); ?>" />
          <span class="error" > <?php if (isset($this->firstNameErr)) echo $this->firstNameErr; ?></span>
        </div>
      </div>

      <div class="linie">
        <label for="contact-email">
          <a><img id="contact-email" src="<?php echo URL; ?>public/poze/email-tw.png" alt="contact-email" />Email
          </a>
          <a class="neccessary">*</a>
        </label>
        <div class="input">
          <input type="text" id="contact-email" name="email" placeholder="popescu@gmai.com" value="<?php if (isset($this->email)) echo $this->email; else echo SESSIOn::get('email'); ?>" />
          <span class="error" > <?php if (isset($this->emailErr)) echo $this->emailErr; ?></span>
        </div>
      </div>

      <div class="linie">
        <label for="contact-telefon">
          <a><img id="contact-telefon" src="<?php echo URL; ?>public/poze/telefon.png" alt="contact-telefon" />Telefon
          </a>
          <a class="neccessary">*</a>
        </label>
        <div class="input">
          <input type="text" id="contact-telefon" name="telefon" placeholder="0755-666-777" value="<?php if (isset($this->phone)) echo $this->phone; else echo SESSIOn::get('telefon'); ?>" />
          <span class="error"  > <?php if (isset($this->phoneErr)) echo $this->phoneErr; ?></span>
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
          <a class="neccessary">*</a>
        </label>
        <div class="input">
          <input type="mesaj" id="contact-mesaj" name="mesaj" value="<?php if (isset($this->message)) echo $this->message; ?>" />
          <span class="error"  > <?php if (isset($this->messageErr)) echo $this->messageErr; ?></span>
        </div>
      </div>

      <button class="buton-formular" type="submit" name="submit">
        Trimiteti
      </button>
     <a class="succes"> <?php if(isset($this->successMessage)) echo $this->successMessage; ?> </a>
    </form>
  </main>

  <?php
  require 'footer.php';
  ?>

</body>

</html>