<?php

include_once 'dao.php';
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../classes/referencia.php';

class LocalDao extends Dao {

    function salvar($nome) {
        $pdo = Dao::getInstance();
        $pdo->beginTransaction();
        $sql = "INSERT INTO tb_local(localizacao) ";
        $sql .= " VALUES (?); ";
        $stmt = $pdo->prepare($sql);
        $valores = array($nome);

        if ($stmt->execute($valores) == TRUE ) {
            $pdo->commit();
            return "Local salvo com sucesso!";
        } else {
            $pdo->rollBack();
            return "Ocorreu um erro!";
        }
    }

 function listar() {
        $pdo = Dao::getInstance();
        $sql = "SELECT l.id_local, l.localizacao FROM tb_local l";
        $result = $pdo->prepare($sql);
        $result->execute();

        $locais = array();

        foreach ($result->fetchAll() as $linhaConsulta) {
            $referencia = new Referencia();
            $referencia->setId($linhaConsulta[0]);
            $referencia->setNome($linhaConsulta[1]);

            $locais[] = $referencia;
        }

        return $locais;
    }

    public function excluir($id) {
        $pdo = Dao::getInstance();
        $pdo->beginTransaction();

        $sql = "DELETE FROM tb_local WHERE id_local = ?";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute(array($id)) == TRUE) {
            $pdo->commit();
            return "Local excluído com sucesso!";
        } else {
            $pdo->rollBack();
            return "Ocorreu um erro!";
        }
    }

    public function alterar($referencia) {
        $pdo = Dao::getInstance();
        $pdo->beginTransaction();
        $sql = "UPDATE tb_local SET localizacao = ?";
        $sql .= " WHERE id_local = ? ";
        $stmt = $pdo->prepare($sql);
        $valores = array($referencia->getNome(), $referencia->getId());

        if ($stmt->execute($valores) == TRUE) {
            $pdo->commit();
            return "Local alterado com sucesso!";
        } else {
            $pdo->rollBack();
            return "Ocorreu um erro ao tentar alterar o Local";
        }
    }

}
?>

 
