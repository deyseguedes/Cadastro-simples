<?php

require_once "controllers/AuthController.php";

$acao = $_GET['acao'] ?? null;

$controller = new AuthController();

switch($acao){

    case "login":
        $controller->login();
        break;

    case "cadastrar":
        $controller->cadastrar();
        break;

    case "cadastro":
        require "views/cadastro.php";
        break;

    case "dashboard":
        $controller->dashboard();
        break;

    case "logout":
        $controller->logout();
        break;

    default:
        require "views/login.php";
        break;
}