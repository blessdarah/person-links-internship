<?php

namespace PersonLinks\Internship\controllers;

use BlakvGhost\PHPValidator\Validator;
use PersonLinks\Internship\actions\apply\CreateApplicationAction;
use PersonLinks\Internship\app\core\FormRequest;
use PersonLinks\Internship\app\core\View;

class PageController
{
    public function index()
    {
        $view = new View('pages/HomePage', [
            'title' => 'Home',
            'description' => 'Welcome to the home page.',
        ]);

        return $view->render();
    }

    public function apply()
    {
        $view = new View('pages/Apply', [
            'title' => 'Apply',
            'description' => 'Apply for an internship.',
        ]);

        return $view->render();
    }

    public function applyHandler()
    {
        $data = FormRequest::only(['fullname', 'email', 'phone', 'school', 'referral', 'comments']);
        $validator = new Validator($data, [
            'fullname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'school' => 'required',
            'referral' => 'required',
            'comments' => 'string',
        ]);
        if (! $validator->isValid()) {
            $view = new View('pages/Apply', [
                'title' => 'Apply',
                'description' => 'Apply for an internship.',
                'errors' => $validator->getErrors(),
            ]);

            return $view->render();
        }

        $action = new CreateApplicationAction;
        if ($action($data)) {
            $view = new View('pages/Apply', [
                'title' => 'Apply',
                'description' => 'Apply for an internship.',
                'success' => 'Application submitted successfully.',
            ]);

            return $view->render();
        }
    }
}
