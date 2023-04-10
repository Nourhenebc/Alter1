<?php

class privilege
{
    private int $id;
    private string $type;
    private string $file;
    private string $description;


    public function __construct(int $id,string $type, string $file, string $description)
    {   $this->id=$id;
        $this->type = $type;
        $this->file = $file;
        $this->description = $description;
    }

    public function getType()
    {
        return $this->type;
    }
    public function getFile()
    {
        return $this->file;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }
  
    
    public function setFile($file)
    {
        $this->file = $file;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
}
