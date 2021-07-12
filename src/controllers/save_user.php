<?php

    session_start();
    requireValidSession();

    $exception = null;
    $userData = [];

    if (count($_POST) == 0 && isset($_GET['update'])) {
        $user = User::getOne(['id' => $_GET['update']]);
        $userData = $user->getValues();
        $userData['password'] = null;
    } else if (count($_POST) > 0) {

        try {

            // echo '<pre>';
            // print_r($_POST);
            // echo '</pre><br>';
            // die();
            $newUser = new User($_POST);
            
            if ($newUser->id) {
                $newUser->update();
                addSuccessMessage('Usuário alterado com sucesso!');
                header('Location: users.php');
                exit();
            } else {
                $newUser->insert();
                addSuccessMessage('Usuário cadastrado com sucesso!');
            }

            $_POST = [];
    
        } catch (Exception $e) {
            $exception = $e;
        } finally {
            $userData = $_POST;
        }

    }

    loadTemplateView('save_user', $userData + ['exception' => $exception]);