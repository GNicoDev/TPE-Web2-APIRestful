<?php
include_once 'config.php';

class Reservation
{
    private $db;

    function __construct()
    {
        $this->db = $this->getConection();
    }


    private function getConection()
    {
            return new PDO("mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DB . ";charset=utf8", MYSQL_USER, MYSQL_PASS);
    }

    function getAllReservations()
    {

            $query = $this->db->prepare('SELECT * FROM reservas');
            $query->execute();

            $books = $query->fetchAll(PDO::FETCH_OBJ);
            return $books;
        
    }

    function getReservationById($id)
    {

            $query = $this->db->prepare('SELECT * FROM reservas WHERE id = ?');
            $query->execute([$id]);

            $book = $query->fetch(PDO::FETCH_OBJ);
            return $book;
 
    }

    function getReservationsByVehicle($id)
    {
            $query = $this->db->prepare('SELECT * FROM reservas WHERE id_vehiculo = ?');
            $query->execute([$id]);

            $books = $query->fetchAll(PDO::FETCH_OBJ);
            return $books;
    }


    function deleteReservationById($id)
    {

        $query = $this->db->prepare('DELETE FROM reservas WHERE id = ?');
        $query->execute([$id]);
    }

    function new($fecha, $cantDias, $idVehiculo)
    {

        $query = $this->db->prepare('INSERT INTO reservas(fecha_reserva,cant_dias,id_vehiculo) VALUES (?,?,?)');
        $query->execute([$fecha, $cantDias, $idVehiculo]);
    }

    function updateReservation($id, $fecha, $cantDias, $idVehiculo)
    {

        $query = $this->db->prepare("UPDATE reservas SET  fecha_reserva = ?, cant_dias = ?, id_vehiculo = ? WHERE id = ?");
        $query->execute([$fecha, $cantDias, $idVehiculo, $id]);
        $book = $this->getReservationById($id);
        return $book;
    }
}
