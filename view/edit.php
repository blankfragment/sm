<?php
    session_start();
    $user =  $_SESSION["user"];
    $pwd =  $_SESSION["pwd"];
    $srvip= $_SESSION["srvip"];
    $srvport = $_SESSION["srvport"];      
?>  
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <?php
        $path = $_REQUEST['path'];
        echo '<h4 class="modal-title">EDITOR:  '.$path.'</h4>';
    ?>

</div>
<div class="modal-body">
    <?php
    if(empty($_GET['testo'])){
        if (!function_exists("ssh2_connect")) { die("function ssh2_connect doesn't exist"); }
        if(!($con = ssh2_connect($srvip, $srvport))){
            echo "fail: unable to establish connection\n";
        } else {
            if(!ssh2_auth_password($con, $user, $pwd)) {
                echo "fail: unable to authenticate\n";
            } else {
                if (!($stream = ssh2_exec($con, "cat " . $path ))) {
                    echo "fail: unable to execute command\n";
                } else {
                    stream_set_blocking($stream, true);
                    $data = "";
                    while ($buf = fread($stream,4096)) {
                        $data .= $buf;
                    }
                    fclose($stream);
                    $pieces = explode(chr(10), $data);	
                    echo '<textarea id="textarea" type="text" class="form-control" rows="10" placeholder="Testo">';
                    for ($x = 0; $x < count($pieces); $x=$x+1) {
                        echo $pieces[$x].'&#013;';
                    }
                echo '</textarea>';
                }
            }
        }
    } else {
        if (!function_exists("ssh2_connect")) { die("function ssh2_connect doesn't exist"); }
        if(!($con = ssh2_connect($srvip, $srvport))){
            echo "fail: unable to establish connection\n";
        } else {
            if(!ssh2_auth_password($con, $user, $pwd)) {
                echo "fail: unable to authenticate\n";
            } else {
                if (!($stream = ssh2_exec($con, "echo " .str_replace('&#013;',chr(10),$_GET['testo']). ' > '. $path ))) {
                    echo "fail: unable to execute command\n";
                } else {
                    stream_set_blocking($stream, true);
                    $data = "";
                    while ($buf = fread($stream,4096)) {
                        $data .= $buf;
                    }
                    fclose($stream);
                }
            }
        }
    }
    ?>
    
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" data-dismiss="modal" onClick="editSalva($('textarea').val(),'<?php echo $path; ?>')">Save changes</button>
</div>