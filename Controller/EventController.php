<?php
namespace app\Controller;

use app\Database;
use app\Database1;
use app\models\Event;
use app\helper\util_helper;
use app\models\Event as ModelsEvent;
use app\models\UserInfo;
use app\Router;

session_start();
class EventController{

    public function __construct()
    {
        
    }
    public function home(Router $router){
        $db1 = Database1::$db;
        $allEvents = $db1->getAllEvents();

        $userInfo = $_SESSION['User'];
        $tablename = preg_replace('/[^a-zA-Z0-9_]/', '', $userInfo['UniqueId']);
        $errors = [];

        if(!$userInfo){
            header('Location: /login');
            exit;
        }
        //automatic table create
        $db1->createTable($tablename);
        $errors = $_SESSION['Errors'] ?? null;
        //home page render so it can see by user
        $router->renderEventHome('home', [
            'errors' => $errors,
            'allEvents' => $allEvents
        ]);
        //unset session
        unset($_SESSION['Errors']);
    }

    public function requestMethod(Router $router){
        $db1 = Database1::$db;
        $allEvents = $db1->getAllEvents();
        $userInfo = $_SESSION['User'];
        $id = $_GET['id'] ?? null;
        $tableName = preg_replace('/[^a-zA-Z0-9_]/', '', $userInfo['UniqueId']);
        $errors = [];
        
        if($id && $tableName){
            $dbErrors = $db1->getAndCreateTable($id, $tableName);
            $errors = $dbErrors;
            if(empty($errors)){
                header("Location: /home");
                exit;
            }else{
                $_SESSION['Errors'] = $dbErrors;
                header("Location: /home");
                exit;
            }
        }else{
            $errors[] = "ID is missing";
        }
        $router->renderEventHome('home', [
            'errors' => $errors,
            'allEvents' => $allEvents
        ]);
    }

    public function rsvpMethod(Router $router){
        $db1 = Database1::$db;
        $allEvents = [];
        $allEventsId = [];
        $userInfo = $_SESSION['User'] ?? null;
        $errors = [];
        $tableName = preg_replace('/[^a-zA-Z0-9_]/', '', $userInfo['UniqueId']);
        // echo $tableName;
        if(!$userInfo){
            $errors[] =  "UserInfo is missing~~~";
        }
        if($tableName){
            $allEventsId = $db1->getEventsIds($tableName);
            // var_dump($allEventsId);
        }else{
            $errors[] = "Table Name is missing~~~";
        }
        foreach($allEventsId as $i => $eachId){
            $matchingEvent = [];
            if($eachId['eventId'] !== null){
                // echo $eachId['eventId'];
                $matchingEvent = $db1->getEachEvent($eachId['eventId']);
                // echo '<pre>';
                // var_dump($matchingEvent);
                // echo '</pre>';
                array_push($allEvents, $matchingEvent);
            }
        }
        $router->renderEventHome('rsvp', [
            'errors' => $errors,
            'allEvents' => $allEvents,
        ]);
    }
    //rsvp delete method create
    public function rsvpDeleteMethod(){
        $db1 = Database1::$db;
        $eventId = $_POST['id'] ?? null;
        $userInfo = $_SESSION['User'] ?? null;
        $tableName = preg_replace('/[^a-zA-Z0-9_]/', '', $userInfo['UniqueId']);
        if(!$userInfo){
            echo "UserInfo is missing😢😢";
        }
        if($eventId){
            $db1->deleteUserRsvpEvent($eventId, $tableName);
            header("Location: /rsvp");
        }else{
            header("Location: /rsvp");
        }
    }

    public function create(Router $router){
        $db1 = Database1::$db;
        $errors = [];
        $messages = [];
        $userInfo = $_SESSION['User'] ?? null;
        $eventData = [
            'UniqueId' => '',
            'name' => '',
            'time' => '',
            'capacity' => '',
            'description' => '',
            'address' => '',
            'create_at' => ''
        ];
        if(!$userInfo){
            $errors[] = 'UserInfo is missing😢';
        }
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            if(isset($_POST['date']) &&
                isset($_POST['capacity']) &&
                isset($_POST['description']) &&
                isset($_POST['address'])
            ){

                $eventData['UniqueId'] = $userInfo['UniqueId'] ?? null;
                $eventData['name'] = $userInfo['Name'];
                $eventData['time'] = trim($_POST['date']);
                $eventData['capacity'] = trim($_POST['capacity']);
                $eventData['description'] = trim($_POST['description']);
                $eventData['address'] = trim($_POST['address']);
                $eventData['create_at'] = date("Y-m-d H:i:s");

                $event = new Event();
                $event->load($eventData);
                $errors = $event->save();
                if(empty($errors)){
                    $messages[] = "EVENT IS SUCCESSFULLY ADDED 😊😊";
                }

            }else{
                $errors[] = "Please fill all the fields😟😟";
            }
        }

        $router->renderCreateView('create', [
            'errors' => $errors,
            'messages' => $messages
        ]);
    }
    public function invite(Router $router){
        $db1 = Database1::$db;
        $errors = [];
        $allEvents = [];
        $userInfo = $_SESSION['User'] ?? null;
        $uniqueId = $userInfo['UniqueId'];
        if(!$userInfo){
            $errrors[] = "IMPORTANT INFO IS MISSING???";
        }
        if(!$uniqueId){
            $errors[] = "UNIQUEiD IS MISSING??😭😭";
        }
        $allEvents = $db1->getAllUserEvent($uniqueId);
        // echo '<pre>';
        // var_dump($allEvents);
        // echo '</pre>';
        $router->renderInvitationView([
            'errors' => $errors,
            'allEvents' => $allEvents
        ]);
    }
    public function inviteUpdate(Router $router){
        $db1 = Database1::$db;
        $errors = [];
        $messages = [];
        $allEvents = [];
        $userInfo = $_SESSION['User'] ?? null;
        $eventId = $_GET['id'] ?? null;
        if(!$userInfo){
            $errors[] = "IMPORTANT INFO IS MISSING 😢😢";
        }
        if($eventId){
            $getEvent = $db1->getEachEvent($eventId);
        }
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_POST['date']) &&
            isset($_POST['capacity']) &&
            isset($_POST['description']) &&
            isset($_POST['address']))
            {
                $getEvent['time'] = $_POST['date'] ?? null;
                $getEvent['capacity'] = $_POST['capacity'] ?? null;
                $getEvent['description'] = $_POST['description'] ?? null;
                $getEvent['address'] = $_POST['address'] ?? null;

                $event = new Event();
                $event->load($getEvent);
                $event->save();

                if(empty($errors)){
                    $messages[] =  "SUCCESSFULLY UPDATE THE EVENT😁😁";
                    header("Refresh:1,url=/invitations");
                }
            }
        }
        // var_dump($_SERVER);
        // var_dump($getEvent);
        $router->renderCreateView('update', [
            'errors' => $errors,
            'messages' => $messages,
            'getEvent' => $getEvent
        ]);
    }

    public function inviteDelete(){
        $db1 = Database1::$db;
        $eventId = $_POST['id'] ?? null;
        $userInfo = $_SESSION['User'] ?? null;
        if(!$userInfo){
            echo "USERINFO IS MISSING😭😭";
        }
        $tableName = preg_replace('/[^a-zA-Z0-9_]/', '', $userInfo['UniqueId']);

        if(!$eventId){
            echo "IMPORTANT ID IS MISSING😭😭";
        }
        $db1->deleteUserRsvpEvent($eventId, $tableName);
        $db1->deleteCreatedEvent($eventId);
        header('Location: /invitations');
    }
    public function profile(Router $router){
        $db1 = Database1::$db;
        $userInfo = $_SESSION['User'] ?? null;
        $uniqueId = $userInfo['UniqueId'];
        $allEvents = [];
        if(!$userInfo){
            echo "IMPORTANT INFO IS MISSING😢😢";
        }else{
            $allEvents = $db1->getAllUserEvent($userInfo['UniqueId']);
        }
        // var_dump($allEvents);
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $imageFile = $_FILES['newImageFile'] ?? null;
            $newImagePath = '';
            if(file_exists("images/" . $uniqueId . '.jpg')){
                unlink("images/" . $uniqueId . '.jpg');
            }
            if($imageFile && $imageFile['tmp_name']){
                $newImagePath = __DIR__.'/../public/images/'.$uniqueId.'.jpg';
                move_uploaded_file($imageFile['tmp_name'], $newImagePath);
            }
        }
        $router->renderProfileView([
            'userInfo' => $userInfo,
            'allEvents' => $allEvents
        ]);
    }
    public function profileDelete(){
        $db1 = Database1::$db;
        $userInfo = $_SESSION['User'] ?? null;
        $tableName = preg_replace('/[^a-zA-Z0-9_]/', '', $userInfo['UniqueId']);
        $eventId = $_POST['id'] ?? null;
        if($eventId){
            $db1->deleteUserRsvpEvent($eventId, $tableName);
            $db1->deleteCreatedEvent($eventId);
            header("Location: /profile");
        }else{
            echo "EVENT ID IS MISSING 😢😢";
        }
    }
    public function logout(){
        if(isset($_SESSION['User'])){
            unset($_SESSION['User']);
            session_destroy();
            sleep(2);
            header("Location: /login");
        }
    }
}
?>