
<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    public function register() {
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             $username = trim($_POST['username']);
             $password = $_POST['password'];

             $userModel = new User();
             if ($userModel->create($username, $password)) {
                 header('Location: ' . BASE_URL . '/auth/login');
                 exit;
             } else {
                 $error = "Nom d'utilisateur déjà pris ou erreur.";
             }
         }
         require_once __DIR__ . '/../views/register.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = $_POST['password'];

            $userModel = new User();
            $user = $userModel->findByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('Location: ' . BASE_URL . '/');
                exit;
            } else {
                $error = "Identifiants incorrects.";
            }
        }
        require_once __DIR__ . '/../views/login.php';
    }

    public function logout() {
        session_destroy();
        header('Location: ' . BASE_URL . '/');
        exit;
    }
}
