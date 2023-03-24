<?php

class ContactController extends Contact
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
        $contacts = [];
        $req = $this->pdo->query("SELECT * FROM contact");
        $data = $req->fetchAll();
        foreach ($data as $contact) {
            $contacts[] = new Contact($contact);
        }
        return $contacts;
    }

    public function get(int $id): Contact 
    {
        $req = $this->pdo->prepare("SELECT * FROM contact WHERE id = :id");
        $req->execute(['id' => $id]);
        $data = $req->fetch();
        $contact = new Contact($data);
        return $contact;
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