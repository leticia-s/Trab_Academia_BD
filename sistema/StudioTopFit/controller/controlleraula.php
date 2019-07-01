<?php

include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../dao/auladao.php';
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../classes/referencia.php';


$operacao = $_GET['operacao'];
$controller = new ControllerAula();

if ($operacao == 'salvar') {
    $controller->salvarAula();
} else if ($operacao == 'excluir') {
    $controller->excluirAula();
} else if ($operacao == 'alterar') {
    $controller->alterarAula();
}

class ControllerAula {

    private $dao;

    public function __construct() {
        $this->dao = new AulaDao();
    }

    public function salvarAula() {
        $nome = $_POST['nome'];

        $mensagem = $this->dao->salvar($nome);

       header("location: /StudioTopFit/aula/viewAulas.php?msg=" . $mensagem);
    }

    public function excluirAula() {
   
        $idaula = ($_GET['idaula']);

        $mensagem = $this->dao->excluir($idaula);

        header("location: /StudioTopFit/aula/viewAulas.php?msg=" . $mensagem);
    }

    public function alterarAula() {
         $referencia = new Referencia;
         $referencia->setId($_GET['idaula']);
         $referencia->setNome($_POST['nome']);

        $mensagem = $this->dao->alterar($referencia);

        header("location: /StudioTopFit/aula/viewAulas.php?msg=" . $mensagem);
    }


}

?>
