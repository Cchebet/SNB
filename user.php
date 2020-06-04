<?php
    
    include_once 'db.php';
    
    class User{
        
        private $db;
        
        private $db_students_table = "students";
        private $db_officials_table = "officials";
        private $db_clubs_table="clubs";
        private $db_events_table="events";
        
        public function __construct(){
            $this->db = new DbConnect();
        }
        ////////Student
        public function isLoginStudentExist($email, $password){
            
            $query = "select * from " . $this->db_students_table . " where email = '$email' AND password = '$password' Limit 1";
            
            $result = mysqli_query($this->db->getDb(), $query);
            
            if(mysqli_num_rows($result) > 0){
                
                mysqli_close($this->db->getDb());
                
                return true;
                
            }
            
            mysqli_close($this->db->getDb());
            
            return false;
            
        }
        
        public function createNewRegisterStudent($name, $password, $email, $gender){
            
            $query = "insert into students (name, password, email, gender) values ('$name', '$password', '$email', '$gender')";
            
            $inserted = mysqli_query($this->db->getDb(), $query);
            
            if($inserted == 1){
                
                $json['success'] = 1;
                
            }else{
                
                $json['success'] = 0;
                
            }
            
            mysqli_close($this->db->getDb());
            
            return $json;
            
        }
        
        public function loginStudents($email, $password){
            
            $json = array();
            
            $canUserLogin = $this->isLoginStudentExist($email, $password);
            
            if($canUserLogin){
                
                $json['success'] = 1;
                
            }else{
                $json['success'] = 0;
            }
            return $json;
        }
        ///////Official
        
        public function isLoginOfficialExist($officialemail, $officialpassword){
            
            $query = "select * from " . $this->db_officials_table . " where officialemail = '$officialemail' AND officialpassword = '$officialpassword' Limit 1";
            
            $result = mysqli_query($this->db->getDb(), $query);
            
            if(mysqli_num_rows($result) > 0){
                
                mysqli_close($this->db->getDb());
                
                return true;
                
            }
            
            mysqli_close($this->db->getDb());
            
            return false;
            
        }
        
        public function createNewRegisterOfficial($officialname, $officialpassword, $officialemail, $officialgender){
            
            $query = "insert into " . $this->db_officials_table . " (officialname, officialpassword, officialemail, officialgender) values ('$officialname', '$officialpassword', '$officialemail', '$officialgender')";
            
            $inserted = mysqli_query($this->db->getDb(), $query);
            
            if($inserted == 1){
                
                $json['success'] = 1;
                
            }else{
                
                $json['success'] = 0;
                
            }
            
            mysqli_close($this->db->getDb());
            
            return $json;
            
        }
        
        public function loginOfficials($officialemail, $officialpassword){
            
            $json = array();
            
            $canUserLogin = $this->isLoginOfficialExist($officialemail, $officialpassword);
            
            if($canUserLogin){
                
                $json['success'] = 1;
                
            }else{
                $json['success'] = 0;
            }
            return $json;
        }
        
        ////////Events
        
        public function EventExist($eventName, $clubName){
            
            $query = "select * from " . $this->$db_events_table . " where ename = '$eventName' AND cname = '$clubName'  Limit 1";
            
            $result = mysqli_query($this->db->getDb(), $query);
            
            if(mysqli_num_rows($result) > 0){
                
                mysqli_close($this->db->getDb());
                
                return true;
                
            }
            
            mysqli_close($this->db->getDb());
            
            return false;
            
        }
        
        public function createEvent($eventName, $clubName, $officialemail){
            
            $query = "insert into events (eventName, clubName, officialemail) values ('$eventName', '$clubName', '$officialemail')";
            
            $inserted = mysqli_query($this->db->getDb(), $query);
            
            if($inserted == 1){
                
                $json['success'] = 1;
                
            }else{
                
                $json['success'] = 0;
                
            }
            
            mysqli_close($this->db->getDb());
            
            return $json;
            
        }
        
       
         ///////////Clubs
        public function ClubExist($clubName, $officialname){
            
            $query = "select * from " . $this->$db_clubs_table . " where cname = '$clubName' AND oname = '$officialname' Limit 1";
            
            $result = mysqli_query($this->db->getDb(), $query);
            
            if(mysqli_num_rows($result) > 0){
                
                mysqli_close($this->db->getDb());
                
                return true;
                
            }
            
            mysqli_close($this->db->getDb());
            
            return false;
            
        }
        
        public function createClub($clubName, $officialname){
            
            $query = "insert into clubs (clubName, officialname) values ('$clubName', '$officialname')";
            
            $inserted = mysqli_query($this->db->getDb(), $query);
            
            if($inserted == 1){
                
                $json['success'] = 1;
                
            }else{
                
                $json['success'] = 0;
                
            }
            
            mysqli_close($this->db->getDb());
            
            return $json;
            
        }
        
        
        

    }
    ?>