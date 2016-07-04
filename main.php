<body ng-controller="mainController" style="overfzlow-x:hidden; background-color: #1F1F1F;">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#myModal").draggable();
            $("#myModal2").draggable();
            $("#mModal").draggable();
            $("#editModal").draggable();
        });
        $(document).ready(function() {
            loadHome();
            loadInstalla("");
            loadFileManager("/")
        });

        function loadFileManager(id) {
            $('#fileManager').load('fileManager.php?path=' + id)
        }
        function loadEdit(id) {
            $('#modalEdit').load('view/edit.php?path=' + id)
        }

        function loadHome() {
            $('#main').load('view/home.php')
        }

        function loadModuli() {
            $('#main').load('view/moduli.php')
        }

        function loadImpostazioni() {
            $('#main').load('view/impostazioni.php')
        }

        function loadModal(id) {
            $('#mainModal').load('moduli/' + id)
        }

        function loadInstalla(id) {
            $('#notifica1').load('view/installa.php?app=' + id)
        }

        function loadDisinstalla(id) {
            $('#notifica1').load('view/disinstalla.php?app=' + id)
        }
        function editSalva(testo, path) {
            testo.replace(/ /g, "space");
            $('#modalEdit').load('view/edit.php?path=' + path + '&testo=' + testo)
            //window.alert('view/edit.php?path=' + path + '$testo=' + testo);
        }
    </script>


    <div class="collapse" id="exCollapsingNavbar">
        <div class="bg-inverse p-a-1">
            <div class="row">
                <div class="col-xs-12 col-md-2" id="notifica1">

                </div>
            </div>
        </div>
    </div>


    <nav class="navbar navbar-dark bg-inverse">
        <a class="navbar-brand" href="#">Server Manager</a>
        <ul class="nav navbar-nav nav-pills pull-xs-right">
            <li class="nav-item active">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">&#9776;</button>
            </li>
        </ul>
        <ul class="nav navbar-nav nav-pills pull-xs-right">
            <li class="nav-item active">
                <a class="nav-link" onclick="loadHome()">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" onclick="loadModuli()">Moduli</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" onclick="loadImpostazioni()">Impostazioni</a>
            </li>
        </ul>
    </nav>
    <div class="row ">
        <div class="col-xs-12 hidden-md-up">
            <br>
            <div class="card card-block card-dark bg-inverse">
                <div class="row ">
                    <div class="col-xs-6">
                        <center>CPU</center>
                        <center>
                            <h5>{{myData[1].cpu}}%</h5></center>
                    </div>
                    <div class="col-xs-6">
                        <center>MEMORIA</center>
                        <center>
                            <h5>{{myData[1].mem}}%</h5></center>
                    </div>
                    <div class="col-xs-4">
                        <center>TEMPERATURA</center>
                        <center>
                            <h5>{{myData[1].temp}}°</h5></center>
                    </div>
                    <div class="col-xs-4">
                        <center>PRESSIONE</center>
                        <center>
                            <h5>{{myData[1].pres}}mb</h5></center>
                    </div>
                    <div class="col-xs-4">
                        <center>UMIDITA</center>
                        <center>
                            <h5>{{myData[1].humi}}%</h5></center>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-10">
            <div id="main"></div>
        </div>
        <div class="col-xs-12 col-md-2 hidden-sm-down">
            <br>
            <div class="row">
                <div class="col-xs-12">
                    <div class="card card-block card-dark bg-inverse">
                        <p class="card-text">CPU</p>
                        <h3 class="card-title">{{myData[1].cpu}}%</h3>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="card card-block  card-dark bg-inverse">
                        <p class="card-text">MEMORIA</p>
                        <h3 class="card-title">{{myData[1].mem}}%</h3>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="card card-block card-dark bg-inverse">
                        <p class="card-text">TEMPERATURA</p>
                        <h3 class="card-title">{{myData[1].temp}}°</h3>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="card card-block card-dark bg-inverse">
                        <p class="card-text">PRESSIONE</p>
                        <h3 class="card-title">{{myData[1].pres}}mb</h3>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="card card-block card-dark bg-inverse">
                        <p class="card-text">UMIDITA</p>
                        <h3 class="card-title">{{myData[1].humi}}%</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content" id="fileManager" style="overfzlow-y:hidden;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">FILE MANAGER</h4>
                </div>
                <div class="modal-body">
                    loading
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal2" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Setting2s</h4>

                </div>
                <div class="modal-body">
                    <p>Settings</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div id="editModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content" id="modalEdit">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">EditModal</h4>

                </div>
                <div class="modal-body">
                    <p>Settings</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div id="mModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content" id="mainModal">

            </div>
        </div>
    </div>





</body>