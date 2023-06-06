<?php

require_once 'app/models/lib/database/models.php';
require_once 'app/views/home.php';


function insert(){

    $ret = new user_all("project", "localhost", "root", "");

    if (isset($_POST['name'])) {
        // addslashes -> Protege de inputs maliciosos
        $name = addslashes($_POST['name']);
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);

        // Validando se tem campos vazios
        if (!empty($name) && !empty($email) && !empty($telephone));
        if (!$ret->InsertUsers($name, $telefone, $email)) {
            return '<script src="alert_insert.js"></script>';
        } 
    }
}
    