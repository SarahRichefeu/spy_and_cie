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

    public function create(Contact $contact): void
    {
        $req = $this->pdo->prepare('INSERT INTO contact (lastname, firstname, code_name, birthdate, nationality, mission_id) VALUES (:lastname, :firstname, :code_name, :birthdate, :nationality, :mission_id)');
        $req->execute([
            'lastname' => $contact->getLastname(),
            'firstname' => $contact->getFirstname(),
            'code_name' => $contact->getCode_name(),
            'birthdate' => $contact->getBirthdate(),
            'nationality' => $contact->getNationality(),
            'mission_id' => $contact->getMission_id()
        ]);
    }


    public function update(Contact $contact): void
    {   
        $req = $this->pdo->prepare("UPDATE contact SET id = :id, lastname = :lastname, firstname = :firstname, code_name = :code_name, birthdate = :birthdate, nationality = :nationality, mission_id = :mission_id WHERE id = :id");
        $req->execute([
            'id' => $contact->getId(),
            'lastname' => $contact->getLastname(),
            'firstname' => $contact->getFirstname(),
            'code_name' => $contact->getCode_name(),
            'birthdate' => $contact->getBirthdate(),
            'nationality' => $contact->getNationality(),
            'mission_id' => $contact->getMission_id()
        ]);
    }

    public function delete(int $id): void 
    {
        $req = $this->pdo->prepare("DELETE FROM contact WHERE id = :id");
        $req->execute(['id' => $id]);
    }


}