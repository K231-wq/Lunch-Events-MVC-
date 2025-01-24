<?php
namespace app\Controller;

use app\Router;
use app\helper\util_helper;
use app\models\UserInfo;
use app\Database;
use Error;
session_start();
class Controller1{
    public function __construct()
    {

    }
    public function register(Router $router){
        $errors = [];
        $userInfoData = [
            "uniqueId" => '',
            'name' => '',
            'email' => '',
            'password' => '',
            'imageFilePath' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $userInfoData['uniqueId'] = util_helper::randomString();
            $userInfoData['name'] = $_POST['name'];
            $userInfoData['email'] = $_POST['email'];
            $userInfoData['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $userInfoData['imageFile'] = $_FILES['imageFile'] ?? null;

            $userInfo = new UserInfo();
            $userInfo->load($userInfoData);
            $errors = $userInfo->save();

            if(empty($errors)){
                header("Location: /login");
                exit;
            }

        }
        $router->renderView("register", [
            "userInfo" => $userInfoData,
            "errors" => $errors
        ]);

    }
    public function login(Router $router){
        $db = Database::$db;
        $userInfo = [
            'UniqueId' => '',
            'Name' => '',
            'Email' => '',
            'Password'=> '',
        ];
        $errors = [];

        if($_SERVER["REQUEST_METHOD"] === 'POST'){
            $name = trim($_POST['name']);
            $password = trim($_POST['password']);
        
            if(!$name){
                $errors[] = "Enter the name!!!";
            }
            if(!$password){
                $errors[] = "Enter the Password!!!";
            }
            $userInfoData = $db->getUserInfo($name);
            if(!$userInfoData){
                $errors[] = "INVALID USERNAME ✌😭";
            }
            if(empty($errors)){
                if($userInfoData && password_verify($password, $userInfoData['Password'])){
                    $userInfo['Name'] = $userInfoData['Name'];
                    $userInfo['UniqueId'] = $userInfoData['UniqueId'];
                    $userInfo['Email'] = $userInfoData['Email'];
                    $userInfo['Password'] = $password;
    
                    $_SESSION['User'] = $userInfo;
                    header("Location: /home");
                    exit;
                }else{
                    $errors[] = "Invalid name or password??";
                }
            }
            
        }
        $router->renderView("login", [
            "userInfo"=> $userInfo,
            "errors" => $errors
        ]);

    }
    // public function home(Router $router){
        
    //     $userInfo = $_SESSION['User'];
    //     if(!$userInfo){
    //         header('Location: /login');
    //     }
    //     $router->renderView('home', [
    //         'userInfo' => $userInfo,
    //     ]);
    // }
}