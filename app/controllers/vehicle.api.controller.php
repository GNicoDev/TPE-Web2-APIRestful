<?php
include_once 'app/models/vehicle.model.php';
include_once 'app/views/json.view.php';
include_once 'libs/router.php';

class VehicleController
{
    private $vehicleModel;
    private $view;

    function __construct()
    {
        $this->vehicleModel = new Vehicle();
        $this->view = new JSONView();
    }

    # api/vehicles (GET)
    function getAll($req, $res)
    {
        //option get by year
        if (isset($req->query->year)){
            $year = $req->query->year;
           // print_r($year); die();
            $vehicles = $this->vehicleModel->getVehiclesByYear($year);
            if ($vehicles)
                return $this->view->response($vehicles);
            else
                 return $this->view->response("No vehicles found for that year.",404);
        }
        //option order by
        if (isset($req->query->orderBy))
            $orderBy = $req->query->orderBy;
        else
            $orderBy='id';

        $vehicles = $this->vehicleModel->getAllVehicles($orderBy);
        return $this->view->response($vehicles);

    }
    
    # api/vehicle/:id (GET)
    function get($req,$res){
        $id = $req->params->id;

        $vehicle = $this->vehicleModel->getVehicleById($id);
        if($vehicle)
             return $this->view->response($vehicle);
        else
            return $this->view->response("No vehicle found with id = $id",404);


    }

    # api/vehicle/:id (DELETE)
    function delete($req,$res){
        $id = $req->params->id;
        $vehicle = $this->vehicleModel->getVehicleById($id);

        if(!$vehicle)
             return $this->view->response("No vehicle found with id = $id",404);
        
        $this->vehicleModel->deleteVehicleById($id);
        return $this->view->response("Vehicle successfully deleted.");

    }

    # api/vehicle/ (POST)
    function create($req,$res){
        $body = $req->body;
        //var_dump($body);
        //var_dump($body->precio_dia);

        if (empty($body->marca) || empty($body->modelo) || empty($body->matricula)
                         || empty($body->precio_dia) || empty($body->imagen)){

            return $this->view->response("Missing required data.",400);
        }
        else{
            $vehicle = $this->vehicleModel->createVehicle($body->marca, $body->modelo, $body->matricula, $body->precio_dia, $body->imagen);
            if($vehicle)
                return $this->view->response($vehicle,201);
            else
                return $this->view->response("Error inserting vehicle ",500);

        }


    }

    # api/vehicle/:id (PUT)
    function update($req,$res){
        $body = $req->body;
        $id = $req->params->id;
        //var_dump($body);
        //var_dump($id);

        if (empty($body->marca) || empty($body->modelo) || empty($body->matricula)
                         || empty($body->precio_dia) || empty($body->imagen)){

            return $this->view->response("Missing required data.",400);
        }
        else{
            $vehicle = $this->vehicleModel->updateVehicle($id, $body->marca, $body->modelo, $body->matricula, $body->precio_dia, $body->imagen);
            if($vehicle)
                return $this->view->response($vehicle,201);
            else
                return $this->view->response("Error inserting vehicle ",500);

        }
    }
}
