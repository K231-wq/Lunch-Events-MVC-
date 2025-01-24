<?php
namespace app;

use PDO;
use app\models\UserInfo;
use Exception;

class Database{

    public \PDO $pdo;
    public static Database $db;

    public function __construct()
    {
        $this->pdo = new \PDO("mysql:host=localhost;port=3306;dbname=events", 'root', '');
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        self::$db = $this;
    }

    public function setRegister(UserInfo $userInfo){
        try{
            $statment = $this->pdo->prepare("INSERT INTO register (UniqueId, Name, Email, Password)
                        VALUES (:uniqueId, :name, :email, :password)
                        ");
            $statment->bindValue(':uniqueId', $userInfo->uniqueId);
            $statment->bindValue(':name', $userInfo->name);
            $statment->bindValue(':email', $userInfo->email);
            $statment->bindValue(':password', $userInfo->password);

            $statment->execute();
        }catch(\PDOException $e){
            echo "Database error " . $e->getMessage();
        }
        
    }

    public function getUserInfo($name){
        try{
            $statement = $this->pdo->prepare("SELECT * FROM register WHERE Name = :name");
            $statement->bindValue(':name', $name);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);

        }catch(\PDOException $e){
            echo "Database getUser Error" . $e->getMessage();
        }
    }

}
?>