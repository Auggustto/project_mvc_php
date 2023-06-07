<?php

require_once 'app/views/home.php';
require_once 'app/controllers/Homecontroller.php';
require_once 'app/models/lib/database/table.php';

$user = new TableDinamic();
$user->SelectAll();

$template = file_get_contents('app/view/home.php');
echo $template;

$saida = ob_get_contents($user);

// Carregando template que tem o conteudo HTML
$tplPronto = str_replace('{{table_dinamic}}', $saida, $template);
echo $tplPronto;