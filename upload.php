
<?php
    
    require_once 'include/user.php';
    
    $name = "";
    
    $password = "";
    
    $email = "";
    
    $gender="";
    
    if(isset($_POST['name'])){
        
        $name = $_POST['name'];
        
    }
    
    if(isset($_POST['password'])){
        
        $password = $_POST['password'];
        
    }
    
    if(isset($_POST['email'])){
        
        $email = $_POST['email'];
        
    }
    
    if(isset($_POST['gender'])){
        
        $gender = $_POST['gender'];
        
        
    }
    
    // Instance of a User class
    
    $userObject = new User();
    
    // Registration of new user
    
    if(!empty($name) && !empty($password) && !empty($email) && !empty($gender)){
        
        
        $hashed_password = md5($password);
        
        $json_registration = $userObject->createNewRegisterStudent($name, $hashed_password, $email, $gender);
        
        echo json_encode($json_registration);
        echo "Account created";
    }
    
    // User Login
    
    if(!empty($password) && empty($email)){
        
        $hashed_password = md5($password);
        
        $json_array = $userObject->loginUsers($email, $hashed_password);
        
        echo json_encode($json_array);
        echo "Loged in";
        
    }
    
    ?>