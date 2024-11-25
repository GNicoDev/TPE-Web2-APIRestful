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

    function getReservationByDate($date)
    {

            $query = $this->db->prepare('SELECT * FROM reservas WHERE fecha_reserva = ?');
            $query->execute([$date]);

            $books = $query->fetchAll(PDO::FETCH_OBJ);
            return $books;
 
    }

    function getReservationsByVehicle($id)
    {
            $query = $this->db->prepare('SELECT * FROM reservas WHERE id_vehiculo = ?');
            $query->execute([$id]);

            $books = $query->fetchAll(PDO::FETCH_OBJ);
            return $books;
    }


    function deleteReservaction($id)
    {

        $query = $this->db->prepare('DELETE FROM reservas WHERE id = ?');
        $query->execute([$id]);
    }

    function createReservation($date, $daysCount, $idVehicle)
    {

        $query = $this->db->prepare('INSERT INTO reservas(fecha_reserva,cant_dias,id_vehiculo) VALUES (?,?,?)');
        $query->execute([$date, $daysCount, $idVehicle]);
        
        $id = $this->db->lastInsertId();
        return $this->getReservationById($id);
    }

    function updateReservation($id, $date, $daysCount, $idVehicle)
    {

        $query = $this->db->prepare("UPDATE reservas SET  fecha_reserva = ?, cant_dias = ?, id_vehiculo = ? WHERE id = ?");
        $query->execute([$date, $daysCount, $idVehicle, $id]);
        $book = $this->getReservationById($id);
        return $book;
    }
}
