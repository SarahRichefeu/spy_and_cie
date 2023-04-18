<?php

class Stash 
{
    private int $id;
    private string $adress;
    private string $type;
    private string $country;
    private int $mission_id;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
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


    public function getAdress(): string
    {
        return $this->adress;
    }


    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }


    public function getType(): string
    {
        return $this->type;
    }


    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }


    public function getCountry(): string
    {
        return $this->country;
    }


    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }


    public function getMission_id(): int
    {
        return $this->mission_id;
    }


    public function setMission_id(int $mission_id): self
    {
        $this->mission_id = $mission_id;

        return $this;
    }
}