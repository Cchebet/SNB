<?php
    
    require_once 'include/user.php';
    
    $tag="";
    $officialname = "";
    
    $officialpassword = "";
    
    $officialemail = "";
    
    $officialgender= "";
    
    if(isset($_POST['tag'])){
        
        $tag = $_POST['tag'];
        
    }
    if(isset($_POST['name'])){
        
        $officialname = $_POST['name'];
        
    }
    
    if(isset($_POST['password'])){
        
        $officialpassword = $_POST['password'];
        
    }
    
    if(isset($_POST['email'])){
        
        $officialemail = $_POST['email'];
    }
    
    if(isset($_POST['gender'])){
        
        $officialgender = $_POST['gender'];
        
        
    }
    
    // Instance of an official class
    
    $userObject = new User();
    
    if (!empty($tag)){
        // Registration of a new official
        if($tag == "register"){
            if(!empty($officialname) && !empty($officialpassword) && !empty($officialemail) && !empty($officialgender)){
                
                
                $hashed_password = md5($officialpassword);
                
                $json_registration = $userObject->createNewRegisterOfficial($officialname, $hashed_password, $officialemail, $officialgender);
                
                echo json_encode($json_registration);
                echo "Account created";
            }
        }else if($tag == "login"){
            
            // official Login
            if(!empty($officialpassword) && !empty($officialemail)){
                
                $hashed_password = md5($officialpassword);
                
                $json_array = $userObject->loginOfficials($officialemail, $hashed_password);
                
                echo json_encode($json_array);
                echo "Logged in";
            }
        }else{
            echo "Unknown tag received";
            
        }
    }else{
        echo "tag unspecified";
    }
    ?>