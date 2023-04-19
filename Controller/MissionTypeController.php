<?php


class MissionTypeController
{
    
    private PDO $pdo;

    public function __construct()
    {
        $dbName = "spy_and_cie";
        $dbPort = 3306;
        $dbUser = "root";	
        $dbPass = "";
        try {
            $pdo = new PDO("mysql:host=localhost;port=$dbPort;dbname=$dbName", $dbUser, $dbPass);
            $this->setPdo($pdo);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function setPdo(PDO $pdo)
    {
        $this->pdo = $pdo;
        return $this;
    }

    public function getAll(): array 
    {
        $missionTypes = [];
        $req = $this->pdo->query("SELECT * FROM mission_type");
        $data = $req->fetchAll();
        foreach ($data as $missionType) {
            $missionTypes[] = new MissionType($missionType);
        }
        return $missionTypes;
    }

    public function get(int $id): MissionType 
    {
        $req = $this->pdo->prepare("SELECT * FROM mission_type WHERE id = :id");
        $req->execute(['id' => $id]);
        $data = $req->fetch();
        $missionType = new MissionType($data);
        return $missionType;
    }

}