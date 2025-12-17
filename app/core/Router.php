<?php

class Router {
    public function __construct() {
        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';
        $urlParts = explode('/', $url);

        $controllerName = $urlParts[0] ?? '';
        $actionName = $urlParts[1] ?? '';
        $param = $urlParts[2] ?? null;

        if ($controllerName === '' || $controllerName === 'index') {
            require_once '../app/controllers/PostController.php';
            $controller = new PostController();
            $controller->index();
        }


        elseif ($controllerName === 'auth') {
            require_once '../app/controllers/AuthController.php';
            $controller = new AuthController();

            if ($actionName === 'login') {
                $controller->login();
            } elseif ($actionName === 'register') {
                $controller->register();
            } elseif ($actionName === 'logout') {
                $controller->logout();
            } else {
                echo "Page Auth introuvable";
            }
        }

        elseif ($controllerName === 'post') {
            require_once '../app/controllers/PostController.php';
            $controller = new PostController();

            if ($actionName === 'create') {
                $controller->create();
            } elseif ($actionName === 'show') {
                $controller->show($param); // On passe l'ID ($param)
            } else {
                echo "Action Post introuvable";
            }
        }

        elseif ($controllerName === 'comment') {
            if (file_exists('../app/controllers/CommentController.php')) {
                require_once '../app/controllers/CommentController.php';
                $controller = new CommentController();
                if ($actionName === 'create') {
                    $controller->create();
                }
            } else {
                echo "Erreur : CommentController n'existe pas encore.";
            }
        }

        elseif ($controllerName === 'account') {
            require_once '../app/controllers/AccountController.php';
            $controller = new AccountController();
            $controller->index();
        }

        else {
            echo "Erreur 404 : Page introuvable";
        }
    }
}
