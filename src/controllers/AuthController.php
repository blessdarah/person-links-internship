<?php

declare(strict_types=1);

namespace PersonLinks\Internship\controllers;

use BlakvGhost\PHPValidator\Validator;
use PersonLinks\Internship\app\core\FormRequest;
use PersonLinks\Internship\app\core\Connection;
use PersonLinks\Internship\app\core\View;

/** @package PersonLinks\Internship\controllers */
class AuthController
{
    public const USER_ROLES = [
        'admin' => 'admin',
        'user' => 'user',
    ];

    public function signup()
    {
        $this->redirectIfAdminExists();

        $view = new View('pages/signup', [
            'title' => 'Signup',
            'description' => 'Create an account.',
        ]);

        return $view->render();
    }

    public function login()
    {
        $view = new View('pages/Login', [
            'title' => 'Login',
            'description' => 'Login to your account.',
        ]);

        return $view->render();
    }
    /** @return null  */
    public function loginHandler()
    {
        $loginRules = [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ];

        $formData = FormRequest::only(['email', 'password']);
        $validator = new Validator($formData, $loginRules);
        if (! $validator->isValid()) {
            $errors = $validator->getErrors();
            error_log("[login]: validation errors: " . json_encode($errors));

            $_SESSION['errors'] = "invalid username or password";
            redirect('login', 400);
        }
        $user = $this->getUserByEmail($formData['email']);
        if ($user) {
            $passwordIsValid = password_verify($formData['password'], $user->password);
            if (! $passwordIsValid) {
                $_SESSION['errors'] = "invalid username or password";
                redirect('login', 400);
            } else {
                $_SESSION['user'] = $user;
                $_SESSION['isLoggedIn'] = true;
                $_SESSION['success'] = "Login successful";
                redirect('dashboard', 200);
            }
        }
        $_SESSION['errors'] = "invalid username or password";
        redirect('login', 400);
    }
    private function redirectIfAdminExists()
    {
        $db = Connection::getInstance();
        $query = $db->prepare("SELECT * FROM users WHERE role = :role");
        $query->execute(['role' => self::USER_ROLES['admin']]);
        $admin = $query->fetch(\PDO::FETCH_OBJ);
        if ($admin) {
            // permanent redirect
            header("Location: /login", true, 301);
        }
    }

    public function signupHandler()
    {

        $signupRules = [
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ];

        $formData = FormRequest::only(['name', 'email', 'password']);
        $validator = new Validator($formData, $signupRules);
        if (! $validator->isValid()) {
            $errors = $validator->getErrors();
            error_log("[signup]: validation errors: " . json_encode($errors));

            $_SESSION['errors'] = "invalid username or password";
            redirect('login', 400);
        }
        $user = $this->getUserByEmail($formData['email']);
        if ($user) {
            $_SESSION['errors'] = "user already exists";
            redirect('login', 400);
        } else {
            $conn = Connection::getInstance();
            $query = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)");
            $query->execute([
                'name' => $formData['name'],
                'email' => $formData['email'],
                'password' => password_hash($formData['password'], PASSWORD_BCRYPT),
                'role' => self::USER_ROLES['admin'],
            ]);
            $_SESSION['success'] = "Signup successful";
            redirect('dashboard', 200);
        }
    }

    private function getUserByEmail(string $email): ?object
    {
        $db = Connection::getInstance();
        $query = $db->prepare("SELECT * FROM users WHERE email = :email");
        $query->execute([ 'email' => $email ]);
        $user = $query->fetch(\PDO::FETCH_OBJ);
        if (! $user) {
            return null;
        }
        return $user;
    }

    /** @return void  */
    public function logout()
    {
        session_unset();
        session_destroy();
        redirect("/");
    }
}
