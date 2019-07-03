<?php

class Funcionario {
    private $cargo;
    private $salario;


    function getCargo() {
        return $this->cargo;
    }
    function getSalario() {
        return $this->salario;
    }


    function setCargo($cargo) {
        $this->cargo = $cargo;
    }
     function setSalario($salario) {
        $this->salario = $salario;
    }
    private $se_prof;

    function setProf($se_prof) {
        $this->se_prof = "Funcionario";
    }
    function getProf() {
        return $this->se_prof;
    }
}



?>
