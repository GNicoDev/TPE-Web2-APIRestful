<?php
require_once 'libs/router.php';
require_once 'app/controllers/vehicle.api.controller.php';

    $router = new Router();
     #                  endpoint      verb            controller                   method
    $router->addRoute("vehicles",    "GET",         "VehicleController",       "GetAll");
    $router->addRoute("vehicle/:id",  "GET",        "VehicleController",       "get");

   /* var_dump($_GET);
    var_dump($_SERVER);
    die();*/

    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);