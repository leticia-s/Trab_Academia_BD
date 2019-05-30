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
        <title>Fitness Life - Agendar Aulas</title>
        <script type="text/javascript" src="/FitnessLife/js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="/FitnessLife/js/inputmask.js"></script>
        <script type="text/javascript" src="/FitnessLife/js/jquery.inputmask.js"></script>
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

            function descadastrar(idcpf, idaula, nome, dia, horario) {
                var resposta = confirm("Deseja descadastrar da aula de " + nome + " | " + dia + " | " + horario + "?");

                if (resposta == true) {
                    window.location.href = "/FitnessLife/controller/controllermeuagendar.php?operacao=descadastrar&idcpf=" + idcpf + "&idaula=" + idaula;
                }
            }
            function cadastrar(idcpf, idaula, nome, dia, horario) {
                var resposta = confirm("Deseja cadastrar na aula de " + nome + " | " + dia + " | " + horario + "?");

                if (resposta == true) {
                    window.location.href = "/FitnessLife/controller/controllermeuagendar.php?operacao=cadastrar&idcpf=" + idcpf + "&idaula=" + idaula;
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
                Agendar Aulas
            </legend> 
            <div class="table-responsive">
                <table id="tabAulas" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Dia da Semana</th>
                            <th>Horário</th>
                            <th>Aula</th>
                            <th>Cadastro</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../dao/agendadao.php';

                        $agendaDao = new AgendaDao();

                        $aulas = $agendaDao->listar();

                        foreach ($aulas as $agendaraula) {
                            ?>

                            <tr>
                                <td><?php echo $agendaraula->getDiaSemana(); ?></td>
                                <td><?php echo $agendaraula->getHorario(); ?></td>
                                <td><?php echo $agendaraula->getNomeAula(); ?></td>
                                <?php
                                include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../dao/agendabusca.php';

                                $agendaBusca = new AgendaBusca();

                                $numcadastro = $agendaBusca->ncadastro($agendaraula->getId(), $idcpf);

                                $numalunos = $agendaBusca->numalunos($agendaraula->getId());

                                if ($numalunos >= 20 && $numcadastro != 1) {
                                    ?>
                                    <td> 
                                        <button type="button" class="btn btn-default">Atingiu o limite</button>
                                    </td>      

                                    <?php
                                } else {
                                    if ($numcadastro == 1) {
                                        ?>
                                        <td> <a href="javascript:func()" onclick="descadastrar('<?php echo $idcpf; ?>', '<?php echo $agendaraula->getId(); ?>', '<?php echo $agendaraula->getNomeAula(); ?>', '<?php echo $agendaraula->getDiaSemana(); ?>', '<?php echo $agendaraula->getHorario(); ?>')">
                                                <button type="button" class="btn btn-danger">Descadastrar</button>
                                            </a>
                                        </td>
                                        <?php
                                    } else {
                                        ?>
                                        <td> <a href="javascript:func()" onclick="cadastrar('<?php echo $idcpf; ?>', '<?php echo $agendaraula->getId(); ?>', '<?php echo $agendaraula->getNomeAula(); ?>', '<?php echo $agendaraula->getDiaSemana(); ?>', '<?php echo $agendaraula->getHorario(); ?>')">
                                                <button type="button" class="btn btn-success">Cadastrar</button>
                                            </a>
                                        </td>
                                        <?php
                                    }
                                }
                                ?>
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


