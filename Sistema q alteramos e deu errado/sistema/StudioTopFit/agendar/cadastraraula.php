<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>STUDIO TOP FIT - Cadastrar aluno</title>
        <script type="text/javascript" src="/StudioTopFit/js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
        <script type="text/javascript" src="/StudioTopFit/js/inputmask.js"></script>
        <script type="text/javascript" src="/StudioTopFit/js/jquery.inputmask.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#horarioInicial").inputmask("99:99");
            });
            $(document).ready(function () {
                $("#horarioFinal").inputmask("99:99");
            });

            function validaCampos() {
                var inicio = document.getElementById("horarioInicial").value;
                var termino = document.getElementById("horarioFinal").value;
                if (inicio > termino) {
                    alert("Hora de início maior que a de termino");
                    return false;
                }
                if (inicio == termino) {
                    alert("Hora de início igual a de termino");
                    return false;
                }
                if (!validaHora(inicio)) {
                    alert("Hora inicial inválida");
                    return false;
                }
                if (!validaHora(termino)) {
                    alert("Hora final inválida");
                    return false;
                }
                return true;
            }

            function validaHora(hora) {

                var t = hora.split(":");
                if (t == "")
                    return false;
                var h = t[0];
                var m = t[1];

                if ((h < 00) || (h > 23) || (m < 00) || (m > 59))
                    return false;

                return true;
            }
        </script>
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
            <form class="form-horizontal" action="/StudioTopFit/controller/controlleragenda.php?operacao=salvar" method="POST" onsubmit="return validaCampos()">
                <!-- Form Name -->
                <legend>Cadastrar Aula</legend>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="dia">Dia da Semana:</label>
                    <div class="col-md-2">
                        <select required="--selecione--" id="dia" name="dia" class="form-control">
                            <option value="" class="">--selecione--</option><option value="Domingo">Domingo</option><option value="Segunda">Segunda</option><option value="Terça">Terça</option><option value="Quarta">Quarta</option><option value="Quinta">Quinta</option><option value="Sexta">Sexta</option><option value="Sábado">Sábado</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="horario">Horário de início:</label>  
                    <div class="col-md-2">
                        <input id="horarioInicial" name="horarioInicial" type="text" style="width: 80px;" class="form-control input-md" required="">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="horario">Horário de término:</label>  
                    <div class="col-md-2">
                        <input id="horarioFinal" name="horarioFinal" type="text" style="width: 80px;" class="form-control input-md" required="">

                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nome">Nome:</label>  
                    <div class="col-md-4">
                        <input id="nome" name="nome" type="text" maxlength="25" placeholder="Digite o nome da aula" class="form-control input-md" required="">

                    </div>
                </div>
                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="enviar"></label>
                    <div class="col-md-8">
                        <button id="enviar" type="submit" name="enviar" class="btn btn-success">Enviar</button>
                        <a id="cancelar" name="cancelar" href="agendaraulas.php" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>


        </div>


    </body>
</html>