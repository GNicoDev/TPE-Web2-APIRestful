<?php
require_once 'libs/router.php';
require_once 'app/controllers/vehicle.api.controller.php';
require_once 'app/controllers/reservation.api.controller.php';

    $router = new Router();

     #                  endpoint         verb            controller                method
    $router->addRoute("vehicles",        "GET",         "VehicleController",        "getAll");
    $router->addRoute("vehicles/:id",    "GET",         "VehicleController",        "get");
    $router->addRoute("vehicles/:id",    "DELETE",      "VehicleController",        "delete");
    $router->addRoute("vehicles",        "POST",        "VehicleController",        "create");
    $router->addRoute("vehicles/:id",    "PUT",         "VehicleController",        "update");

    $router->addRoute("reservations",      "GET",       "ReservationController",     "getAll");
    $router->addRoute("reservations/:id",  "GET",       "ReservationController",     "get");
    $router->addRoute("reservations/:id",  "DELETE",    "ReservationController",     "delete");
    $router->addRoute("reservations",      "POST",      "ReservationController",     "create");
    $router->addRoute("reservations/:id",  "PUT",       "ReservationController",     "update");


   /* var_dump($_GET);
    var_dump($_SERVER);
    die();*/

    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);