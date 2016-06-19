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
        echo '<h4 class="modal-title">FILE MANAGER:  '.$path.'</h4>';
    ?>

</div>
<div class="modal-body">
    <div class="row ">
        <?php
             if(substr($path, 0, strlen($path)-strlen(explode("/", $path)[count(explode("/", $path))-1])-1) == ""){
                echo '<div class="col-xs-3 col-md-2" onClick="loadFileManager(this.id);" id="/"><img class="img-responsive" style="width: 100%;" src="img/folder.png"><center>...</center></div>';
             } else {
                 echo '<div class="col-xs-3 col-md-2" onClick="loadFileManager(this.id);" id="'.substr($path, 0, strlen($path)-strlen(explode("/", $path)[count(explode("/", $path))-1])-1).'"><img class="img-responsive" style="width: 100%;" src="img/folder.png"><center>...</center></div>';
             }
            $user="root";
            $pwd="bnk!";
            $srv="2.234.132.219";
            if (!function_exists("ssh2_connect")) { die("function ssh2_connect doesn't exist"); }
            if(!($con = ssh2_connect($srvip, $srvport))){
                echo "fail: unable to establish connection\n";
            } else {
                if(!ssh2_auth_password($con, $user, $pwd)) {
                    echo "fail: unable to authenticate\n";
                } else {
                    if (!($stream = ssh2_exec($con, "ls " . $path ))) {
                        echo "fail: unable to execute command\n";
                    } else {
                        stream_set_blocking($stream, true);
                        $data = "";
                        while ($buf = fread($stream,4096)) {
                            $data .= $buf;
                        }
                        fclose($stream);
                        $pieces = explode(chr(10), $data);	
                        for ($x = 0; $x < count($pieces); $x=$x+1) {
                            if($x < count($pieces)-1){
                                if($path == "/"){
                                    $path = "";
                                }
                                 if(($pieces[$x] != "..")||($pieces[$x] != ".")||($pieces[$x] != "")||(strlen($pieces[$x]) != 0)){
                                     if(count(explode(".", $pieces[$x]))>=2){
                                         if(explode(".", $pieces[$x])[count(explode(".", $pieces[$x]))-1] == "txt"){
                                             echo '<div class="col-xs-3 col-md-2" onClick="loadEdit(this.id)" id="'.$path.'/'.$pieces[$x].'" href="#editModal" data-backdrop="false" data-toggle="modal"><img class="img-responsive" style="width: 100%;" src="img/txt.png"><center>'.substr($pieces[$x],0,9).'</center></div>';
                                         } elseif(explode(".", $pieces[$x])[count(explode(".", $pieces[$x]))-1] == "php"){
                                             echo '<div class="col-xs-3 col-md-2" onClick="loadFileManager(this.id);" id="'.$path.'/'.$pieces[$x].'"><img class="img-responsive" style="width: 100%;" src="img/php.png"><center>'.substr($pieces[$x],0,9).'</center></div>';
                                         } else {
                                             echo '<div class="col-xs-3 col-md-2" onClick="loadFileManager(this.id);" id="'.$path.'/'.$pieces[$x].'"><img class="img-responsive" style="width: 100%;" src="img/file.png"><center>'.substr($pieces[$x],0,9).'</center></div>';
                                         }
                                     } else {
                                         echo '<div class="col-xs-3 col-md-2" onClick="loadFileManager(this.id);" id="'.$path.'/'.$pieces[$x].'"><img class="img-responsive" style="width: 100%;" src="img/folder.png"><center>'.substr($pieces[$x],0,8).'</center></div>';
                                     }
                                }
                            }
                        }
                    }
                }
            }
            ?>

    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>