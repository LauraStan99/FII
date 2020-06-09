<?php
class Payment_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * functia face un update asupra coloanei de status din tabela "comanda" pentru utilizatorul cu id-ul preluat din sesiune
     */
    public function changeOrderStatus($orderId)
    {
        if (!isset($_SESSION)){
            session_start();
        }
        $id = SESSION::get('id_utilizator');
        return $this->db->update2('comanda', 'status_comanda', 'inregistrata', 'id_utilizator', $id, 'id_comanda', $orderId);
    }

    /**
     * functia sterge intregul cos de cumparaturi a utilizatorului logat , a carui id este preluat din sesiune
     */
    public function deleteCart(){
        if (!isset($_SESSION))
        {
            session_start();
        }
        $id = Session::get('id_utilizator');

        return $this->db->delete1('cos', 'id_utilizator', $id);
    }

}
?>