<?PHP
include "../config.php";
include "../model/user.php";
include "../model/schedule.php";

class UserC{
   
    public function create(User $user) {

        $existingUser = $this->getUserByEmail($user->getEmail());
        if ($existingUser) {
            // email already exists, throw an error or redirect to an error page
            // ...
            // Example error message:
            $error = "Email already taken. Please choose a different email.";
            // display the error message or redirect to an error page
        }
    
        // check if user with given username already exists
        $existingUser = $this->getUserByUsername($user->getUsername());
        if ($existingUser) {
            // username already exists, throw an error or redirect to an error page
            // ...
            // Example error message:
             $error = "Username already taken. Please choose a different username.";
            // display the error message or redirect to an error page
        }

        $db = config::getConnexion();
        $stmt = $db->prepare("INSERT INTO user (id,name,username, password, email, gender, role, created_At, profile_Pic, documents, dateOfBirth) VALUES (:id ,:name  ,:username, :password, :email, :gender, :role, :createdAt, :profilePic, :documents, :dateOfBirth)");
        $stmt->bindValue(':id', $user->getid());
        $stmt->bindValue(':name', $user->getname());


        $stmt->bindValue(':username', $user->getUsername());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':gender', $user->getGender());
        $stmt->bindValue(':role', $user->getRole());
        
        $stmt->bindValue(':createdAt', $user->getCreatedAt());
        $stmt->bindValue(':profilePic', $user->getProfilePic());
        $stmt->bindValue(':documents', $user->getDocuments());
        $stmt->bindValue(':dateOfBirth', $user->getDateOfBirth());
        $stmt->execute();
        $user->setId($db->lastInsertId());
        echo '<script>document.getElementById("progress-bar-fill").style.width = "50%";</script>';

        return $user;
    } 

    public function createSchedule(Schedule $schedule, $doctorId) {
        $db = config::getConnexion();
        
        // check if the doctor ID is valid
        $doctor = $this->getUserById($doctorId);
        if (!$doctor || $doctor->getRole() !== 'doctor') {
            throw new Exception('Invalid doctor ID.');
            
        }
        
        // check if the schedule already exists
        $existingSchedule = $this->getScheduleByDoctorAndDate($doctorId, $schedule->getDate());
        if ($existingSchedule) {
            throw new Exception('Schedule already exists for this date.');
        }
        
        // insert the schedule into the database
        $stmt = $db->prepare("INSERT INTO schedule (doctor_id, date, start_time, end_time) VALUES (:doctorId, :date, :startTime, :endTime)");
        $stmt->bindValue(':doctorId', $doctorId);
        $stmt->bindValue(':date', $schedule->getDate());
        $stmt->bindValue(':startTime', $schedule->getStartTime());
        $stmt->bindValue(':endTime', $schedule->getEndTime());
      
        $stmt->execute();
        
        $schedule->setId($db->lastInsertId());
        return $schedule;
    }


    public function getDoctorSchedule($doctorId) {
        $db = config::getConnexion();
        
        $doctor = $this->getUserById($doctorId);
        if (!$doctor || $doctor->getRole() !== 'doctor') {
            throw new Exception('Invalid doctor ID.');
        }
        
        $stmt = $db->prepare("SELECT * FROM schedule WHERE doctor_id = :doctorId");
        $stmt->bindValue(':doctorId', $doctorId);
        $stmt->execute();
        
        $schedule = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $schedule[] = new Schedule($row['id'], $row['date'], $row['start_time'], $row['end_time']);
        }
        
        return $schedule;
    }

    public function getScheduleByDoctorAndDate($doctorId, $date) {
        $db = config::getConnexion();
        $stmt = $db->prepare("SELECT * FROM schedule WHERE doctor_id = :doctorId AND date = :date");
        $stmt->bindValue(':doctorId', $doctorId);
        $stmt->bindValue(':date', $date);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $schedules = array();
        foreach ($results as $result) {
            $schedule = new Schedule($result['id'], $result['date'], $result['start_time'], $result['end_time']);
            $schedules[] = $schedule;
        }
    
        return $schedules;
    }
    
    function ReadAll(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From user";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	
    }


    public function getRole($userId) {
        $db = config::getConnexion();
        $stmt = $this->$db->prepare("SELECT role FROM user WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row['role'];
        } else {
            return null;
        }
    }
    public function getDoctors() {
        $db = config::getConnexion();
        $stmt = $db->prepare("SELECT * FROM user WHERE role=:role");
        $stmt->bindValue(':role', 'doctor', PDO::PARAM_STR);
        $stmt->execute();
        $doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $doctors;
    }
   
public function login ($email) {
    $db = config::getConnexion();
    $stmt = $db->prepare("SELECT * FROM user WHERE email=:email");
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user;
}

public function update(User $user) {
    $db = config::getConnexion();
    $stmt = $db->prepare("UPDATE user SET name = :name, username = :username, password = :password, email = :email, gender = :gender, role = :role, created_At = :createdAt, profile_Pic = :profilePic, documents = :documents, dateOfBirth = :dateOfBirth , Modified_at = :modified_at WHERE id = :id");
    $stmt->bindValue(':id', $user->getId());
    $stmt->bindValue(':name', $user->getName());
    $stmt->bindValue(':username', $user->getUsername());
    $stmt->bindValue(':password', $user->getPassword());
    $stmt->bindValue(':email', $user->getEmail());
    $stmt->bindValue(':gender', $user->getGender());
    $stmt->bindValue(':role', $user->getRole());
    $stmt->bindValue(':createdAt', $user->getCreatedAt());
    $stmt->bindValue(':profilePic', $user->getProfilePic());
    $stmt->bindValue(':documents', $user->getDocuments());
    $stmt->bindValue(':dateOfBirth', $user->getDateOfBirth());
    $stmt->bindValue(':modified_at', $user->getModifiedAt());

    $stmt->execute();
    return $user;
}

public function updateUserDetails(User $user, $weight, $height, $activityLevel) {
    $db = config::getConnexion();
    $stmt = $db->prepare("UPDATE user SET weight = :weight, height = :height, activityLevel = :activityLevel WHERE id = :id");
    $stmt->bindValue(':id', $user->getId());
    $stmt->bindValue(':weight', $weight);
    $stmt->bindValue(':height', $height);
    $stmt->bindValue(':activityLevel', $activityLevel);

    $stmt->execute();
    return $user;
}
    public function delete($id) {
        $db = config::getConnexion();
        $stmt = $db->prepare("DELETE FROM user WHERE id=:id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function softDelete($id) {
        $db = config::getConnexion();
        $stmt = $db->prepare("UPDATE user SET is_deleted = 1 WHERE id=:id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
      }
    public function getUserById($id) {
        $db = config::getConnexion();
        $stmt = $db->prepare("SELECT * FROM user WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            return null;
        }
        $user = new User();
        $user->setId($result['id']);
        $user->setName($result['name']);
        $user->setUsername($result['username']);
        $user->setPassword($result['password']);
        $user->setEmail($result['email']);
        $user->setGender($result['gender']);
        $user->setRole($result['role']);
        $user->setCreatedAt($result['Created_at']);
        $user->setProfilePic($result['profile_pic']);
        $user->setDocuments($result['documents']);
        $user->setDateOfBirth($result['dateofbirth']);
        $user->SetIsdeleted($result['is_deleted']);
                $user->SetIsdeleted($result['is_deleted']);
                $user->setHeight($result['height']);
                $user->setWeight($result['weight']);
                $user->setActivityLevel($result['activityLevel']);


        return $user;
    }
    function verifyCredentials($email, $password) {
        $db = config::getConnexion();
        $stmt = $db->prepare('SELECT * FROM user WHERE email = :email AND is_deleted = 0 LIMIT 1');
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user && password_verify($password, $user['password'])) {
            // Password is correct, so return the user's ID
            return $user['id'];
        } else {
            // Invalid credentials
            return false;
        }
    }
    public function getUserByEmail($email) {
        $db = config::getConnexion();
        $stmt = $db->prepare('SELECT * FROM user WHERE email = :email');
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!$userData) {
            return null; // User not found
        }
    
        $user = new User();
        $user->setId($userData['id']);
        $user->setName($userData['name']);
        $user->setUsername($userData['username']);
        $user->setPassword($userData['password']);
        $user->setEmail($userData['email']);
        $user->setGender($userData['gender']);
        $user->setRole($userData['role']);
        $user->setProfilePic($userData['profile_pic']);
        $user->setDocuments($userData['documents']);
    
        return $user;
    }
    public function getUserByUsername($email) {
        $db = config::getConnexion();
        $stmt = $db->prepare('SELECT username FROM user WHERE email = :email');
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user['username'];
    }
    public function getUserByProfilePic($email) {
        $db = config::getConnexion();
        $stmt = $db->prepare('SELECT profile_pic FROM user WHERE email = :email');
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user['profile_pic'];
    }
    
    public function getUserByUsernameOrEmail($username, $email) {
        $db = config::getConnexion();

        $stmt = $db->prepare( 'SELECT * FROM user WHERE username = :username OR email = :email LIMIT 1');
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


}















       /* $sql="INSERT INTO user (username, password, email, gender, role, phone, address, CreatedAt, modifiedAt, deletedAt, profilePic, documents, dateOfBirth) VALUES (:username, :password, :email, :gender, :role, :phone, :address, :CreatedAt, :modifiedAt, :deletedAt, :profilePic, :documents, :dateOfBirth)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $username=$user->getUsername();
        $password=$user->getPassword();
        $email=$user->getEmail();
        $gender=$user->getGender();
        $role= $user->getRole();
        $phone=$user->getPhone();
        $address=$user->getAddress();
     $createdAt=$user->getCreatedAt();
     $modifiedAt=$user->getModifiedAt();
     $deletedAt=$user->getDeletedAt();
     $profilePic=$user->getProfilePic();
     $documents=$user->getDocuments();
     $dateOfBirth=$user->getDateOfBirth();

     $req->bindValue(':username',$username);
     $req->bindValue(':password',$password);  
     $req->bindValue(':email',$email);  
     $req->bindValue(':gender',$gender);    
     $req->bindValue(':role',$role);
     $req->bindValue(':phone',$phone);
     $req->bindValue(':address',$address);
     $req->bindValue(':CreatedAt',$createdAt);
     $req->bindValue(':modifiedAt',$modifiedAt);
         $req->bindValue(':deletedAt',$deletedAt);
         $req->bindValue(':profilePic',$profilePic);
         $req->bindValue(':documents',$documents);
         $req->bindValue(':dateOfBirth',$dateOfBirth);
     
         $req->execute();
        
     }
     catch (Exception $e){
         echo 'Erreur: '.$e->getMessage();
     }
    }
 } */





   
