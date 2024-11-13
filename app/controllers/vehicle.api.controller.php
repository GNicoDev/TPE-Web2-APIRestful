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

    function getAll($req, $res)
    {
        //option get by year
        if (isset($req->query->year)){
            $year = $req->query->year;
           // print_r($year); die();
            $vehicles = $this->vehicleModel->getVehiclesByYear($year);
            if ($vehicles)
                 $this->view->response($vehicles);
            else
                 $this->view->response("No vehicles found for that year.",404);
            return;
        }

        if (isset($req->query->orderBy))
            $orderBy = $req->query->orderBy;
        else
            $orderBy='id';

        $vehicles = $this->vehicleModel->getAllVehicles($orderBy);
        $this->view->response($vehicles);

    }

    function get($req,$res){
        $id = $req->params->id;

        $vehicle = $this->vehicleModel->getVehicleById($id);
        if($vehicle)
             $this->view->response($vehicle);
        else
         $this->view->response("No vehicle found with id = $id",404);


    }
}
