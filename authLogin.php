<?php
    $username= $_POST["username"];
    $password= $_POST["password"];


    session_start();


    if($_SERVER["REQUEST_METHOD"] == "POST"){


            // connect to database
            $host = "localhost";
            $database = "ecommercev2";
            $dbusername = "root";
            $dbpassword = "";
            
            $dsn = "mysql: host=$host;dbname=$database;";
            try {
                $conn = new PDO($dsn, $dbusername, $dbpassword);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
                //p_fullname,$fullname
                $stmt = $conn->prepare('SELECT * FROM users WHERE username = :p_username');
                $stmt->bindParam(':p_username', $username);
                $stmt->execute();
                $users = $stmt->fetchAll();
               if($users){
                //echo "user found".json_encode($users);
                    if($password == $users[0]["password"]){
                    //if(password_verify($password,$users[0]["password"])){
                        echo "login successful";
                        $_SESSION["fullname"] = $users[0]["fullname"];
                    } else {
                        echo "password did not match";
                }
               } else {
                echo "user not exist";
               }

            } catch (Exception $e){
                echo "Connection Failed: " . $e->getMessage();
            }
        
        }

?>