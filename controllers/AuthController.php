<?php

require_once "models/Usuario.php";

class AuthController {

    public function login(){

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuarioModel = new Usuario();
        $usuario = $usuarioModel->buscarUsuario($email);

        if($usuario && password_verify($senha, $usuario[1])){
            
            session_start();
            $_SESSION['usuario'] = $email;

            header("Location: index.php?acao=dashboard");
        } else {
            echo "Login inválido";
        }
    }

    public function cadastrar(){

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuario = new Usuario();
        $usuario->cadastrar($email, $senha);

        header("Location: index.php");
    }

    public function dashboard(){

        session_start();

        if(!isset($_SESSION['usuario'])){
            header("Location: index.php");
            exit;
        }

        require "views/dashboard.php";
    }

    public function logout(){
        session_start();
        session_destroy();
        header("Location: index.php");
    }
}