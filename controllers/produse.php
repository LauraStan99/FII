<?php

class Produse extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }
/**
 * functia este destinata filtrului de pe pagina produselor ,
 * in momentul in care au fost bifate unul sau mai multe filtre de catre utilizator , '
 * dupa apasarea butonului de aplica , toate datele sunt adaugate in URL
*/

    public function filtreaza($gen, $categorie)
    {
        if (!empty($_POST['marime'])) {
            $marime = "'" . $_POST['marime'] . "'";
        } else {
            $marime = 'false';
        }

        if (!empty($_POST['culoare'])) {
            $culoare = "'" . $_POST['culoare'] . "'";
        } else {
            $culoare = 'false';
        }

        if (!empty($_POST['material'])) {
            $material = "'" . $_POST['material'] . "'";
        } else {
            $material = 'false';
        }

        if (!empty($_POST['tip'])) {
            $tip = "'" . $_POST['tip'] . "'";
        } else {
            $tip = 'false';
        }

        if (!empty($_POST['pret'])) {
            $prices = explode(",", $_POST['pret']);
            $pret1 = $prices[0];
            $pret2 = $prices[1];
        } else {
            $pret1 = 1;
            $pret2 = 1500;
        }


        header('location: ' . URL . 'produse/' . $gen . '/' . $categorie . '?marime=' . $marime . '&culoare=' . $culoare . '&material=' . $material . '&tip=' . $tip . '&pret1=' . $pret1 . '&pret2=' . $pret2);
    }
/**
 * se randeaza pagina produselor in care sunt introduse toate produsele preluate din baza de date care corespund subcategoriei alese din categoria femei, 
 * sau toate produsele preluate din baza de date dupa aplicarea filtrelor introduse de utilizator
 * In cazul in care utilizatorul doreste sa ordoneze produsele afisate se apeleaza functia de ordonare corespunzatoare optiunii de sortare aleasa
 */
    public function femei($category)
    {
        $this->view->category = $category;
        $product = new produse_model();
        $this->view->category = $category;
        if (isset($_GET['pret1']) && isset($_GET['pret2']) && isset($_GET['marime']) && isset($_GET['culoare']) && isset($_GET['material']) && isset($_GET['tip'])) {

            if ($_GET['marime'] == 'false') {

                $this->view->result = $product->selectByFilterWithoutSize("'" . $category . "'", $_GET['material'], $_GET['tip'], "'femei'", $_GET['culoare'], $_GET['pret1'] . " and " . $_GET['pret2'], $this->view->count);
            } else {
                $this->view->result = $product->selectByFilter("'" . $category . "'", $_GET['material'], $_GET['marime'], $_GET['tip'], "'femei'", $_GET['culoare'], $_GET['pret1'] . " and " . $_GET['pret2'], $this->view->count);
            }
        } else {
            $this->view->result = $product->selectWomanCategory($category, $this->view->count);
        }
        if (isset($_POST['popularitate'])) {
            $this->view->result =  $product->selectOrder('femei', $category, 'nr_accesari', 'desc', $this->view->result, $this->view->count);
        }
        if (isset($_POST['alfabetic'])) {
            $this->view->result =  $product->selectOrder('femei', $category, 'nume', 'asc', $this->view->result, $this->view->count);
        }
        if (isset($_POST['crescator'])) {
            $this->view->result =  $product->selectOrder('femei', $category, 'pret', 'asc', $this->view->result, $this->view->count);
        }
        if (isset($_POST['descrescator'])) {
            $this->view->result =  $product->selectOrder('femei', $category, 'pret', 'desc', $this->view->result, $this->view->count);
        }
        $product->deleteFromProduse_filter_order();

        $this->view->render('womenProducts');
    }
/**
 * se randeaza pagina produselor in care sunt introduse toate produsele preluate din baza de date care corespund subcategoriei alese din categoria barbati, 
 * sau toate produsele preluate din baza de date dupa aplicarea filtrelor introduse de utilizator
 * In cazul in care utilizatorul doreste sa ordoneze produsele afisate se apeleaza functia de ordonare corespunzatoare optiunii de sortare aleasa
 */
    public function barbati($category)
    {
        $this->view->category = $category;
        $product = new produse_model();
        $this->view->category = $category;
        if (isset($_GET['pret1']) && isset($_GET['pret2']) && isset($_GET['marime']) && isset($_GET['culoare']) && isset($_GET['material']) && isset($_GET['tip'])) {

            if ($_GET['marime'] == 'false') {

                $this->view->result = $product->selectByFilterWithoutSize("'" . $category . "'", $_GET['material'], $_GET['tip'], "'barbati'", $_GET['culoare'], $_GET['pret1'] . " and " . $_GET['pret2'], $this->view->count);
            } else {
                $this->view->result = $product->selectByFilter("'" . $category . "'", $_GET['material'], $_GET['marime'], $_GET['tip'], "'barbati'", $_GET['culoare'], $_GET['pret1'] . " and " . $_GET['pret2'], $this->view->count);
            }
        } else {
            $this->view->result = $product->selectManCategory($category, $this->view->count);
        }
        if (isset($_POST['popularitate'])) {
            $this->view->result =  $product->selectOrder('barbati', $category, 'nr_accesari', 'desc', $this->view->result, $this->view->count);
        }
        if (isset($_POST['alfabetic'])) {
            $this->view->result =  $product->selectOrder('barbati', $category, 'nume', 'asc', $this->view->result, $this->view->count);
        }
        if (isset($_POST['crescator'])) {
            $this->view->result =  $product->selectOrder('barbati', $category, 'pret', 'asc', $this->view->result, $this->view->count);
        }
        if (isset($_POST['descrescator'])) {
            $this->view->result =  $product->selectOrder('barbati', $category, 'pret', 'desc', $this->view->result, $this->view->count);
        }
        $product->deleteFromProduse_filter_order();
        $this->view->render('menProducts');
    }
/**
 * se randeaza pagina produselor in care sunt introduse toate produsele preluate din baza de date care corespund subcategoriei alese din categoria copii, 
 * sau toate produsele preluate din baza de date dupa aplicarea filtrelor introduse de utilizator
 * In cazul in care utilizatorul doreste sa ordoneze produsele afisate se apeleaza functia de ordonare corespunzatoare optiunii de sortare aleasa
 */
    public function copii($category)
    {
        $this->view->category = $category;
        $product = new produse_model();
        $this->view->category = $category;
        if (isset($_GET['pret1']) && isset($_GET['pret2']) && isset($_GET['marime']) && isset($_GET['culoare']) && isset($_GET['material']) && isset($_GET['tip'])) {

            if ($_GET['marime'] == 'false') {

                $this->view->result = $product->selectByFilterWithoutSize("'" . $category . "'", $_GET['material'], $_GET['tip'], "'copii'", $_GET['culoare'], $_GET['pret1'] . " and " . $_GET['pret2'], $this->view->count);
            } else {
                $this->view->result = $product->selectByFilter("'" . $category . "'", $_GET['material'], $_GET['marime'], $_GET['tip'], "'copii'", $_GET['culoare'], $_GET['pret1'] . " and " . $_GET['pret2'], $this->view->count);
            }
        } else {
            $this->view->result = $product->selectChildrenCategory($category, $this->view->count);
        }
        if (isset($_POST['popularitate'])) {
            $this->view->result =  $product->selectOrder('copii', $category, 'nr_accesari', 'desc', $this->view->result, $this->view->count);
        }
        if (isset($_POST['alfabetic'])) {
            $this->view->result =  $product->selectOrder('copii', $category, 'nume', 'asc', $this->view->result, $this->view->count);
        }
        if (isset($_POST['crescator'])) {
            $this->view->result =  $product->selectOrder('copii', $category, 'pret', 'asc', $this->view->result, $this->view->count);
        }
        if (isset($_POST['descrescator'])) {
            $this->view->result =  $product->selectOrder('copii', $category, 'pret', 'desc', $this->view->result, $this->view->count);
        }
        $product->deleteFromProduse_filter_order();
        $this->view->render('childrenProducts');
    }
/**
 * se randeaza pagina unui produs care va contine toate datele din baza de date cu privire la acel produs
 * exista butoane pentru fiecare marime , si odata actionate se schimba (pe front) numarul de produse disponibile in stock 
 * Butonul de adaugarea produsului in cos apeleaza functia addToCart care necesita ca parametri: id-u produsului si marimea(preluata 
 * de la butoanele de marime)
 * in cazul in care marimea nu este setata (nu se actioneaza butoanele de marime) se genereaza prima marime disponibila in stock
 * Daca este selectata o marime a carui stock s-a golit se preda catre front mesajul de eroare "Produsul cu marimea selectata nu este in stoc."
 * Exista si butonul de wishlist care odata actionat adauga produsul in tabela de favorite cu marimea selectata sau cu una generata automat.
 * In cazul in care produsul este deja in lista de favorite si se adauga din nou , se genereaza mesajul de eroare care este transmis pe front
 * 'Produsul cu marimea selectata este deja in wishlist.'
 */
    public function produs($id_product)
    {
        $product = new produse_model();
        $buton = new butoane_model();

        $this->view->result = $product->selectProduct($id_product);
        $this->view->stocXS =  $product->selectCountProduct($id_product, 'XS');
        $this->view->stocS =  $product->selectCountProduct($id_product, 'S');
        $this->view->stocM =  $product->selectCountProduct($id_product, 'M');
        $this->view->stocL =  $product->selectCountProduct($id_product, 'L');
        $this->view->stocXL =  $product->selectCountProduct($id_product, 'XL');
        $this->view->stocXXL =  $product->selectCountProduct($id_product, 'XXL');
        $this->view->stocTotal = $this->view->stocXS + $this->view->stocS + $this->view->stocM + $this->view->stocL + $this->view->stocXL + $this->view->stocXXL;

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['S'])) {
                header('location: ../produs/' . $id_product . '?size=S');
            } else if (isset($_POST['M'])) {
                header('location: ../produs/' . $id_product . '?size=M');
            } else if (isset($_POST['L'])) {
                header('location: ../produs/' . $id_product . '?size=L');
            } else if (isset($_POST['XL'])) {
                header('location: ../produs/' . $id_product . '?size=XL');
            } else if (isset($_POST['XXL'])) {
                header('location: ../produs/' . $id_product . '?size=XXL');
            } else if (isset($_POST['XS'])) {
                header('location: ../produs/' . $id_product . '?size=XS');
            }
            if (isset($_POST['adauga-cos'])) {
                if (isset($_GET['size'])) {
                    if ($buton->addToCart($id_product, $_GET['size']) == false) {
                        $this->view->message = 'Produsul cu marimea selectata nu este in stoc.';
                    }
                } else {
                    if ($buton->addToCart($id_product, 'XS') == false) {
                        if ($buton->addToCart($id_product, 'S') == false) {
                            if ($buton->addToCart($id_product, 'M') == false) {
                                if ($buton->addToCart($id_product, 'L') == false) {
                                    if ($buton->addToCart($id_product, 'XL') == false) {
                                        if ($buton->addToCart($id_product, 'XXL') == false) {
                                            $this->view->message = 'Produsul nu este in stoc.';
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            if (isset($_POST['adauga-favorite'])) {

                if (isset($_GET['size'])) {
                    if ($buton->addToWishlist($id_product, $_GET['size']) == false)
                        $this->view->message = 'Produsul cu marimea selectata este deja in wishlist.';
                } else {
                    if ($buton->addToWishlistSize($id_product, 'XS') == false) {
                        if ($buton->addToWishlistSize($id_product, 'S') == false) {
                            if ($buton->addToWishlistSize($id_product, 'M') == false) {
                                if ($buton->addToWishlistSize($id_product, 'L') == false) {
                                    if ($buton->addToWishlistSize($id_product, 'XL') == false) {
                                        if ($buton->addToWishlistSize($id_product, 'XXL') == false) {
                                            $this->view->message = 'Produsul nu este in stoc.';
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $nr_accesari = $product->nrAccesariCurente($id_product) + 1;
        $product->cresteNrAccesari($nr_accesari, $id_product);

        $this->view->render('productPage');
    }
/**
 *functie aplicata pe butonul de adugare in cos , pt produsele din categoria femei care sunt randate in urma 
 *cautarii/selectarii unei subcategorii/filtrari si se adauga ca si marime prima marime disponibila in stock portnins de la XS
 */
    public function addToCartWomenPage($id_product, $category)
    {

        $buton = new Butoane_model();
        if ($buton->addToCart($id_product, 'XS') == false) {
            if ($buton->addToCart($id_product, 'S') == false) {
                if ($buton->addToCart($id_product, 'M') == false) {
                    if ($buton->addToCart($id_product, 'L') == false) {
                        if ($buton->addToCart($id_product, 'XL') == false) {
                            if ($buton->addToCart($id_product, 'XXL') == false) {
                                $this->view->message = 'Produsul nu este in stoc.';
                            }
                        }
                    }
                }
            }
        }
        header('location: ' . URL . 'produse/femei/' . $category);
    }
/**
 *functie aplicata pe butonul de adugare in cos , pt produsele din categoria barbati care sunt randate in urma 
 *cautarii/selectarii unei subcategorii/filtrari si se adauga ca si marime prima marime disponibila in stock portnins de la XS
 */
    public function addToCartMenPage($id_product, $category)
    {

        $buton = new Butoane_model();
        if ($buton->addToCart($id_product, 'XS') == false) {
            if ($buton->addToCart($id_product, 'S') == false) {
                if ($buton->addToCart($id_product, 'M') == false) {
                    if ($buton->addToCart($id_product, 'L') == false) {
                        if ($buton->addToCart($id_product, 'XL') == false) {
                            if ($buton->addToCart($id_product, 'XXL') == false) {
                                $this->view->message = 'Produsul nu este in stoc.';
                            }
                        }
                    }
                }
            }
        }
        header('location: ' . URL . 'produse/barbati/' . $category);
    }
/**
 *functie aplicata pe butonul de adugare in cos , pt produsele din categoria copii care sunt randate in urma 
 *cautarii/selectarii unei subcategorii/filtrari si se adauga ca si marime prima marime disponibila in stock portnins de la XS
 */
    public function addToCartChildrenPage($id_product, $category)
    {

        $buton = new Butoane_model();
        if ($buton->addToCart($id_product, 'XS') == false) {
            if ($buton->addToCart($id_product, 'S') == false) {
                if ($buton->addToCart($id_product, 'M') == false) {
                    if ($buton->addToCart($id_product, 'L') == false) {
                        if ($buton->addToCart($id_product, 'XL') == false) {
                            if ($buton->addToCart($id_product, 'XXL') == false) {
                                $this->view->message = 'Produsul nu este in stoc.';
                            }
                        }
                    }
                }
            }
        }
        header('location: ' . URL . 'produse/copii/' . $category);
    }
/**
 * functie destinata paginii de administrare de produse care permite stergerea unui produs in functie de id_ul oferit ca si parametru
 */
    public function deleteProductAsAdmin($id_product, $gender, $category)
    {
        $product = new Produse_model();
        $product->deteleProduct($id_product);
        header('location:' . URL . 'produse/' . $gender . "/" . $category);
    }
}
