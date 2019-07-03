<?php

require_once 'dao.php';

class LoginDAO {

    public function login($usuario, $senha) {
        try {

            $pdo = Dao::getInstance();
            $sql = "SELECT u.id_pessoa_cpf, p.perfil,p.idperfil,u.usuario FROM usuario u 
                    INNER JOIN perfil p ON (u.perfil_idperfil = p.idperfil)
                    WHERE u.id_pessoa_cpf = ? AND u.senha = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $usuario);
            $stmt->bindValue(2, $senha);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
