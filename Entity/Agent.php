<?php

class Agent 
{
    //Attributes
    private int $id;
    private string $lastname;
    private string $firstname;
    private string $birthdate;
    private string $code_name;
    private string $nationality_id;
    private ?string $mission_id = null;

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


    public function getLastname(): string
    {
        return $this->lastname;
    }


    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }


    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }


    public function getBirthdate(): string
    {
        return $this->birthdate;
    }

    public function setBirthdate(string $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }


    public function getCode_name(): string
    {
        return $this->code_name;
    }

   
    public function setCode_name($code_name): self
    {
        $this->code_name = $code_name;

        return $this;
    }
   
   
    public function getNationality_id(): int
    {
        return $this->nationality_id;
    }
        
    public function setNationality_id(string $nationality_id): self
    {
        $this->nationality_id = $nationality_id;

        return $this;
    }


    public function getMission_id(): ?string
    {
        return $this->mission_id;
    }


    public function setMission_id(?string $mission_id): self
    {
        $this->mission_id = $mission_id;

        return $this;
    }
}