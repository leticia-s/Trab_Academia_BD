<?php

include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../classes/agendaraula.php';
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../classes/pessoa.php';
include_once 'dao.php';

class AgendaDao extends Dao {

    function salvar($agendaraula) {
        $pdo = Dao::getInstance();
        $sql = "INSERT INTO tb_agenda_semanal(dia_da_semana, horario_inicial, horario_final, nome_aula)";
        $sql .= " VALUES (?, ?, ?, ?); ";
        $stmt = $pdo->prepare($sql);
        $valores = array($agendaraula->getDiaSemana(), $agendaraula->getHorario(), $agendaraula->getHorarioFinal(), $agendaraula->getNomeAula());

        if ($stmt->execute($valores) == TRUE) {
            return "Aula salva com sucesso!";
        } else {
            return "Ocorreu um erro!";
        }
    }

    function listar() {
        $pdo = Dao::getInstance();
        $sql = "SELECT `id_agenda_semanal`, `dia_da_semana`, `horario_inicial`, `horario_final`, `nome_aula` FROM `tb_agenda_semanal`";
        $result = $pdo->prepare($sql);
        $result->execute();

        $aulas = array();

        foreach ($result->fetchAll() as $linhaConsulta) {
            $agendaraula = new Agendaraula();
            $agendaraula->setId($linhaConsulta[0]);
            $agendaraula->setDiaSemana($linhaConsulta[1]);
            $hora = $linhaConsulta[2];
            $array = explode(":", $hora);
            $hora = $array[0];
            $min = $array[1];
            $hora2 = $linhaConsulta[3];
            $array2 = explode(":", $hora2);
            $hora2 = $array2[0];
            $min2 = $array2[1];
            $agendaraula->setHorario($hora . ":" . $min . " - " . $hora2 . ":" . $min2);
            $agendaraula->setNomeAula($linhaConsulta[4]);

            $aulas[] = $agendaraula;
        }

        return $aulas;
    }

    public function excluir($agendaraula) {
        $pdo = Dao::getInstance();
        $pdo->beginTransaction();
        $sql = "DELETE FROM tb_agendamento WHERE id_agenda_semanal = ?";
        $stmt = $pdo->prepare($sql);

        $sql1 = "DELETE FROM tb_agenda_semanal WHERE id_agenda_semanal = ?";
        $stmt1 = $pdo->prepare($sql1);

        if ($stmt->execute(array($agendaraula->getId())) == TRUE && $stmt1->execute(array($agendaraula->getId())) == TRUE) {
            $pdo->commit();
            return "Aula excluída com sucesso!";
        } else {
            $pdo->rollBack();
            return "Ocorreu um erro!";
        }
    }

    function listarAlunos($idaula) {
        $pdo = Dao::getInstance();
        $sql = "SELECT p.nome, p.sobrenome, p.cpf, p.rg, p.email FROM tb_pessoa p INNER JOIN tb_agendamento a ON p.cpf = a.id_pessoa_cpf where a.id_agenda_semanal= ? ORDER BY p.nome ASC";
        $result = $pdo->prepare($sql);
        $result->execute(array($idaula));

        $alunos = array();

        foreach ($result->fetchAll() as $linhaConsulta) {
            $pessoa = new Pessoa();
            $pessoa->setNome($linhaConsulta[0] . " " . $linhaConsulta[1]);
            $pessoa->setCpf($linhaConsulta[2]);
            $pessoa->setRg($linhaConsulta[3]);
            $pessoa->setEmail($linhaConsulta[4]);

            $alunos[] = $pessoa;
        }

        return $alunos;
    }

    public function excluirAluno($agendaraula, $pessoa) {
        $pdo = Dao::getInstance();
        $sql = "DELETE FROM tb_agendamento WHERE id_agenda_semanal = ? AND id_pessoa_cpf = ?";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute(array($agendaraula->getId(), $pessoa->getCpf())) == TRUE) {
            return "Aluno excluído com sucesso!";
        } else {
            return "Ocorreu um erro!";
        }
    }

    function listarAlunosFora($idaula) {
        $pdo = Dao::getInstance();
        $sql = "SELECT p.nome, p.sobrenome, p.cpf, p.rg, p.email FROM tb_aluno al INNER JOIN tb_pessoa p on p.cpf = al.id_pessoa_cpf WHERE al.id_pessoa_cpf not in (select id_pessoa_cpf from tb_agendamento ag where ag.id_agenda_semanal = ? )";
        $result = $pdo->prepare($sql);
        $result->execute(array($idaula));

        $alunos = array();

        foreach ($result->fetchAll() as $linhaConsulta) {
            $pessoa = new Pessoa();
            $pessoa->setNome($linhaConsulta[0] . " " . $linhaConsulta[1]);
            $pessoa->setCpf($linhaConsulta[2]);
            $pessoa->setRg($linhaConsulta[3]);
            $pessoa->setEmail($linhaConsulta[4]);

            $alunos[] = $pessoa;
        }

        return $alunos;
    }

    public function incluirAluno($agendaraula, $pessoa) {
        $pdo = Dao::getInstance();
        $sql = "INSERT INTO tb_agendamento (id_pessoa_cpf, id_agenda_semanal)";
        $sql .= "VALUES (?, ?);";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute(array($pessoa->getCpf(), $agendaraula->getId())) == TRUE) {
            return "Aluno incluído com sucesso!";
        } else {
            return "Ocorreu um erro!";
        }
    }

}
