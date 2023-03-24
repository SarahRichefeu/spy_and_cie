<?php

class TargetController extends Target
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
        $targets = [];
        $req = $this->pdo->query("SELECT * FROM target");
        $data = $req->fetchAll();
        foreach ($data as $target) {
            $targets[] = new Target($target);
        }
        return $targets;
    }

    public function get(int $id): Target 
    {
        $req = $this->pdo->prepare("SELECT * FROM target WHERE id = :id");
        $req->execute(['id' => $id]);
        $data = $req->fetch();
        $target = new Target($data);
        return $target;
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