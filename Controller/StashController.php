<?php

class StashController extends Stash
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
        $stashs = [];
        $req = $this->pdo->query("SELECT * FROM stash");
        $data = $req->fetchAll();
        foreach ($data as $stash) {
            $stashs[] = new Stash($stash);
        }
        return $stashs;
    }

    public function get(int $id): Stash 
    {
        $req = $this->pdo->prepare("SELECT * FROM stash WHERE id = :id");
        $req->execute(['id' => $id]);
        $data = $req->fetch();
        $stash = new Stash($data);
        return $stash;
    }


    public function create(Stash $stash): void
    {
        $req = $this->pdo->prepare('INSERT INTO stash (adress, type, country_id, mission_id) VALUES (:adress, :type, :country_id, :mission_id)');
        $req->execute([
            'adress' => $stash->getAdress(),
            'type' => $stash->getType(),
            'country_id' => $stash->getCountry_id(),
            'mission_id' => $stash->getMission_id(),
        ]);
    }
/*
    public function update(Mission $mission): bool
    {

    }

    public function delete(Mission $mission): bool 
    {

    }
*/

}