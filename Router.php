<?php
namespace app;

use app\Database;
use app\Database1;
class Router{
    public array $getRouts = [];
    public array $postRouts = [];

    public Database $db;
    public Database1 $db1;
    public function __construct()
    {
        $this->db = new Database();
        $this->db1 = new Database1();
    }
    public function get($url, $fn){
        $this->getRouts[$url] = $fn;
    }

    public function post($url, $fn){
        $this->postRouts[$url] = $fn;
    }

    public function resolve(){
        $currentUrl = $_SERVER['REQUEST_URI'] ?? '/';
        if(strpos($currentUrl, '?') !== false){
            $currentUrl = substr($currentUrl, 0, strpos($currentUrl, '?'));
        }
        $method = $_SERVER['REQUEST_METHOD'];
        if($method === "GET"){
            $fn = $this->getRouts[$currentUrl] ?? null;
        }else{
            $fn = $this->postRouts[$currentUrl] ?? null;
        }

        if($fn){
            if(is_array($fn)){
                $controller = new $fn[0]();
                $method = $fn[1];
                call_user_func([$controller, $method], $this);
            }else{
                call_user_func($fn, $this);
            }
            
        }else{
            echo "Page is not found";
        }
    }
    public function renderView($view, $param = []){
        foreach($param as $key => $value){
            $$key = $value;
        }
        ob_start();
        include_once __DIR__."/View/$view.php";
        $content = ob_get_clean();
        include_once __DIR__."/View/_layout.php";
    }
    public function renderEventHome($view, $param = []){
        foreach($param as $key => $value){
            $$key = $value;
        }
        ob_start();
        include_once __DIR__."/View/AllEvent/$view.php";
        $content = ob_get_clean();
        include_once __DIR__."/View/AllEvent/_layout.php";
    }
    public function renderCreateView($view, $param = []){
        foreach($param as $key => $value){
            $$key = $value;
        }
        ob_start();
        include_once __DIR__."/View/AllEvent/$view.php";
        // ob_get_clean();
    }
    public function renderInvitationView($param = []){
        foreach($param as $key => $value){
            $$key = $value;
        }
        ob_start();
        include_once __DIR__."/View/AllEvent/invitation.php";
        // ob_get_clean();
    }
    public function renderProfileView($param = []){
        foreach($param as $key => $value){
            $$key = $value;
        }
        ob_start();
        include_once __DIR__."/View/AllEvent/profile.php";
    }
}
?>