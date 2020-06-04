<!DOCTYPE html>
<html lang="ro">

<head>
  <title>Cont | Impressed</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="<?php echo URL; ?>public/css/account.css" rel="stylesheet" />
</head>

<body>
  <header>
    <?php
    require 'header.php';
    ?>
  </header>
  <main>
    <div class="titlu">
      <img id="cont" src="<?php echo URL; ?>public/poze/cont.png" />
      <a class="text-titlu">Contul meu </a>
    </div>


    <h1>
      Bine ai venit, <?php if (isset($this->nume)) echo $this->nume . ' ';
                      else  echo  Session::get('nume') . ' ';
                      if (isset($this->prenume)) echo $this->prenume;
                      else  echo  Session::get('prenume');
                      ?>

    </h1>


    <div class="comenzi">
      <h3>Comenzi disponibile</h3>
      <a href="<?php echo URL; ?>account/datePersonale">• Schimba date personale</a>
      <a href="<?php echo URL; ?>account/istoricComenzi">• Istoric comenzi</a>


      <?php if (Session::get('loggedIn') == true) : ?>
        <button type="button" class="logout" onclick="window.location.href='<?php echo URL; ?>account/logout' ">Deconecteaza-te</button>
      <?php endif; ?>
      
    </div>



  </main>
  <footer>
    <?php
    require 'footer.php';
    ?>
  </footer>
</body>

</html>