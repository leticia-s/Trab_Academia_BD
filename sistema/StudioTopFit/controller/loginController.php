<?php

session_start();
require_once '../dao/loginDAO.php';


$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);

$loginDAO = new LoginDAO();
$usuario = $loginDAO->login($usuario, $senha);
if (!empty($usuario)) {
    $_SESSION["id_pessoa_cpf"] = $usuario["id_pessoa_cpf"];
    $_SESSION["usuario"] = $usuario["usuario"];
    $_SESSION["perfil"] = $usuario["perfil"];
    echo "<script>";
    echo "   window.location='../index.php'";
    echo "</script>";
} else {
    $msg = "Usuário ou senha inválido.";
    echo "<script>";
    echo "   window.location='../View/login.php?msg=$msg'";
    echo "</script>";
}


