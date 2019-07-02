<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>STUDIO TOP FIT - Aulas</title>
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

            function confirmacao(id, nome) {
                var resposta = confirm("Deseja remover a aula: " + nome + "?");

                if (resposta == true) {
                    window.location.href = "/StudioTopFit/controller/controlleraula.php?operacao=excluir&idaula=" + id;
                }
            }
        </script>
        <style> 
            legend {  
                 padding : 0px 115px ;  
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
        </style>
    </head>
    <body>     
        <div class="container">
            <legend>
                <div id="d"> Tipos de Aulas </div> 
                <!-- Botao com refencia para Cadastrar Aula-->
                <div id="b" > <a class="btn btn-primary" href="cadastrar.php" id="addInput">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Adicionar Aula </a></div>
            </legend> 
            <div class="table-responsive">
                <table id="tabAulas" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Aula</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../dao/auladao.php';

                        $aulaDao = new AulaDao();

                        $nomes = $aulaDao->listar();


                        foreach ($nomes as $referencia){
                            ?>

                            <tr>
                                <td><?php echo $referencia->getNome(); ?></td>
                                <!-- Botao Alteraula-->
                                <td> 
                                    <a href="alterar.php?idaula=<?php echo $referencia->getId(); ?>&nome=<?php echo $referencia->getNome(); ?>">
                                        <button type="button" class="btn btn-default btn-lg">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </button>
                                    </a>
                                </td>
                                <!-- Botao excluir-->
                                <td> <a href="javascript:func()" onclick="confirmacao('<?php echo $referencia->getId(); ?>', '<?php echo $referencia->getNome(); ?>')">
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
         <?php
        if (isset($_GET['msg'])) {
            echo "<script>alert('" . $_GET['msg'] . "');</script>";
        }
        ?>
    </body>
</html>



