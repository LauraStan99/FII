<?php

class Database extends PDO
{
    public  $con;

    /**
     * fac conexiunea cu baza de date
     * elementele necesare conexiunii sunt definite in config.php
     */
    public function __construct()
    {
        $this->con = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        if (!$this->con) {
            echo 'Eroare la conexiunea cu baza de date';
            die();
        }
    }

    /** INSERT **/

    /**
     * inserez intr-o tabela data ca parametru un array de elemente de tip cheie-valoare
     */
    public function insert($table_name, $data)
    {
        $string = "INSERT INTO " . $table_name . " (";
        $string .= implode(",", array_keys($data)) . ') VALUES (';
        $string .= "'" . implode("','", array_values($data)) . "')";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return true;
        else return false;
    }

    /** DELETE **/

    /**
     * sterg toate campurile din tabela data ca parametru
     */
    public function deleteAll($table_name)
    {
        $string = "DELETE FROM " . $table_name;
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return true;
        else return false;
    }

    /**
     * sterge toate liniile dintr-o tabela data ca parametru
     * care indeplinesc o conditie
     * coloana data ca parametru sa aiba valoarea data ca parametru
     */
    public function delete1($table_name, $col, $data)
    {

        $string = "DELETE FROM " . $table_name . " WHERE " . $col . "= ? ";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute([$data])) return true;
        else return false;
    }

    /**
     * sterge toate liniile dintr-o tabela data ca parametru
     * care indeplinesc o conditie
     * cele 2 coloane date ca parametru sa aiba valoarile date ca parametru
     */
    public function delete2($table_name, $col1, $data1, $col2, $data2)
    {
        $string = "DELETE FROM " . $table_name . " WHERE " . $col1 . "= ? and " . $col2 . "= ?";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute([$data1, $data2])) return true;
        else return false;
    }

    /**
     * sterge toate liniile dintr-o tabela data ca parametru
     * care indeplinesc o conditie
     * cele 3 coloane date ca parametru sa aiba valoarile date ca parametru
     */
    public function delete3($table_name, $col1, $data1, $col2, $data2, $col3, $data3)
    {
        $string = "DELETE FROM " . $table_name . " WHERE " . $col1 . "= ? and " . $col2 . "= ? and " . $col3 . "= ?";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute([$data1, $data2, $data3])) return true;
        else return false;
    }

    /** UPDATE **/

    /**
     * updatez o tabela data ca parametru
     * setand o noua valoare la o anumita coloana
     * pt toate liniile care indeplinesc o coditie
     * coloana data ca parametru sa aiba valoarea data ca parametru
     * 
     */
    public function update($table_name, $col1, $data1, $col2, $data2)
    {
        $string = "UPDATE " . $table_name . " SET " . $col1 . " = ? WHERE " . $col2 . "= ? ";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute([$data1, $data2])) return true;
        else return false;
    }

    /**
     * updatez o tabela data ca parametru
     * setand o noua valoare la o anumita coloana
     * pt toate liniile care indeplinesc o coditie
     * cele 2 coloane date ca parametru sa aiba valoarile date ca parametru
     * 
     */
    public function update2($table_name, $col1, $data1, $col2, $data2, $col3, $data3)
    {
        $string = "UPDATE " . $table_name . " SET " . $col1 . " = ? WHERE " . $col2 . "= ? AND " . $col3 . "= ?";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute([$data1, $data2, $data3])) return true;
        else return false;
    }

    /**
     * updatez o tabela data ca parametru
     * setand o noua valoare la o anumita coloana
     * pt toate liniile care indeplinesc o coditie
     * cele 3 coloane date ca parametru sa aiba valoarile date ca parametru
     * 
     */
    public function update3($table_name, $col1, $data1, $col2, $data2, $col3, $data3, $col4, $data4, $col5, $data5)
    {
        $string = "UPDATE " . $table_name . " SET " . $col1 . " ='" . $data1 . "' , " . $col2 . " ='" . $data2 . "' WHERE " . $col3 . "='" . $data3 . "' AND " . $col4 . "='" . $data4 . "' AND " . $col5 . "='" . $data5 . "'";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return true;
        else return false;
    }

    /**
     * updatez o tabela data ca parametru
     * setand o noua valoare la o anumita coloana prin micsorarea valorii din acel camp cu o valoare data ca parametru
     * pt toate liniile care indeplinesc o coditie
     * cele 2 coloane date ca parametru sa aiba valoarile date ca parametru
     */
    public function updateSetNew($table_name, $col1, $data1, $col2, $data2, $col3, $data3)
    {
        $string = "UPDATE " . $table_name . " SET " . $col1 . " =" . $col1 . "-" . $data1 . " WHERE " . $col2 . "= ? AND " . $col3 . "= ?";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute([$data2, $data3])) return true;
        else return false;
    }

    /** SELECT **/

    /**
     * selectez toate liniile dintr-o tabela data ca parametru
     */
    public function selectAll($table_name)
    {
        $string = "SELECT * FROM " . $table_name;
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }

    /**
     * selectez data calendaristica a sistemului
     */
    public function selectDate()
    {
        $string = "SELECT sysdate()";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }

    /**
     * selectez toate liniile dintr-o tabela data ca parametru
     * care indeplinesc urmatoarea conditia
     * coloana data ca parametru sa aiba valoarea data ca parametru
     */
    public function select1($table_name, $col, $data)
    {
        $string = "SELECT * FROM " . $table_name . " WHERE " . $col . " = ? ";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute([$data])) return $stmt;
        else return false;
    }

    /**
     * selectez toate liniile dintr-o tabela data ca parametru
     * care indeplinesc urmatoarea conditia
     * cele 2 coloane date ca parametru sa aiba valoarile date ca parametru
     */
    public function select2($table_name, $col1, $data1, $col2, $data2)
    {

        $string = "SELECT * FROM " . $table_name . " WHERE " . $col1 . "= ? and " . $col2 . "= ?";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute([$data1, $data2])) return $stmt;
        else return false;
    }

    /**
     * selectez toate liniile dintr-o tabela data ca parametru
     * care indeplinesc urmatoarea conditia
     * cele 3 coloane date ca parametru sa aiba valoarile date ca parametru
     */
    public function select3($table_name, $col1, $data1, $col2, $data2, $col3, $data3)
    {

        $string = "SELECT * FROM " . $table_name . " WHERE " . $col1 . "= ? and " . $col2 . "= ? and " . $col3 . "= ?";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute([$data1, $data2, $data3])) return $stmt;
        else return false;
    }

    /**
     * selectez toate liniile dintr-o tabela data ca parametru
     * care indeplinesc urmatoarea conditia
     * cele 6 coloane date ca parametru sa aiba valoarile date ca parametru
     */
    public function select6($table_name, $col1, $data1, $col2, $data2, $col3, $data3, $col4, $data4, $col5, $data5, $col6, $data6)
    {
        $string = "SELECT * FROM  " . $table_name . " WHERE " . $col1 . " = " . $data1 . " and " . $col2 . " = " . $data2 . " and " . $col3 . " = " . $data3 . " and " . $col4 . " = " . $data4 . " and " . $col5 . " = " . $data5 . " and " . $col6 . " between " . $data6;
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }


    public function selectJoin($table_name1, $table_name2, $col1, $col2, $col3, $data)
    {
        $string = "SELECT * FROM " . $table_name1 . " JOIN " . $table_name2 . " ON " . $table_name1 . "." . $col1 . "=" . $table_name2 . "." . $col2 . " WHERE " . $table_name1 . "." . $col3 . "='" . $data . "'";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }

    public function selectJoinLimit($table_name1, $table_name2, $col1, $col2, $col3, $data)
    {
        $string = "SELECT * FROM " . $table_name1 . " JOIN " . $table_name2 . " ON " . $table_name1 . "." . $col1 . "=" . $table_name2 . "." . $col2 . " WHERE " . $table_name1 . "." . $col3 . "='" . $data . "' LIMIT 5";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }


    public function selectJoin2($table_name1, $table_name2, $col1, $col2, $col3, $data1, $col4, $data2)
    {
        $string = "SELECT * FROM " . $table_name1 . " JOIN " . $table_name2 . " ON " . $table_name1 . "." . $col1 . "=" . $table_name2 . "." . $col2 . " WHERE " . $table_name1 . "." . $col3 . "='" . $data1 . "' and " . $table_name1 . "." . $col4 . "='" . $data2 . "'";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }

    public function selectJoin7($table_name1, $table_name2, $col, $col1, $data1, $col2, $data2, $col3, $data3, $col4, $data4, $col5, $data5, $col6, $data6, $col7, $data7)
    {

        $string = "SELECT * FROM " . $table_name1 . " JOIN " . $table_name2 . " ON " . $table_name1 . "." . $col . " = " . $table_name2 . "." . $col . " where " . $col1 . " = " . $data1 . " and " . $col2 . " = " . $data2 . " and " . $col3 . " = " . $data3 . " and " . $col4 . " = " . $data4 . " and " . $col5 . " = " . $data5 . " and " . $col6 . " = " . $data6 . " and " . $col7 . " between " . $data7;
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }

    public function selectJoinGroupByWhere($table_name1, $table_name2, $col, $col1, $col2, $data2)
    {
        $string = "SELECT " . $col . ", count(*) as number FROM " . $table_name1 . " JOIN " . $table_name2 . " ON " . $table_name1 . "." . $col1 . " = " . $table_name2 . "." . $col1 . " WHERE " . $col2 . "='" . $data2 . "' GROUP BY " . $col;
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }

    public function selectCountSimple($table_name)
    {
        $string = "SELECT count(*) FROM " . $table_name;
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }

    public function selectCount($table_name, $col, $data)
    {
        $string = "SELECT count(*) FROM " . $table_name . " WHERE " . $col . "='" . $data . "'";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }

    public function selectCount3($table_name, $col1, $data1, $col2, $data2, $col3, $data3)
    {

        $string = "SELECT count(*) FROM " . $table_name . " WHERE " . $col1 . "='" . $data1 . "' and " . $col2 . "='" . $data2 . "' and " . $col3 . "='" . $data3 . "'";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }

    public function selectLimit($table_name, $start, $limit)
    {
        $string = "SELECT * FROM " . $table_name . " LIMIT " . $start . "," . $limit;
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }
/*
 *selecteaza toate liniile tabelului , ordonate dupa coloana specificata intr-un anumit sens ( asc/desc )
*/
    public function selectOrderBy($table_name, $order, $filter)
    {
        $string = "SELECT * FROM " . $table_name . " order by " . $order . " " . $filter;
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }
/**
 *selecteaza toate liniile tabelului , ordonate dupa coloana specificata intr-un anumit sens ( asc/desc )
 * unde celecoloana specificata respecta egalitatea cu data oferita printre parametrii functiei
 */
    public function selectOrderBy1($table_name, $col1, $data1, $order, $filter)
    {

        $string = "SELECT * FROM " . $table_name . " WHERE " . $col1 . "='" . $data1 . "' order by " . $order . " " . $filter;
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }
/**
 * selecteaza toate liniile tabelului , ordonate dupa coloana specificata intr-un anumit sens ( asc/desc )
 * unde cele 2 coloanele specificate respecta egalitatile cu datele oferite in parametrii functiei,
 * 
 */
    public function selectOrderBy2($table_name, $col1, $data1, $col2, $data2, $order, $filter)
    {

        $string = "SELECT * FROM " . $table_name . " WHERE " . $col1 . "='" . $data1 . "' and " . $col2 . "='" . $data2 . "' order by " . $order . " " . $filter;
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }
/**
 *  selelecteaza toate liniile permise de limita oferita ca parametru din tabelul specificat , 
 *  ordonate dupa coloana specificata intr-o anumita ordonare ( asc/desc )
 */
    public function selectOrderByLimit($table_name, $col, $filter, $limit)
    {

        $string = "SELECT * FROM " . $table_name . " order by " . $col . " " . $filter . " limit " . $limit;
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }
/**
 * selelecteaza toate liniile permise de limita oferita ca parametru din tabelul specificat , 
 * ordonate dupa coloana specificata intr-o anumita ordonare ( asc/desc )
 * fiecare linie avand valorile celor 2 coloane specificate ,
 */
    public function selectOrderBy1Limit($table_name, $col1, $col2, $col3, $filter, $limit)
    {

        $string = "SELECT " . $col1 . "," . $col2 . " FROM " . $table_name . " order by " . $col3 . " " . $filter . " limit " . $limit;
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }
/**
 * selecteaza toate liniile tabelului specificat incepand de la pragul de start pana la cel final ,
 * ordonate dupa o anumita coloana ($order),avand o anumita ordonare($filter = asc/desc ) 
 */
    public function selectOrderByLimit2($table_name, $order, $filter, $start_from, $limit)
    {
        $string = "SELECT * FROM " . $table_name . " order by " . $order . " " . $filter . " LIMIT " . $start_from . "," . $limit;
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }

/**
 * selecteaza toate inregistrarile (liniile) din tabela specificata , 
 * unde valorile celor 6 coloane pot indeplini anumite conditii (de a fi egale cu valoarea oferita ca si parametru , 
 * data din parametru sa se regaseasca in valoarea coloanei )
 */
    public function selectSearch6($table_name, $data, $col1, $col2, $col3, $col4, $col5, $col6)
    {
        $string = "SELECT * FROM  " . $table_name . " WHERE " . $col1 . " LIKE '%" . $data . "%' or " . $col2 . " = '" . $data . "' or " . $col3 . " LIKE '%" . $data . "%' or " . $col4 . " = '" . $data . "' or " . $col5 . " = '" . $data . "' or " . $col6 . " = '" . $data . "'";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }
/**
 * selecteaza toate inregistrarile (liniile) din tabela specificata , 
 * unde valorile celor 6 coloane pot indeplini anumite conditii (de a fi egale cu valoarea oferita ca si parametru , 
 * data din parametru sa se regaseasca in valoarea coloanei ),
 * inregistrarile returnate fiind limitate , avand o prag de start si unul de final.
 */
    public function selectSearch6Limit($table_name, $data, $col1, $col2, $col3, $col4, $col5, $col6, $start_from, $limit)
    {
        $string = "SELECT * FROM  " . $table_name . " WHERE " . $col1 . " LIKE '%" . $data . "%' or " . $col2 . " = '" . $data . "' or " . $col3 . " LIKE '%" . $data . "%' or " . $col4 . " = '" . $data . "' or " . $col5 . " = '" . $data . "' or " . $col6 . " = '" . $data . "' LIMIT " . $start_from . "," . $limit;
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }
  /**
  *selecteaza o anumita coloana si numarul de aparitii din tabela specificata ca parametru,  grupate dupa coloana
  */
    public function selectGroupBy($table_name, $col)
    {
        $string = "SELECT " . $col . ",count(*) as number FROM " . $table_name . " GROUP BY " . $col;
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }
    /**
     *selecteaza toate liniile din tabela data ca si parametru ,
     *unde valoarea coloanei mentionate se incadreaza in valorile array-ului dat ca si parametru
     */

    public function selectByArray($table_name, $col, $data)
    {
        $string = "SELECT * FROM " . $table_name . " WHERE " . $col . " IN";
        $string .= "(" . implode(",", array_values($data)) . ")";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }
}
