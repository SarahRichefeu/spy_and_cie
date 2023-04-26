<?php

class Admin 
{
    //Attributes
    private int $id;
    private string $username;
    private string $email;
    private string $password;
    private string $created_at;

    //Constructor
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    //Methods

    public function hydrate(array $data) 
    {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId(): int
    {
        return $this->id;
    }


    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }


    public function getUsername(): string
    {
        return $this->username;
    }


    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }


    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }


    public function getPassword(): string
    {
        return $this->password;
    }


    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }


    public function getCreated_at(): string
    {
        return $this->created_at;
    }


    public function setCreated_at(string $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}