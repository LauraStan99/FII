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
      <div class="header-navigation">
        <div class="header-right">
          <div class="favorite">
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
        <label for="contact-nume">
          <a><img
              id="contact-nume"
              src="../Poze/register-tw.png"
              alt="contact-nume"/>Nume </a>
          <a style="color: red;">*</a>
        </label>
        <input
          type="text"
          id="contact-nume"
          name="nume-intreg"
          placeholder="Popescu"
        />

        <label for="contact-prenume">
          <a><img
              id="contact-prenume"
              src="../Poze/register-tw.png"
              alt="contact-nume"/>Prenume</a>
          <a style="color: red;">*</a>    
        </label>
        <input
          type="text"
          id="contact-prenume"
          name="nume-intreg"
          placeholder=" Daniel"
        />

        <label for="contact-email">
          <a><img
              id="contact-email"
              src="../Poze/email-tw.png"
              alt="contact-email"
            />Email
          </a>
          <a style="color: red;">*</a>
        </label>
        <input
          type="text"
          id="contact-email"
          name="email"
          placeholder="popescu@gmai.com"
        />

        <label for="contact-telefon">
            <a><img
                id="contact-telefon"
                src="../Poze/telefon.png"
                alt="contact-telefon"
              />Telefon
            </a>
            <a style="color: red;">*</a>
          </label>
          <input
            type="text"
            id="contact-telefon"
            name="telefon"
            placeholder="0755-666-777"
          />

        <label for="contact-subiect">
          <a
            ><img
            id="contact-subiect1"
            src="../Poze/subiect.png"
            alt="contact-subiect"
            />Subiect
          </a>
        </label>
        <select id="contact-subiect" name="subiect">
            <option value="Intrebari despre un articol">Intrebari despre un articol</option>
            <option value="Intrebari despre comanda dvs.">Intrebari despre comanda dvs.</option>
            <option value="Intrebari despre factura dvs.">Intrebari despre factura dvs.</option>
            <option value= "Altele">Altele</option>
        </select>

        <label for="contact-mesaj">
            <a><img
                id="contact-mesaj"
                src="../Poze/mesaj.png"
                alt="contact-mesaj"
              />Mesajul dvs.
            </a>
            <a style="color: red;">*</a>
          </label>
          <input
            type="mesaj"
            id="contact-mesaj"
            name="mesaj"
          />

          <button
          class="buton-formular"
          type="button"
          onclick="window.location.href='#'"
        >
          Trimiteti
        </button>

    </main>

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
