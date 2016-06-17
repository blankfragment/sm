<br>
<div class="row">
    <div class="col-sm-12 col-md-11 col-md-offset-1">
<?php  


include "../db.php";
if ($con == FALSE){die ( "Errore nella connessione. Verificare i parametri nel file db.php"); }
mysql_select_db($db_name, $con) or die ("Errore nella selezione del database. Verificare i parametri nel file db.php");

$sql = "SELECT DISTINCT categoria FROM moduli";
$result = mysql_query($sql);
$count = mysql_num_rows($result);
if($count>=1){
while ($row = mysql_fetch_assoc($result)) {
    echo '<h1>&nbsp;&nbsp;&nbsp;'.strtoupper($row['categoria']).'</h1>';
    echo '<div class="row">';
        
    $sql2 = "SELECT * FROM moduli where categoria = '".$row['categoria']."'";
    $result2 = mysql_query($sql2);
    $count2 = mysql_num_rows($result2);
    if($count2>=1){
        while ($row = mysql_fetch_assoc($result2)) {
            echo '<div class="col-xs-6 col-md-2">';
            echo '<div class="card card-dark bg-inverse">
                    <img class="card-img-top img-responsive" style="width: 100%;" src="img/'.$row['img'].'" alt="Card image cap">
                      <div class="card-block">
                      <h3 class="card-title">'.$row['nome'].'</h3>
                        <p class="card-text">'.$row['descrizione'].'</p>';
                        if(file_exists('../moduli/'.$row['nomefile'])){
                            echo '<center><a href="#" class="btn btn-primary">Disinstalla</a></center>';
                        } else {
                            echo '<center><a href="#" class="btn btn-primary">Installa</a></center>';
                        }
                     echo '</div>
                    </div>';
            echo '</div>';
        }
    }
    echo '</div>';
    
}
} else {
echo "CREDENZIALI ERRATE";
}
mysql_close($con);

?>
</div></div>
