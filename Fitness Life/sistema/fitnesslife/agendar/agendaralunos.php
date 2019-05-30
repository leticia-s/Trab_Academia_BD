<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fitness Life - Agendar Alunos</title>
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
                $('#tabIncAlunos').DataTable({
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.10.7/i18n/Portuguese-Brasil.json'
                    }
                });
            });
            function confirmacao(id, nome, idaula) {
                var resposta = confirm("Deseja remover o(a) aluno(a) " + nome + " CPF = " + id + " nesta aula ?");

                if (resposta == true) {
                    window.location.href = "/FitnessLife/controller/controlagendaaluno.php?operacao=excluir&idcpf=" + id + "&idaula=" + idaula;
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

                width: 83%;
                float: left;
            }
            #b{
                text-align: right;
                width: 17%;
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
            <?php
            $idaula = "";
            if (isset($_GET['idaula'])) {
                $idaula = $_GET['idaula'];
                $dia = $_GET['dia'];
                $horario = $_GET['horario'];
                $nome = $_GET['nome'];
                $_SESSION['idaula'] = $idaula;
                $_SESSION['dia'] = $dia;
                $_SESSION['horario'] = $horario;
                $_SESSION['nome'] = $nome;
            } else {
                $idaula = $_SESSION['idaula'];
                $dia = $_SESSION['dia'];
                $horario = $_SESSION['horario'];
                $nome = $_SESSION['nome'];
            }
            ?>
            <legend>
                <div id="d"><?php echo $nome . " | " . $dia . " | " . $horario ?></div> 
                <div id="b" ><a class="btn btn-success" href="incluiralunos.php">Incluir Alunos</a></div>
            </legend> 
            <div class="table-responsive">
                <table id="tabIncAlunos" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Aluno</th>
                            <th>CPF</th>
                            <th>RG</th>
                            <th>E-mail</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../dao/agendadao.php';

                        $agendaDao = new AgendaDao();

                        $alunos = $agendaDao->listarAlunos($idaula);

                        foreach ($alunos as $pessoa) {
                            ?>

                            <tr>
                                <td><?php echo $pessoa->getNome(); ?></td>
                                <td><?php echo $pessoa->getCpf(); ?></td>
                                <td><?php echo $pessoa->getRg(); ?></td>
                                <td><?php echo $pessoa->getEmail(); ?></td>
                                <td> <a href="javascript:func()" onclick="confirmacao('<?php echo $pessoa->getCpf(); ?>', '<?php echo $pessoa->getNome(); ?>', '<?php echo $idaula; ?>')">
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

