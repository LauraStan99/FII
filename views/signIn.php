<!DOCTYPE html>
<html lang="ro">

<head>
  <title>Inregistrare | Impressed</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="<?php echo URL; ?>public/css/signIn.css" rel="stylesheet" />
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
          <a><img id="register1" src="<?php echo URL; ?>public/poze/register-tw.png" alt="register" />Nume
          </a>
          <a style="color: red;">*</a>
        </label>
        <div class="input">
          <input type="text" id="inregistrare-nume" name="nume" placeholder="Popescu " value="<?php if(isset($this->nume)) echo $this->nume; ?>" />
          <span class="error" style="color:red; margin-left:20px;"> <?php if(isset($this->numeErr)) echo $this->numeErr; ?></span>
        </div>
      </div>

      <div class="linie">
        <label for="inregistrare-prenume">
          <a><img id="register2" src="<?php echo URL; ?>public/poze/register-tw.png" alt="register" />Prenume</a>
          <a style="color: red;">*</a>
        </label>
        <div class="input">
          <input type="text" id="inregistrare-prenume" name="prenume" placeholder="Daniel" value="<?php if(isset($this->prenume)) echo $this->prenume; ?>" />
          <span class="error" style="color:red; margin-left:20px;"> <?php if(isset($this->prenumeErr)) echo $this->prenumeErr; ?></span>

        </div>
      </div>

      <div class="linie">
        <label for="inregistrare-email">
          <a><img id="email" src="<?php echo URL; ?>public/poze/email-tw.png" alt="email" />Email </a>
          <a style="color: red;">*</a>
        </label>
        <div class="input">
          <input type="text" id="inregistrare-email" name="email" placeholder="popescu@gmail.com" value="<?php if(isset($this->email)) echo $this->email; ?>" />
          <span class="error" style="color:red; margin-left:20px;"> <?php if(isset($this->emailErr))
                                                    echo $this->emailErr;
                                                    ?></span>
        </div>
      </div>

      <div class="linie">
        <label for="inregistrare-telefon">
          <a><img id="telefon" src="<?php echo URL; ?>public/poze/telefon.png" alt="telefon" />Telefon</a>
          <a style="color: red;">*</a>
        </label>
        <div class="input">
          <input type="text" id="inregistrare-telefon" name="telefon" placeholder=" 07** *** *** " value="<?php if(isset($this->telefon)){ echo $this->telefon;} ?>" />
          <span class="error" style="color:red; margin-left:20px;"> <?php if(isset($this->telefonErr))
                                                    echo $this->telefonErr;
                                                    ?></span>
        </div>
      </div>

      <div class="linie">
        <label for="inregistrare-adresa">
          <a><img id="adresa" src="<?php echo URL; ?>public/poze/adresaCheckout.png" alt="adresa" />Adresa</a>
          <a style="color: red;">*</a>
        </label>
        <div class="input">
          <input type="text" id="inregistrare-email" name="adresa" placeholder="Str. Primaverii nr.8" value="<?php  if(isset($this->adresa)) echo $this->adresa; ?>" />
          <span class="error" style="color:red; margin-left:20px;"> <?php if(isset($this->adresaErr))
                                                    echo $this->adresaErr;
                                                    ?></span>
        </div>
      </div>
      <div class="linie">
        <label for="inregistrare-parola">
          <a><img id="parola" src="<?php echo URL; ?>public/poze/parola-tw.png" alt="parola" />Parola
          </a>
          <a style="color: red;">*</a>
        </label>
        <div class="input">
          <input type="text" id="inregistrare-parola" name="parola" placeholder="********" value="<?php if(isset($this->parola)) echo $this->parola; ?>" />
          <span class="error" style="color:red; margin-left:20px;"> <?php if(isset($this->parolaErr))
                                                    echo $this->parolaErr;
                                                    ?></span>
        </div>
      </div>
      <button type="submit" name="submit" value="Submit" class="buton-inregistrare">
        Inregistrare
      </button>
      <span class="text-success" style="margin-left:20px;">
        <?php
          if(isset($this->success_message))
          echo $this->success_message;
        ?>
      </span>
    </form>
  </main>

  <?php
  require 'footer.php';
  ?>
</body>

</html>