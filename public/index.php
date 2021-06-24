<?php

    require_once(dirname(__FILE__, 2) . '/src/config/config.php');
    
    $uri = urldecode(
        parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
    );

    if($uri === '/' || $uri === '')
    {
        $uri = '/day_records.php';
    }

    require_once(CONTROLLER_PATH . "{$uri}");
    
    


    // require_once(CONTROLLER_PATH . '/day_records.php');

    // $login = new Login([
    //     'email' => 'admin@cod3r.com.br',
    //     'password' => 'a'
    // ]);

    // try {
    //     $login->checkLogin();
    //     echo "Deu certo! :)";
    // } catch(Exception $e) {
    //     echo "Problema no login :p";
    // }