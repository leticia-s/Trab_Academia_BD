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
        if ($se_prof == "nao")
            $this->se_prof = "Funcionário";
        if ($se_prof == "sim")
            $this->se_prof = "Professor";
    }
    function getProf() {
        return $this->se_prof;
    }
}



?>
