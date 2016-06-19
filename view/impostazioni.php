<br>
<div class="row">
    <div class="col-sm-12 col-md-11 col-md-offset-1">


        <div class="row">


            <div class="col-xs-12 col-md-6">
                <div class="card card-block card-dark bg-inverse">
                    <h3 class="card-title">INFO SISTEMA</h3>
                    <div class="card-text">
                        <div class="row">
                            <div class="col-xs-7 col-md-9">
                                Versone:
                            </div>
                            <div class="col-xs-5 col-md-3">
                                0.1
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-9">
                                Server Software:
                            </div>
                            <div class="col-xs-5 col-md-3">
                                <?php echo $_SERVER['SERVER_SOFTWARE']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-9">
                                Php Version:
                            </div>
                            <div class="col-xs-5 col-md-3">
                                <?php echo phpversion(); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-9">
                                Server address:
                            </div>
                            <div class="col-xs-5 col-md-3">
                                <?php echo $_SERVER['SERVER_ADDR']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-9">
                                Remote address:
                            </div>
                            <div class="col-xs-5 col-md-3">
                                <?php echo $_SERVER['REMOTE_ADDR']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-9">
                                Server name:
                            </div>
                            <div class="col-xs-5 col-md-3">
                                <?php echo $_SERVER['SERVER_NAME']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-9">
                                Server port:
                            </div>
                            <div class="col-xs-5 col-md-3">
                                <?php echo $_SERVER['SERVER_PORT']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-9">
                                Document root:
                            </div>
                            <div class="col-xs-5 col-md-3">
                                <?php echo $_SERVER['DOCUMENT_ROOT']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-xs-12 col-md-6">
                <div class="card card-block card-dark bg-inverse">
                    <h3 class="card-title">Generale</h3>
                    <div class="card-text">

                        <div class="row">
                            <div class="col-xs-7 col-md-9">
                                Lingua
                            </div>
                            <div class="col-xs-5 col-md-3">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Seleziona
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <a class="dropdown-item" href="#">Italiano</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-9">
                                Logout:
                            </div>
                            <div class="col-xs-5 col-md-3">
                                <a href="logout.php" class="btn btn-primary">Logout</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-9">
                                Cerca aggiornamenti
                            </div>
                            <div class="col-xs-5 col-md-3">
                                <a href="#" class="btn btn-primary">Aggiorna</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>