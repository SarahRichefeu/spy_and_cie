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