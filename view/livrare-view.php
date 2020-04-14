<!DOCTYPE html>
<html lang="ro">
  <head>
    <title>Livrare | Impressed</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="../css/Livrare.css" rel="stylesheet" />
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
      <h1>Termeni si conditii de livrarea a comenzilor</h1>

      <h2>Regulamentul magazinului online Impressed.com</h2>
      <div class="regulament">
        <p>1.Informatii Generale</p>
        <p>2. Continutul site-ului</p>
        <p>3.Detalii livrare</p>
        <p>4.Caz de retur</p>
      </div>

      <div class="informatii-generale">
        <a id="id1">1.Informatii Generale</a>
        <p>
          1.1. Documentul stabileste termenii si conditiile de utilizare ai
          siteului/continutului/serviciului de catre utilizator sau client, in
          cazul in care acesta nu dispune de un alt acord de utilizare valid,
          incheiat intre IMPRESSED si acesta.
        </p>

        <p>
          1.2. Folosirea, inclusiv dar nelimitandu-se la accesarea, vizitarea si
          vizualizarea, continutului/serviciului, implica aderarea
          utilizatorului sau clientului la prezentele termeni si conditii in
          afara de cazul in care continutul respectiv nu are conditii de
          folosire distinct formulate.
        </p>
        <p>
          1.3. Accesul la serviciu se face exclusiv prin accesarea siteului
          public disponibil www.IMPRESSED.ro.
        </p>

        <p>
          1.4. Prin folosirea siteului/continutului/serviciului, Utilizatorul
          sau Clientul este singurul responsabil pentru toate activitatile care
          decurg prin folosirea acestuia. De asemenea, acesta raspunde pentru
          orice daune materiale, intelectuale sau electronice sau de orice alta
          natura produse siteului, continutului, serviciului, IMPRESSED sau
          oricarui tert cu care IMPRESSED are incheiate contracte, in
          conformitate cu legislatia romana in vigoare.
        </p>
      </div>

      <div class="continut-site">
        <a id="id2">2.Continutul site-ului</a>
        <p>
          2.1.Utilizatorului sau Clientului nu ii este permisa copierea,
          transferul, modificarea si/sau altfel alterarea, utilizarea, legarea
          la, expunerea, includerea oricarui continut in orice alt context decat
          cel original intentionat de IMPRESSED, includerea oricarui continut in
          afara siteului IMPRESSED, indepartarea insemnelor care semnifica
          dreptul de autor al IMPRESSED asupra continutului precum si
          participarea la transferul, vanzarea, distributia unor materiale
          realizate prin reproducerea, modificarea sau afisarea continutului,
          decat cu acordul expres al IMPRESSED.
        </p>

        <p>
          2.2.Utilizatorul sau Clientul poate copia, transfera si/sau utiliza
          continut numai in scopuri personale sau non-comerciale, numai in cazul
          in care acestea nu intra in conflict cu prevederi ale documentului.
        </p>
      </div>

      <div class="detalii-livrare">
        <a id="id3">3.Detalii livrare</a>
        <p>
          3.1. Detaliile de livrare a produselor incluzand dar nelimitandu-se la
          timpul necesar livrarii nu constituie o obligatie contractuala din
          parteA IMPRESSED, fara ca vreo parte sa poata sa pretinda celeilalte
          daune-interese, in cazul in care oricare parte poate fi sau este
          prejudiciata in orice mod de pe urma incalcarii acestora.
        </p>

        <p>
          3.2. In cazul in care un Client isi modifica datele personale,
          folosind formularele disponibile pe site, toate contractele in
          derulare existente la acel moment, isi pastreaza datele
          definite/acceptate de catre Client inainte de momentul modificarii.
        </p>

        <p>
          3.3. Clientul poate opta numai pentru una dintre variantele de
          transport ale produselor/serviciilor achizitionate, disponibila pe
          site, la momentul efectuarii comenzii, indiferent de tipul comenzii
          sale.
        </p>
      </div>

      <div class="retur">
        <a id="id4">4.Caz de retur</a>
        <p>
          4.1.Cererea de returnare are data de expediere care depaseste perioada
          de 15 zile calendaristice prevazute conform regulamentului, din ziua
          lucratoare urmatoare datei contractului onorat.
        </p>
        <p>
          4.2.In cazul returnarii produsului iar produsul returnat nu este in
          aceeasi stare in care a fost livrat (in ambalajul original cu toate
          etichetele intacte si documentele care l-au insotit).
        </p>
        <p>
          4.3.In cazul rambursarii contravalorii produsului, aceasta se va face
          in cel mult 14 de zile calendaristice de la confirmarea returului.
        </p>
        <p>
          4.4.In cazul inlocuirii produsului cu unul identic, inlocuirea se va
          face in conditiile si limitele unei comenzi normale.
        </p>
        <p>
          4.5. In cazul in care Clientul care returnat a returnat un produs in
          conformitate cu prevederile prezentului regulament, iar IMPRESSED nu
          dispune de un produs identic pentru inlocuire, acesta va oferi
          clientului contravaloarea produsului.
        </p>
        <p>
          4.6.Contravaloarea serviciilor suplimentare incluzand dar
          nelimitandu-se la transportul produselor, achitata de catre client, nu
          se ramburseaza. In toate cazurile, cheltuielile de
          returnare/re-expediere vor fi suportate de catre client
        </p>
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
