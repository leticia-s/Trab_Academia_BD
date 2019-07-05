<?php

include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../classes/agendaraula.php';
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../classes/pessoa.php';
include_once 'dao.php';

class AgendaBusca extends Dao {

    public function ncadastro($idaula, $idcpf) {
        $pdo = Dao::getInstance();
        $sql = "SELECT COUNT(1) FROM `tb_agendamento` ag WHERE ag.id_agenda_semanal = ? and ag.id_pessoa_cpf = ?";
        $result = $pdo->prepare($sql);
        $result->execute(array($idaula, $idcpf));

        foreach ($result->fetch() as $linhaConsulta) {
            $numcadastro = $linhaConsulta[0];
        }
        return $numcadastro;
    }

    function cadastrar($idcpf, $idaula) {
        $pdo = Dao::getInstance();
        $sql = "INSERT INTO tb_agendamento (id_pessoa_cpf, id_agenda_semanal)";
        $sql .= "VALUES (?, ?);";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute(array($idcpf, $idaula)) == TRUE) {
            return "Você foi cadastrado com sucesso!";
        } else {
            return "Ocorreu um erro!";
        }
    }

    function descadastrar($idcpf, $idaula) {
        $pdo = Dao::getInstance();
        $sql = "DELETE FROM tb_agendamento WHERE id_pessoa_cpf = ? AND  id_agenda_semanal = ? ";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute(array($idcpf, $idaula)) == TRUE) {
            return "Você foi descadastrado com sucesso!";
        } else {
            return "Ocorreu um erro!";
        }
    }

    function buscagrade($idcpf, $diasemana) {
        $pdo = Dao::getInstance();
        $sql = "SELECT v.horario_inicial, v.horario_final, v.nome_aula FROM lista_grade AS v where v.id_pessoa_cpf = ? and v.dia_da_semana = ?";
        $result = $pdo->prepare($sql);
        $result->execute(array($idcpf, $diasemana));

        $aulas = array();

        foreach ($result->fetchAll() as $linhaConsulta) {
            $agendaraula = new Agendaraula();
            $hora = $linhaConsulta[0];
            $array = explode(":", $hora);
            $hora = $array[0];
            $min = $array[1];
            $hora2 = $linhaConsulta[1];
            $array2 = explode(":", $hora2);
            $hora2 = $array2[0];
            $min2 = $array2[1];
            $agendaraula->setHorario($hora . ":" . $min . " - " . $hora2 . ":" . $min2);
            $agendaraula->setNomeAula($linhaConsulta[2]);

            $aulas[] = $agendaraula;
        }

        return $aulas;
    }

    public function verificarcpf($idcpf) {
        $pdo = Dao::getInstance();
        $sql = "SELECT COUNT(1) FROM `tb_pessoa` p WHERE p.cpf = ?";
        $result = $pdo->prepare($sql);
        $result->execute(array($idcpf));

        foreach ($result->fetch() as $linhaConsulta) {
            $num = $linhaConsulta[0];
        }
        return $num;
    }

    public function buscapeso($idcpf) {
        $pdo = Dao::getInstance();
        $sql = "SELECT `peso_inicial`, `peso_durante`, `data_entrada` FROM `tb_aluno` WHERE id_pessoa_cpf = ?";
        $result = $pdo->prepare($sql);
        $result->execute(array($idcpf));
        $pesos = array();
        foreach ($result->fetchAll() as $linhaConsulta) {

            $pessoa = new Pessoa();
            $pessoa->setPesoInicial_Aluno(str_replace(".", ",", $linhaConsulta[0]));
            $pessoa->setPesoDurante_Aluno(str_replace(".", ",", $linhaConsulta[1]));
            $pessoa->setDataEntrada_Aluno(date_format(date_create($linhaConsulta[2]), 'd/m/Y'));

            $pesos[] = $pessoa;
        }
        return $pesos;
    }

    public function numalunos($idaula) {
        $pdo = Dao::getInstance();
        $sql = "SELECT COUNT(1) FROM `tb_agendamento` ag WHERE ag.id_agenda_semanal = ? ";
        $result = $pdo->prepare($sql);
        $result->execute(array($idaula));

        foreach ($result->fetchAll() as $linhaConsulta) {
            $nalunos = $linhaConsulta[0];
        }
        return $nalunos;
    }

}
