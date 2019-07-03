<?php

include_once 'dao.php';
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../classes/referencia.php';

class AulaDao extends Dao {

    function salvar($nome) {
        $pdo = Dao::getInstance();
        $pdo->beginTransaction();
        $sql = "INSERT INTO tb_aula(nome) ";
        $sql .= " VALUES (?); ";
        $stmt = $pdo->prepare($sql);
        $valores = array($nome);

        if ($stmt->execute($valores) == TRUE ) {
            $pdo->commit();
            return "Aula salva com sucesso!";
        } else {
            $pdo->rollBack();
            return "Ocorreu um erro!";
        }
    }

 function listar() {
        $pdo = Dao::getInstance();
        $sql = "SELECT l.id_aula, l.nome FROM tb_aula l";
        $result = $pdo->prepare($sql);
        $result->execute();

        $aulas = array();

        foreach ($result->fetchAll() as $linhaConsulta) {
            $referencia = new Referencia();
            $referencia->setId($linhaConsulta[0]);
            $referencia->setNome($linhaConsulta[1]);

            $aulas[] = $referencia;
        }

        return $aulas;
    }

    public function excluir($id) {
        $pdo = Dao::getInstance();
        $pdo->beginTransaction();

        $sql = "DELETE FROM tb_aula WHERE id_aula = ?";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute(array($id)) == TRUE) {
            $pdo->commit();
            return "Aula excluída com sucesso!";
        } else {
            $pdo->rollBack();
            return "Ocorreu um erro!";
        }
    }

    public function alterar($referencia) {
        $pdo = Dao::getInstance();
        $pdo->beginTransaction();
        $sql = "UPDATE tb_aula SET nome = ?";
        $sql .= " WHERE id_aula = ? ";
        $stmt = $pdo->prepare($sql);
        $valores = array($referencia->getNome(), $referencia->getId());

        if ($stmt->execute($valores) == TRUE) {
            $pdo->commit();
            return "Aula alterada com sucesso!";
        } else {
            $pdo->rollBack();
            return "Ocorreu um erro ao tentar alterar a aula";
        }
    }

}
?>

 
