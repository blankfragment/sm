<?php

 if (!empty($_GET['app'])){
     echo '<div class="card card-block card-dark bg-inverse">
        <p class="card-text">Installazione...</p>
        <h3 class="card-title">'.$_GET['app'].'</h3>
    </div><div id="tmp"></div>';
     echo '<script>
     $(document).ready(function() {
            $("#tmp").load("view/installa.php?modulo='.$_GET['app'].'")
        });</script>';
 } elseif (!empty($_GET['modulo'])){
     echo '<script>
        $(document).ready(function() {
        window.alert("ciao");
            $("#notifica1").load("view/installa.php?stato=completato")
        });
    </script>';
 } elseif (!empty($_GET['stato'])){
     echo '<div class="card card-block card-dark bg-inverse">
        <p class="card-text">Installazione...</p>
        <h3 class="card-title">COMPLETATA</h3>
        </div>';
 } else {
     echo 'NESSUNA NOTIFICA';
 }