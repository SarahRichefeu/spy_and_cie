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

    public function count(): int 
    {
        $req = $this->pdo->query("SELECT COUNT(*) FROM stash");
        $count = $req->fetchColumn();
        return $count;
    }

    public function getLimited(int $first, int $perPage) : array 
    {
        $stashs = [];
        $req = $this->pdo->query("SELECT * FROM stash LIMIT $first, $perPage");
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $stash) {
            $stashs[] = new Stash($stash);
        }
        return $stashs;
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
        $req = $this->pdo->prepare('INSERT INTO stash (adress, type, country, mission_id) VALUES (:adress, :type, :country, :mission_id)');
        $req->execute([
            'adress' => $stash->getAdress(),
            'type' => $stash->getType(),
            'country' => $stash->getCountry(),
            'mission_id' => $stash->getMission_id(),
        ]);
    }

    public function update(Stash $stash): void
    {
        $req = $this->pdo->prepare('UPDATE stash SET id = :id, adress = :adress, type = :type, country = :country, mission_id = :mission_id WHERE id = :id');
        $req->execute([
            'id' => $stash->getId(),
            'adress' => $stash->getAdress(),
            'type' => $stash->getType(),
            'country' => $stash->getCountry(),
            'mission_id' => $stash->getMission_id(),
        ]);
    }

    public function delete(int $id): void 
    {
        $req = $this->pdo->prepare("DELETE FROM stash WHERE id = :id");
        $req->execute(['id' => $id]);
    }


}