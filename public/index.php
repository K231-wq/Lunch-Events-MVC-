<?php
require_once "../vendor/autoload.php";

use app\Controller\Controller1;
use app\Controller\EventController;
use app\Router;

$router = new Router();

$router->get('/register', [Controller1::class, 'register']);
$router->post('/register', [Controller1::class, 'register']);
$router->get('/', [Controller1::class, 'login']);
$router->get('/login', [Controller1::class, 'login']);
$router->post('/login', [Controller1::class, 'login']);

$router->get('/home', [EventController::class, 'home']);
$router->get('/home/request', [EventController::class, 'requestMethod']);
// $router->post('/home/request', [EventController::class, 'requestMethod']);
$router->get('/rsvp', [EventController::class, 'rsvpMethod']);
$router->post('/rsvp', [EventController::class, 'rsvpMethod']);
$router->get('/rsvp/delete', [EventController::class, 'rsvpDeleteMethod']);
$router->post('/rsvp/delete', [EventController::class, 'rsvpDeleteMethod']);
$router->get('/create', [EventController::class, 'create']);
$router->post('/create', [EventController::class, 'create']);
$router->get('/invitations', [EventController::class, 'invite']);
$router->post('/invitations', [EventController::class, 'invite']);
$router->get('/invitations/update', [EventController::class, 'inviteUpdate']);
$router->post('/invitations/update', [EventController::class, 'inviteUpdate']);
$router->get('/invitations/delete', [EventController::class, 'inviteDelete']);
$router->post('/invitations/delete', [EventController::class, 'inviteDelete']);
$router->get('/profile', [EventController::class, 'profile']);
$router->post('/profile', [EventController::class, 'profile']);
$router->get('/profile/delete', [EventController::class, 'profileDelete']);
$router->post('/profile/delete', [EventController::class, 'profileDelete']);
$router->get('/logout', [EventController::class, 'logout']);
$router->post('/logout', [EventController::class, 'logout']);
$router->resolve();
?>