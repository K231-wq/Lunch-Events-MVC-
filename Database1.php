<?php
namespace app;

use app\models\Event;
use PDO;
use Exception;
use PDOException;

class Database1{

    public static Database1 $db;
    private \PDO $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO("mysql:host=localhost;port=3306;dbname=events", "root", "");
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        self::$db = $this;
    }

    public function getAllEvents(){
        try{
            $statment = $this->pdo->prepare("SELECT * FROM allevents");
            $statment->execute();
            return $statment->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "AllEvents method: ". $e->getMessage();
        }
    }

    public function createTable($tablename){
        try{
            $sql = "CREATE TABLE IF NOT EXISTS `$tablename` (
                eventId varchar(255) PRIMARY KEY
                )";
            $this->pdo->exec($sql);
        }catch(PDOException $e){
            echo "Table create". $e->getMessage();
        }
    }

    public function getAndCreateTable($id, $tableName){
        $errors = [];
        try{
            $sql = "CREATE TABLE IF NOT EXISTS `$tableName` (
                eventId VARCHAR(255) PRIMARY KEY
            )";
            $this->pdo->exec($sql);

            $checkSql = "SELECT COUNT(*) FROM `$tableName` WHERE eventId = :id";
            $statement = $this->pdo->prepare($checkSql);
            $statement->execute(['id' => $id]);
            $idExists = $statement->fetchColumn();

            if(!$idExists){
                try{
                    $insertsql = "INSERT INTO `$tableName` (eventId) VALUES (:id)";
                    $statment2 = $this->pdo->prepare($insertsql);
                    $statment2->bindValue(":id", $id);
                    $statment2->execute();
                }catch(PDOException $e){
                    $errors[] = "Insert: " . $e->getMessage();
                }
            }else{
                $errors[] = "Id $id is exits";
            }
            
        }catch(PDOException $e){
            $errors[] = $e->getMessage();
        }
        return $errors;
    }
    //get all of user selected eventId for each launch event to add mutiple selected events;
    public function getEventsIds($tableName){
        $allEventIds = [];
        try{
            $sql = "SELECT * FROM `$tableName`";
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            $allEventIds = $statement->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "GetId list :: ".$e->getMessage();
        }
        return $allEventIds;
    }
    //get each event using eventId method
    public function getEachEvent($eventId){
        try{
            $statement = $this->pdo->prepare("SELECT * FROM allevents WHERE id = :id");
            $statement->bindValue(':id', $eventId);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "Each Event:: ".$e->getMessage();
        }
    }
    //delete event my seleted rsvps //using eventId from userInfo UniqueId tablename
    public function deleteUserRsvpEvent($id, $tableName){
        try{
            if($id){
                $sql = "DELETE FROM `$tableName` WHERE eventId = :id";
                $statement = $this->pdo->prepare($sql);
                $statement->bindValue(":id", $id);
                $statement->execute();
                echo "Successfully Delete 😊😊😊";
            }

        }catch(PDOException $e){
            echo "delete rsvp method::".$e->getMessage();
        }
    }
    //create a launch event
    public function createEvent(Event $event){
        try{
            $statement = $this->pdo->prepare('INSERT INTO allevents 
                                (UniqueId, name, address, time, capacity, description, create_at) 
                                VALUES (:uniqueId, :name, :address, :time, :capacity, :description, :create_at)
                                ');
            $statement->bindValue(":uniqueId", $event->uniqueId);
            $statement->bindValue(":name", $event->name);
            $statement->bindValue(':address', $event->address);
            $statement->bindValue(':time', $event->time);
            $statement->bindValue(':capacity', $event->capacity);
            $statement->bindValue(':description', $event->description);
            $statement->bindValue(':create_at', $event->create_at);
            $statement->execute();
        }catch(PDOException $e){
            echo "Event create :: ".$e->getMessage();
        }
    }

    //get all user created event List
    public function getAllUserEvent($uniqueId){
        try{
            $statement = $this->pdo->prepare('SELECT * FROM allevents WHERE UniqueId = :uniqueId');
            $statement->bindValue(':uniqueId', $uniqueId);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "User Invitation Events:: ". $e->getMessage();
        }
    }
    //delete my created launch event from the all event using eventId
    public function deleteCreatedEvent($eventId){
        try{
            $statement = $this->pdo->prepare('DELETE FROM allevents WHERE id = :eventId');
            $statement->bindValue(":eventId", $eventId);
            $statement->execute();
            echo "Event is SUCCESSFULLY DELETED 😊😊😊";
        }catch(PDOException $e){
            echo "DELETE LAUNCH EVENT:: ".$e->getMessage();
        }

    }
    //update my created invitations event using id
    public function updateUserEvent(Event $event){
        try{
            $statement = $this->pdo->prepare("UPDATE allevents 
                                            SET id = :eventId,
                                            UniqueId = :uniqueId,
                                            name = :name,
                                            address = :address,
                                            time = :time,
                                            capacity = :capacity,
                                            description = :description,
                                            create_at = :create_at
                                            WHERE id = :id
                                        ");
            $statement->bindValue(":eventId", $event->id);
            $statement->bindValue(":uniqueId", $event->uniqueId);
            $statement->bindValue(":name", $event->name);
            $statement->bindValue(":address", $event->address);
            $statement->bindValue(":time", $event->time);
            $statement->bindValue(":capacity", $event->capacity);
            $statement->bindValue(":description", $event->description);
            $statement->bindValue(":create_at", $event->create_at);
            $statement->bindValue(":id", $event->id);
            $statement->execute();
        }catch(PDOException $e){
            echo "UPDATE ERRORS:: ". $e->getMessage();
        }
    }
}
?>