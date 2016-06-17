<?php


//VARIABILI GLOBALI
$path = '/var/www/html/sm';

session_start();
$s = '0';
if(isset($_SESSION['user'])){
    //ESISTE LA SESSIONE
    $user =  $_SESSION["user"];
    $pwd =  $_SESSION["pwd"];
    $s = '1';
} else {
    if (!empty($_POST['nome']) || !empty($_POST['password'])){
        $user = $_POST['nome'];
        $pwd = $_POST['password'];
        $srvip = "localhost";
        $srvport = '22';
            if (!function_exists("ssh2_connect")) {
            die("function ssh2_connect doesn't exist");
        }
        //VERIFICO CREDENZIALI---------------------------------------------------------------------
            if(!($con = ssh2_connect($srvip, $srvport))){
                echo "fail: unable to establish connection\n";
                //CONNESSIONE FALLITA
                header("Location: index.php?error=connessioneerrata");
            } else {
            // try to authenticate with username root, password secretpassword
                if(!ssh2_auth_password($con, $user, $pwd)) {
                    //CREDENZIALI SBAGLIATE

                } else {
                    // CONNESSIONE RIUSCITA
                    $_SESSION["user"] = $user;
                    $_SESSION["pwd"] = $pwd;
                    $_SESSION["srvip"] = $srvip;
                    $_SESSION["srvport"] = $srvport;
                    $s = '1';
            }
        }
    }
}
?>



    <!DOCTYPE html>
    <html ng-app="scotchApp">


    <head>
        <!-- Required meta tags always come first -->
        <title>Bootstrap 101 Template</title>
        <meta charset="utf-8">
        <!-- Bootstrap -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Angular -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular-route.js"></script>
        <script src="script.js"></script>

        <!-- jquery -->
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    </head>

    <?php
    if($s == '1') {
        include 'main.php';
    } else {
        include 'login.php';
    }
?>







    </html>