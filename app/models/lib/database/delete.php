<?php

$ret = new user_all("project", "localhost", "root", "");

function DeleteUser()
{
    global $ret;
    if (isset($_GET["id"])) {
        $id_user = addslashes($_GET["id"]);

        // Chamando a função para deletar
        $ret->DeleteUser($id_user);

        // Atualizando a pagina
        header("location: index.php");

        if ($id_user) {
            echo '<script>'; echo 'alert("Usuário deletado com sucesso!")'; echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("Usuário não foi deletado!")';
            echo '</script>';
        }
    }
}
