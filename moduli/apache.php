<?php
    session_start();
    $user =  $_SESSION["user"];
    $pwd =  $_SESSION["pwd"];
    $srvip= $_SESSION["srvip"];
    $srvport = $_SESSION["srvport"];      
?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">APACHE</h4>
    </div>
    <div class="modal-body">
        <?php
    if(!empty($_GET['azione'])){
        if($_GET['azione'] == "installa"){
            echo "installa";
            if (!function_exists("ssh2_connect")) { die("function ssh2_connect doesn't exist"); }
            if(!($con = ssh2_connect($srvip, $srvport))){
                echo "fail: unable to establish connection\n";
            } else {
                if(!ssh2_auth_password($con, $user, $pwd)) {
                    echo "fail: unable to authenticate\n";
                } else {
                    if (!($stream = ssh2_exec($con, "apt-get install apache2"))) {
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
        } elseif($_GET['azione'] == "disinstalla"){
            echo "disinstalla";
            if (!function_exists("ssh2_connect")) { die("function ssh2_connect doesn't exist"); }
            if(!($con = ssh2_connect($srvip, $srvport))){
                echo "fail: unable to establish connection\n";
            } else {
                if(!ssh2_auth_password($con, $user, $pwd)) {
                    echo "fail: unable to authenticate\n";
                } else {
                    if (!($stream = ssh2_exec($con, "apt-get purge apache2"))) {
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
            } elseif($_GET['azione'] == "start"){
            echo "disinstalla";
            if (!function_exists("ssh2_connect")) { die("function ssh2_connect doesn't exist"); }
            if(!($con = ssh2_connect($srvip, $srvport))){
                echo "fail: unable to establish connection\n";
            } else {
                if(!ssh2_auth_password($con, $user, $pwd)) {
                    echo "fail: unable to authenticate\n";
                } else {
                    if (!($stream = ssh2_exec($con, "service apache2 start"))) {
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
        
        
        
        
        /*
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
        }*/
    } else {
        echo '<div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="card card-block">
                    <h3 class="card-title">GENERALE</h3>
                    <div class="card-text">
                        <div class="row">
                            <div class="col-xs-12 col-md-4">
                                &nbsp;&nbsp;SOFTWARE
                            </div>
                            <div class="col-xs-6 col-md-4">
                                <center><a class="btn btn-primary" style="width: 100%;" id="apache.php?azione=installa" onClick="loadModal(this.id)">INSTALLA</a></center>
                            </div>
                            <div class="col-xs-6 col-md-4">
                                <center><a class="btn btn-primary" style="width: 100%;" id="apache.php?azione=disinstalla" onClick="loadModal(this.id)">DISINSTALLA</a></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-12">
                <div class="card card-block">
                    <h3 class="card-title">SERVICE</h3>
                    <div class="card-text">
                        <div class="row">
                            <div class="col-xs-4 col-md-4">
                                <center><a class="btn btn-primary" style="width: 100%;" id="apache.php?azione=start" onClick="loadModal(this.id)">START</a></center>
                            </div>
                            <div class="col-xs-4 col-md-4">
                                <center><a class="btn btn-primary" style="width: 100%;" id="apache.php?azione=stop" onClick="loadModal(this.id)">STOP</a></center>
                            </div>
                            <div class="col-xs-4 col-md-4">
                                <center><a class="btn btn-primary" style="width: 100%;" id="apache.php?azione=restart" onClick="loadModal(this.id)">RESTART</a></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-12">
                <div class="card card-block">
                    <h3 class="card-title">SETTINGS</h3>
                    <div class="card-text">
                        <div class="row">
                            <div class="col-xs-12 col-md-4">
                                &nbsp;&nbsp;GENERALE
                            </div>
                            <div class="col-xs-6 col-md-4">
                                <center><a class="btn btn-primary" style="width: 100%;" id="/etc/apache2/apache2.conf" onClick="loadEdit(this.id)" href="#editModal" data-backdrop="false" data-toggle="modal" data-dismiss="modal">Apache2.conf</a></center>
                            </div>
                            <div class="col-xs-6 col-md-4">
                                <center><a class="btn btn-primary" style="width: 100%;" id="/etc/apache2/ports.conf" onClick="loadEdit(this.id)" href="#editModal" data-backdrop="false" data-toggle="modal" data-dismiss="modal">ports.conf</a></center>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-4">
                                &nbsp;&nbsp;CONF-AVAILABLE
                            </div>
                            <div class="col-xs-6 col-md-4">
                                <center><a class="btn btn-primary" style="width: 100%;" id="/etc/apache2/conf-available/charset.conf" onClick="loadEdit(this.id)" href="#editModal" data-backdrop="false" data-toggle="modal" data-dismiss="modal">charset.conf</a></center>
                            </div>
                            <div class="col-xs-6 col-md-4">
                                <center><a class="btn btn-primary" style="width: 100%;" id="/etc/apache2/conf-available/security.conf" onClick="loadEdit(this.id)" href="#editModal" data-backdrop="false" data-toggle="modal" data-dismiss="modal">security.conf</a></center>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-4">
                                &nbsp;&nbsp;SITES-AVAILABLE
                            </div>
                            <div class="col-xs-6 col-md-4">
                                <center><a class="btn btn-primary" style="width: 100%;" id="/etc/apache2/sites-available/default-ssl.conf" onClick="loadEdit(this.id)" href="#editModal" data-backdrop="false" data-toggle="modal" data-dismiss="modal">default-ssl.conf</a></center>
                            </div>
                            <div class="col-xs-6 col-md-4">
                                <center><a class="btn btn-primary" style="width: 100%;" id="/etc/apache2/sites-available/000-default.conf" onClick="loadEdit(this.id)" href="#editModal" data-backdrop="false" data-toggle="modal" data-dismiss="modal">000-default.conf</a></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }
    ?>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>