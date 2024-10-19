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
                        if(password_verify($password,$users[0]["password"])){
                        header("location: /index.php");
                        $_SESSION["fullname"] = $users[0]["fullname"];
                        exit;
                    } else {
                         header("location: /login.php?");
                         $_SESSION["error"] = "Password not match";
                         exit;
                    }
               } else {
                header("location: /login.php?");
                $_SESSION["error"] = "User not found";
                exit;               
            }



            } catch (Exception $e){
                echo "Connection Failed: " . $e->getMessage();
            }
        
        }

?>