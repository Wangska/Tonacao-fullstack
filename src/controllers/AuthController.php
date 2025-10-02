<?php
declare(strict_types=1);

class AuthController
{
    private PDO $pdo;
    private User $userModel;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->userModel = new User($pdo);
    }

    public function login(): void
    {
        if (isPost()) {
            verifyCsrf();
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            $user = $this->userModel->findByEmail($email);
            if ($user && $this->userModel->verifyPassword($password, $user['password_hash'])) {
                $_SESSION['user_id'] = (int)$user['id'];
                redirect('index.php');
            } else {
                $error = 'Invalid credentials';
                render('auth/login', compact('error', 'email'));
            }
            return;
        }

        render('auth/login');
    }

    public function register(): void
    {
        if (isPost()) {
            verifyCsrf();
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $confirm = $_POST['confirm'] ?? '';

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'Enter a valid email.';
                render('auth/register', compact('error', 'email'));
                return;
            }
            if ($password === '' || $password !== $confirm) {
                $error = 'Passwords do not match.';
                render('auth/register', compact('error', 'email'));
                return;
            }
            if ($this->userModel->findByEmail($email)) {
                $error = 'Email already registered.';
                render('auth/register', compact('error', 'email'));
                return;
            }

            $userId = $this->userModel->create($email, $password);
            $_SESSION['user_id'] = $userId;
            redirect('index.php');
            return;
        }

        render('auth/register');
    }

    public function logout(): void
    {
        session_destroy();
        redirect('index.php?r=login');
    }
}


