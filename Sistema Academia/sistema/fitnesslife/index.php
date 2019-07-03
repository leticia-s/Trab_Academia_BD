
<?php
include 'View/validalogin.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Fitness Life</title>
        <link rel="icon" href="../imagens/Logo.jpg" type="image/gif" sizes="16x16">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/shop-homepage.css" rel="stylesheet">
        <link rel="icon" href="imagens/Logo2.jpg" type="image/gif" sizes="16x16">
        <style type="text/css">
            body{background-image: url("imagens/plano.png");background-size: 100% 100%;background-repeat:no-repeat;}
            #h1{text-align: center;
                text-shadow: 0.1em 0.1em 0.2em gray;
                text-transform: uppercase;
                color: silver;
                font-weight: bold;}
            label{font-weight: bold;color: gray;}
            #td1{color: white;
                 font-weight: bold;}
            #td2{color: YellowGreen;
                 font-weight: bold;
                 background-color: SkyBlue;
            }

            #a1:link, #a1:visited {text-decoration: none;color: gray;}
            #a1:hover { color: red;}        
            #a1:active {text-decoration: none; }
            #label1{color: gray; font-weight: bold}
            #label2{color: blue;}
            #label3:hover{text-transform: capitalize;color: red;}
            #h1{text-align: left;}
            #labelfitness{font-weight: bold;color: blue;
                          font-weight: bold;
                          font-family: Jokerman;
                          font-size: 50px;
                          text-align: left;
            }
            .sombra{box-shadow: 13px 5px 0.5cm gray; height:content-box; }
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

        <table width="97%" height="100%" align="center" bgcolor="ffffff" >
            <tr height="10%">
                <td id="td1">
                    <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <img src="imagens/Logo2.jpg" width="30%" height="15%">
                    </label>                  
                </td>
                <td>
                    <label id="labelfitness">
                        Fitness Life 
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
                <!--1° iframe-->
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
                <!--2° iframe-->
                <td width="80%" class="sombra">
                    <iframe src="View/home.php" name="centropag" width="100%" height="100%" frameborder="0"></iframe>
                </td>
            </tr>            
        </table>
    </body>
</html>
