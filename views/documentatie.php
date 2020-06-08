<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Impressed - Ghid de utilizare">
    <meta name="keywords" content="HTML,CSS,JS,PHP,project,infoiasi,web">
    <meta name="author" content="Botez Georgiana , Stan Laura-Ioana">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="<?php echo URL; ?>public/css/documentatie.css" rel="stylesheet" />

    <title>Impressed - Documentatie</title>
</head>

<body>
    <article resource="#" typeof="schema:ScholarlyArticle">
        <header>
            <?php
            require 'header.php';
            ?>

            <h1>Impressed</h1>
            <p class="subtitlu">Documentatie</p>

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
                <li><a href="#abstract">Aplicatia</a></li>
                <li><a href="#stagii">Arhitectura MVC a aplicatiei</a>
                    <ol>
                        <li><a href="#inceput"> </a></li>
                        <li><a href="#bazaDeDate"> </a></li>
                        <li><a href="#back"> </a></li>

                    </ol>
                </li>
                <li><a>Librarii</a></li>
                <li><a>Sesiune</a></li>


            </ol>
        </div>

        <section typeof="sa:Abstract" id="abstract" role="doc-abstract">
            <h2>
                <span>1. </span>
                Aplicatia
            </h2>
            <p>
                Impressed este o aplicatie Web care gestioneaza colectii de imbracaminte destinate copiilor, femeilor si barbatilor.
                Exista 3 tipuri de utilizatori: vizitator, utilizator obisnuit si administrator .</p>
            <p>Aceste 3 categorii de utilizatori au in comun vizualizarea produselor site-ului ,filtrarea si ordonarea acestora ,
                vizualizarea clasamentului produselor populare , disponibil si ca flux de date RSS.
                Mai mult acestia pot cauta produse dupa preferinte, utilizand search-barul din bara de navigare.
                De asemenea acestia au acces la toate functionalitatile existe in footer (contact , detalii livrare si servicii, social-media , date de contact)
            </p>
            <p>Atat administratorii cat si utilizatorii obisnuiti pot realiza comenzi pe aplicatia noastra si de a avea o pagina de wishlist.</p>
            <p>Utilizatorul obisnuit are posibilitatea de a-si actualiza datele contului personal , de a vizualiza istoricul comenzilor ,in detaliu, precum si de
                deconectarea de pe aplicatie.
            </p>
            <p>Ca si administrator ,poti administra utilizatorii (stergere,vizualizare utilizatori),produsele (adaugare,modificare,stergere,vizualizare produse) si de a vizualiza stastistici pe care le poate descarca
                in formate minimale CSV si PDF.
            </p>


            <div class="diagrama-aplicatiei">
                <div class="mxgraph" style="max-width:100%;border:1px solid transparent;" data-mxgraph="{&quot;highlight&quot;:&quot;#0000ff&quot;,&quot;nav&quot;:true,&quot;resize&quot;:true,&quot;toolbar&quot;:&quot;zoom layers lightbox&quot;,&quot;edit&quot;:&quot;_blank&quot;,&quot;xml&quot;:&quot;&lt;mxfile host=\&quot;app.diagrams.net\&quot; modified=\&quot;2020-06-08T07:35:20.120Z\&quot; agent=\&quot;5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36\&quot; etag=\&quot;1h14--YbBYcYUtkeE9iG\&quot; version=\&quot;13.1.14\&quot; type=\&quot;device\&quot;&gt;&lt;diagram id=\&quot;c3RfBqLwoh0VepSaRGRm\&quot; name=\&quot;Page-1\&quot;&gt;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&lt;/diagram&gt;&lt;/mxfile&gt;&quot;}"></div>
                <script type="text/javascript" src="https://app.diagrams.net/js/viewer.min.js"></script>
            </div>

        </section>
        <section id="server-web">
            <h2>
                <span>2.</span>Server Web
            </h2>
            <h3><span>2.1</span>.htacces</h3>
            <p>
                Serverul aplicatiei este rulat pe serverul local oferit gratuit de MAMP, ca web-server folosim Apache .Pentru a avea controlul asupra anumitor
                aspecte am configurat un fisier htacces.
            </p>
            <p>Pentru inceput optiune "RewriteEngine On" ii spune serverului Apache sa incarce modulul "mod_rewrite" si sa porneasca interpretarea regulilor
                din fisier.
            </p>
            <p>Optiunea "RewriteBase /Impressed/" redirectioneaza utilizatorul catre path-ul corect al aplicatiei </p>
            <p>Regulile "RewriteCond" trateaza cazurile in care fisierele/directoarele nu exista.Daca acestea nu exista utilizatorul
                este redirectionat catre index.php de catre regula "RewriteRule", asadar orice se afla in URL ,tratat de expresia regex,
                te redirectioneaza catre index.php care realizeaza toata logica aplicatiei.
            </p>
            <h3><span>2.2</span>index.php</h3>
            <p>Fisierul index.php este cel care are controlul asupra aplicatiei , deoarece incarca toate librariile aplicatiei,
                pentru a putea fi utilizate de catre toate fisierele proiectului.
            </p>
            <p>Aici este instantiat un obiect de tipul Bootstrap care realizeaza rutarea URL-ului. </p>
            <h3><span>2.3</span>Clasa Bootstrap</h3>
            <p>Preia URL-ul de la browser , dupa preluarea URL-ului daca acesta este gol , este incarcata automat pagina home , prin apelarea functiei index din
                controller-ul home. Altfel se incarca controller-ul alaturi de parametrii specificati in URL.</p>
            <p>In cazul in care controller-ul sau functia din URL nu exista ,utilizatorul este redirectionat catre pagina de eroare.</p>
        </section>
        <section id="structura-MVC">
            <h2>
                <span>3.</span>Arhitectura MVC a aplicatiei
            </h2>
            <p>Arhitectura aplicatiei Impressed consta intr-un set de resurse referitoare la controller, model și view, dupa cum se poate observa in urmatoarea diagrama. </p>
            <div class="diagrama-MVC">
                <div class="mxgraph" style="max-width:100%;border:1px solid transparent;" data-mxgraph="{&quot;highlight&quot;:&quot;#0000ff&quot;,&quot;nav&quot;:true,&quot;resize&quot;:true,&quot;toolbar&quot;:&quot;zoom layers lightbox&quot;,&quot;edit&quot;:&quot;_blank&quot;,&quot;xml&quot;:&quot;&lt;mxfile host=\&quot;app.diagrams.net\&quot; modified=\&quot;2020-06-08T07:19:33.140Z\&quot; agent=\&quot;5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36\&quot; etag=\&quot;cENXPidVOvj44cCNYDqZ\&quot; version=\&quot;13.1.14\&quot; type=\&quot;device\&quot;&gt;&lt;diagram id=\&quot;AyR9pm2G9mvUvalil0_L\&quot; name=\&quot;Page-1\&quot;&gt;7Zldc6IwFIZ/jZe7A4QAXrbKbjvTrq12a+92IgRlFo0bY9X++g0SUJLY+oEfM229aDgJB8jzHnJOqIHGcP6TovHgnoQ4qVlGOK+BZs2yTMuz+L/Ussgsju1mhj6NQzFoZejEb1gYDWGdxiGelAYyQhIWj8vGgIxGOGAlG6KUzMrDIpKUrzpGfawYOgFKVGs3Dtkgs3rQWNlvcNwf5Fc2DdEzRPlgYZgMUEhmaybg10CDEsKy1nDewEk6efm8ZOf92NBb3BjFI7bNCf/+QDqcGbfs5eVt1Hokj9RvfRNeXlEyFQ9832r6d+KO2SKfBkqmoxCnnowauJ4NYoY7YxSkvTMOntsGbJjwI5M3IzJigiQw8mPhK+3vUxTG/K4bJCF06R9g5PQcJx0bJ8maPfICHATcPmGU/MVrPT0P2jD1Lp4AU4bnG6fGLCacKxWTIWZ0wYfkJziC0SIXnzierZAXYwbruPOBSMisX/hekeANAWMHMJYCptH69dRu3d357cropHOyDR2X48GGSidE2Iu0dJzAw72oGjrAK9MB9tnpAIXO863f7Zw8bOpuaLiuBgzEXmjrwHhWDywDrQIwjnFxYWM6CpnrdqvbeTdozN2CRhMIEUx/2kBY/unp9Za/ioLEhSUWTl3DwtWwcI6GwlVQKAz4mjhOm1GC51fpas0nA49C0WwGCZpM4uB9FMdYTXCoZAUfglibaKiZ59xGcYJY/Fp2r5t8cYUHEvMLrzgDKebqEr8JmdIAi7PW0wHJkW1Kb1UgOWKI9jFTHC21UDz2AfLwziaPg5ezC5aHK1GVw3tbeVjSolsk5KeSR/1LHtXLA34U9NvKA8rykFf0I8sjL6rOII+Dc67LlYdjSVStfeUBP3gNHVseal3b/v3kKxI5KAfUaCOKwro28YgiS594hDxTgRXl43KhZOtyQEsjH/ktUF0VqxZKzdvOw9VT46bqjPziaUBd2aoL5uPRgAqNrs8f1eDl0fPn46GLDu+kPNRi9SvHOTzHkSokG+67iEmO4IkrJOtEBXSOxbSyk0WffaQgvlzl2NJ+lu3tqRzFkSzBYyvnRLV1oRxQVs539/OJp1je8w24vUsr2ZGswg3i4eTQYm3YOB0w2eGGYen7EW9kHqtV5vnK+mK3dfe920vXnryXp0hm301BRcR7v7j44epTZzZ89cEY+P8B&lt;/diagram&gt;&lt;/mxfile&gt;&quot;}"></div>
                <script type="text/javascript" src="https://app.diagrams.net/js/viewer.min.js"></script>
            </div>
            <h3> <span>3.1.</span>Structura claselor Controller-View-Model + Database</h3>
            <p>Clasa Controller (din libs) este extinsa de catre toate clasele din fisierul controller al proiectului.
                In aceasta , constructorul instantiaza un obiect de tipul View , de asemenea avand si o functie care incarca automat model-ul specific controller-ului respectiv.
            </p>
            <p>Clasa View - un obiect de tipul view poate randa cu ajutorul functiei "render()" view-ul necesar in lucrul cu controller-ul.</p>
            <p>Clasa Model - extinde clasa Database , un obiect de tipul model facand legatura cu manipularea baza de date.</p>
            <p>Clasa Database - contine toate functiile CRUD necesare in lucrul cu baza de date ,pe care le folosesc fisierele de tipul Model.</p>
            <h3> <span>3.2.</span>Diagrama Clasei Controller </h3>
            <div class="diagrama-Controller">
                <div class="mxgraph" style="max-width:100%;border:1px solid transparent;" data-mxgraph="{&quot;highlight&quot;:&quot;#0000ff&quot;,&quot;nav&quot;:true,&quot;resize&quot;:true,&quot;toolbar&quot;:&quot;zoom layers lightbox&quot;,&quot;edit&quot;:&quot;_blank&quot;,&quot;xml&quot;:&quot;&lt;mxfile host=\&quot;app.diagrams.net\&quot; modified=\&quot;2020-06-08T09:05:52.080Z\&quot; agent=\&quot;5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36\&quot; etag=\&quot;niUwUJpK_bhIDd1YmZ_a\&quot; version=\&quot;13.1.14\&quot; type=\&quot;device\&quot;&gt;&lt;diagram id=\&quot;C5RBs43oDa-KdzZeNtuy\&quot; name=\&quot;Page-1\&quot;&gt;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&lt;/diagram&gt;&lt;/mxfile&gt;&quot;}"></div>
                <script type="text/javascript" src="https://app.diagrams.net/js/viewer.min.js"></script>
            </div>
            <h3> <span>3.3.</span> </h3>
            <h3> <span>3.4.</span> </h3>
        </section>

        <footer>

            <?php
            require 'footer.php';
            ?>

        </footer>
    </article>
</body>


</html>