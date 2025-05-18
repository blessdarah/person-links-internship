<?php

namespace PersonLinks\Internship\controllers;

use PDO;
use PersonLinks\Internship\app\core\Connection;
use PersonLinks\Internship\app\core\View;

class AdminPageController
{
    /**
     * Render the admin dashboard page.
     *
     * @return string The rendered admin dashboard view.
     */
    public function index()
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare('SELECT * FROM register');
        $query->execute();
        $applicants = $query->fetchAll(PDO::FETCH_OBJ);

        $view = new View('pages/admin/Dashboard', [
            'title' => 'Admin Dashboard',
            'description' => 'Welcome to the admin dashboard.',
            'applicants' => $applicants,
        ]);

        return $view->withLayout('dashboard-layout')->render();
    }
}
