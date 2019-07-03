<?php

include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../dao/localdao.php';
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../classes/referencia.php';


$operacao = $_GET['operacao'];
$controller = new ControllerLocal();

if ($operacao == 'salvar') {
    $controller->salvarLocal();
} else if ($operacao == 'excluir') {
    $controller->excluirLocal();
} else if ($operacao == 'alterar') {
    $controller->alterarLocal();
}

class ControllerLocal {

    private $dao;

    public function __construct() {
        $this->dao = new LocalDao();
    }

    public function salvarLocal() {
        $nome = $_POST['nome'];

        $mensagem = $this->dao->salvar($nome);

       header("location: /StudioTopFit/local/viewLocais.php?msg=" . $mensagem);
    }

    public function excluirLocal() {
   
        $idlocal = ($_GET['idlocal']);

        $mensagem = $this->dao->excluir($idlocal);

        header("location: /StudioTopFit/local/viewLocais.php?msg=" . $mensagem);
    }

    public function alterarLocal() {
         $referencia = new Referencia;
         $referencia->setId($_GET['idlocal']);
         $referencia->setNome($_POST['nome']);

        $mensagem = $this->dao->alterar($referencia);

        header("location: /StudioTopFit/local/viewLocais.php?msg=" . $mensagem);
    }


}

?>
