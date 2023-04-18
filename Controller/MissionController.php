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

    public function get(?int $id): Mission 
    {
        $req = $this->pdo->prepare("SELECT * FROM mission WHERE id = :id");
        $req->execute(['id' => $id]);
        $data = $req->fetch();
        $mission = new Mission($data);
        return $mission;
    }


    public function create(Mission $mission): void
    {
        $req = $this->pdo->prepare("INSERT INTO mission (name, description, code_name, start_date, end_date, speciality, country, mission_status_id, mission_type_id) VALUES (:name, :description, :code_name, :start_date, :end_date, :speciality, :country, :mission_status_id, :mission_type_id)");
        $req->execute([
            'name' => $mission->getName(),
            'description' => $mission->getDescription(),
            'code_name' => $mission->getCode_name(),
            'start_date' => $mission->getStart_date(),
            'end_date' => $mission->getEnd_date(),
            'speciality' => $mission->getSpeciality(),
            'country' => $mission->getCountry(),
            'mission_status_id' => "1",
            'mission_type_id' => $mission->getMission_type_id()
        ]);
    }

    public function update(Mission $mission): void
    {
        $req = $this->pdo->prepare("UPDATE mission SET id = :id, name = :name, description = :description, code_name = :code_name, start_date = :start_date, end_date = :end_date, speciality = :speciality, country = :country, mission_status_id = :mission_status_id, mission_type_id = :mission_type_id WHERE id = :id");
        $req->execute([
            'id' => $mission->getId(),
            'name' => $mission->getName(),
            'description' => $mission->getDescription(),
            'code_name' => $mission->getCode_name(),
            'start_date' => $mission->getStart_date(),
            'end_date' => $mission->getEnd_date(),
            'speciality' => $mission->getSpeciality(),
            'country' => $mission->getCountry(),
            'mission_status_id' => $mission->getMission_status_id(),
            'mission_type_id' => $mission->getMission_type_id()
        ]);
    }

 /*
    public function delete(Mission $mission): bool 
    {

    }
*/

}