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

$numeErr=$prenumeErr=$adresaErr=$emailErr=$telefonErr=$adresaErr=$parolaErr="";
$nume=$prenume=$adresa=$email=$telefon=$adresa=$parola="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
  if (empty($_POST["nume"])) {
    $numeErr = "Numele este obligatoriu";
  } else {
    $nume = test_input($_POST["nume"]);

    if (!preg_match("/^[a-zA-Z ]*$/",$nume)) {
      $numeErr="Obligatoriu doar litere si spatii";
    }
  }
 
    if (empty($_POST["prenume"])) {
      $prenumeErr = "Prenumele este obligatoriu";
    } else {
      $prenume = test_input($_POST["prenume"]);
  
      if (!preg_match("/^[a-zA-Z ]*$/",$prenume)) {
        $prenumeErr="Obligatoriu doar litere si spatii";
      }
    }

  if (empty($_POST["email"])) {
    $emailErr = "Email-ul este obligatoriu";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Format gresit";
    }
  }
 

  if (empty($_POST["adresa"])) {
    $adresaErr = "Adresa este obligatorie";
  } else {
    $adresa = test_input($_POST["adresa"]);
  }

  
if (empty($_POST["telefon"])) {
      $telefonErr = "Numarul de telefon este obligatoriu";
    } else {
      $telefon = test_input($_POST["telefon"]);
  
      if (!preg_match("/^[0-9]*$/",$telefon)) {
        $telefonErr="Obligatoriu doar numere";
      }
    }
    
    if (empty($_POST["parola"])) {
      $parolaErr = "Parola este obligatorie";
    } else {
      $parola = test_input($_POST["parola"]);
  
      if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#",$parola)) {
        $parolaErr="Obligatoriu minim cate una din: numere, litere si caractere speciale";
      }
    }
  
  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
    <header>
      <div class="header-navigation">
        <div class="header-right">
          <div class="favorite">
            <a class="link-favorite" href="" title="Lista de dorinte">
              <img
                class="logo-favorite"
                src="Poze/logo-favorite-tw.png"
                alt="Favorite"
              />
            </a>
          </div>

          <div class="cos">
            <a class="link cos" href="" title="Cos cumparaturi">
              <img
                class="logo-cos"
                src="Poze/shopping-cart-tw.png"
                alt="Cos cumparaturi"
              />
            </a>
          </div>

          <div class="cont">
            <a class="link cont" href="./DateCont.html" title="Cont">
              <img class="logo-cont" src="Poze/cont-tw.png" alt="Cont" />
            </a>
          </div>
        </div>

        <div class="header-left">
          <div class="link-nume">
            <a href="#" title="logo"
              ><img class="logo" src="Poze/logo.png" alt="logo"
            /></a>
            <a href="#" title="logo-nume"
              ><img class="logo-nume" src="Poze/logo-nume.png" alt="logo-nume"
            /></a>
          </div>
        </div>
      </div>
    </header>

    <div class="navbar">
      <div class="femei">
        <button class="femei-buton" onclick="myFunction1()">FEMEI</button>
        <div class="femei-continut" id="DropF">
          <a href="#">Blugi</a>
          <a href="#">Bluze</a>
          <a href="#">Camasi</a>
          <a href="#">Fuste</a>
          <a href="#">Jachete</a>
          <a href="#">Pantaloni</a>
          <a href="#">Rochii</a>
        </div>
        <script>
          function myFunction1() {
            document.getElementById('DropF').classList.toggle('show');
          }

          window.onclick = function (e) {
            if (!e.target.matches('.femei-buton')) {
              var myDropdown = document.getElementById('DropF');
              if (myDropdown.classList.contains('show')) {
                myDropdown.classList.remove('show');
              }
            }
          };
        </script>
      </div>

      <div class="barbati">
        <button class="barbati-buton" onclick="myFunction2()">BARBATI</button>
        <div class="barbati-continut" id="DropB">
          <a href="#">Blugi</a>
          <a href="#">Bluze</a>
          <a href="#">Camasi</a>
          <a href="#">Jachete</a>
          <a href="#">Pantaloni</a>
          <a href="#">Tricouri</a>
        </div>
        <script>
          function myFunction2() {
            document.getElementById('DropB').classList.toggle('show');
          }

          window.onclick = function (e) {
            if (!e.target.matches('.barbati-buton')) {
              var myDropdown = document.getElementById('DropB');
              if (myDropdown.classList.contains('show')) {
                myDropdown.classList.remove('show');
              }
            }
          };
        </script>
      </div>

      <div class="copii">
        <button class="copii-buton" onclick="myFunction3()">COPII</button>
        <div class="copii-continut" id="DropC">
          <a href="#">Blugi</a>
          <a href="#">Bluze</a>
          <a href="#">Fuste</a>
          <a href="#">Pantaloni</a>
          <a href="#">Rochii</a>
          <a href="#">Tricouri</a>
          <a href="#">Salopete</a>
        </div>

        <script>
          function myFunction3() {
            document.getElementById('DropC').classList.toggle('show');
          }

          window.onclick = function (e) {
            if (!e.target.matches('.copii-buton')) {
              var myDropdown = document.getElementById('DropC');
              if (myDropdown.classList.contains('show')) {
                myDropdown.classList.remove('show');
              }
            }
          };
        </script>
      </div>

      <form>
        <input type="search" name="q" placeholder="Cauta..." />
        <input type="submit" value="OK" />
      </form>
    </div>

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

      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        <div class="linie">
          <label for="inregistrare-nume">
            <a
              ><img
                id="register1"
                src="Poze/register-tw.png"
                alt="register"
              />Nume 
            </a>
           
          </label>
          <div class="input">
              <input
                type="text"
                id="inregistrare-nume"
                name="nume"
                placeholder="Popescu "
              />
               <span class="error" style="color:red">*  <?php echo $numeErr ;?></span>
            </div>
        </div>
        <br />

        <div class="linie">
          <label for="inregistrare-prenume">
            <a
              ><img
                id="register2"
                src="Poze/register-tw.png"
                alt="register"
              />Prenume</a
            >
          </label>
          <div class="input">
              <input
                type="text"
                id="inregistrare-prenume"
                name="prenume"
                placeholder="Daniel"
              />
              <span class="error" style="color:red">*  <?php echo $prenumeErr ;?></span>
           </div>
        </div>
        <br />

        <div class="linie">
          <label for="inregistrare-email">
            <a><img id="email" src="Poze/email-tw.png" alt="email" />Email </a>
          </label>
          <div class="input">
              <input
                type="text"
                id="inregistrare-email"
                name="email"
                placeholder="popescu@gmail.com"
              />
              <span class="error" style="color:red">*  <?php echo $emailErr ;?></span>
        </div>
        </div>
        <br />

        <div class="linie">
          <label for="inregistrare-telefon">
            <a
              ><img
                id="telefon"
                src="Poze/telefon.png"
                alt="telefon"
              />Telefon</a
            >
          </label>
          <div class="input">
              <input
                type="text"
                id="inregistrare-telefon"
                name="telefon"
                placeholder=" 07** *** *** "
              />
              <span class="error" style="color:red">*  <?php echo $telefonErr ;?></span>
           </div>
        </div>
        <br />

        <div class="linie">
          <label for="inregistrare-adresa">
            <a
              ><img
                id="adresa"
                src="Poze/adresaCheckout.png"
                alt="adresa"
              />Adresa</a
            >
          </label>
          <div class="input">
              <input
                type="text"
                id="inregistrare-email"
                name="adresa"
                placeholder="Str. Primaverii nr.8"
              />
              <span class="error" style="color:red">*   <?php echo $adresaErr ;?></span>
           </div>
        </div>
        <br />

        <div class="linie">
          <label for="inregistrare-parola">
            <a
              ><img id="parola" src="Poze/parola-tw.png" alt="parola" />Parola
            </a>
          </label>
          <div class="input">
              <input
                type="text"
                id="inregistrare-parola"
                name="parola"
                placeholder="********"
              />
              <span class="error" style="color:red">*   <?php echo $parolaErr ;?></span>
           </div>
        </div>
        <br />

        <button
          class="buton-inregistrare"
          type="submit"
          onclick="window.location.href='#'"
        >
          Inregistrare
        </button>
      </form>
    </main>
    <footer class="footer">
      <div class="footer-stanga">
        <h1>
          <img id="logo" src="Poze/logo.png" alt="logo" />
          <img id="logo-nume" src="Poze/logo-nume.png" alt="logo-nume" />
        </h1>
        <p class="footer-links">
          <a href="./PaginaPrincipala.html">Acasa</a>
          |
          <a href="./Livrare.html">Livrare si Servicii</a>
          |
          <a href="./Contact.html">Contact</a>
        </p>
        <p class="nume-companie">Impressed © 2020</p>
      </div>

      <div class="footer-centru">
        <div class="locatie">
          <a title="Locatie"><img src="Poze/locatie-tw.png" alt="locatie" /></a>
          <p>Strada General Henri Mathias Berthelot Nr. 16</p>
        </div>

        <div class="telefon">
          <a title="Telefon"><img src="Poze/telefon-tw.png" alt="telefon" /></a>
          <p>+4 0767-437-025</p>
        </div>

        <div class="mail">
          <a
            href="mailto:Impressed2020@company.com?Subject=Impressed"
            title="Mail"
            ><img src="Poze/mail-tw.png" alt="mail"
          /></a>
          <p>Impressed@company.com</p>
        </div>
      </div>

      <div class="footer-dreapta">
        <p>
          Urmărește-ne
        </p>
        <div class="footer-icons">
          <a title="Facebook"
            ><img id="facebook" src="Poze/facebook-tw.png" alt="facebook-icon"
          /></a>
          <a title="Instagram"
            ><img
              id="instagram"
              src="Poze/instagram-tw.png"
              alt="instagram-icon"
          /></a>
          <a
            href="https://github.com/LauraStan99/FII/tree/master/TW"
            title="GitHub"
            ><img id="git" src="Poze/git-tw.png" alt="github-icon"
          /></a>
          <a title="YouTube"
            ><img id="youtube" src="Poze/youtube-tw.png" alt="youtube-icon"
          /></a>
        </div>
      </div>
    </footer>

  </body>
</html>
