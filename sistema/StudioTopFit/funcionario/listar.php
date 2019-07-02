<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>STUDIO TOP FIT - Listar Funcionários</title>
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

        <script>
            /* DataTables */
            $(document).ready(function () {
                $('#tabFuncionario').DataTable({
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.10.7/i18n/Portuguese-Brasil.json'
                    }
                });
            });
        </script>
    </head>
    <body>     
        <div class="container">
            <legend> Lista de Funcionários </legend> 
            <div class="table-responsive">
                <table id="tabFuncionario" class="table table-hover">
                    <thead>
                        <tr>
                            <th>CPF</th>
                            <th>Nome</th>
                            <th>Cargo</th>
                            <th>Sexo</th>
                            <th>Data de Nascimento</th>
                            <th>RG</th>
                            <th>Telefone Residencial / Celular</th>
                            <th>Endereço</th>
                            <th>UF</th>
                            <th>Cidade</th>
                            <th>Bairro</th>
                            <th>E-mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../dao/funcionariodao.php';

                        $funcionarioDao = new FuncionarioDao();

                        $funcionarios = $funcionarioDao->listar();

                        foreach ($funcionarios as $pessoa) {
                            ?>

                            <tr>
                                <td><?php echo $pessoa->getCpf(); ?></td>
                                <td><?php echo $pessoa->getNome(); ?></td>
                                <td><?php echo $pessoa->getCargo_Funcionario(); ?></td>
                                <td><?php echo $pessoa->getSexo(); ?></td>
                                <td><?php echo $pessoa->getDataNascimento(); ?></td>
                                <td><?php echo $pessoa->getRg(); ?></td>
                                <td><?php echo $pessoa->getTelefoneResidencial(); ?></td>
                                <td><?php echo $pessoa->getEndereco(); ?></td>
                                <td><?php echo $pessoa->getUf(); ?></td>
                                <td><?php echo $pessoa->getCidade(); ?></td>
                                <td><?php echo $pessoa->getBairro(); ?></td>
                                <td><?php echo $pessoa->getEmail(); ?></td>

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
