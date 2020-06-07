<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Impressed - Ghid de utilizare">
    <meta name="keywords" content="HTML,CSS,JS,PHP,project,infoiasi,web">
    <meta name="author" content="Botez Georgiana , Stan Laura-Ioana">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="<?php echo URL; ?>public/css/ghid.css" rel="stylesheet" />

    <title>Impressed - Ghid de utilizare</title>
</head>

<body>
    <article resource="#" typeof="schema:ScholarlyArticle">
        <header>
            <?php
            require 'header.php';
            ?>

            <h1>Impressed</h1>
            <p class="subtitlu">Ghid de utilizare</p>

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

        <section typeof="sa:Abstract" id="abstract" role="doc-abstract">
            <h2>
                <span>1. </span>
                Descriere
            </h2>

            <!-- <div class="mxgraph" style="max-width:100%;border:1px solid transparent;" data-mxgraph="{&quot;highlight&quot;:&quot;#0000ff&quot;,&quot;nav&quot;:true,&quot;resize&quot;:true,&quot;toolbar&quot;:&quot;zoom layers lightbox&quot;,&quot;edit&quot;:&quot;_blank&quot;,&quot;xml&quot;:&quot;&lt;mxfile host=\&quot;app.diagrams.net\&quot; modified=\&quot;2020-06-07T11:48:48.198Z\&quot; agent=\&quot;Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36\&quot; etag=\&quot;xaHyqnq_Ko9RyUPgIxMX\&quot; version=\&quot;12.8.8\&quot; type=\&quot;device\&quot;&gt;&lt;diagram id=\&quot;c3RfBqLwoh0VepSaRGRm\&quot; name=\&quot;Page-1\&quot;&gt;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&lt;/diagram&gt;&lt;/mxfile&gt;&quot;}"></div>
    <script type="text/javascript" src="https://app.diagrams.net/js/viewer.min.js"></script>
  
     -->
            <p>
                Impressed este o aplicatie Web care gestioneaza colectii de imbracaminte destinate copiilor, femeilor si barbatilor.
                Aplicatia ofera suport de cumparare a produselor site-ului. Adminii au posibilitatea de a administra produsele,
                utilizatorii si de a vizualiza diverse statistici ce pot fi exportate in formate deschise CSV si PDF. Pe pagina principala, se va regasi un
                clasament al celor mai populare produse, disponibil si ca flux de date RSS.
            </p>
        </section>

        <section id="app-guide" role="doc-app-guide">
            <h2>
                <span>2. </span>
                Flow-ul aplicatiei si continutul acesteia
            </h2>
            <p>
                Vom descrie cum un utilizator poate interactiona cu aplicatia Impressed.
            </p>

            <section id="header">
                <h3>
                    <span>2.1 </span>
                    Header
                </h3>
                <p> Header-ul este structurat in 3 sectiuni. </p>
                <p>
                    Partea stanga contine logo-ul si numele aplicatiei, care odata accesate te redirectioneaza pe pagina principala a aplicatiei.
                </p>
                <p>
                    Partea centrala contine un mesaj informativ despre livrarea comenzilor, si anume costul livrarii este gratuit daca valoarea comenzii este mai mare sau egala cu 350 de lei.
                </p>
                <p>Partea dreapta contine 3 iconite functionale.
                    <ul>
                        <li>
                            Iconita de ACCOUNT. Exista 3 cazuri de functionalitate a acesteia:
                            <ol>
                                <li>
                                    Daca utilizatorul nu este logat, acesta va fi redirectionat catre pagina de logare. Daca utilizatorul are un cont, acesta
                                    se va putea loga, altfel va avea posibilitatea de a-si crea un cont pe platforma aplicatiei.
                                </li>
                                <li>
                                    Daca utilizatorul este logat si este un utilizator obisnuit, acesta va fi redirectionat catre pagina de account, unde va
                                    avea posibilitatea de a accesa 3 butone.
                                    <ul>
                                        <li>
                                            Schimba date personale: utilizatorul isi poate vizualiza datele actuale ale contului si daca va dori, le va putea schimba.
                                        </li>
                                        <li>
                                            Istoric comenzi: utilizatorul poate vizualiza toate lista de comenzi efectuate, cu posibilitatea de a vedea si detaliile unei anumite comenzi.
                                        </li>
                                        <li>
                                            Deconecteaza-te: utilizatorul va fi deconectat de la aplicatie.
                                        </li>
                                    </ul>
                                </li>
                                <li> Daca utilizatorul este logat si este administrator al aplicatiei, acesta va fi redirectionat pe pagina de account, unde poate
                                    vizualiza statistici, administra produse si utilizatori.

                                    <ul>
                                        <li>
                                            Administrare utilizatori: are un buton de Vezi utilizatori care permite vizualizarea listei de utilizatori obisnuiti ai aplicatiei
                                            cu posibilitatea de a-i sterge
                                        </li>
                                        <li>
                                            Administrare produse:
                                            <ol>
                                                <li>
                                                    Sterge produs: administratorul poate cauta un produs dupa un id. Daca produsul exista, el poate fi sters.
                                                </li>
                                                <li>
                                                    Modifica produs: trimite administratorul catre un formular de modificare a datelor pentru produsul cautat dupa id.
                                                </li>
                                                <li>
                                                    Adauga produs: trimite administratorul catre formularul de adaugare al unui produs in aplicatie.
                                                </li>
                                                <li>
                                                    Vezi produse: administratorului ii este afisata lista cu produse, avand posibilitatea de a sterge oricare din ele.
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            Statistici : fiecare dintre aceste statistici pot fi exportate in format CSV si PDF.
                                            <ol>
                                                <li> Vezi statistica comenzi : ofera statistica comenzilor efectuate pe zile</li>

                                                <img src="<?php echo URL; ?>public/poze/statisticaComenzi.png" class="s-comenzi" />

                                                <li>Vezi statistica produse femei : ofera statistica celor mai cumparate din fiecare subcategorie a categoriei femei</li>
                                                <img src="<?php echo URL; ?>public/poze/statisticaProduseFemei.png" class="s-produseF" />
                                                <li>Vezi statistica produse populare : ofera statistica celor mai populare 10 produse din aplicatie</li>
                                                <img src="<?php echo URL; ?>public/poze/statisticaCeleMaiPopulareProduse.png" class="s-produseP" />
                                                <li>Vezi statistica plata comenzi : ofera statistica platilor efectuate cu cardul sau ramburs</li>
                                                <img src="<?php echo URL; ?>public/poze/statisticaPlataComenzi.png" class="s-plata" />
                                                <li>Vezi statistica comenzi Europa : ofera statistica comenzilor livrate in tarile din Europa</li>
                                                <img src="<?php echo URL; ?>public/poze/statisticaComenziEuropa.png" class="s-Europa" />
                                            </ol>
                                        </li>
                                    </ul>

                                </li>
                            </ol>
                        </li>
                        <li>
                            Iconita de FAVORITE
                            <ol>
                                <li>
                                    Daca utilizatorul nu este logat, i se va deschide un modal cu mesajul: "Trebuie sa fiti logat pentru a vizualiza produsele favorite!".
                                </li>
                                <li>
                                    Daca utilizatorul este logat, i se afiseaza lista cu produsele favorite. Utilizatorul poate sterge un produs din lista de favorite sau il
                                    poate adauga in cos.
                                </li>
                            </ol>
                        </li>
                        <li>
                            Iconita de COS
                            <ol>
                                <li>
                                    Daca utilizatorul nu este logat, i se va deschide un modal cu mesajul: "Trebuie sa fiti logat pentru a adauga produse in cos!".
                                </li>
                                <li>
                                    Daca utilizatorul este logat, i se va afisa un tabel cu produsele adaugate in cos. Fiecarui produs i se poate modifica cantitatea si poate fi sters din cos.
                                    Daca utilizatorul este hotarat sa finalizeze comanda, acesta poate folosi butonul de "Catre finalizare", care il redirectioneaza pe pagina de checkout. De asemenea
                                    pe pagina de cos vor aparea detaliile sumei comenzii si eventual costul transportului.
                                </li>
                            </ol>
                        </li>
                    </ul>
                </p>
            </section>

            <section id="navbar">
                <h3>
                    <span>2.2 </span>
                    Bara de navigare
                </h3>
                <p>
                    Bara de navigare este prezenta pe orice pagina a site-ului. Utilizatorul poate alege din butoanele: FEMEI, BARBATI, COPII si INFORMATII.
                    Primele 3 vor oferi utilizatorului subcategorii de produse aferente butonului ales, si il vor redirectiona catre o pagina in care sunt listate
                    produsele din categoria si subcategoria aleasa. Butonul de INFORMATII ofera 3 optiuni: ghidul de utilizare al aplicatiei, progresul de creare a acesteia
                    si documentatia.
                </p>
                <p>
                    Bara de navigare contine si o sectiune de cautare prin toate produsele aplicatiei, in functie de un criteriu introdus de catre utilizator.
                </p>
            </section>
            <section id="pagina-principala">
                <h3>
                    <span>2.3 </span>
                    Pagina Principala
                </h3>
                <p>
                    Pagina principala contine un carousel cu imagini care pot redirectiona utilizatorul catre o subcategorie de produse din aplicatie.
                    Mai mult, poate fi vizualizat clasamentul celor mai populare 10 produse, care poate fi deschis si ca flux de date RSS.
                </p>
                <p>
                </p>
            </section>
            <section id="pagina-subcategorie">
                <h3>
                    <span>2.4 </span>
                    Pagina unei subcategorii
                </h3>
                <p>
                    Odata aleasa subcategoria din bara de navigare, utilizatorul este redirectionat catre o pagina unde sunt listate produsele aferente.
                    In stanga paginii, se afla o lista de filtre care odata alese si aplicate, listeaza produsele filtrare dupa preferinte.
                    <ol>
                        <li>Pret</li>
                        <ul>
                            <li>pana la 50 lei</li>
                            <li>50-100 lei</li>
                            <li>100-150 lei</li>
                            <li>150-200 lei</li>
                            <li>200-250 lei</li>
                            <li>peste 250 lei</li>
                        </ul>

                        <li>Marime</li>
                        <ul>
                            <li>XS/34</li>
                            <li>S/36</li>
                            <li>M/38</li>
                            <li>L/40</li>
                            <li>XL/42</li>
                            <li>XXL/44</li>
                        </ul>
                        <li>Culoare</li>
                        <ul>
                            <li>rosu</li>
                            <li>galben</li>
                            <li>albastru</li>
                            <li>negru</li>
                            <li>verde</li>
                            <li>maro</li>
                            <li>portocaliu</li>
                            <li>roz</li>
                            <li>violet</li>
                            <li>alb</li>
                            <li>bej</li>
                        </ul>
                        <li>Material</li>
                        <ul>
                            <li>bumbac </li>
                            <li>matase</li>
                            <li>vascoza</li>
                            <li>catifea</li>
                            <li>satin</li>
                            <li>stofa</li>
                            <li>denim</li>
                            <li>sifon</li>
                            <li>poliester</li>
                            <li> tul</li>
                            <li> poliamida</li>
                            <li> piele</li>
                            <li> in</li>
                            <li> sintetic</li>
                        </ul>
                        <li>Ocazie</li>
                        <ul>
                            <li>casual</li>
                            <li>sport</li>
                            <li>business</li>
                            <li>festival</li>
                            <li>cocktail</li>
                            <li>bal</li>
                        </ul>
                    </ol>
                </p>
                <p> De asemenea inainte sau dupa filtrare utilizatorul poate ordona produsele in functie de :</p>
                <ul>
                    <li>Cele mai popularitate</li>
                    <li>Ordonare alfabetica</li>
                    <li>Pret crescator</li>
                    <li>Pret descrescator</li>
                </ul>
                <p> Toate produsele listate au un buton de adaugare in cos, care va adauga produsul cu prima marime disponibila pornind de la cea mai mica.</p>
            </section>
            <section id="paginaProdus">
                <h3>
                    <span>2.5 </span>
                    Pagina unui produs
                </h3>
                <p>Pe pagina unui produs vor putea fi gasite informatii precum:
                    <ul>
                        <li>imaginea produsului</li>
                        <li>denumirea</li>
                        <li>pretul</li>
                        <li>stocul total sau in functie de marime</li>
                        <li>culoarea</li>
                        <li>descrierea</li>
                        <li>materialul</li>
                    </ul>
                </p>
                <p>Mai mult, pe aceasta pagina, utilizatorul poate alege o marime disponibila si poate adauga produsul in cos sau in lista de favorite.
                    De asemenea, daca utilizatorul este administrator, pagina va avea un buton in plus, care va putea sterge produsul din aplicatie.
                </p>
            </section>
            <section id="checkout">
                <h3>
                    <span>2.6 </span>
                    Pagina de checkout
                </h3>
                <p>
                    Pagina de checkout contine un formular de plasare a comenzii, unde trebuie completate datele personale, adresa, metoda de livrare si metoda de plata.
                    De asemenea in partea dreapta a paginii exista un rezumat al comenzii care listeaza maxim 5 produse din comanda.
                </p>
                <p>
                    Daca metoda de plata este ramburs, odata plasata comanda, utilizatorul este redirectionat catre pagina de finalizare a comenzii unde i se afiseaza un mesaj de confirmare.
                    Ulterior, acesta va primi un mail cu datele comenzii.
                </p>
                <p>Daca metoda de plata este online cu card bancar, dupa plasarea comenzii utilizatorul este redirectionat catre pagina de payment.</p>
            </section>
            <section id="payment">
                <h3>
                    <span>2.7 </span>
                    Pagina de payment
                </h3>
                <p>
                    Pagina contine un formular de completare a datelor cardului utilizatorului, pentru a putea avea loc plata comenzii. Odata validate datele
                    comanda este plasata cu succes. Utilizatorul este redirectionat catre pagina de finalizare a comenzii unde i se afiseaza un mesaj de confirmare.
                    Ulterior, acesta va primi un mail cu datele comenzii.
                </p>
            </section>
            <section id="footer">
                <h3>
                    <span>2.8 </span>
                    Footer
                </h3>
                <p>Footer-ul este sectionat in 3 parti.</p>
                <p>Partea stanga a footer-ului contine logo-ul si numele site-ului , precum si 3 butoane functionale
                    <ul>
                        <li>Acasa : de redirectionare catre pagina principala aplicatiei</li>
                        <li>Livrare si servicii : de redirectionare catre o pagina care ofera detalii cu privire la serviciile oferite de magazinul Impressed precum si conditiile de livrare</li>
                        <li>Contact : de redirectionare catre o pagina unde se regaseste un formular, care va fi trimis ulterior magazinului</li>
                    </ul>
                </p>
                <p>Partea centrala a footer-ului contine informatii precum adresa magazinului, numarul de telefon si adresa de email de contact.</p>
                <p>Partea dreapta contine logo-urile retelelor de socializare, unde poate fi urmarita activitatea magazinului Impressed.</p>
            </section>
    </article>
</body>
<footer>

    <?php
    require 'footer.php';
    ?>

</footer>

</html>