<?php

class Funcionario {
    private $matricula;
    private $cargo;
    private $salario;


    function getCargo() {
        return $this->cargo;
    }
    function getMatricula() {
        return $this->matricula;
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
    function setMatricula($matricula) {
        $this->matricula= $matricula;
    }
}


class Professor{

    private $se_prof;

    function setProf($se_prof) {
        if ($se_prof == "nao")
            $this->se_prof = '0';
        if ($se_prof == "sim")
            $this->se_prof = '1';
    }
    function getProf() {
        return $this->se_prof;
    }

}

?>
