<?php


class AdminController
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
            return $pdo;
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
        $admins = [];
        $req = $this->pdo->query("SELECT * FROM admin");
        $data = $req->fetchAll();
        foreach ($data as $admin) {
            $admins[] = new Admin($admin);
        }
        return $admins;
    }

/*   public function get(int $id): Admin 
    {
        $req = $this->pdo->prepare("SELECT * FROM admin WHERE id = :id");
        $req->execute(['id' => $id]);
        $admin = $req->fetch();
        return new Admin($admin);
    }

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