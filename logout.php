<?php 
session_start();
require_once(__DIR__."/app/config/Directories.php");
require_once("includes/header.php");
    //check if session["error"] exists

    //session end - logout.php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $_SESSION = [];
        session_destroy();
    }

?>

    <!-- Navbar -->
    <?php require_once("includes/navbar.php")?>

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card text-center shadow p-3" style="width: 24rem;">
            <div class="card-body">
                <h5 class="card-title">You have been logged out</h5>
                <p class="card-text">Thank you for visiting. You are now logged out.</p>
                <a href="/login.php" class="btn btn-primary">Go to Login</a>
            </div>
        </div>
    </div>

    <?php require_once("includes/footer.php")?>   


