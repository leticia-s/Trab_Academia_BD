<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>STUDIO TOP FIT - Alterar Tipo de Aula</title>
        <script type="text/javascript" src="/StudioTopFit/js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
        <script type="text/javascript" src="/StudioTopFit/js/inputmask.js"></script>
        <script type="text/javascript" src="/StudioTopFit/js/jquery.inputmask.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <?php
            $idaula = "";
            if (isset($_GET['idaula'])) {
                $idaula = $_GET['idaula'];
                $nome = $_GET['nome'];
                $_SESSION['idaula'] = $idaula;
                $_SESSION['nome'] = $nome;
            } else {
                $idaula = $_SESSION['idaula'];
                $nome = $_SESSION['nome'];
            }
            ?>
        <link href="/StudioTopFit/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <form class="form-horizontal" action="/StudioTopFit/controller/controlleraula.php?operacao=alterar&idaula=<?php echo $idaula;?>" method="POST" onsubmit="">


                <!-- Form Name -->
                <legend>Alterar Aula</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nome">Aula:</label>  
                    <div class="col-md-2">
                        <input id="nome" value="<?php echo $nome; ?>" name="nome" maxlength="15"  style="width: 170px;" type="text" placeholder="Digite a aula" class="form-control input-md" required="" >

                    </div>
                </div>
                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="enviar"></label>
                    <div class="col-md-8">
                        <button id="enviar" type="submit" name="enviar" class="btn btn-success">Enviar</button>
                        <button id="limpar" name="limpar" type="reset" class="btn btn-warning">Limpar</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>