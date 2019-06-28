<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>STUDIO TOP FIT - Excluir Alunos</title>
        <script type="text/javascript" src="/StudioTopFit/js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="/StudioTopFit/js/inputmask.js"></script>
        <script type="text/javascript" src="/StudioTopFit/js/jquery.inputmask.js"></script>
        <script src="/js/bootstrap.min.js"></script>

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
                $('#tabAlunoExc').DataTable({
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.10.7/i18n/Portuguese-Brasil.json'
                    }
                });
            });

            function confirmacao(id, nome) {
                var resposta = confirm("Deseja remover o(a) aluno(a) " + nome + " com cpf = " + id + " ?");

                if (resposta == true) {
                    window.location.href = "/StudioTopFit/controller/controlleraluno.php?operacao=excluir&idaluno=" + id;
                }
            }
        </script>
    </head>
    <body>     
            <legend> Excluir Alunos  </legend> 
            <div class="table-responsive">
                <table id="tabAlunoExc" class="table table-hover">
                    <thead>
                        <tr>
                            <th>CPF</th>
                            <th>Nome</th>
                            <th>RG</th>
                            <th>E-mail</th>
                            <th>Excluir</th>
                    </thead>
                    <tbody>
                        <?php
                        include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../dao/alunodao.php';

                        $alunoDao = new AlunoDao();

                        $alunos = $alunoDao->listar();

                        foreach ($alunos as $pessoa) {
                            ?>

                            <tr>
                                <td><?php echo $pessoa->getCpf(); ?></td>
                                <td><?php echo $pessoa->getNome(); ?></td>
                                <td><?php echo $pessoa->getRg(); ?></td>
                                <td><?php echo $pessoa->getEmail(); ?></td>
                                <td> <a href="javascript:func()" onclick="confirmacao('<?php echo $pessoa->getCpf(); ?>', '<?php echo $pessoa->getNome(); ?>')">
                                        <button type="button" class="btn btn-default btn-lg">
                                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
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
    </body>
</html>
