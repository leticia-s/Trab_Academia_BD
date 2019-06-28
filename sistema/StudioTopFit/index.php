
<?php
include 'View/validalogin.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>STUDIO TOP FIT</title>
        <link rel="icon" href="../imagens/logo.png" type="image/gif" sizes="16x16">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap-reboot.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/simple-sidebar.css?v=1" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="icon" href="imagens/logo.png" type="image/gif" sizes="16x16">
        <style type="text/css">
        </style>   
        <script>
            var clockid = new Array()
            var clockidoutside = new Array()
            var i_clock = -1
            var thistime = new Date()
            var hours = thistime.getHours()
            var minutes = thistime.getMinutes()
            var seconds = thistime.getSeconds()
            if (eval(hours) < 10) {
                hours = "0" + hours
            }
            if (eval(minutes) < 10) {
                minutes = "0" + minutes
            }
            if (seconds < 10) {
                seconds = "0" + seconds
            }
            var thistime = hours + ":" + minutes + ":" + seconds

            function writeclock() {
                i_clock++
                if (document.all || document.getElementById || document.layers) {
                    clockid[i_clock] = "clock" + i_clock
                    document.write("<span id='" + clockid[i_clock] + "' style='position:relative'>" + thistime + "</span>")
                }
            }

            function clockon() {
                thistime = new Date()
                hours = thistime.getHours()
                minutes = thistime.getMinutes()
                seconds = thistime.getSeconds()
                if (eval(hours) < 10) {
                    hours = "0" + hours
                }
                if (eval(minutes) < 10) {
                    minutes = "0" + minutes
                }
                if (seconds < 10) {
                    seconds = "0" + seconds
                }
                thistime = hours + ":" + minutes + ":" + seconds

                if (document.all) {
                    for (i = 0; i <= clockid.length - 1; i++) {
                        var thisclock = eval(clockid[i])
                        thisclock.innerHTML = thistime
                    }
                }

                if (document.getElementById) {
                    for (i = 0; i <= clockid.length - 1; i++) {
                        document.getElementById(clockid[i]).innerHTML = thistime
                    }
                }
                var timer = setTimeout("clockon()", 1000)
            }
            window.onload = clockon

        </SCRIPT>

    </head>
    <body>
		<body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading font-weight-bold">STUDIO TOP FIT</div>
                <div class="list-group list-group-flush">
					<?php
                    switch ($_SESSION["perfil"]) {
                        case "Administrador":
                            include 'View/menuAdmin.php';
                            break;

                        case "Funcionário":
                            include 'View/menuFuncionario.php';
                            break;
                        case "Aluno":
                            include 'View/menuAluno.php';
                            break;
                    }
                    ?>
                </div>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <a class="navbar-brand" href="javascript:void(0);">
                    <img src="imagens/logo.png" width="30" height="30" alt="">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);"><?php
                                $data = date("d/m/Y");
                                echo $data;
                            ?>
                                <b id="label1" align="right" class='glyphicon glyphicon-time'title="Horário de Brasília">
                                    <script>writeclock();</SCRIPT>  
                                </b>
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Página inicial <span class="sr-only">(atual)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?=$_SESSION["usuario"]?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Editar perfil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="controller/sairController.php">Sair</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                <iframe src="View/home.php" name="centropag" width="100%" height="100%" frameborder="0"></iframe>
            </div>
        </div>
		
        <!--<table width="97%" height="100%" align="center" bgcolor="ffffff" >
            <tr height="10%">
                <td id="td1">
                    <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <img src="imagens/logo.png" width="30%" height="15%">
                    </label>                  
                </td>
                <td>
                    <label id="labelfitness">
                        STUDIO TOP FIT 
                    </label>
                </td>
            </tr>
            <tr>
                <td id="td2" colspan="2" align="right">
                    <b id="label1" align="right" class='glyphicon glyphicon-calendar'title="Data Atual">
                        <?php
                        $data = date("d/m/Y");
                        echo $data;
                        ?> &nbsp; 
                    </b>
                    <b id="label1" align="right" class='glyphicon glyphicon-time'title="Horário de Brasília">
                        <script>writeclock();</SCRIPT>  
                    </b>&nbsp;&nbsp;
                    <label id="label2" title="Usuário do Sistema."class='glyphicon glyphicon-user'></label><label title="<?php echo $_SESSION["perfil"] ?>" id="label3">&nbsp;<?php echo $_SESSION["usuario"] ?>&nbsp;</label>
                    <a id="a1" href="controller/sairController.php" class='glyphicon glyphicon-off'title="Sair do Sistema."></a>
                </td>
            </tr>            
            <tr height="90%"  valign="top">
                <td width="20%">
                    <?php
                    switch ($_SESSION["perfil"]) {
                        case "Administrador":
                            include 'View/menuAdmin.php';
                            break;

                        case "Funcionário":
                            include 'View/menuFuncionario.php';
                            break;
                        case "Aluno":
                            include 'View/menuAluno.php';
                            break;
                    }
                    ?>

                </td>
                <td width="80%" class="sombra">
                    <iframe src="View/home.php" name="centropag" width="100%" height="100%" frameborder="0"></iframe>
                </td>
            </tr>            
        </table>-->
    </body>
</html>
