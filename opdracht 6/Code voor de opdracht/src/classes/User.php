<?php
    // Functie: classdefinitie User 
    // Auteur: Wigmans
//require_once 'classes/user.php';

namespace Login\classes;
    class User{

        // Eigenschappen 
        public $username;
        public $email;
        private $password;
        
        function SetPassword($password){
            $this->password = $password;
        }
        function GetPassword(){
            return $this->password;
        }

        public function ShowUser() {
            echo "<br>Username: $this->username<br>";
            echo "<br>Password: $this->password<br>";
            echo "<br>Email: $this->email<br>";
        }

        public function RegisterUser(){
        
            $errors=[];
            $validationErrors = $this->ValidateUser();
            if (!empty($validationErrors)) {
                return $validationErrors;
            }
            $UsernameExists = false;
            // Check user exist
            if ($usernameExists) {
                $errors[] = "Username already exists.";
            } else {
                $status = true;
                if (!$status) {
                    $errors[] = "Failed to register user.";
                }
            }
                
                            
                
            
            return $errors;
        }

        function ValidateUser(){
            $errors=[];
        
            if (empty($this->username)){
                array_push($errors, "Invalid username");
            } else if (empty($this->password)){
                array_push($errors, "Invalid password");
            } else if (strlen($this->username) < 3 || strlen($this->username) > 50) {
                array_push($errors, "Username length should be between 3 and 50 characters");
            }
        
            return $errors;
        

            // Test username > 3 tekens en < 50 tekens
        }

        public function LoginUser(){

            // Connect database

            // Zoek user in de table user
           echo "Username:" . $this->username;


            // Indien gevonden dan sessie vullen


            return true;
        }

        // Check if the user is already logged in
        public function IsLoggedin() {
            // Check if user session has been set
            
            return isset($_SESSION['user']);
        }

        public function GetUser($username){
            
		    // Doe SELECT * from user WHERE username = $username
            if (false){
                //Indien gevonden eigenschappen vullen met waarden uit de SELECT
                $this->username = 'Waarde uit de database';
            } else {
                return NULL;
            }   
        }

        public function Logout(){
            session_start();
            // remove all session variables
           session_unset();

            // destroy the session
            session_destroy();
            header('location: index.php');
        }


    }

    

?>