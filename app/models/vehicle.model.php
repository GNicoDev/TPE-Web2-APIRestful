<?php
include 'config.php';

class Vehicle
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

    function getAllVehicles($OrderBy)
    {       
        $sql = 'SELECT * FROM vehiculos';
        if ($OrderBy){
            switch($OrderBy){
               case 'year' : $sql .= ' ORDER BY modelo'; break;
               case 'brand' : $sql .= ' ORDER BY marca'; break;
               case 'price' : $sql .= ' ORDER BY precio_dia'; break;
            }
        }
        $query = $this->db->prepare($sql);
        $query->execute();

        $vehicles = $query->fetchAll(PDO::FETCH_OBJ);
        return $vehicles;

    }

    function getVehicleById($id)
    {
            $query = $this->db->prepare('SELECT * FROM vehiculos WHERE id = ?');
            $query->execute([$id]);

            $vehicle = $query->fetch(PDO::FETCH_OBJ);
            return $vehicle;

    }

    function getVehiclesByYear($year)
    {
            $query = $this->db->prepare('SELECT * FROM vehiculos WHERE modelo = ?');
            $query->execute([$year]);

            $vehicles = $query->fetchAll(PDO::FETCH_OBJ);
            return $vehicles;
    }


    function deleteVehicleById($id)
    {

        $query = $this->db->prepare('DELETE FROM vehiculos WHERE id = ?');
        $query->execute([$id]);
    }

    function createVehicle($brand, $year, $licensePlate, $price, $image)
    {

        $query = $this->db->prepare('INSERT INTO vehiculos(marca,modelo,matricula,precio_dia,imagen) VALUES (?,?,?,?,?)');
        $query->execute([$brand, $year, $licensePlate, $price, $image]);
        $id = $this->db->lastInsertId();
        return $this->getVehicleById($id);
    }

    function updateVehicle($id, $brand, $year, $licensePlate, $price, $image)
    {

        $query = $this->db->prepare("UPDATE vehiculos SET  marca = ?, modelo = ?, matricula = ?, precio_dia = ?, imagen = ? WHERE vehiculos.id = ?");
        $query->execute([$brand, $year, $licensePlate, $price, $image, $id]);
        $vehicle = $this->getVehicleById($id);
        return $vehicle;
    }
}
