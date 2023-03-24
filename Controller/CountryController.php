<?php


class CountryController
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
        $countries = [];
        $req = $this->pdo->query("SELECT * FROM country");
        $data = $req->fetchAll();
        foreach ($data as $country) {
            $countries[] = new Country($country);
        }
        return $countries;
    }

    public function get(int $id): Country 
    {
        $req = $this->pdo->prepare("SELECT * FROM country WHERE id = :id");
        $req->execute(['id' => $id]);
        $data = $req->fetch();
        $country = new Country($data);
        return $country;
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