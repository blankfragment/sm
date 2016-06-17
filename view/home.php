<div class="row">
    <div class="col-xs-3 col-md-1" href="#myModal" data-backdrop="false" data-toggle="modal"><img class="img-responsive" style="width: 100%;" src="img/folder.png"></div>
    <?php
    $files = scandir('../moduli');
    foreach($files as $file) {
        if(($file != ".") && ($file != "..")){
            include "../db.php";
            mysql_select_db($db_name, $con);
            $sql = "SELECT * FROM moduli where nomefile='".$file."'";
            $result = mysql_query($sql);
            $count = mysql_num_rows($result);
            if($count>=1){
                while ($row = mysql_fetch_assoc($result)) {
                    echo '<div class="col-xs-3 col-md-1" id="'.$row[nomefile].'" href="#mModal" onClick="loadModal(this.id);" data-backdrop="false" data-toggle="modal"><img class="img-responsive" style="width: 100%;" src="img/'.$row['img'].'"></div>';
                }
            } 
            mysql_close($con);

        }
        include $file;
    }
    ?>
</div>
