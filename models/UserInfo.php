<?php 
namespace app\models;

use app\Database;

class UserInfo{

    public ?string $uniqueId = null;
    public ?string $name = null;
    public ?string $email = null;
    public ?string $password = null;
    public ?string $imageFilePath = null;
    public ?array $imageFile = null;

    public function load($data){
        $this->uniqueId = $data['uniqueId'];
        $this->name = $data['name'] ?? 'user';
        $this->email = $data['email'] ?? 'unknown';
        $this->password = $data['password'] ?? null;
        $this->imageFile = $data['imageFile'] ?? null;
        $this->imageFilePath = $data['imageFilePath'] ?? null;
    }

    public function save(){
        $errors = [];
        if(!$this->name){
            $errors[] = "User name is missing";
        }
        if(!$this->email){
            $errors[] = "Email is misssing";
        }
        if(!$this->password){
            $errors[] = "Password is missing";
        }
        if(!is_dir(__DIR__.'/../public/images')){
            mkdir(__DIR__.'/../public/images');
        }

        if(empty($errors)){
            if($this->imageFile && file_exists($this->imageFile['tmp_name'])){
                $imageFilePath = __DIR__.'/../public/images/'.$this->uniqueId.'.jpg';
                move_uploaded_file($this->imageFile['tmp_name'], $imageFilePath);
            }
            $db = Database::$db;
            $db->setRegister($this);
        }
        return $errors;
    }

}
?>