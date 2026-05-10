<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');
	mb_internal_encoding('UTF-8');
	
	spl_autoload_register();

    $multipliers = new \src\Factorization;
    
    $result = [];
    $num = null;
    $steps = [];

    if (!empty($_POST['number']) and $_POST['number'] > 0) {
        $num = $_POST['number'];
        $multipliers->getMultipliers($num);
        $steps = $multipliers->steps;
        $result = $multipliers->arr;
    }
        
    require 'views/template.php';