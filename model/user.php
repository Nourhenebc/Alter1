<?php


class User {
    private $id;
    private $name;

    private $username;
    private $password;
    private $email;
    private $gender;
    private $role;
    //private $phone;
   // private $address;
    private $createdAt;
    private $modifiedAt;
    private $deletedAt;
    private $profilePic;
    private $documents;
    private $dateOfBirth;
    private $IsDeleted;
private $weight ;
private $height ;
private $activityLevel; 


    public function __construct($id =null , $name = null , $username = null, $password = null, $email = null, $gender = null, $role = null, $createdAt = null, $modifiedAt = null, $deletedAt = null, $profilePic = null, $documents = null, $dateOfBirth = null ,  $IsDeleted = null) {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->gender = $gender;
        $this->role = $role;
        $this->createdAt = $createdAt;
        $this->modifiedAt = $modifiedAt;
        $this->deletedAt = $deletedAt;
        $this->profilePic = $profilePic;
        $this->documents = $documents;
        $this->dateOfBirth = $dateOfBirth;       
         $this->IsDeleted = $IsDeleted;

    }
    public function const($id =null , $name = null , $username = null, $password = null, $email = null ,$profilePic = null, $documents = null, $modifiedAt = null) {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
  
        $this->profilePic = $profilePic;
        $this->documents = $documents;
        $this->modifiedAt = $modifiedAt;

    }


    // Getters and setters for each property
public function getid(){
    return $this->id;
}


    public function setid($id){
        $this->id = $id;
    }
   
    public function getname(){
        return $this->name;
    }
    
    public function setname($name){
        $this->name = $name;
    }
    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getGender() {
        return $this->gender;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    
    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    public function getModifiedAt() {
        return $this->modifiedAt;
    }

    public function setModifiedAt($modifiedAt) {
        $this->modifiedAt = $modifiedAt;
    }

    public function getIsdeleted() {
        return $this->IsDeleted;
    }
    public function SetIsdeleted($Isdeleted) {
        $this->IsDeleted = $Isdeleted;
    }

    public function getDeletedAt() {
        return $this->deletedAt;
    }

    public function setDeletedAt($deletedAt) {
        $this->deletedAt = $deletedAt;
    }

    public function getProfilePic() {
        return $this->profilePic;
    }

    public function setProfilePic($profilePic) {
        $this->profilePic = $profilePic;
    }

    public function getDocuments() {
        return $this->documents;
    }

    public function setDocuments($documents) {
        $this->documents = $documents;}

        public function getDateOfBirth() {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth($dateOfBirth) {
        $this->dateOfBirth = $dateOfBirth;
    }

/**
 * Get the value of activityLevel
 */ 
public function getActivityLevel()
{
return $this->activityLevel;
}

/**
 * Get the value of activityLevel
 */ 

/**
 * Set the value of activityLevel
 *
 * @return  self
 */ 
public function setActivityLevel($activityLevel)
{
$this->activityLevel = $activityLevel;

return $this;
}

/**
 * Get the value of height
 */ 
public function getHeight()
{
return $this->height;
}

/**
 * Set the value of height
 *
 * @return  self
 */ 
public function setHeight($height)
{
$this->height = $height;

return $this;
}

/**
 * Get the value of weight
 */ 
public function getWeight()
{
return $this->weight;
}

/**
 * Set the value of weight
 *
 * @return  self
 */ 
public function setWeight($weight)
{
$this->weight = $weight;

return $this;
}
}
?>