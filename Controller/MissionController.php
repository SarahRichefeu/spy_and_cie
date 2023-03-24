<?php

class MissionController extends Mission
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
        return $pdo;
    }

    public function setPdo(PDO $pdo)
    {
        $this->pdo = $pdo;
        return $this;
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    public function getAll(): array 
    {
        $missions = [];
        $req = $this->pdo->query("SELECT * FROM mission");
        $data = $req->fetchAll();
        foreach ($data as $mission) {
            $missions[] = new Mission($mission);
        }
        return $missions;
    }

    public function get(int $id): Mission 
    {
        $req = $this->pdo->prepare("SELECT * FROM mission WHERE id = :id");
        $req->execute(['id' => $id]);
        $data = $req->fetch();
        $mission = new Mission($data);
        return $mission;
    }

    public function getStatusName(int $id): string
    {
        $req = $this->pdo->prepare("SELECT name FROM spy_and_cie.mission_status WHERE id = :id");
        $req->execute(['id' => $id]);
        $status = $req->fetch();
        return $status['name'];
    }
/*
    public function create(Mission $mission): bool
    {

    }

    public function update(Mission $mission): bool
    {

    }

    public function delete(Mission $mission): bool 
    {

    }
*/

}