<?php
class Home_model extends Model
{
    public function createXML()
    {
        $result = $this->db->selectOrderByLimit('produse','nr_accesari', 'desc', 10);

        $xml = new DOMDocument("1.0");
        $xml->formatOutput = true;

        $channel = $xml->createElement("channel");
        $xml->appendChild($channel);

        $title = $xml->createElement('title', 'Impressed');
        $channel->appendChild($title);
        $link = $xml->createElement('link', 'http://localhost:82/FII/home');
        $channel->appendChild($link);
        $description = $xml->createElement('description', 'Magazin online');
        $channel->appendChild($description);

        while ($row = $result->fetch()) {

            $item = $xml->createElement('item');
            $channel->appendChild($item);

            $title = $xml->createElement('title', $row['nume']);
            $item->appendChild($title);

            $link = $xml->createElement('link', "http://localhost:82/FII/produse/produs/" . $row['id_produs']);
            $item->appendChild($link);

            $description = $xml->createElement('description', $row['descriere']);
            $item->appendChild($description);
        }
        $xml->save("popularitate.xml");
    }
    public function getPopularProducts()
    {
     return $this->db->selectOrderByLimit('produse','nr_accesari', 'desc', 10);
    }

}
