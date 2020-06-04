<?php
    
    require_once 'include/user.php';
    
    $officialname = "";
    
    $officialpassword = "";
    
    $officialemail = "";
    
    $officialgender= "";
    
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
                                        
                                        // Registration of a new official
                                        
                                        if(!empty($officialname) && !empty($officialpassword) && !empty($officialemail) && !empty($officialgender)){
                                       
                                        
                                        $hashed_password = md5($officialpassword);
                                        
                                        $json_registration = $userObject->createNewRegisterOfficial($officialname, $hashed_password, $officialemail, $officialgender);
                                        
                                        echo json_encode($json_registration);
                                            echo "Account created";
                                          
                                        
                                        }
                                        
                                        // official Login
                                        
                                        if(!empty($officialpassword) && empty($officialemail)){
                                       
                                        $hashed_password = md5($officialpassword);
                                        
                                        $json_array = $userObject->loginUsers($officialemail, $hashed_password);
                                        
                                        echo json_encode($json_array);
                                            echo "Loged in";
                                        }
                                        ?>