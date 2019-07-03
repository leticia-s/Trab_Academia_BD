<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>STUDIO TOP FIT - Agendar Aulas</title>
        <script type="text/javascript" src="/StudioTopFit/js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="/StudioTopFit/js/inputmask.js"></script>
        <script type="text/javascript" src="/StudioTopFit/js/jquery.inputmask.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- DataTables -->
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css">
        <!-- BootStrap -->
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <script >
            /* DataTables */
            $(document).ready(function () {
                $('#tabAulas').DataTable({
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.10.7/i18n/Portuguese-Brasil.json'
                    }
                });
            });

            function confirmacao(id, nome, dia, horario) {
                var resposta = confirm("Deseja remover a aula de " + nome + " | " + dia + " | " + horario + "?");

                if (resposta == true) {
                    window.location.href = "/StudioTopFit/controller/controlleragenda.php?operacao=excluir&idaula=" + id;
                }
            }
        </script>
        <style> body{background-color: #E3E3E3;}
            legend { 
                background :  #496B96 ; 
                color :  #fff ; 
                padding :  2px  115px  ; 
                font-size :  19px ; 
                border-radius :  10px ; 
                font-weight:  bold;
                height: 39px;

            }
            #d{

                width: 50%;
                float: left;
            }
            #b{
                text-align: right;
                width: 50%;
                float: right;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 5px;
                text-align: left;
            }
            table tr:nth-child(even) {
                background-color: #DEDEE0;
            }
            table tr:nth-child(odd) {
                background-color:#EBEBEC;
            }
            table th	{
                background-color: #B4B4B5;
                color: #000000;
            }
        </style>
    </head>
    <body>     
        <div class="container">
            <legend>
                <div id="d"> Agendar Aulas</div> 
                <div id="b" ><a class="btn btn-success" href="cadastraraula.php">Cadastrar Aula</a></div>
            </legend> 
            <div class="table-responsive">
                <table id="tabAulas" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Dia da Semana</th>
                            <th>Horário</th>
                            <th>Aula</th>
                            <th>Alunos</th>
                            <th>Número de alunos</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../dao/agendadao.php';

                        $agendaDao = new AgendaDao();

                        $aulas = $agendaDao->listar();


                        foreach ($aulas as $agendaraula) {

                            include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../dao/agendabusca.php';

                            $agendaBusca = new AgendaBusca();

                            $numalunos = $agendaBusca->numalunos($agendaraula->getId());
                            ?>

                            <tr>
                                <td><?php echo $agendaraula->getDiaSemana(); ?></td>
                                <td><?php echo $agendaraula->getHorario(); ?></td>
                                <td><?php echo $agendaraula->getNomeAula(); ?></td>
                                <td> <a class="btn btn-default btn-lg" href="agendaralunos.php?idaula=<?php echo $agendaraula->getId(); ?>&dia=<?php echo $agendaraula->getDiaSemana(); ?>&horario=<?php echo $agendaraula->getHorario(); ?>&nome=<?php echo $agendaraula->getNomeAula(); ?>">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                    </a>
                                </td>
                                <td><?php echo $numalunos; ?></td>
                                <td> <a href="javascript:func()" onclick="confirmacao('<?php echo $agendaraula->getId(); ?>', '<?php echo $agendaraula->getNomeAula(); ?>', '<?php echo $agendaraula->getDiaSemana(); ?>', '<?php echo $agendaraula->getHorario(); ?>')">
                                        <button type="button" class="btn btn-default btn-lg">
                                            <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                                        </button>
                                    </a>
                                </td>
                            </tr>

                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>

