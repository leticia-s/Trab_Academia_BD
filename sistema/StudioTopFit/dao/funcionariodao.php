<?php

include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../classes/pessoa.php';
include_once 'dao.php';

class FuncionarioDao extends Dao {

    function salvar($pessoa) {
        $pdo = Dao::getInstance();
        $pdo->beginTransaction();
        $sql = "INSERT INTO tb_pessoa(nome, sobrenome, sexo, data_nascimento,endereco, uf, cidade, bairro, cpf, rg, telefone_residencial, telefone_celular, email) ";
        $sql .= " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
        $stmt = $pdo->prepare($sql);
        $valores = array($pessoa->getNome(), $pessoa->getSobrenome(), $pessoa->getSexo(), $pessoa->getDataNascimento(), $pessoa->getEndereco(), $pessoa->getUf(), $pessoa->getCidade(), $pessoa->getBairro(), $pessoa->getCpf(), $pessoa->getRg(), $pessoa->getTelefoneResidencial(), $pessoa->getTelefoneCelular(), $pessoa->getEmail());


        $sql1 = "INSERT INTO tb_funcionario(id_pessoa_cpf, cargo) ";
        $sql1 .= " VALUES (?, ?); ";
        $stmt1 = $pdo->prepare($sql1);
        $valores1 = array($pessoa->getCpf(), $pessoa->getCargo_Funcionario());

        $sql2 = "INSERT INTO usuario(id_pessoa_cpf,usuario, senha, perfil_idperfil) ";
        $sql2 .= " VALUES (?, ?, ?, ?); ";

        $stmt2 = $pdo->prepare($sql2);
        $valores2 = array($pessoa->getCpf(), $pessoa->getNome(), $pessoa->getSenha(), $pessoa->getIdPerfil());

        if ($stmt->execute($valores) == TRUE && $stmt1->execute($valores1) == TRUE && $stmt2->execute($valores2) == TRUE) {
            $pdo->commit();
            return "Funcionário salvo com sucesso! O login do usuário é o CPF e não poderá ser alterado.";
        } else {
            $pdo->rollBack();
            return "Ocorreu um erro!";
        }
    }

    function listar() {
        $pdo = Dao::getInstance();
        $sql = "SELECT p.cpf, p.nome, p.sobrenome, p.sexo, p.data_nascimento, p.rg, p.telefone_residencial, p.telefone_celular,p.endereco,p.uf, p.cidade, p.bairro, p.email, f.cargo FROM tb_pessoa p INNER JOIN tb_funcionario f ON p.cpf = f.id_pessoa_cpf ORDER BY p.nome ASC";
        $result = $pdo->prepare($sql);
        $result->execute();
        $funcionarios = array();
        foreach ($result->fetchAll() as $linhaConsulta) {
            $pessoa = new Pessoa();
            $pessoa->setCpf($linhaConsulta[0]);
            $pessoa->setNome($linhaConsulta[1] . " " . $linhaConsulta[2]);
            $pessoa->setSexo($linhaConsulta[3]);
            $pessoa->setDataNascimento(date_format(date_create($linhaConsulta[4]), 'd/m/Y'));
            $pessoa->setRg($linhaConsulta[5]);
            $pessoa->setTelefoneResidencial($linhaConsulta[6] . " / " . $linhaConsulta[7]);
            $pessoa->setEndereco($linhaConsulta[8]);
            $pessoa->setUf($linhaConsulta[9]);
            $pessoa->setCidade($linhaConsulta[10]);
            $pessoa->setBairro($linhaConsulta[11]);
            $pessoa->setEmail($linhaConsulta[12]);
            $pessoa->setCargo_Funcionario($linhaConsulta[13]);

            $funcionarios[] = $pessoa;
        }

        return $funcionarios;
    }

    public function excluir($pessoa) {
        $pdo = Dao::getInstance();
        $pdo->beginTransaction();
        $sql = "DELETE FROM usuario WHERE id_pessoa_cpf = ?";
        $stmt = $pdo->prepare($sql);

        $sql1 = "DELETE FROM tb_funcionario WHERE id_pessoa_cpf = ?";
        $stmt1 = $pdo->prepare($sql1);

        $sql2 = "DELETE FROM tb_pessoa WHERE cpf = ?";
        $stmt2 = $pdo->prepare($sql2);

        if ($stmt->execute(array($pessoa->getCpf())) == TRUE && $stmt1->execute(array($pessoa->getCpf())) == TRUE && $stmt2->execute(array($pessoa->getCpf())) == TRUE) {
            $pdo->commit();
            return "Funcionário excluído com sucesso!";
        } else {
            $pdo->rollBack();
            return "Ocorreu um erro!";
        }
    }

    public function alterar($pessoa) {
        $pdo = Dao::getInstance();
        $pdo->beginTransaction();
        $sql = "UPDATE tb_pessoa SET nome = ?, ";
        $sql .= " sobrenome = ?, sexo = ?,  data_nascimento = ?, endereco = ?, uf = ?,";
        $sql .= " cidade = ?, bairro = ?, rg = ?, telefone_residencial = ?, telefone_celular = ?, email = ?";
        $sql .= " WHERE cpf = ? ";
        $stmt = $pdo->prepare($sql);
        $valores = array($pessoa->getNome(), $pessoa->getSobrenome(), $pessoa->getSexo(), $pessoa->getDataNascimento(), $pessoa->getEndereco(), $pessoa->getUf(), $pessoa->getCidade(), $pessoa->getBairro(), $pessoa->getRg(), $pessoa->getTelefoneResidencial(), $pessoa->getTelefoneCelular(), $pessoa->getEmail(), $pessoa->getCpf());

        $sql1 = "UPDATE tb_funcionario SET cargo = ? ";
        $sql1 .= "WHERE id_pessoa_cpf = ? ";
        $stmt1 = $pdo->prepare($sql1);
        $valores1 = array($pessoa->getCargo_Funcionario(), $pessoa->getCpf());

        $sql2 = "UPDATE usuario SET usuario = ? , senha = ?, perfil_idperfil = ? ";
        $sql2 .= "WHERE id_pessoa_cpf = ? ";
        $stmt2 = $pdo->prepare($sql2);
        $valores2 = array($pessoa->getNome(), $pessoa->getSenha(), $pessoa->getIdPerfil(), $pessoa->getCpf());


        if ($stmt->execute($valores) == TRUE && $stmt1->execute($valores1) == TRUE && $stmt2->execute($valores2) == TRUE) {
            $pdo->commit();
            return "Funcionário alterado com sucesso!";
        } else {
            $pdo->rollBack();
            return "Ocorreu um erro ao tentar alterar o funcionário";
        }
    }

    public function carregar($idFuncionario) {
        $pdo = Dao::getInstance();
        $sql = "SELECT p.cpf, p.nome, p.sobrenome, p.sexo, p.data_nascimento, p.rg, p.telefone_residencial, p.telefone_celular,p.endereco,p.uf, p.cidade, p.bairro, p.email, f.cargo FROM tb_pessoa p INNER JOIN tb_funcionario f ON p.cpf = f.id_pessoa_cpf WHERE f.id_pessoa_cpf = ?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($idFuncionario));

        $linhaBanco = $stmt->fetch();

        $pessoa = new Pessoa();
        $pessoa->setCpf($linhaBanco[0]);
        $pessoa->setNome($linhaBanco[1]);
        $pessoa->setSobrenome($linhaBanco[2]);
        $pessoa->setSexo($linhaBanco[3]);
        $pessoa->setDataNascimento($linhaBanco[4]);
        $pessoa->setRg($linhaBanco[5]);
        $pessoa->setTelefoneResidencial($linhaBanco[6]);
        $pessoa->setTelefoneCelular($linhaBanco[7]);
        $pessoa->setEndereco($linhaBanco[8]);
        $pessoa->setUf($linhaBanco[9]);
        $pessoa->setCidade($linhaBanco[10]);
        $pessoa->setBairro($linhaBanco[11]);
        $pessoa->setEmail($linhaBanco[12]);
        $pessoa->setCargo_Funcionario($linhaBanco[13]);

        return $pessoa;
    }

}
