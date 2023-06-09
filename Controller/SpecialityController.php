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

    public function count(): int 
    {
        $req = $this->pdo->query("SELECT COUNT(*) FROM speciality");
        $count = $req->fetchColumn();
        return $count;
    }

    public function getLimited(int $first, int $perPage): array 
    {
        $specialities = [];
        $req = $this->pdo->query("SELECT * FROM speciality LIMIT $first, $perPage");
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $speciality) {
            $specialities[] = new Speciality($speciality);
        }
        return $specialities;
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

    public function update(Speciality $speciality): void
    {
        $req = $this->pdo->prepare("UPDATE speciality SET id = :id, name = :name, agent_id = :agent_id WHERE id = :id");
        $req->execute([
            'id' => $speciality->getId(),
            'name' => $speciality->getName(),
            'agent_id' => $speciality->getAgent_id()
            
        ]);
    }

    public function delete(int $id): void 
    {
        $req = $this->pdo->prepare("DELETE FROM speciality WHERE id = :id");
        $req->execute(['id' => $id]);
    }

}