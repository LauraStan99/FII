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
    <header>
        <h1>Impressed</h1>
        <p class="subtitlu">Ghid de utilizare</p>
      
    </header>

    <div role="contentinfo">
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
            Abstract
        </h2>

        <p>
            Impressed este o aplicatie Web care gestioneaza colectii de imbracaminte destinate copiilor, femeilor si barbatilor.
            Aplicatia ofera pentru useri suport de cumparare a produselor site-ului. Adminii au posibilitatea de a administra produsele,
            utilizatorii si a vizualiza diverse ce pot fi exportate in formate deschise CSV si PDF. Pe pagina principala, se va regasi un
            clasament al celor mai populare produse, disponibil si ca flux de date RSS.
        </p>
    </section>

    <section id="app-guide" role="doc-app-guide">
        <h2>
            <span>2. </span>
            Flow-ul aplicatiei si continut
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
                Partea stanga contine logo-ul si numele aplicatiei care odata accesate te redirectioneaza pe pagina principala a aplicatiei.
            </p>
            <p>Partea centrala contine un mesaj informativ despre livrarea comenzilor si anume costul livrarii estegratuit daca valoarea comenzii este mai mare sau egala cu 350 de lei.
            </p>
            <p>Partea dreapta contine 3 iconite functionale.
                <ul>
                    <li>
                        Iconita de ACCOUNT. Exista 3 cazuri de functionalitate a acesteia:
                        <ol>
                            <li>
                                Daca utilizatorul nu este logat acesta va fi redirectionat catre pagina de logare. Daca utilizatorul are un cont , acesta
                                se poate loga, altfel are posibilitatea de a-si crea un cont pe platforma aplicatiei.
                            </li>
                            <li>
                                Daca utilizatorul este logat si este un utilizator obisnuit, acesta va fi redirectionat catre pagina de account, unde va
                                avea posibilitatea de a accesa 3 butone.
                                <ul>
                                    <li>
                                        Schimba date personale : utilizatorul isi poate vizualiza datele actuale ale contului si daca va dori, le va putea schimba.
                                    </li>
                                    <li>
                                        Istoric comenzi : utilizatorul poate vizualiza toate lista de comenzi efectuate, cu posibilitatea de a vedea si detaliile unei anumite comenzi.
                                    </li>
                                    <li>
                                        Deconecteaza-te : utilizatorul va fi deconectat de la aplicatie
                                    </li>
                                </ul>
                            </li>
                            <li> Daca utilizatorul este logat si este administrator al aplicatiei, acesta va fi redirectionat pe pagina de account, unde poate
                                vizualiza statistici , administra produse si utilizatori.

                                <ul>
                                    <li>
                                        Administrare utilizatori : are un buton de VEZI UTILIZATORI care permite vizualizarea listei de utilizatori obisnuiti ai aplicatiei
                                        cu posibilitatea de a-i sterge
                                    </li>
                                    <li>
                                        Administrare produse:
                                        <ol>
                                            <li>
                                                Sterge produs : administratorul poate cauta un produs dupa id-ul introdus, daca exista el poate fi sters.
                                            </li>
                                            <li>
                                                Modifica produs : trimite administratorul catre un formular de editare a datelor pentru produsul cautat dupa id.
                                            </li>
                                            <li>
                                                Adauga produs : trimite administratorul catre formularul de adaugare al unui produs in aplicatie.
                                            </li>
                                            <li>
                                                Vezi produse : administratorului ii este afisata lista cu produse , avand posibilitatea de a sterge oricare produs.
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
                                Daca utilizatorul nu este logat i se va deschide un modal cu mesajul : "Trebuie sa fiti logat pentru a vizualiza produsele favorite!".
                            </li>
                            <li>
                                Daca utilizatorul este logat i se afiseaza lista cu produsele favorite. Utilizatorul poate sterge un produs dinlista de favorita sau il
                                poate adauga in cos .
                            </li>
                        </ol>
                    </li>
                    <li>
                        Iconita de COS
                        <ol>
                            <li>
                                Daca utilizatorul nu este logat i se va deschide un modal cu mesajul : "Trebuie sa fiti logat pentru a adauga produse in cos!".
                            </li>
                            <li>
                                Daca utilizatorul este logat i se va afisa un tabel cu produsele adaugate in cos. Fiecarui produs i se poate modifica cantitatea si poate fi sters din cos.
                                Daca utilizatorul este hotarat sa finalizeze comanda acesta poate folosi butonul de "catre finalizare" care il redirectioneaza pe pagina de checkout. De asemenea
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
                NavBar
            </h3>
            <p>
                Bara de navigare este prezenta pe orice pagina a site-ului. Utilizatorul poate alege din butoanele : FEMEI, BARBATI, COPII si INFORMATII.
                Primele 3 vor oferi utilizatorului subcategorii de produse aferente butonului ales si il vor redirectiona catre o pagina in care sunt listate
                produsele din categoria si subcategoria aleasa. Butonul de INFORMATII ofera 3 optiuni : ghidul de utilizare al aplicatiei , progresul de creare a acesteia
                si documentatia.

            </p>
            <p>
                Bara de navigare contine si o sectiune de cautare prin toate produsele aplicatiei, in functie de criteriul introdus de catre utilizator.
            </p>
        </section>
        <section id="pagina-principala">
            <h3>
                <span>2.3 </span>
                Pagina Principala
            </h3>
            <p>
                Pagina principala contine un carusel cu imagini care pot redirectiona utilizatorul catre o subcategorie de produse din aplicatie.
                Mai mult poate fi vizualizat clasamentul celor mai populare 10 produse care poate fi deschis si ca flux de date RSS.
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
                Odata aleasa subcateroria din bara de navigare utilizatorul este redirectionat catre o pagina unde sunt listate produsele aferente.
                In stanga paginii se afla o lista de filtre care odata alese si aplicate, listeaza produsele filtrare dupa preferinte.
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
            <p>Pe pagina unui produs vor putea fi gasite informatii precum :
                <ul>
                    <li>imaginea produsului</li>
                    <li>denumire </li>
                    <li>pret</li>
                    <li>stoc total sau in functie de marime</li>
                    <li>culoare</li>
                    <li>descriere</li>
                    <li>material</li>
                </ul>
            </p>
            <p>Mai mult pe aceasta pagina utilizatorul poate alege o marime disponibila si poate adauga produsul in cos sau in lista de favorite .
                De asemenea , daca utilizatorul este administrator,pagina va avea un buton in plus, care va putea sterge produsul din aplicatie.
            </p>
        </section>
        <section id="checkout">
            <h3>
                <span>2.6 </span>
                Pagina de checkout
            </h3>
            <p>
                Pagina de checkout contine un formular de plasare a comenzii, unde trebuie completate datele personale, adresa de livrare, metoda de livrare si plata.
                De asemenea in partea dreapta a paginii exista un rezumat al comenzii care listeaza maxim 5 produse din comanda.
            </p>
            <p>Daca metoda de plata este ramburs, odata plasata comanda el este redirectionat pe pagina de finalizare comanda unde i se afiseaza un mesaj de confirmare
                si va primi un mail cu datele comenzii.
            </p>
            <p>Daca metoda de plata este online cu card bancar, dupa plasarea comenzii utilizatorul este redirectionat catre pagina de payment</p>
        </section>
        <section id="payment">
            <h3>
                <span>2.7 </span>
                Pagina de payment
            </h3>
            <p>Pagina contine un formular de completare a datelor cardului utilizatorului , pentru a putea avea loc plata comenzii.Odata validate datele
                comanda este plasata cu succes. Odata plasata comanda el este redirectionat pe pagina de finalizare comanda unde i se afiseaza un mesaj de confirmare
                si va primi un mail cu datele comenzii.
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
            <p>Partea centrala a footer-ului contine informatii precum adresa magazinului , numarul de telefon si adresa de email de contact.</p>
            <p>Partea dreapta contine logo-urile retelelor de socializare unde poate fi urmarita activitatea magazinului Impressed.</p>
        </section>
</body>

</html>