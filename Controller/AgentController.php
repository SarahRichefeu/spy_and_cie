<?php

class AgentController extends Agent
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
        $agents = [];
        $req = $this->pdo->query("SELECT * FROM agent");
        $data = $req->fetchAll();
        foreach ($data as $agent) {
            $agents[] = new Agent($agent);
        }
        return $agents;
    }

    public function get(int $id): Agent 
    {
        $req = $this->pdo->prepare("SELECT * FROM agent WHERE id = :id");
        $req->execute(['id' => $id]);
        $data = $req->fetch();
        $agent = new Agent($data);
        return $agent;
    }


    public function create(Agent $agent): void
    {
        $req = $this->pdo->prepare('INSERT INTO agent (lastname, firstname, birthdate, code_name, nationality, mission_id) VALUES (:lastname, :firstname, :birthdate, :code_name, :nationality, :mission_id)');
        $req->execute([
            'lastname' => $agent->getLastname(),
            'firstname' => $agent->getFirstname(),
            'birthdate' => $agent->getBirthdate(),
            'code_name' => $agent->getCode_name(),
            'nationality' => $agent->getNationality(),
            'mission_id' => $agent->getMission_id()
        ]);
    }

    public function update(Agent $agent): void
    {
        $req = $this->pdo->prepare("UPDATE agent SET id = :id, lastname = :lastname, firstname = :firstname, birthdate = :birthdate, code_name = :code_name, nationality = :nationality, mission_id = :mission_id WHERE id = :id");
        $req->execute([
            'id' => $agent->getId(),
            'lastname' => $agent->getLastname(),
            'firstname' => $agent->getFirstname(),
            'birthdate' => $agent->getBirthdate(),
            'code_name' => $agent->getCode_name(),
            'nationality' => $agent->getNationality(),
            'mission_id' => $agent->getMission_id()
        ]);
    }

    public function delete(int $id): void 
    {
        $req = $this->pdo->prepare("DELETE FROM agent WHERE id = :id");
        $req->execute(['id' => $id]);
    }


}