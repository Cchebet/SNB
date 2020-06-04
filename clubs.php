
<?php
    
    require_once 'include/user.php';
    
    $clubName = "";
    
    $officialname="";
    
    
    if(isset($_POST['cname'])){
        
        $clubName = $_POST['cname'];
        
    }
    
    if(isset($_POST['oname'])){
        
        $officialname = $_POST['oname'];
        
    }

    
    
    // Instance of a User class
    
    $userObject = new User();
    
    // Registration of new user
    
    if(!empty($clubName) && !empty($officialname)){
        
        
        $json_registration = $userObject->createClub($clubName, $officialname);
        
        echo json_encode($json_registration);
        echo "Club Registered";
    }
    
    
    
    ?>