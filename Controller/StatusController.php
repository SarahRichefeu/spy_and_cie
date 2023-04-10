<?php


class StatusController
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
        $status = [];
        $req = $this->pdo->query("SELECT * FROM `mission_status`");
        $data = $req->fetchAll();
        foreach ($data as $status) {
            $states[] = new Status($status);
        }
        return $states;
    }

    public function get(int $id): Status 
    {
        $req = $this->pdo->prepare("SELECT * FROM mission_status WHERE id = :id");
        $req->execute(['id' => $id]);
        $data = $req->fetch();
        $status = new Status($data);
        return $status;
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