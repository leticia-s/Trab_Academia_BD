<?php

include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../classes/agendaraula.php';
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../dao/agendadao.php';


$operacao = $_GET['operacao'];
$controller = new ControllerAula();

if ($operacao == 'salvar') {
    $controller->salvarAula();
} else if ($operacao == 'excluir') {
    $controller->excluirAula();
}

class ControllerAula {

    private $dao;

    public function __construct() {
        $this->dao = new AgendaDao();
    }

    public function salvarAula() {
        $agendaraula = new Agendaraula();
        $agendaraula->setDiaSemana($_POST['dia']);
        $agendaraula->setHorario($_POST['horarioInicial']);
        $agendaraula->setHorarioFinal($_POST['horarioFinal']);
        $agendaraula->setNomeAula($_POST['nome']);

        $mensagem = $this->dao->salvar($agendaraula);

        header("location: /StudioTopFit/agendar/agendaraulas.php?msg=" . $mensagem);
    }

    public function excluirAula() {
        $agendaraula = new Agendaraula();
        $agendaraula->setId($_GET['idaula']);

        $mensagem = $this->dao->excluir($agendaraula);

        header("location: /StudioTopFit/agendar/agendaraulas.php?msg=" . $mensagem);
    }

}
?>


