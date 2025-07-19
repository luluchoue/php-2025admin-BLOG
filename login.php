<?php

session_start();
require_once 'database/database.php';
$erros = [];
if (isset($_POST['login'])) {
    echo 'ok';
    if (! empty($_POST['email']) && ! empty($_POST['password'])) {

        $query = 'SELECT * FROM users 
          WHERE (email = :email OR username = :email)';
        $query = $pdo->prepare($query);
        $query->execute([
            'email' => $_POST['email'],
            'password' => $_POST['password'],

        ]);

        $user = $query->fetch();
        // eco<'pre'>
        if ($user && password_verify($_POST['password'], $user['password'])) {
            $_SESSION['auth'] = $user;
            $_SESSION['role'] = $user['role'];

            // redirection en fonction du role
            switch ($user['role']) {
                case 'admin':
                    header('location: admin-dashboard.php');
                    // code...
                    break;

                default:
                    header('location: index.php');
                    // code...
                    break;
            }

        } else {
            $erros['email'] = 'Email ou mot de passe incorrect';
        }

    } else {
        $erros['login'] = 'tous les champs sont remplis';

    }
}

$pageTitle = 'Page  login';

// Début du tampon de la page de sortie
ob_start();

// Inclure le layout de la page d'accueil
require_once 'resources/views/users/login_html.php';

// Récupération du contenu du tampon de la page d'accueil
$pageContent = ob_get_clean();

// Inclure le layout de la page de sortie
require_once 'resources/views/layouts/blog-layout/blog-layout_html.php';
