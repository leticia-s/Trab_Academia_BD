<?php

include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../classes/agendaraula.php';
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../classes/pessoa.php';
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../dao/agendadao.php';


$operacao = $_GET['operacao'];
$controller = new ControlAgendaAluno();

if ($operacao == 'salvar') {
    $controller->salvarAluno();
} else if ($operacao == 'excluir') {
    $controller->excluirAluno();
}

class ControlAgendaAluno {

    private $dao;

    public function __construct() {
        $this->dao = new AgendaDao();
    }

    public function salvarAluno() {
        $agendaraula = new Agendaraula();
        $agendaraula->setId($_GET['idaula']);

        $pessoa = new Pessoa();
        $pessoa->setCpf($_GET['idcpf']);

        $mensagem = $this->dao->incluirAluno($agendaraula, $pessoa);

        header("location: /FitnessLife/agendar/incluiralunos.php?msg=" . $mensagem);
    }

    public function excluirAluno() {
        $agendaraula = new Agendaraula();
        $agendaraula->setId($_GET['idaula']);

        $pessoa = new Pessoa();
        $pessoa->setCpf($_GET['idcpf']);

        $mensagem = $this->dao->excluirAluno($agendaraula, $pessoa);

        header("location: /FitnessLife/agendar/agendaralunos.php?msg=" . $mensagem);
    }

}
?>



