<?php
include_once 'app/models/reservation.model.php';
include_once 'app/models/vehicle.model.php';
include_once 'app/views/json.view.php';
include_once 'libs/router.php';

class ReservationController
{
    private $reservationModel;
    private $vehicleModel;
    private $view;

    function __construct()
    {
        $this->reservationModel = new Reservation();
        $this->vehicleModel = new Vehicle();
        $this->view = new JSONView();
    }

    # api/vehicles (GET)
    function getAll($req, $res)
    {

        //option get for vehicleID
        if (isset($req->query->vehicleID)) {
            $idVehicle = $req->query->vehicleID;
            $vehicle = $this->vehicleModel->getVehicleById($idVehicle);
            if (!$vehicle)
                return $this->view->response("No vehicle found with id = $idVehicle", 404);

            $reservations = $this->reservationModel->getReservationsByVehicle($idVehicle);
            if ($reservations)
                return $this->view->response($reservations);
            else
                return $this->view->response("No reservations were found for the vehicle with ID = $idVehicle.", 404);
        }


        #otion get by date
        if (isset($req->query->date)) {
            $date = $req->query->date;
            $reservations = $this->reservationModel->getReservationByDate($date);
            if ($reservations)
                return $this->view->response($reservations);
            else
                return $this->view->response("No reservations were found for the date = $date.", 404);
        }


        $reservations = $this->reservationModel->getAllReservations();
        return $this->view->response($reservations);
    }

    # api/reservations/:id (GET)
    function get($req, $res)
    {
        $id = $req->params->id;

        $reservation = $this->reservationModel->getReservationById($id);
        if ($reservation)
            return $this->view->response($reservation);
        else
            return $this->view->response("No reservation found with id = $id", 404);
    }

    # api/reservations/:id (DELETE)
    function delete($req, $res)
    {
        $id = $req->params->id;
        $reservation = $this->reservationModel->getReservationById($id);

        if (!$reservation)
            return $this->view->response("No reservation found with id = $id", 404);

        $this->reservationModel->deleteReservaction($id);
        return $this->view->response("Reservation successfully deleted.");
    }

    # api/reservations/ (POST)
    function create($req, $res)
    {
        $body = $req->body;
        //var_dump($body);
        //var_dump($body->precio_dia);

        if (empty($body->fecha_reserva) || empty($body->cant_dias) || empty($body->id_vehiculo))
            return $this->view->response("Missing required data.", 400);

        $reservation = $this->reservationModel->createReservation($body->fecha_reserva, $body->cant_dias, $body->id_vehiculo);
        if ($reservation)
            return $this->view->response($reservation, 201);
        else
            return $this->view->response("Error inserting reservation ", 500);
    }

    # api/reservations/:id (PUT)
    function update($req, $res)
    {
        $body = $req->body;
        $id = $req->params->id;
        //var_dump($body);
        //var_dump($id);

        if (empty($body->fecha_reserva) || empty($body->cant_dias) || empty($body->id_vehiculo))
            return $this->view->response("Missing required data.", 400);

        $reservation = $this->reservationModel->updateReservation($id, $body->fecha_reserva, $body->cant_dias, $body->id_vehiculo);
        if ($reservation)
            return $this->view->response($reservation);
        else
            return $this->view->response("Error inserting vehicle ", 500);
    }
}
