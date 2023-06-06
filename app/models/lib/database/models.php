<?php

use JetBrains\PhpStorm\NoReturn;

class user_all
{
    private $pdo;

    // Conexão com o banco de dados OBS: Tudo que está dentro do function __construct(), será executado primeiro.
    public function __construct($database, $servername, $username,  $password)
    {
        try {

            $this->pdo = new PDO("mysql:dbname=" . $database . ";host=" . $servername, $username, $password);
            //echo "Conexão estabelecida com sucesso.";

        } catch (PDOException $e) {
            echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
            // Caso der erro para o codigo
            exit();
        } catch (Exception $e) {
            echo "Erro generico: " . $e->getMessage();
            // Caso der erro para o codigo
            exit();
        }
    }
    // Metodo para buscar todos os dados
    public function search_values()
    {
        // Caso o db esteja vazio, a var res vai retornar um array vazio
        $res = array();

        $select_all = $this->pdo->query("SELECT * FROM users");
        $res = $select_all->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // Cadastrando usuarios 
    public function InsertUsers($name, $phone, $email)
    {
        // Validando se o email do usuario já existe
        $insert = $this->pdo->prepare("SELECT id from users WHERE email = :e");
        $insert->bindValue(":e", $email);
        $insert->execute();

        // Validando se retornou ID pesquisado
        if ($insert->rowCount() > 0) {
            return false;
        } else  // Email não foi localizado
        {
            $insert = $this->pdo->prepare("INSERT INTO users (name, email, telephone) VALUES (:n, :t, :e)");
            $insert->bindValue(":n", $name);
            $insert->bindValue(":t", $email);
            $insert->bindValue(":e", $phone);
            $insert->execute();
            return true;
        }
    }
}
