<?php

class Usuario {

    private $arquivo = "data/usuarios.csv";

    public function cadastrar($email, $senha){

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new Exception("Email inválido");
        }

        $hash = password_hash($senha, PASSWORD_DEFAULT);

        $file = fopen($this->arquivo, "a");
        fputcsv($file, [$email, $hash]);
        fclose($file);
    }

    public function buscarUsuario($email){

        if(!file_exists($this->arquivo)){
            return null;
        }

        $file = fopen($this->arquivo, "r");

        while(($linha = fgetcsv($file)) !== false){
            if($linha[0] === $email){
                fclose($file);
                return $linha;
            }
        }

        fclose($file);
        return null;
    }
}