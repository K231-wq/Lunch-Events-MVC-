<?php

namespace app\models;

use app\Database1;

class Event{
    public ?int $id = null;
    public ?string $uniqueId = null;
    public ?string $name = null;
    public ?string $time = null;
    public ?int $capacity = null;
    public ?string $description = null;
    public ?string $address = null;
    public ?string $create_at = null;

    public function load($data){
        $this->id = $data['id'] ?? null;
        $this->uniqueId = $data['UniqueId'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->time = $data['time'] ?? null;
        $this->capacity = $data['capacity'] ?? null;
        $this->description = $data['description'] ?? null;
        $this->address = $data['address'] ?? null;
        $this->create_at = $data['create_at'] ?? null;
    }
    public function save(){
        $db1 = Database1::$db;
        $errors = [];
        if($this->capacity < 1){
            $errors[] = 'The capacity at least must have 1';
        }
        if(strlen($this->address) < 8){
            $errors[] = 'Please enter the valide address';
        }
        if(strlen($this->description) < 1){
            $errors[] = 'Please Enter The Description!!';
        }
        if(empty($errors)){
            if($this->id){
                $db1->updateUserEvent($this);
            }else{
                $db1->createEvent($this);
            }
            
        }
        return $errors;
    }
}
?>