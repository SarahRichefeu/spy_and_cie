<?php


class Mission
{
    //Attributes
    private int $id;
    private string $name;
    private string $description;
    private string $code_name;
    private string $start_date;
    private string $end_date;
    private string $speciality;
    private string $country_id;
    private string $mission_status_id;
    private string $mission_type_id; 


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

    public function getName(): string
    {
        return $this->name;
    }


    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }


    public function getDescription(): string
    {
        return $this->description;
    }


    public function setDescription( string $description): self
    {
        $this->description = $description;

        return $this;
    }


    public function getCode_name(): string
    {
        return $this->code_name;
    }


    public function setCode_name(string $code_name): self
    {
        $this->code_name = $code_name;

        return $this;
    }

    public function getStart_date(): string
    {
        return $this->start_date;
    }


    public function setStart_date(string $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

 
    public function getEnd_date(): string
    {
        return $this->end_date;
    }


    public function setEnd_date(string $end_date): self
    {
        $this->end_date = $end_date;

        return $this;
    }


    public function getSpeciality(): string
    {
        return $this->speciality;
    }


    public function setSpeciality(string $speciality): self
    {
        $this->speciality = $speciality;

        return $this;
    }

    public function getCountry_id(): string
    {
        /*$req = $pdo->prepare("SELECT name FROM spy_and_cie.country WHERE id = :id");
        $req->execute(['id' => $id]);
        $country_id = $req->fetch();
        $this->country_id = $country_id['name'];*/
        return $this->country_id;
    }


    public function setCountry_id(int $country_id): self
    {
        $this->country_id = $country_id;

        return $this;
    }


    public function getMission_status_id(): int
    {
        return $this->mission_status_id;
    }

    public function setMission_status_id(int $mission_status_id): self
    {
        $this->mission_status_id = $mission_status_id;

        return $this;
    }

    public function getMission_type_id():  int
    {
        return $this->mission_type_id;
    }

    public function setMission_type_id(int $mission_type_id): self
    {
        $this->mission_type_id = $mission_type_id;

        return $this;
    }
}



