<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="icon" href="../imagens/logo.png" type="image/gif" sizes="16x16">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="icon" href="imagens/logo.png" type="image/gif" sizes="16x16">
		<style type="text/css">
            body{overflow: hidden; background-image: url("../imagens/bg.jpg");background-size: 100% 100%;background-repeat:no-repeat;}
            .overview {
                background-color: rgba(0, 0, 0, 0.6);
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function () {
<?php if (isset($_GET['msg'])) { ?>
                    $("#mensagem").modal("show");
<?php } ?>
            });
        </script>
    </head>
    <body class="vh-100">
        <div class="row h-100 overview">
            <div class="container h-100 d-flex flex-wrap align-content-center">
                <div class="col-12 logo text-center mb-5">
                    <img src="../imagens/logo.png">
                </div>
                <div class="col-12 col-md-8 col-lg-6 m-auto login-box">
                    <form class="form-inline"action="../controller/loginController.php" method="post">
                        <div class="col-6 form-group mb-3 d-block">
                            <label class="text-white font-weight-bold" for="username">CPF</label>
                            <input id="username" type="text" class="form-control w-100" name="usuario" placeholder="CPF">
                        </div>
                        <div class="col-6 form-group mb-3 d-block">
                            <label class="text-white font-weight-bold" for="password">Senha</label>
                            <input id="password" type="password" class="form-control w-100" name="senha" placeholder="senha">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-lg btn-secondary btn-block">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="mensagem" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Erro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <p><?php if (isset($_GET['msg'])) echo $_GET['msg']; ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>
