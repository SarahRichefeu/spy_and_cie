<?php


class SpecialityController
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
        $specialities = [];
        $req = $this->pdo->query("SELECT * FROM speciality");
        $data = $req->fetchAll();
        foreach ($data as $speciality) {
            $specialities[] = new Speciality($speciality);
        }
        return $specialities;
    }

    public function get(int $id): Speciality 
    {
        $req = $this->pdo->prepare("SELECT * FROM speciality WHERE id = :id");
        $req->execute(['id' => $id]);
        $data = $req->fetch();
        $speciality = new Speciality($data);
        return $speciality;
    }

    public function create(Speciality $speciality): void
    {   
        $req = $this->pdo->prepare("INSERT INTO speciality (name, agent_id) VALUES (:name, :agent_id)");
        $req->execute([
            'name' => $speciality->getName(),
            'agent_id' => $speciality->getAgent_id()
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