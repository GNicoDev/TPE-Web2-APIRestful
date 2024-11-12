<?php

class User
{
    private $db;

    function __construct(){
        $this->db = $this->getConection();
    }


    private function getConection()
    {
        try {
            return new PDO("mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DB . ";charset=utf8", MYSQL_USER, MYSQL_PASS);
        } catch (PDOException $pe) {
            echo "No fue posible conectar con la base de datos. $pe";
        }
    }


    function getUserById($id)
    {

            $query = $this->db->prepare('SELECT * FROM usuarios WHERE id = ?');
            $query->execute([$id]);

            $user = $query->fetch(PDO::FETCH_OBJ);
            return $user;

    }

    function getUserByEmail($email)
    {
            $db = $this->getConection();

            $query = $db->prepare('SELECT * FROM usuarios WHERE email = ?');
            $query->execute([$email]);

            $user = $query->fetch(PDO::FETCH_OBJ);
            return $user;

    }

}