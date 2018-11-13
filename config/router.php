<?php
use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Router;
use Illuminate\Routing\UrlGenerator;

// Create a service container
$container = new Container;

/**
 * Create a request from server variables, and bind it to the container
 * ---
 * The Request object allows access to all the information that passes
 * from the client's browser to the server.
 */
$request = Request::capture();
$container->instance('Illuminate\Http\Request', $request);

// Using Illuminate/Events/Dispatcher here (not required); any implementation of
// Illuminate/Contracts/Event/Dispatcher is acceptable
/**
 * Dispatcher
 * ---
 * System that plans the management of the works and
 * the beginning and end of the processes, establishing priorities
 * and assigning processors to each task.
 */
$events = new Dispatcher($container);

// Create the router instance
$router = new Router($events, $container);

cors();

// Load the routes
require_once '../routes/routes.php';

// Create the redirect instance
$redirect = new Redirector(new UrlGenerator($router->getRoutes(), $request));

// Dispatch the request through the router
$response = $router->dispatch($request);

// Send the response back to the browser
$response->send();

function cors() {
    /**
     * The Cross-Source Resource Exchange (CORS) is a mechanism
     * that uses additional HTTP headers to allow a user agent to obtain
     * permission to access selected resources from a server,
     * in a different source (domain), to which it belongs.
     */

    // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
        // you want to allow, and if so:
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400'); // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        // may also be using PUT, PATCH, HEAD etc
        {
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        }

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
        }

        exit(0);
    }
}