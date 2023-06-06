<?php

require_once 'app/views/home.php';
// require_once 'app/controllers/Homecontroller.php';

$template = file_get_contents('app/view/home.php');
echo $template;