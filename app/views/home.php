<?php

require_once 'app/models/lib/database/models.php';

$ret = new user_all("project","localhost", "root", "");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="app/global/style/home.css">
    
    <title>CRUD de Clientes</title>
</head>

<body>
    <div class="container">
        <h1>CRUD de Clientes</h1>

        <!-- Formulário para adicionar/alterar clientes -->
        <form id="clientForm" method="post">
            <input type="hidden" id="clientId">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="tel">Telefone:</label>
                <input type="tel" class="form-control" name="telefone" id="telefone" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <button type="button" class="btn btn-secondary" id="cancelBtn">Cancelar</button>
        </form>
        <table class="table mt-4">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td colspan="2">Email</td>
                    <td>Telefone</td>
                </tr>
                <?php
                    $data = $ret->search_values();
                    
                    if(count($data) >0 )
                    {
                        for ($i=0; $i < count($data); $i ++) 
                        {
                            echo "<tr>";
                            foreach($data[$i] as $key => $value)
                            {
                                if($key != "id")
                                {
                                    echo "<td>".$value."</td>";
                                }
                            }
                            echo "</tr>";
                        }
                        ?>
                            <td><a class="ed" href="">Editar</a><a class="ex" href="">Excluir</a></td>
                            echo "<tr>";
                        <?php
                    }
                ?>
                </tr>
            </thead>
            <tbody id="clientTableBody">
        </tbody>
        </table>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>