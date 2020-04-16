<?php
require '../controller/validare-controller.php';
require '../controller/inserareDate-controller.php';
$numeErr=$prenumeErr=$emailErr=$telefonErr=$adresaErr=$parolaErr="";
$nume=$prenume=$email=$telefon=$adresa=$parola="";
$date=new Validate();
$insert=new Insert();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $date->changeLastName($nume, $numeErr);
  $date->changeFirstName($prenume, $prenumeErr);
  $date->changeEmail($email, $emailErr);
  $date->changeAdress($adresa, $adresaErr);
  $date->changePhone($telefon, $telefonErr);
  $date->changePassword($parola, $parolaErr);
}

?>

<!DOCTYPE html>
<html lang="ro">
  <head>
    <title>Cont | Impressed</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="../css/DateCont.css" rel="stylesheet" />
  </head>

  <body>
    <header>
      <div>
        <div class="header-right">
          <div class="favotite">
            <a class="link-favorite" href="" title="Lista de dorinte">
              <img
                class="logo-favorite"
                src="../Poze/logo-favorite-tw.png"
                alt="Favorite"
              />
            </a>
          </div>

          <div class="cos">
            <a class="link cos" href="" title="Cos cumparaturi">
              <img
                class="logo-cos"
                src="../Poze/shopping-cart-tw.png"
                alt="Cos cumparaturi"
              />
            </a>
          </div>

          <div class="cont">
            <a class="link cont" href="./dateCont-view.php" title="Cont">
              <img class="logo-cont" src="../Poze/cont-tw.png" alt="Cont" />
            </a>
          </div>
        </div>

        <div class="header-left">
          <div class="link-nume">
            <a href="#" title="logo"
              ><img class="logo" src="../Poze/logo.png" alt="logo"
            /></a>
            <a href="#" title="logo-nume"
              ><img class="logo-nume" src="../Poze/logo-nume.png" alt="logo-nume"
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
            document.getElementById("DropF").classList.toggle("show");
          }

          window.onclick = function(e) {
            if (!e.target.matches(".femei-buton")) {
              var myDropdown = document.getElementById("DropF");
              if (myDropdown.classList.contains("show")) {
                myDropdown.classList.remove("show");
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
            document.getElementById("DropB").classList.toggle("show");
          }

          window.onclick = function(e) {
            if (!e.target.matches(".barbati-buton")) {
              var myDropdown = document.getElementById("DropB");
              if (myDropdown.classList.contains("show")) {
                myDropdown.classList.remove("show");
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
            document.getElementById("DropC").classList.toggle("show");
          }

          window.onclick = function(e) {
            if (!e.target.matches(".copii-buton")) {
              var myDropdown = document.getElementById("DropC");
              if (myDropdown.classList.contains("show")) {
                myDropdown.classList.remove("show");
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
      <div class="titlu">
        <img id="cont" src="../Poze/cont.png" />
        <a id="titlu">Contul meu </a>
      </div>

      <div>
        <h1>
          Bine ati venit!
        </h1>
        <hr />
        <p>
          Date personale:
        </p>
      </div>
      <form method="post">
          <div class="tip-date">
            <label for="inregistrare-nume">
              <a id="id-nume"
                ><img
                  id="register1"
                  src="../Poze/register-tw.png"
                  alt="register"
                />Nume : Popescu
              </a>
            </label>
          </div>
          <div class="date">
              <input
                type="text"
                id="inregistrare-nume"
                name="nume"
                placeholder="Nume nou "
                value="<?php echo $nume;?>"
              />        
            <button
              class="buton-schimba"
              type="submit"
              onclick="window.location.href='#'"
            >
              Schimba
            </button>
            <span class="error" style="color:red">  <?php if(isset($numeErr)){echo $numeErr ;}?></span>
          </div>
          <br />

          <div class="tip-date">
            <label for="inregistrare-prenume">
              <a id="id-prenume"
                ><img
                  id="register2"
                  src="../Poze/register-tw.png"
                  alt="register"
                />Prenume : Daniel</a
              >
            </label>
          </div>
          <div class="date">
            
              <input
                type="text"
                id="inregistrare-prenume"
                name="prenume"
                placeholder="Prenume nou ... "
                value="<?php echo $prenume;?>"
              />        
            <button
              class="buton-schimba"
              type="submit"
              onclick="window.location.href='#'"
            >
              Schimba
            </button>
            <span class="error" style="color:red">  <?php if(isset($prenumeErr)){echo $prenumeErr ;}?></span>

          </div>
          <br />

          <div class="tip-date">
            <label for="inregistrare-email">
              <a id="id-email"
                ><img id="email" src="../Poze/email-tw.png" alt="email" />Email :
                popescu@gmail.com</a
              >
            </label>
          </div>
          <div class="date">
            
              <input
                type="text"
                id="inregistrare-email"
                name="email"
                placeholder="Email nou ..."
                value="<?php echo $email;?>"
              />        
            <button
              class="buton-schimba"
              type="submit"
              onclick="window.location.href='#'"
            >
              Schimba
            </button>
            <span class="error" style="color:red">  <?php if(isset($emailErr)){echo $emailErr ;}?></span>

          </div>

          <br />

          <div class="tip-date">
            <label for="inregistrare-telefon">
              <a id="id-telefon"
                ><img id="telefon" src="../Poze/telefon.png" alt="telefon" />Telefon :
                0765 234 567
              </a>
            </label>
          </div>
          <div class="date">
          
              <input
                type="text"
                id="inregistrare-telefon"
                name="telefon"
                placeholder="Numar nou de telefon : ..."
                value="<?php echo $telefon;?>"
              />        
            <button
              class="buton-schimba"
              type="submit"
              onclick="window.location.href='#'"
            >
              Schimba
            </button>
            <span class="error" style="color:red">  <?php if(isset($telefonErr)){echo $telefonErr ;}?></span>

          </div>

          <br />

          <div class="tip-date">
            <label for="inregistrare-adresa">
              <a id="id-adresa"
                ><img
                  id="adresa"
                  src="../Poze/adresaCheckout.png"
                  alt="adresa"
                />Adresa : Str. Primaverii nr.8</a
              >
            </label>
          </div>
          <div class="date">
            
              <input
                type="text"
                id="inregistrare-email"
                name="adresa"
                placeholder="Adresa noua ..."
                value="<?php echo $adresa;?>"
              />        
            <button
              class="buton-schimba"
              type="submit"
              onclick="window.location.href='#'"
            >
              Schimba
            </button>
            <span class="error" style="color:red">  <?php if(isset($adresaErr)){echo $adresaErr ;}?></span>

          </div>

          <br />

          <div class="tip-date">
            <label for="inregistrare-parola">
              <a id="id-parola"
                ><img id="parola" src="../Poze/parola-tw.png" alt="parola" />Parola :
                12345678</a
              >
            </label>
          </div>
          <div class="date">
          
            <input
              type="text"
              id="inregistrare-parola"
              name="parola"
              placeholder="Parola noua ********"
              value="<?php echo $parola;?>"
            />       
            <button
              class="buton-schimba"
              type="submit"
              onclick="window.location.href='#'"
            >
              Schimba
            </button>
            <span class="error" style="color:red">  <?php if(isset($parolaErr)){echo $parolaErr ;}?></span>
          </div>
          <br />
        </form>

      <button
        class="buton-inapoi-cump"
        type="button"
        onclick="window.location.href='./paginaPrincipala-view.php'"
      >
        &lt Inapoi la cumparaturi
      </button>
    </main>

    <!-- footerul -->
    <footer class="footer">
      <div class="footer-stanga">
        <h1>
          <img id="logo" src="../Poze/logo.png" alt="logo" />
          <img id="logo-nume" src="../Poze/logo-nume.png" alt="logo-nume" />
        </h1>
        <p class="footer-links">
          <a href="./paginaPrincipala-view.php">Acasa</a>
          |
          <a href="./livrare-view.php">Livrare si Servicii</a>
          |
          <a href="./contact-view.php">Contact</a>
        </p>
        <p class="nume-companie">Impressed © 2020</p>
      </div>

      <div class="footer-centru">
        <div class="locatie">
          <a title="Locatie"><img src="../Poze/locatie-tw.png" alt="locatie"/></a>
          <p>Strada General Henri Mathias Berthelot Nr. 16</p>
        </div>

        <div class="telefon">
          <a title="Telefon"><img src="../Poze/telefon-tw.png" alt="telefon"/></a>
          <p>+4 0767-437-025</p>
        </div>

        <div class="mail">
          <a
            href="mailto:Impressed2020@company.com?Subject=Impressed"
            title="Mail"
            ><img src="../Poze/mail-tw.png" alt="mail"
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
            ><img id="facebook" src="../Poze/facebook-tw.png" alt="facebook-icon"
          /></a>
          <a title="Instagram"
            ><img
              id="instagram"
              src="../Poze/instagram-tw.png"
              alt="instagram-icon"
          /></a>
          <a
            href="https://github.com/LauraStan99/FII/tree/master"
            title="GitHub"
            ><img id="git" src="../Poze/git-tw.png" alt="github-icon"
          /></a>
          <a title="YouTube"
            ><img id="youtube" src="../Poze/youtube-tw.png" alt="youtube-icon"
          /></a>
        </div>
      </div>
    </footer>
  </body>
</html>
