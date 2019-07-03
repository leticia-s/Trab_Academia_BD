<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="icon" href="../imagens/Logo.jpg" type="image/gif" sizes="16x16">
        <script src="/FitnessLife/js/jquery-2.1.4.min.js"></script>
        <link rel="stylesheet" href="/FitnessLife/css/bootstrap.min.css">
        <link rel="stylesheet" href="/FitnessLife/css/bootstrap-theme.min.css">
        <script src="/FitnessLife/js/bootstrap.min.js"></script>
        <style type="text/css">
            body{background-image: url("../imagens/plano.png");background-size: 100% 100%;background-repeat:no-repeat;}
            .sombra{box-shadow: 13px 5px 0.5cm gray;}
            .h11{text-align: center;
                 text-shadow: 0.1em 0.1em 0.2em gray;
                 text-transform: uppercase;
                 color: silver;}
            label{font-weight: bold;color: blue;
                  font-family: Jokerman;
                  font-size: 45px;
                  text-align: center;}

        </style>
        <script type="text/javascript">
            $(document).ready(function () {
<?php if (isset($_GET['msg'])) { ?>
                    $("#mensagem").modal("show");
<?php } ?>
            });
        </script>
    </head>
    <body>
    <center>
        <br>
        <br>
        <table id="table1">
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td> &nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    <table align="center">
                        <tr>
                            <td>
                        <center><img src="../imagens/Logo2.jpg" width="50%" height="20%"></center>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
        </table>
        <table align="center">
            <tr>
                <td>
                    <form class="form-inline"action="../controller/loginController.php" method="post">

                        <div class="form-group">
                            <label class="sombra" >Usuário</label>
                            <div class="h11"><input type="text" class="form-control" name="usuario" placeholder="Usuário">
                            </div> </div>
                        <div class="form-group">
                            <label class="sombra" >Senha</label>
                            <div class="h11"> <input type="password" class="form-control" name="senha" placeholder="senha"> </div>
                        </div><br><br>
                        <button type="submit" class="btn btn-lg btn-primary btn-block">Entrar</button>
                    </form>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td> &nbsp;
    </td>
</tr>
<tr>
    <td> &nbsp;
    </td>
</tr>
</table>
</div>
<br><br>
<br><br>
</center>

<?php require_once 'footer.php'; ?>
<div id="mensagem" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">ALERTA!</h4>
            </div>
            <div class="modal-body">
                <p><?php if (isset($_GET['msg'])) echo $_GET['msg']; ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</body>
</html>
