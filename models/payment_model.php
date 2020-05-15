<?php
class Payment_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function changeOrderStatus($id_comanda)
    {
        if (!isset($_SESSION))
        {
            session_start();
        }
        $id = Session::get('id_utilizator');
        return $result = $this->db->update2('comanda', 'status_comanda', 'inregistrata', 'id_utilizator', $id, 'id_comanda', $id_comanda);
    }
}
?>