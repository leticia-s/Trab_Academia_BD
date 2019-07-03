<?php

class Pessoa {

    private $nome;
    private $sobrenome;
    private $sexo;
    private $dataNascimento;
    private $endereco;
    private $uf;
    private $cidade;
    private $bairro;
    private $cpf;
    private $rg;
    private $telefoneResidencial;
    private $telefoneCelular;
    private $email;
    private $senha;
    private $idPerfil;
    private $pesoInicial_Aluno;
    private $pesoDurante_Aluno;
    private $dataEntrada_Aluno;
    private $cargo_Funcionario;
    
    function getNome() {
        return $this->nome;
    }

    function getSobrenome() {
        return $this->sobrenome;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getDataNascimento() {
        return $this->dataNascimento;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getUf() {
        return $this->uf;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getRg() {
        return $this->rg;
    }

    function getTelefoneResidencial() {
        return $this->telefoneResidencial;
    }

    function getTelefoneCelular() {
        return $this->telefoneCelular;
    }

    function getEmail() {
        return $this->email;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    function setSexo($sexo) {
        if ($sexo == "feminino")
            $this->sexo = 0;
        if ($sexo == "masculino")
            $this->sexo = 1;
        if ($sexo == '1')
            $this->sexo = 1;
        if ($sexo == '0')
            $this->sexo = 0;
    }

    function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setUf($uf) {
        $this->uf = $uf;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }

    function setTelefoneResidencial($telefoneResidencial) {
        $this->telefoneResidencial = $telefoneResidencial;
    }

    function setTelefoneCelular($telefoneCelular) {
        $this->telefoneCelular = $telefoneCelular;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function getSenha() {
        return $this->senha;
    }
    
    function getIdPerfil() {
        return $this->idPerfil;
    }

    function getPesoInicial_Aluno() {
        return $this->pesoInicial_Aluno;
    }

    function getPesoDurante_Aluno() {
        return $this->pesoDurante_Aluno;
    }

    function getDataEntrada_Aluno() {
        return $this->dataEntrada_Aluno;
    }

    function getCargo_Funcionario() {
        return $this->cargo_Funcionario;
    }
 
    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setIdPerfil($idPerfil) {
        $this->idPerfil = $idPerfil;
    }

    function setPesoDurante_Aluno($pesoDurante_Aluno) {
        $this->pesoDurante_Aluno = $pesoDurante_Aluno;
    }

    function setDataEntrada_Aluno($dataEntrada_Aluno) {
        $this->dataEntrada_Aluno = $dataEntrada_Aluno;
    }

    function setCargo_Funcionario($cargo_Funcionario) {
        $this->cargo_Funcionario = $cargo_Funcionario;
    }


    
    //modificação para listar array funcionario
    private $salario_Funcionario;
     function setSalario_Funcionario($salario_funcionario) {
        $this->salario_Funcionario = $salario_funcionario;
    }
    function getSalario_Funcionario() {
        return $this->salario_Funcionario;
    }

     
    
}

?>
