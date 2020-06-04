
<?php
    
    require_once 'include/user.php';
    
    $eventName = "";
    
    $clubName = "";
    
    $officialemail = "";
    
    
    
    if(isset($_POST['ename'])){
        
        $eventName = $_POST['ename'];
        
    }
    
    if(isset($_POST['cname'])){
        
        $clubName = $_POST['cname'];
        
    }
    
    if(isset($_POST['email'])){
        
        $officialemail = $_POST['email'];
        
    }
    

    // Instance of a User class
    
    $userObject = new User();

    // Registration of new event
    
    if(!empty($eventName) && !empty($clubName) && !empty($officialemail)){
        
    
        
        $json_registration = $userObject->createEvent($eventName, $clubName,$officialemail);
        
        echo json_encode($json_registration);
        echo "Event registered";
    }
    
    
    ?>