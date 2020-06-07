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


    <!-- <div class="mxgraph" style="max-width:100%;border:1px solid transparent;" data-mxgraph="{&quot;highlight&quot;:&quot;#0000ff&quot;,&quot;nav&quot;:true,&quot;resize&quot;:true,&quot;toolbar&quot;:&quot;zoom layers lightbox&quot;,&quot;edit&quot;:&quot;_blank&quot;,&quot;xml&quot;:&quot;&lt;mxfile host=\&quot;app.diagrams.net\&quot; modified=\&quot;2020-06-07T11:48:48.198Z\&quot; agent=\&quot;Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36\&quot; etag=\&quot;xaHyqnq_Ko9RyUPgIxMX\&quot; version=\&quot;12.8.8\&quot; type=\&quot;device\&quot;&gt;&lt;diagram id=\&quot;c3RfBqLwoh0VepSaRGRm\&quot; name=\&quot;Page-1\&quot;&gt;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&lt;/diagram&gt;&lt;/mxfile&gt;&quot;}"></div>
    <script type="text/javascript" src="https://app.diagrams.net/js/viewer.min.js"></script>
  
     -->
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
        <p>Dezvoltarea aplicatiei a inceput prin realizarea unui prototip de interfata ce poate fi vizualizat in urmatoarele imagini : </p>
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
          CSS pentru aspect.Ulterior am adaugat si putin JavaScript pentru a dinamiza anumite componente ale aplicatiei.
        </p>
      </section>

      <section id="bazaDeDate">
        <h3>
          <span>2.2 </span>
          Baza de date
        </h3>
        <p>Pentru inceput ne-am schitat o diagrama a bazei de date cu tabelele pe care noi le-am crezut esentiale, dupa cum se poate vedea in urmatoarea
          diagrama </p>

        <img src="<?php echo URL; ?>public/poze/DiagramaBD.png" class="diagrama-BDinitiala">

        <p>Pe parcursul realizarii proiectului am realizat multiple modificari si imbunatatiri asupra bazei de date initiale , numarul de tabele crescand,
          la fel si numarul de coloane, precum si relatiile dintre acestea.In prezent structura bazei de date arata astfel :
        </p>
        <div class="diagrama-BDfinala">
          <div class="mxgraph" style="max-width:100%;border:1px solid transparent;" data-mxgraph="{&quot;highlight&quot;:&quot;#0000ff&quot;,&quot;nav&quot;:true,&quot;resize&quot;:true,&quot;toolbar&quot;:&quot;zoom layers lightbox&quot;,&quot;edit&quot;:&quot;_blank&quot;,&quot;xml&quot;:&quot;&lt;mxfile host=\&quot;Electron\&quot; modified=\&quot;2020-06-07T12:52:04.830Z\&quot; agent=\&quot;5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) draw.io/13.0.3 Chrome/80.0.3987.163 Electron/8.2.1 Safari/537.36\&quot; etag=\&quot;1C1jYSjpad8YFeVqpleM\&quot; version=\&quot;13.0.3\&quot; type=\&quot;device\&quot;&gt;&lt;diagram id=\&quot;C5RBs43oDa-KdzZeNtuy\&quot; name=\&quot;Page-1\&quot;&gt;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&lt;/diagram&gt;&lt;/mxfile&gt;&quot;}"></div>
          <script type="text/javascript" src="https://app.diagrams.net/js/viewer.min.js"></script>
        </div>
        <p>Pentru lucrul cu baza de date am utilizat serverul de baze de date relational PhpMyAdmin. Am creat baza de date Impressed unde am inclus toate tabelele mentionate in diagrama de mai sus.
          Pentru a lucra simultan pe aceeasi baza de date , la orice modificare adusa bazei de date (inserari/stergeri/actualizari) s-a facut export/import de
          fiecare membru al echipei .
        </p>
        <p>Cea mai mare parte a bazei de date a fost populata prin utilizarea aplicatiei (toate tabelele cu exceptia : produse si marime, care au fost introduse manual )</p>
        <p>Dupa cum se poate vedea in diagrama exista foarte multe relatii intre tabele (chei primare si secundare). Acestea ne-au fost de folos ulterior pentru
          realizarea statisticilor,clasamentului produselor si a multor functionalitati ale aplicatiei (cos, comenzi etc)</p>
      </section>

      <section id="back">
        <h3>
          <span>2.3.</span>
          Backend
        </h3>
        <p>
          Pentru partea de backend a aplicatiei am ales ca limbaj PHP7.Initial pentru functionalitate tot codul PHP a fost inclus in fiesierele HTML,creand un cod spaghetti ineficient.</p>
        <p> Ulterior am vazut dificultetea adusa proiectului (fisiere cu un numar foarte mare de linii de cod , functionalitati amestecate, cod repetat) fortandu-ne sa
          aducem o schimbare , chiar daca aplicatia era functionala. Astfel am decis sa recurgem la o arhitectura MVC pentru intreaga aplicatie.</p>

        <p> Aceasta structura a impartit fisierele proiectului in 3 categorii: models, controllers si views.</p>
      </section>


    </section>
    <section id="dezvoltare">
      <h3>
        <span>3.</span>
        Dezvoltarea aplicatiei
      </h3>
      <p>Ca sistem de stocare si management online al codului sursa am folosit GitHub.In imaginea urmatoare se poate vedea fluxul de lucru. </p>
      <img src="<?php echo URL; ?>public/poze/lucru-in-echipa.png" class="lucruEchipa">
      <p>Toate CSS-urile si HTML-urile au fost validate cu ajutorul urmatoarelor site-uri
        <ol>
          <li>https://validator.w3.org/</li>
          <li>https://jigsaw.w3.org/css-validator/</li>
        </ol>
      </p>
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