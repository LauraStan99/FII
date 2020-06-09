<?php


class Cart extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * randez pagina cosului de cumparaturi
     * daca se apasa butonul de stergere, sterg produsul respectiv din cos
     * daca se apasa pe '+' cantitatea produsului respectiv va creste, respectiv
     * daca se apasa pe '-' cantitatea produsului va scadea cu o unitate
     * daca cantitatea produsului e 1 si utilizatorul incearca sa o stearga, produsul va fi sters din cos
     * in functie de nr-ul de produse din cos ale utilizatorului logat, randez o anumita pagina
     * daca cosul este gol, se randeaza pagina cartEmpty
     * altfel, se randeaza pagina cartFull
     */
    public function index()
    {
        $cart = new Cart_model();
        $buton = new Butoane_model();
        $count = $buton->countProductsCart();
        $this->view->result = $cart->selectCartProducts();
        
        if (isset($_POST['x-sterge'])) {
            if (isset($_GET['id']) && isset($_GET['marime'])) {
                $buton->deleteFromCart($_GET['id'], $_GET['marime']);
                    header('location: ' . URL . 'cart');
            }
        }

        if (isset($_POST['buttonPlus'])) {
            if (isset($_GET['id']) && isset($_GET['marime'])) {
               if($buton->addQuantity($_GET['id'], $_GET['marime']) == false){
                   $this->view->message = "Numarul de produse pe care il doriti nu este suficient";
               }
               header('location: ' . URL . 'cart');
            }
        }
        if (isset($_POST['buttonMinus'])) {
            if (isset($_GET['id']) && isset($_GET['marime'])) {
               $quantity = $buton->getQuantity($_GET['id'], $_GET['marime']);
               if($quantity == 1){
                $buton->deleteFromCart($_GET['id'], $_GET['marime']);
               }
               $buton->subtractQuantity($_GET['id'], $_GET['marime']);
               header('location: ' . URL . 'cart');
            }
        }
        if ($count > 0) {
            $totalPrice = $cart->selectCartTotalPrice();
            $this->view->totalPrice = $totalPrice;
            if($this->view->totalPrice >= 350){
                $this->view->livrare = 0;
            }
            else{
                $this->view->livrare = 20;
            }
            $this->view->render('cartFull');
        } else {
            $this->view->render('cartEmpty');
        }
    }

    /**
     * functie care este accesata in momentul in care utilizatorul acceaseaza
     * butonul plaseaza comanda
     * in acest moment, toate produsele din cos sunt adaugate in tabela produse_comanda
     * stabilind astfel si id-ul posibilei comenzi respective
     */
    public function addCommand(){

        $cart = new Cart_model();
        $cart->addToCommand();
        $id_comanda = $cart->selectIdComanda();
        header('location: ' . URL . 'checkout?id_comanda='.$id_comanda);
    }
}
