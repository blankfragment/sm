<?php
include "db.php";

if ($con == FALSE)
die ("Errore nella connessione. Verificare i parametri nel file db.php");
mysql_select_db($db_name, $con) 
or die ("Errore nella selezione del database. Verificare i parametri nel file db.php");
$sql = "SELECT * FROM dati ORDER BY ID DESC LIMIT 10";
$result = mysql_query($sql);
$count = mysql_num_rows($result);


echo '{"dati":[';
$i = 1;
if($count>=1){
    while ($row = mysql_fetch_assoc($result)) {
        $id = $row['ID'];
        $cpu = $row['cpu'];
        $mem = $row['mem'];
	$temp = $row['temp'];
	$pres = $row['pres'];
	$humi = $row['humi'];

        $a = array('id' => $id, 'cpu' => $cpu, 'mem' => $mem, 'temp' => $temp, 'pres' => $pres, 'humi' => $humi);
        print(json_encode($a));
	if($i<10){
		echo ",";
	}
        $i++;
    }
    
} 
else {
    echo "CREDENZIALI ERRATE";
}
echo ']}';



mysql_close($con);

?>
