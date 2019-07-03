<?php

include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../classes/pessoa.php';
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../dao/alunodao.php';


$operacao = $_GET['operacao'];
$controller = new ControllerAluno();

if ($operacao == 'salvar') {
    $controller->salvarAluno();
} else if ($operacao == 'excluir') {
    $controller->excluirAluno();
} else if ($operacao == 'alterar') {
    $controller->alterarAluno();
} else if ($operacao == 'salvarpeso') {
    $controller->salvarpeso();
}

class ControllerAluno {

    private $dao;

    public function __construct() {
        $this->dao = new AlunoDao();
    }

    public function salvarAluno() {
        $pessoa = new Pessoa();
        $pessoa->setNome($_POST['nome']);
        $pessoa->setSobrenome($_POST['sobrenome']);
        $pessoa->setSexo($_POST['sexo']);
        $pessoa->setDataNascimento($_POST['ano'] . "-" . $_POST['mes'] . "-" . $_POST['dia']);
        $pessoa->setEndereco($_POST['endereco']);
        $pessoa->setUf($_POST['uf']);
        $pessoa->setCidade($_POST['cidade']);
        $pessoa->setBairro($_POST['bairro']);
        $pessoa->setCpf($_POST['cpf']);
        $pessoa->setRg($_POST['rg']);
        $pessoa->setTelefoneCelular($_POST['telefoneResidencial']);
        $pessoa->setTelefoneResidencial($_POST['telefoneCelular']);
        $pessoa->setEmail($_POST['email']);
        $pessoa->setPesoInicial_Aluno(str_replace(",", ".", $_POST['peso']));
        $pessoa->setDataEntrada_Aluno(date("Y/m/d"));
        $pessoa->setSenha($_POST['confirmeSenha']);
        $pessoa->setIdPerfil(3);

        include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../dao/agendabusca.php';
        $agendaBusca = new AgendaBusca();
        $aulas = $agendaBusca->verificarcpf($pessoa->getCpf());

        if ($aulas == 1) {
            $mensagem = "Não foi possível cadastrar aluno! O CPF informado já está cadastrado.";
        } else {
            $mensagem = $this->dao->salvar($pessoa);
        }

        header("location: /FitnessLife/aluno/listar.php?msg=" . $mensagem);
    }

    public function excluirAluno() {
        $pessoa = new Pessoa();
        $pessoa->setCpf($_GET['idaluno']);

        $mensagem = $this->dao->excluir($pessoa);

        header("location: /FitnessLife/aluno/listar.php?msg=" . $mensagem);
    }

    public function alterarAluno() {
        $pessoa = new Pessoa();
        $pessoa->setNome($_POST['nome']);
        $pessoa->setSobrenome($_POST['sobrenome']);
        $pessoa->setSexo($_POST['sexo']);
        $pessoa->setDataNascimento($_POST['ano'] . "-" . $_POST['mes'] . "-" . $_POST['dia']);
        $pessoa->setEndereco($_POST['endereco']);
        $pessoa->setUf($_POST['uf']);
        $pessoa->setCidade($_POST['cidade']);
        $pessoa->setBairro($_POST['bairro']);
        $pessoa->setCpf($_POST['cpf']);
        $pessoa->setRg($_POST['rg']);
        $pessoa->setTelefoneCelular($_POST['telefoneResidencial']);
        $pessoa->setTelefoneResidencial($_POST['telefoneCelular']);
        $pessoa->setEmail($_POST['email']);
        $pessoa->setPesoInicial_Aluno(str_replace(",", ".", $_POST['peso']));
        $pessoa->setSenha($_POST['confirmeSenha']);
        $pessoa->setIdPerfil(3);

        $mensagem = $this->dao->alterar($pessoa);

        header("location: /FitnessLife/aluno/listar.php?msg=" . $mensagem);
    }

    public function salvarpeso() {
        $pessoa = new Pessoa();
        $pessoa->setCpf($_GET['idcpf']);
        $pessoa->setPesoDurante_Aluno(str_replace(",", ".", $_POST['peso']));

        $mensagem = $this->dao->editapeso($pessoa);

        header("location: /FitnessLife/aluno/peso.php?msg=" . $mensagem);
    }

}

?>
