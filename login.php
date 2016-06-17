<body style="background-color: #1F1F1F;">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.js"></script>

    <br>
    <br>
    <br>
    <div class="row ">
        <div class="col-xs-12 col-md-4 col-md-offset-4">
            <div class="card card-block  card-dark bg-inverse">
                <center>
                    <h4 class="card-title">LOGIN</h4></center>
                <form method="post" action="index.php">
                    <div class="row">
                        <div class="col-xs-12 col-md-10 col-md-offset-1">
                            <fieldset class="form-group">
                                <input type="text" class="form-control" name="nome" placeholder="Name">
                            </fieldset>
                        </div>
                        <div class="col-xs-12 col-md-10 col-md-offset-1">
                            <fieldset class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </fieldset>
                        </div>
                        <div class="col-xs-12 col-md-6 col-md-offset-3">
                            <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>