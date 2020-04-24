<!DOCTYPE html>
<html lang="ro">

<head>
  <title>Logare | Impressed</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="<?php echo URL; ?>public/css/login.css" rel="stylesheet" />
</head>

<body>

  <?php
  require 'header.php';
  ?>

  <main>
    <div class="main-stanga">
      <h1>
        Am deja un cont !
      </h1>

      <label for="logare-email">
        <a><img id="email" src="<?php echo URL; ?>public/poze/email-tw.png" alt="email" />
          Email
        </a>
      </label>
      <input type="text" id="logare-email" name="email" placeholder="popescu@gmail.com" />

      <label for="logare-parola">
        <a><img id="parola" src="<?php echo URL; ?>public/poze/parola-tw.png" alt="log-parola" />Parola
        </a>
      </label>
      <input type="text" id="logare-parola" name="parola" placeholder="********" />

      <button class="buton-stanga" type="button" onclick="window.location.href='<?php echo URL; ?>home'">
        Logare
      </button>
      <br />
    </div>
    <hr />
    <div class="main-dreapta">
      <h2>
        Vreau sa-mi creez un cont!
      </h2>

      <button class="buton-dreapta" type="button" onclick="window.location.href='<?php echo URL; ?>register'">
        Creati un cont acum &gt
      </button>

      <h3>
        Beneficiile pentru contul clientului
      </h3>
      <div class="beneficii">
        <p>
          Puteti beneficia de plasarea de comenzi ,siguranta datelor, noile
          oferte si toate serviciile de care dispunem!
        </p>
      </div>
    </div>
  </main>

  <?php
  require 'footer.php';
  ?>

</body>

</html>