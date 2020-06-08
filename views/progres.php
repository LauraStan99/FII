<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="description" content="Impressed - Ghid de utilizare">
  <meta name="keywords" content="HTML,CSS,JS,PHP,project,infoiasi,web">
  <meta name="author" content="Botez Georgiana , Stan Laura-Ioana">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="<?php echo URL; ?>public/css/progres.css" rel="stylesheet" />

  <title>Impressed - Progres</title>

</head>

<body>
  <article resource="#" typeof="schema:ScholarlyArticle">
    <header>
      <?php
      require 'header.php';
      ?>
      <h1>Impressed</h1>
      <p class="subtitlu">Progres</p>
      <hr>
    </header>

    <div>
      <dl>
        <dt>Autori</dt>
        <dd>
          Botez Georgiana
        </dd>
        <dd>
          Stan Laura-Ioana
        </dd>
      </dl>
    </div>

    <div class="cuprins">
      <h2>Cuprins</h2>

      <ol>
        <li><a href="#abstract">Abstract</a></li>
        <li><a href="#stagii">Stagiile de dezvoltare</a>
          <ol>
            <li><a href="#inceput"> Inceputul</a></li>
            <li><a href="#bazaDeDate">Baze de date</a></li>
            <li><a href="#back">Backend</a></li>

          </ol>
        </li>
        <li><a href="#dezvoltare">Dezvoltarea aplicatiei</a></li>
      </ol>
    </div>

    <img src="<?php echo URL; ?>impressed_cover.jpg" class="rezumat" />

    <div typeof="sa:Abstract" id="abstract">
      <h2>
        <span>1. </span>
        Abstract
      </h2>
      <p>
        In continuare vom prezenta evolutia aplicatiei Impressed.
      </p>
    </div>

    <section id="stagii">
      <h2>
        <span>2. </span>
        Stagiile de dezvoltare
      </h2>
      <section id="inceput">
        <h3>
          <span>2.1 </span>
          Inceputul
        </h3>
        <p>Dezvoltarea aplicatiei a inceput prin realizarea unui prototip de interfata ce poate fi vizualizat in urmatoarele imagini: </p>
        <div class="imagini-prototip">
          <a href="<?php echo URL; ?>public/poze/paginaPrincipala.jpeg">
            <img src="<?php echo URL; ?>public/poze/paginaPrincipala.jpeg" class="imagine" />
            <p>Pagina principala</p>
          </a>
          <a href="<?php echo URL; ?>public/poze/listareProduse.jpeg">
            <img src="<?php echo URL; ?>public/poze/listareProduse.jpeg" class="imagine" />
            <p>Listarea produselor</p>
          </a>
          <a href="<?php echo URL; ?>public/poze/paginaProdus.jpeg">
            <img src="<?php echo URL; ?>public/poze/paginaProdus.jpeg" class="imagine" />
            <p>Pagina unui produs</p>
          </a>
          <a href="<?php echo URL; ?>public/poze/login.jpeg">
            <img src="<?php echo URL; ?>public/poze/login.jpeg" class="imagine" />
            <p>Pagina de logare</p>
          </a>
          <a href="<?php echo URL; ?>public/poze/cosCumparaturi.jpeg">
            <img src="<?php echo URL; ?>public/poze/cosCumparaturi.jpeg" class="imagine" />
            <p>Cosul de cumparaturi</p>
          </a>
          <a href="<?php echo URL; ?>public/poze/favorite.jpeg">
            <img src="<?php echo URL; ?>public/poze/favorite.jpeg" class="imagine" />
            <p>Pagina de produse favorite</p>
          </a>
          <a href="<?php echo URL; ?>public/poze/trimiteComanda.jpeg">
            <img src="<?php echo URL; ?>public/poze/trimiteComanda.jpeg" class="imagine" />
            <p>Trimite comanda</p>
          </a>
          <a href="<?php echo URL; ?>public/poze/plasareComanda.jpeg">
            <img src="<?php echo URL; ?>public/poze/plasareComanda.jpeg" class="imagine" />
            <p>Comanda plasata</p>
          </a>
        </div>

        <p>Toate acestea au avut ca si fundament un research de pagini ale magazinelor online.</p>
        <p>Pentru partea de frontend, am decis sa folosim HTML5, CSS3 si JavaScript. Intai am realizat cateva pagini html, dupa care am inceput sa integram si
          CSS pentru aspect. Ulterior am adaugat si putin JavaScript pentru a dinamiza anumite componente ale aplicatiei.
        </p>
      </section>

      <section id="bazaDeDate">
        <h3>
          <span>2.2 </span>
          Baza de date
        </h3>
        <p>Pentru inceput, ne-am schitat o diagrama a bazei de date cu tabelele pe care noi le-am crezut esentiale, dupa cum se poate vedea in urmatoarea
          diagrama: </p>

        <img src="<?php echo URL; ?>public/poze/DiagramaBD.png" class="diagrama-BDinitiala">

        <p>Pe parcursul realizarii proiectului, am realizat multiple modificari si imbunatatiri asupra bazei de date initiale, numarul de tabele crescand,
          la fel si numarul de campuri, precum si relatiile dintre acestea. In prezent structura bazei de date arata astfel:
        </p>
        <div class="diagrama-BDfinala">
          <div class="mxgraph" style="max-width:100%;border:1px solid transparent;" data-mxgraph="{&quot;highlight&quot;:&quot;#0000ff&quot;,&quot;nav&quot;:true,&quot;resize&quot;:true,&quot;toolbar&quot;:&quot;zoom layers lightbox&quot;,&quot;edit&quot;:&quot;_blank&quot;,&quot;xml&quot;:&quot;&lt;mxfile host=\&quot;Electron\&quot; modified=\&quot;2020-06-07T12:52:04.830Z\&quot; agent=\&quot;5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) draw.io/13.0.3 Chrome/80.0.3987.163 Electron/8.2.1 Safari/537.36\&quot; etag=\&quot;1C1jYSjpad8YFeVqpleM\&quot; version=\&quot;13.0.3\&quot; type=\&quot;device\&quot;&gt;&lt;diagram id=\&quot;C5RBs43oDa-KdzZeNtuy\&quot; name=\&quot;Page-1\&quot;&gt;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&lt;/diagram&gt;&lt;/mxfile&gt;&quot;}"></div>
          <script type="text/javascript" src="https://app.diagrams.net/js/viewer.min.js"></script>
        </div>
        <p>Pentru lucrul cu baza de date am utilizat serverul de baze de date relational phpMyAdmin. Am creat baza de date Impressed unde am inclus toate tabelele mentionate in diagrama de mai sus.
          Pentru a lucra simultan pe aceeasi baza de date, la orice modificare adusa bazei de date (inserari/stergeri/actualizari) s-a facut export/import de
          fiecare membru al echipei.
        </p>
        <p>Cea mai mare parte a bazei de date a fost populata prin utilizarea aplicatiei (toate tabelele cu excepti: produse si marime, care au fost introduse manual )</p>
        <p>Dupa cum se poate vedea in diagrama, exista foarte multe relatii intre tabele (chei primare si secundare). Acestea ne-au fost de folos ulterior pentru
          realizarea statisticilor, clasamentului produselor si a multor functionalitati ale aplicatiei (cos, wishlist, comenzi etc.)</p>
      </section>

      <section id="back">
        <h3>
          <span>2.3.</span>
          Backend
        </h3>
        <p>
          Pentru partea de backend a aplicatiei, am ales ca limbaj PHP 7. Initial pentru functionalitate tot codul PHP a fost inclus in fisierele HTML, creand un cod spaghetti ineficient. </p>
        <p>Ulterior am vazut dificultetea adusa proiectului (fisiere cu un numar foarte mare de linii de cod, functionalitati amestecate, cod repetat) fortandu-ne sa
          aducem o schimbare, chiar daca aplicatia era functionala. Astfel, am decis sa recurgem la o arhitectura MVC pentru intreaga aplicatie.</p>

        <p> Aceasta structura a impartit fisierele proiectului in 3 categorii: models, controllers si views.</p>
      </section>

    </section>
    <section id="dezvoltare">
      <h3>
        <span>3.</span>
        Dezvoltarea aplicatiei
      </h3>
      <p>Ca sistem de stocare si management online al codului sursa am folosit GitHub. In imaginea urmatoare se poate vedea fluxul de lucru al ehipei. </p>
      <img src="<?php echo URL; ?>public/poze/lucru-in-echipa.png" class="lucruEchipa">
      <p>Toate CSS-urile si HTML-urile au fost validate cu ajutorul urmatoarelor site-uri:
        <ol>
          <li>https://validator.w3.org/</li>
          <li>https://jigsaw.w3.org/css-validator/</li>
        </ol>
      </p>
      <p> Dupa cum se poate vedea, fiecare membru al echipei s-a ocupat atat individual de anumite componente, cat si impreuna.</p>

      <div class="realizari">
        <ol>
          <p>Stan Laura-Ioana</p>
          <li>Documentatie</li>
          <li>Design aplicatie</li>
          <li>Arhitectura MVC</li>
          <li>Modulul de administrare</li>
          <li>Validari de date account</li>
          <li>Populare baza de date</li>
          <li>Filtrare/sortare produse</li>
          <li>Flux de date RSS</li>
          <li>Export CSV/PDF</li>
          <li>Statistici</li>
        </ol>

        <ol>
          <p>Botez Georgiana</p>
          <li>Documentatie</li>
          <li>Design aplicatie</li>
          <li>Arhitectura MVC</li>
          <li>Componenta de plasare a unei comenzi</li>
          <li>Validari date register</li>
          <li>Populare baza de date</li>
          <li>Filtrare/sortare produse</li>
          <li>Trimitere email</li>
          <li>Export CSV/PDF</li>
          <li>Statistici</li>
        </ol>
      </div>

    </section>
    <?php
    require 'footer.php';
    ?>
  </article>


</body>

</html>