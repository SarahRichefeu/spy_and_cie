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

    public function count(): int 
    {
        $req = $this->pdo->query("SELECT COUNT(*) FROM target");
        $count = $req->fetchColumn();
        return $count;
    }

    public function getLimited(int $first, int $perPage) : array 
    {
        $targets = [];
        $req = $this->pdo->query("SELECT * FROM target LIMIT $first, $perPage");
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $target) {
            $targets[] = new Target($target);
        }
        return $targets;
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


    public function create(Target $target): void
    {
        $req = $this->pdo->prepare('INSERT INTO target (lastname, firstname, birthdate, code_name, nationality, mission_id) VALUES (:lastname, :firstname, :birthdate, :code_name, :nationality, :mission_id)');
        $req->execute([
            'lastname' => $target->getLastname(),
            'firstname' => $target->getFirstname(),
            'birthdate' => $target->getBirthdate(),
            'code_name' => $target->getCode_name(),
            'nationality' => $target->getNationality(),
            'mission_id' => $target->getMission_id()
        ]);
    }

    public function update(Target $target): void
    {
        $req = $this->pdo->prepare("UPDATE target SET id = :id, lastname = :lastname, firstname = :firstname, birthdate = :birthdate, code_name = :code_name, nationality = :nationality, mission_id = :mission_id WHERE id = :id");
        $req->execute([
            'id' => $target->getId(),
            'lastname' => $target->getLastname(),
            'firstname' => $target->getFirstname(),
            'birthdate' => $target->getBirthdate(),
            'code_name' => $target->getCode_name(),
            'nationality' => $target->getNationality(),
            'mission_id' => $target->getMission_id()
        ]);
    }

    public function delete(int $id): void 
    {
        $req = $this->pdo->prepare("DELETE FROM target WHERE id = :id");
        $req->execute(['id' => $id]);
    }


}