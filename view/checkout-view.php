<?php
require '../controller/validare-controller.php';
$numeErr=$prenumeErr=$emailErr=$telefonErr=$adresaErr=$parolaErr="";
$nume=$prenume=$email=$telefon=$adresa=$parola="";
$date=new Controller();

if($_SERVER["REQUEST_METHOD"] == "POST")
  {
 
    $date->validateLastName($nume, $numeErr);
    $date->validateFirstName($prenume, $prenumeErr);
    $date->validateEmail($email, $emailErr);
    $date->validateAdress($adresa, $adresaErr);
    $date->validatePhone($telefon, $telefonErr);
    $date->validatePassword($parola, $parolaErr);
  }

?>

<!DOCTYPE html>
<html lang="ro">
  <head>
    <title>Checkout | Impressed</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="../css/Checkout.css" rel="stylesheet" />
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
            <a class="link cont" href="./DateCont.html" title="Cont">
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
      <!-- <p>Aveti cumparaturi in valoare de : 100$</p> -->

      <div class="main-stanga">
        <h1>Detalii livrare</h1>
        <div class="metoda-livrare">
          <p>
            Medota de livrare: Curier<input type="checkbox" id="curier" />
            Posta<input type="checkbox" id="posta" />
            <a style="color: red;">*</a>
          </p>
        </div>

        <label for="numeCheckout">
          <a><img id="contNume" src="../Poze/cont.png" alt="Cont-nume" /> Nume</a>
          <a style="color: red;">*</a>
        </label>
        <input
          type="text"
          id="numeCheckout"
          name="nume-intreg"
          placeholder="Popescu"
        />

        <label for="prenumeCheckout">
          <a
            ><img
              id="contPrenume"
              src="../Poze/cont.png"
              alt="Cont-nume&prenume"
            />Prenume</a
          >
          <a style="color: red;">*</a>
        </label>
        <input
          type="text"
          id="prenumeCheckout"
          name="nume-intreg"
          placeholder="Daniel"
        />

        <label for="emailCheckout">
          <a
            ><img
              id="email"
              src="../Poze/email-Checkout.png"
              alt="Email-Checkout"
            />Email</a
          >
          <a style="color: red;">*</a>
        </label>
        <input
          type="text"
          id="emailCheckout"
          name="email-Checkout"
          placeholder="popescu@gmail.com"
        />

        <label for="adresaCheckout">
          <a
            ><img
              id="adresa"
              src="../Poze/adresaCheckout.png"
              alt="adresa-Checkout"
            />Adresa livrare</a
          >
          <a style="color: red;">*</a>
        </label>
        <input
          type="text"
          id="adresaCheckout"
          name="email-Checkout"
          placeholder=" Str. Primaverii nr.8"
        />

        <label for="orasCheckout">
          <a
            ><img
              id="oras"
              src="../Poze/orasCheckout.png"
              alt="oras-Checkout"
            />Oras</a
          >
          <a style="color: red;">*</a>
        </label>
        <input
          type="text"
          id="orasCheckout"
          name="oras-Checkout"
          placeholder="Iasi"
        />

        <label for="taraCheckout">
          <a
            ><img
              id="tara"
              src="../Poze/taraCheckout.png"
              alt="tara-Checkout"
            />Tara</a
          >
          <a style="color: red;">*</a>
        </label>
        <input
          type="text"
          id="taraCheckout"
          name="tara-Checkout"
          placeholder="Romania"
        />
        <button
          id="inapoi-la-cos"
          type="button"
          onclick="window.location.href='./CosPlin.html'"
        >
          &lt Inapoi la cos
        </button>
      </div>
      <div class="main-dreapta">
        <h2>Detalii mod plata</h2>
        <div class="metoda-plata">
          <p>
            Medota de plata: Ramburs<input type="checkbox" id="ramburs" />
            Online cu card bancar<input type="checkbox" id="card" />
            <a style="color: red;">*</a>
          </p>
        </div>

        <label for="numeCard">Nume card <a style="color: red;">*</a> </label>
        <input
          type="text"
          id="numeCard"
          name="nume-card"
          placeholder="Popescu Daniel"
        />

        <label for="numarCard"
          >Numarul cardului de credit <a style="color: red;">*</a></label
        >
        <input
          type="text"
          id="numarCard"
          name="numar-card"
          placeholder="1111-2222-3333-4444"
        />

        <label for="lunaExpCard"
          >Luna expirarii <a style="color: red;">*</a></label
        >
        <input
          type="text"
          id="lunaExpCard"
          name="luna-card"
          placeholder="October"
        />

        <label for="anExpCard"
          >Anul expirarii <a style="color: red;">*</a></label
        >
        <input type="text" id="anExpCard" name="an-card" placeholder="2025" />

        <label for="CVVCard">CVV <a style="color: red;">*</a></label>
        <input type="text" id="CVVCard" name="CVV-card" placeholder="729" />

        <button
          id="plaseaza-comanda"
          type="button"
          onclick="window.location.href='./ComandaPlasata.html'"
        >
          Plaseaza comanda &gt
        </button>
      </div>
    </main>

    <!-- footerul -->
    <footer class="footer">
      <div class="footer-stanga">
        <h1>
          <img id="logo" src="../Poze/logo.png" alt="logo" />
          <img id="logo-nume" src="../Poze/logo-nume.png" alt="logo-nume" />
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
          <a title="Locatie"><img src="../Poze/locatie-tw.png" alt="locatie" /></a>
          <p>Strada General Henri Mathias Berthelot Nr. 16</p>
        </div>

        <div class="telefon">
          <a title="Telefon"><img src="../Poze/telefon-tw.png" alt="telefon" /></a>
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
            href="https://github.com/LauraStan99/FII/tree/master/TW"
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
