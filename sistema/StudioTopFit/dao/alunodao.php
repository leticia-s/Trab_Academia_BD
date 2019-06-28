<?php

include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../classes/pessoa.php';
include_once 'dao.php';

class AlunoDao extends Dao {

    function salvar($pessoa) {
        $pdo = Dao::getInstance();
        $pdo->beginTransaction();
        $sql = "INSERT INTO tb_pessoa(nome, sobrenome, sexo, data_nascimento,endereco, uf, cidade, bairro, cpf, rg, email) ";
        $sql .= " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
        $stmt = $pdo->prepare($sql);
        $valores = array($pessoa->getNome(), $pessoa->getSobrenome(), $pessoa->getSexo(), $pessoa->getDataNascimento(), $pessoa->getEndereco(), $pessoa->getUf(), $pessoa->getCidade(), $pessoa->getBairro(), $pessoa->getCpf(), $pessoa->getRg(), $pessoa->getEmail());



        $sql1 = "INSERT INTO tb_aluno(id_pessoa_cpf, data_entrada) ";
        $sql1 .= " VALUES (?, ?); ";
        $stmt1 = $pdo->prepare($sql1);
        $valores1 = array($pessoa->getCpf(), $pessoa->getDataEntrada_Aluno());


        $sql2 = "INSERT INTO usuario(id_pessoa_cpf,usuario, senha, perfil_idperfil) ";
        $sql2 .= " VALUES (?, ?, ?, ?); ";

        $stmt2 = $pdo->prepare($sql2);
        $valores2 = array($pessoa->getCpf(), $pessoa->getNome(), $pessoa->getSenha(), $pessoa->getIdPerfil());


        if ($stmt->execute($valores) == TRUE && $stmt1->execute($valores1) == TRUE && $stmt2->execute($valores2) == TRUE) {
            $pdo->commit();
            return "Aluno salvo com sucesso! O login do usuário é o CPF e não poderá ser alterado.";
        } else {
            $pdo->rollBack();
            return "Ocorreu um erro!";
        }
    }

    function listar() {
        $pdo = Dao::getInstance();
        $sql = "SELECT p.cpf, p.nome, p.sobrenome, p.sexo, p.data_nascimento, p.rg,p.endereco,p.uf, p.cidade, p.bairro, p.email, a.data_entrada FROM tb_pessoa p INNER JOIN tb_aluno a ON p.cpf = a.id_pessoa_cpf ORDER BY p.nome ASC";
        $result = $pdo->prepare($sql);
        $result->execute();

        $alunos = array();

        foreach ($result->fetchAll() as $linhaConsulta) {
            $pessoa = new Pessoa();
            $pessoa->setCpf($linhaConsulta[0]);
            $pessoa->setNome($linhaConsulta[1] . " " . $linhaConsulta[2]);
            $pessoa->setSexo($linhaConsulta[3]);
            $pessoa->setDataNascimento(date_format(date_create($linhaConsulta[4]), 'd/m/Y'));
            $pessoa->setRg($linhaConsulta[5]);
            $pessoa->setEndereco($linhaConsulta[6]);
            $pessoa->setUf($linhaConsulta[7]);
            $pessoa->setCidade($linhaConsulta[8]);
            $pessoa->setBairro($linhaConsulta[9]);
            $pessoa->setEmail($linhaConsulta[10]);
            $pessoa->setDataEntrada_Aluno(date_format(date_create($linhaConsulta[11]), 'd/m/Y'));

            $alunos[] = $pessoa;
        }

        return $alunos;
    }

    public function excluir($pessoa) {
        $pdo = Dao::getInstance();
        $pdo->beginTransaction();

        $sql = "DELETE FROM usuario WHERE id_pessoa_cpf = ?";
        $stmt = $pdo->prepare($sql);

        $sql1 = "DELETE FROM tb_aluno WHERE id_pessoa_cpf = ?";
        $stmt1 = $pdo->prepare($sql1);

        $sql2 = "DELETE FROM tb_pessoa WHERE cpf = ?";
        $stmt2 = $pdo->prepare($sql2);

        if ($stmt->execute(array($pessoa->getCpf())) == TRUE && $stmt1->execute(array($pessoa->getCpf())) == TRUE && $stmt2->execute(array($pessoa->getCpf())) == TRUE) {
            $pdo->commit();
            return "Aluno excluído com sucesso!";
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
        $sql .= " cidade = ?, bairro = ?, rg = ?, email = ?";
        $sql .= " WHERE cpf = ? ";
        $stmt = $pdo->prepare($sql);
        $valores = array($pessoa->getNome(), $pessoa->getSobrenome(), $pessoa->getSexo(), $pessoa->getDataNascimento(), $pessoa->getEndereco(), $pessoa->getUf(), $pessoa->getCidade(), $pessoa->getBairro(), $pessoa->getRg(), $pessoa->getEmail(), $pessoa->getCpf());

        $sql2 = "UPDATE usuario SET usuario = ? , senha = ?, perfil_idperfil = ? ";
        $sql2 .= "WHERE id_pessoa_cpf = ? ";
        $stmt2 = $pdo->prepare($sql2);
        $valores2 = array($pessoa->getNome(), $pessoa->getSenha(), $pessoa->getIdPerfil(), $pessoa->getCpf());


        if ($stmt->execute($valores) == TRUE && $stmt2->execute($valores2) == TRUE) {
            $pdo->commit();
            return "Aluno alterado com sucesso!";
        } else {
            $pdo->rollBack();
            return "Ocorreu um erro ao tentar alterar o Aluno";
        }
    }

    public function carregar($idAluno) {
        $pdo = Dao::getInstance();
        $sql = "SELECT p.cpf, p.nome, p.sobrenome, p.sexo, p.data_nascimento, p.rg,p.endereco,p.uf, p.cidade, p.bairro, p.email FROM tb_pessoa p INNER JOIN tb_aluno a ON p.cpf = a.id_pessoa_cpf WHERE a.id_pessoa_cpf = ?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($idAluno));

        $linhaBanco = $stmt->fetch();

        $pessoa = new Pessoa();
        $pessoa->setCpf($linhaBanco[0]);
        $pessoa->setNome($linhaBanco[1]);
        $pessoa->setSobrenome($linhaBanco[2]);
        $pessoa->setSexo($linhaBanco[3]);
        $pessoa->setDataNascimento($linhaBanco[4]);
        $pessoa->setRg($linhaBanco[5]);
        $pessoa->setEndereco($linhaBanco[6]);
        $pessoa->setUf($linhaBanco[7]);
        $pessoa->setCidade($linhaBanco[8]);
        $pessoa->setBairro($linhaBanco[9]);
        $pessoa->setEmail($linhaBanco[10]);

        return $pessoa;
    }

}
