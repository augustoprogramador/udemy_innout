<?php

    session_start();
    requireValidSession();

    $exception = null;

    if (count($_POST) > 0) {

        try {

            // echo '<pre>';
            // print_r($_POST);
            // echo '</pre><br>';
            // die();
            $newUser = new User($_POST);
            // echo '<pre>';
            // print_r($newUser);
            // var_dump(!!$newUser->start_date);
            // var_dump(!false);
            // var_dump(!!$newUser->end_date);
            // echo '</pre>';
            // die();
            $newUser->insert();
            addSuccessMessage('Usuário cadastrado com sucesso!');
            $_POST = [];
    
        } catch (Exception $e) {
            $exception = $e;
        }

    }

    loadTemplateView('save_user', $_POST + ['exception' => $exception]);