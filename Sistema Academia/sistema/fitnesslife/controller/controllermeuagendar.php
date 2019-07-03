<?php

include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../dao/agendabusca.php';


$operacao = $_GET['operacao'];
$controller = new ControllerMeuCadastro();

if ($operacao == 'cadastrar') {
    $controller->cadastrarAula();
} else if ($operacao == 'descadastrar') {
    $controller->descadastrarAula();
}

class ControllerMeuCadastro {

    private $dao;

    public function __construct() {
        $this->dao = new AgendaBusca();
    }

    public function cadastrarAula() {
        $idcpf = $_GET['idcpf'];
        $idaula = $_GET['idaula'];

        $mensagem = $this->dao->cadastrar($idcpf, $idaula);

        header("location: /FitnessLife/agendar/agendaminhaaula.php?msg=" . $mensagem);
    }

    public function descadastrarAula() {
        $idcpf = $_GET['idcpf'];
        $idaula = $_GET['idaula'];

        $mensagem = $this->dao->descadastrar($idcpf, $idaula);

        header("location: /FitnessLife/agendar/agendaminhaaula.php?msg=" . $mensagem);
    }

}
?>




