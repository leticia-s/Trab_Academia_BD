<?php
session_start();
$idcpf = $_SESSION['id_pessoa_cpf'];
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../dao/agendabusca.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fitness Life - Grade Horária</title>
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
                Grade Horária
            </legend> 
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Domingo</th>
                            <th>Segunda</th>
                            <th>Terça</th>
                            <th>Quarta</th>
                            <th>Quinta</th>
                            <th>Sexta</th>
                            <th>Sábado</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                <?php
                                $agendaBusca = new AgendaBusca();

                                $aulas = $agendaBusca->buscagrade($idcpf, 'Domingo');

                                if ($aulas != NULL) {
                                    ?>
                                    <table class="table-responsive" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Horário</th>
                                                <th>Aula</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            foreach ($aulas as $agendaraula) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $agendaraula->getHorario(); ?></td>
                                                    <td><?php echo $agendaraula->getNomeAula(); ?></td>
                                                </tr>

                                            <?php } ?>

                                        </tbody>
                                    </table>  
                                    <?php
                                } else {
                                    echo "Sem registros";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $agendaBusca = new AgendaBusca();

                                $aulas = $agendaBusca->buscagrade($idcpf, 'Segunda');

                                if ($aulas != NULL) {
                                    ?>
                                    <table class="table-responsive" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Horário</th>
                                                <th>Aula</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            foreach ($aulas as $agendaraula) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $agendaraula->getHorario(); ?></td>
                                                    <td><?php echo $agendaraula->getNomeAula(); ?></td>
                                                </tr>

                                            <?php } ?>

                                        </tbody>
                                    </table>  
                                    <?php
                                } else {
                                    echo "Sem registros";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $agendaBusca = new AgendaBusca();

                                $aulas = $agendaBusca->buscagrade($idcpf, 'Terça');

                                if ($aulas != NULL) {
                                    ?>
                                    <table class="table-responsive" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Horário</th>
                                                <th>Aula</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            foreach ($aulas as $agendaraula) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $agendaraula->getHorario(); ?></td>
                                                    <td><?php echo $agendaraula->getNomeAula(); ?></td>
                                                </tr>

                                            <?php } ?>

                                        </tbody>
                                    </table>  
                                    <?php
                                } else {
                                    echo "Sem registros";
                                }
                                ?>
                            </td>

                            <td>
                                <?php
                                $agendaBusca = new AgendaBusca();

                                $aulas = $agendaBusca->buscagrade($idcpf, 'Quarta');

                                if ($aulas != NULL) {
                                    ?>
                                    <table class="table-responsive" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Horário</th>
                                                <th>Aula</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            foreach ($aulas as $agendaraula) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $agendaraula->getHorario(); ?></td>
                                                    <td><?php echo $agendaraula->getNomeAula(); ?></td>
                                                </tr>

                                            <?php } ?>

                                        </tbody>
                                    </table>  
                                    <?php
                                } else {
                                    echo "Sem registros";
                                }
                                ?>
                            </td> 
                            <td>
                                <?php
                                $agendaBusca = new AgendaBusca();

                                $aulas = $agendaBusca->buscagrade($idcpf, 'Quinta');

                                if ($aulas != NULL) {
                                    ?>
                                    <table class="table-responsive" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Horário</th>
                                                <th>Aula</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            foreach ($aulas as $agendaraula) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $agendaraula->getHorario(); ?></td>
                                                    <td><?php echo $agendaraula->getNomeAula(); ?></td>
                                                </tr>

                                            <?php } ?>

                                        </tbody>
                                    </table>  
                                    <?php
                                } else {
                                    echo "Sem registros";
                                }
                                ?>
                            </td> 
                            <td>
                                <?php
                                $agendaBusca = new AgendaBusca();

                                $aulas = $agendaBusca->buscagrade($idcpf, 'Sexta');

                                if ($aulas != NULL) {
                                    ?>
                                    <table class="table-responsive" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Horário</th>
                                                <th>Aula</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            foreach ($aulas as $agendaraula) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $agendaraula->getHorario(); ?></td>
                                                    <td><?php echo $agendaraula->getNomeAula(); ?></td>
                                                </tr>

                                            <?php } ?>

                                        </tbody>
                                    </table>  
                                    <?php
                                } else {
                                    echo "Sem registros";
                                }
                                ?>
                            </td> 

                            <td>
                                <?php
                                $agendaBusca = new AgendaBusca();

                                $aulas = $agendaBusca->buscagrade($idcpf, 'Sábado');

                                if ($aulas != NULL) {
                                    ?>
                                    <table class="table-responsive" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Horário</th>
                                                <th>Aula</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            foreach ($aulas as $agendaraula) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $agendaraula->getHorario(); ?></td>
                                                    <td><?php echo $agendaraula->getNomeAula(); ?></td>
                                                </tr>

                                            <?php } ?>

                                        </tbody>
                                    </table>  
                                    <?php
                                } else {
                                    echo "Sem registros";
                                }
                                ?>
                            </td> 


                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>




