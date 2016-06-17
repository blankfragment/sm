<?php
//VARIABILI GLOBALI
$path = '/var/www/html/sm';

 if (!empty($_GET['app'])){
     echo '<div class="card card-block card-dark bg-inverse">
        <p class="card-text">Disinstallazione...</p>
        <h3 class="card-title">'.$_GET['app'].'</h3>
    </div><div id="tmp"></div>';
     echo '<script>
     $(document).ready(function() {
            $("#tmp").load("view/disinstalla.php?modulo='.$_GET['app'].'")
        });</script>';
 } elseif (!empty($_GET['modulo'])){
     
     if (!function_exists("ssh2_connect")) {
            die("function ssh2_connect doesn't exist");
        }
	// log in at server1.example.com on port 22
	if(!($con = ssh2_connect("localhost", 22))){
            echo "fail: unable to establish connection\n";
	} else {
            // try to authenticate with username root, password secretpassword
            if(!ssh2_auth_password($con, 'root', 'bnk!')) {
                echo "fail: unable to authenticate\n";
            } else {
                // allright, we're in!
                // execute a command
                if (!($stream = ssh2_exec($con, "rm ".$path."/moduli/".$_GET['modulo']))) {
                    echo "fail: unable to execute command\n";
                } else {
                // collect returning data from command
                    stream_set_blocking($stream, true);
                    $data = "";
                    while ($buf = fread($stream,4096)) {
                        $data .= $buf;
                    }
                    fclose($stream);
                }
            }
        }
     
     
     
     
     echo '<script>
        $(document).ready(function() {
            $("#notifica1").load("view/disinstalla.php?stato=completato")
        });
    </script>';
 } elseif (!empty($_GET['stato'])){
     echo '<div class="card card-block card-dark bg-inverse">
        <p class="card-text">Disinstallazione...</p>
        <h3 class="card-title">COMPLETATA</h3>
        </div>';
 } else {
     echo 'NESSUNA NOTIFICA';
 }

?>  