<?php
require_once 'libs/router.php';
require_once 'app/controllers/vehicle.api.controller.php';

    $router = new Router();

     #                  endpoint       verb            controller                method
    $router->addRoute("vehicles",     "GET",         "VehicleController",       "getAll");
    $router->addRoute("vehicle/:id",  "GET",        "VehicleController",        "get");
    $router->addRoute("vehicle/:id",  "DELETE",     "VehicleController",        "delete");
    $router->addRoute("vehicle",      "POST",        "VehicleController",       "create");
    $router->addRoute("vehicle/:id",  "PUT",        "VehicleController",        "update");

   /* var_dump($_GET);
    var_dump($_SERVER);
    die();*/

    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);