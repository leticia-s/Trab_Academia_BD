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
        <title>STUDIO TOP FIT - Peso</title>
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
                height: 39px;

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
            <legend>Peso </legend> 
            <div class="table-responsive">
                <table id="tabAulas" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Data de Entrada na academia</th>
                            <th>Peso de Entrada na academia</th>
                            <th>Peso atual</th>
                            <th>Peso Perdido ou Ganho desde a entrada</th>
                            <th>Editar peso atual</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../dao/agendabusca.php';

                        $agendaBusca = new AgendaBusca();

                        $pesos = $agendaBusca->buscapeso($idcpf);

                        foreach ($pesos as $pessoa) {
                            ?>

                            <tr>

                                <td><?php echo $pessoa->getDataEntrada_Aluno(); ?></td>
                                <td><?php
                                    echo $pessoa->getPesoInicial_Aluno();
                                    if ($pessoa->getPesoInicial_Aluno() != "Inativo")
                                        echo " Kg"
                                        ?></td>
                                <td><?php
                                    if ($pessoa->getPesoDurante_Aluno() == NULL) {
                                        echo "Sem registro";
                                    } else {
                                        echo $pessoa->getPesoDurante_Aluno() . " Kg";
                                    }
                                    ?></td>
                                <td><?php
                                    if ($pessoa->getPesoInicial_Aluno() == "Inativo") {
                                        echo "Inativo";
                                    } else {
                                        $pesoInicial = str_replace(",", ".", $pessoa->getPesoInicial_Aluno());
                                        $pesoAtual = str_replace(",", ".", $pessoa->getPesoDurante_Aluno());
                                        if ($pesoInicial > $pesoAtual) {
                                            $total = $pesoInicial - $pesoAtual;
                                            $total = str_replace(".", ",", $total);
                                            echo $total . " Kg perdido";
                                        } else if ($pesoInicial < $pesoAtual) {
                                            $total = $pesoAtual - $pesoInicial;
                                            $total = str_replace(".", ",", $total);
                                            echo $total . " Kg ganho";
                                        } else if ($pesoInicial == $pesoAtual) {
                                            echo "Não ganhou nem perdeu peso";
                                        }
                                    }
                                    ?></td>
                                <td> <a href="editarpeso.php">
                                        <button type="button" class="btn btn-default btn-lg">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
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
