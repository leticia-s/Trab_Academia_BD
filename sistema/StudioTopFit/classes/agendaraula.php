<?php

class Agendaraula {

    private $id;
    private $diaSemana;
    private $horario;
    private $horarioFinal;
    private $nomeAula;

    function getId() {
        return $this->id;
    }

    function getDiaSemana() {
        return $this->diaSemana;
    }

    function getHorario() {
        return $this->horario;
    }

    function getHorarioFinal() {
        return $this->horarioFinal;
    }

    function getNomeAula() {
        return $this->nomeAula;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDiaSemana($diaSemana) {
        $this->diaSemana = $diaSemana;
    }

    function setHorario($horario) {
        $this->horario = $horario;
    }

    function setHorarioFinal($horarioFinal) {
        $this->horarioFinal = $horarioFinal;
    }

    function setNomeAula($nomeAula) {
        $this->nomeAula = $nomeAula;
    }

}

?>