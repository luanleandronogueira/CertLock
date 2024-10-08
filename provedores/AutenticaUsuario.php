<?php 
session_start();
include 'Classes.php';

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    

}

