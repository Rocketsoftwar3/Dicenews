<?php

class AccountController {
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }


        require_once __DIR__ . '/../views/account.php';
    }
}
