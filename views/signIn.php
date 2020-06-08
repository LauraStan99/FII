<!DOCTYPE html>
<html lang="ro">

<head>
  <title>Inregistrare | Impressed</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="<?php echo URL; ?>public/css/signIn1.css" rel="stylesheet" />
</head>
<style>
  .err { /* stiluri pentru mesajul de eroare */
  display: inline;
  color: red;
  background-color: yellow;
  font-family: sans-serif;
}
  </style>
<body>

  <?php
  require 'header.php';
  ?>

  <script type="text/javascript">
    var request;

    function loadXML(url) {
      // verificam existenta obiectului XMLHttpRequest
      if (window.XMLHttpRequest) {
        // exista suport nativ
        request = new XMLHttpRequest();
      } else
      if (window.ActiveXObject) {
        // se poate folosi obiectul ActiveX din vechiul MSIE
        request = new ActiveXObject("Microsoft.XMLHTTP");
      }

      if (request) {
        // stabilim functia de tratare a starii incarcarii
        request.onreadystatechange = handleResponse();
        // preluam documentul prin metoda GET
        request.open("GET", url, true);
        request.send(null);
      } else {
        // nu exista suport pentru Ajax
        console.log('No Ajax support :(');
      }
    }

    // functia de tratare a schimbarii de stare a cererii
    function handleResponse() {
      // verificam daca incarcarea s-a terminat cu succes
      if (request.readyState == 4) {
        // verificam daca am obtinut codul de stare '200 Ok'
        if (request.status == 200) {
          // procesam datele receptionate prin DOM
          // (preluam elementul radacina al documentului XML)
          var response = request.responseXML.documentElement;
          var res = response.getElementsByTagName('result')[0].firstChild.data;
          // apelam functia de semnalare a (in)existentei numelui
          signalEmailExists('', res);
        }
        // eventual, se pot trata si alte coduri HTTP (404, 500 etc.)
        else { // eroare...
          console.log("A problem occurred (XML data transfer):\n" +
            response.statusText);
        }
      } // final de if
    }

    // functia de semnalare a existentei unui nume de persoana
    function signalEmailExists(name, exist) {
      // avem un raspuns?
      if (exist != '') {
        // preluam via metodele DOM elementul cu id='eroareNume'
        // pentru a afisa mesajul de eroare
        var msg = document.getElementById('errName');
        // schimbam stilul de afisare (in caz de eroare vor fi aplicate
        // proprietatile de stil din clasa 'eroare',
        // altfel textul va fi ascuns)
        msg.className = exist == 1 ? 'err' : 'hidden';
      } else {
        // nu e niciun raspuns stabilit, vom verifica asincron
        // trimitand o cerere catre server
        loadXML('controllers/ajax_register.php?email=' + name);
      }
    }
  </script>

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
          <a class="neccessary">*</a>
        </label>
        <div class="input">
          <input type="text" id="inregistrare-nume" name="nume" placeholder="Popescu " value="<?php if (isset($this->nume)) echo $this->nume; ?>" />
          <span class="error"> <?php if (isset($this->numeErr)) echo $this->numeErr; ?></span>
        </div>
      </div>

      <div class="linie">
        <label for="inregistrare-prenume">
          <a><img id="register2" src="<?php echo URL; ?>public/poze/register-tw.png" alt="register" />Prenume</a>
          <a class="neccessary">*</a>
        </label>
        <div class="input">
          <input type="text" id="inregistrare-prenume" name="prenume" placeholder="Daniel" value="<?php if (isset($this->prenume)) echo $this->prenume; ?>" />
          <span class="error"> <?php if (isset($this->prenumeErr)) echo $this->prenumeErr; ?></span>
        </div>
      </div>

      <div class="linie">
        <label for="inregistrare-email">
          <a><img id="email" src="<?php echo URL; ?>public/poze/email-tw.png" alt="email" />Email </a>
          <a class="neccessary">*</a>
        </label>
        <div class="input">
          <input type="text" id="inregistrare-email" name="email" placeholder="popescu@gmail.com" onblur="javascript:signalEmailExists (this.value, '')" value="<?php if (isset($this->email)) echo $this->email; ?>" onkeyup="javascript:handleResponse()"/>
          <span class="error"> <?php if (isset($this->emailErr))
                                  echo $this->emailErr;
                                ?></span>
          <span class="hidden" id="errName" style ="display: none;">
            Name already exists, choose another one...
          </span>

        </div>
      </div>

      <div class="linie">
        <label for="inregistrare-telefon">
          <a><img id="telefon" src="<?php echo URL; ?>public/poze/telefon.png" alt="telefon" />Telefon</a>
          <a class="neccessary">*</a>
        </label>
        <div class="input">
          <input type="text" id="inregistrare-telefon" name="telefon" placeholder=" 07** *** *** " value="<?php if (isset($this->telefon)) {
                                                                                                            echo $this->telefon;
                                                                                                          } ?>" />
          <span class="error"> <?php if (isset($this->telefonErr))
                                  echo $this->telefonErr;
                                ?></span>
        </div>
      </div>

      <div class="linie">
        <label for="inregistrare-adresa">
          <a><img id="adresa" src="<?php echo URL; ?>public/poze/adresaCheckout.png" alt="adresa" />Adresa</a>
          <a class="neccessary">*</a>
        </label>
        <div class="input">
          <input type="text" id="inregistrare-email" name="adresa" placeholder="Str. Primaverii nr.8" value="<?php if (isset($this->adresa)) echo $this->adresa; ?>" />
          <span class="error"> <?php if (isset($this->adresaErr))
                                  echo $this->adresaErr;
                                ?></span>
        </div>
      </div>
      <div class="linie">
        <label for="inregistrare-parola">
          <a><img id="parola" src="<?php echo URL; ?>public/poze/parola-tw.png" alt="parola" />Parola
          </a>
          <a class="neccessary">*</a>
        </label>
        <div class="input">
          <input type="password" id="inregistrare-parola" name="parola" placeholder="********" value="<?php if (isset($this->parola)) echo $this->parola; ?>" />
          <span class="error"> <?php if (isset($this->parolaErr))
                                  echo $this->parolaErr;
                                ?></span>
        </div>
      </div>
      <button type="submit" name="submit" value="Submit"  class="buton-inregistrare">
        Inregistrare
      </button>
      <span class="text-success" class="neccessary">
        <?php
        if (isset($this->success_message))
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