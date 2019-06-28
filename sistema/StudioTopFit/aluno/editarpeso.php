<?php
session_start();
$idcpf = $_SESSION['id_pessoa_cpf'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>STUDIO TOP FIT - Editar peso</title>
        <script type="text/javascript" src="/StudioTopFit/js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
        <script type="text/javascript" src="/StudioTopFit/js/inputmask.js"></script>
        <script type="text/javascript" src="/StudioTopFit/js/jquery.inputmask.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link href="/StudioTopFit/css/bootstrap.min.css" rel="stylesheet">
        <style> body{background-color: #E3E3E3;}
            legend { 
                background :  #496B96 ; 
                color :  #fff ; 
                padding :  2px  115px  ; 
                font-size :  19px ; 
                border-radius :  10px ; 
                font-weight:  bold;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <form class="form-horizontal" action="/StudioTopFit/controller/controlleraluno.php?operacao=salvarpeso&idcpf=<?php echo $idcpf; ?>" method="POST">
                <!-- Form Name -->
                <legend>Editar peso atual</legend>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nome">Peso atual:</label>  
                    <div class="col-md-4">
                        <input id="peso" name="peso" type="text" style="width: 125px;" maxlength="7" placeholder="Digite seu peso atual" class="form-control input-md" required="">

                    </div>
                </div>
                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="enviar"></label>
                    <div class="col-md-8">
                        <button id="enviar" type="submit" name="enviar" class="btn btn-success">Enviar</button>
                        <a id="cancelar" name="cancelar" href="peso.php" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>


        </div>


    </body>
</html>