<?php

class Status 
{
    private int $id; 
    private string $name;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

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


    public function getName(): string
    {
        return $this->name;
    }


    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}