<?php

declare(strict_types=1);

namespace PersonLinks\Internship\controllers;

@session_start();

use PersonLinks\Internship\actions\apply\CreateApplicationAction;
use PersonLinks\Internship\app\core\FormRequest;
use PersonLinks\Internship\app\core\Mail;
use PersonLinks\Internship\app\core\View;
use PersonLinks\Internship\app\validators\ApplicationValidator;
use Throwable;

/**
 * Class PageController
 *
 * This controller handles the rendering of pages and the application process.
 */
class PageController
{
    /**
     * Render the home page.
     *
     * @return string The rendered home page view.
     */
    public function index()
    {
        $view = new View('pages/HomePage', [
            'title' => 'Home',
            'description' => 'Welcome to the home page.',
        ]);

        return $view->render();
    }

    /**
     * Render the application page.
     *
     * @return string The rendered application page view.
     */
    public function apply()
    {
        $view = new View('pages/Apply', [
            'title' => 'Apply',
            'description' => 'Apply for an internship.',
        ]);

        return $view->render();
    }

    /**
     * Handle the application form submission.
     *
     * Validates the form data and processes the application.
     * If validation fails, it re-renders the application page with errors.
     * If the application is successful, it re-renders the application page with a success message.
     *
     * @return string - The rendered application page view with errors or success message.
     */
    public function applyHandler()
    {
        $request = FormRequest::only([
            'fullname',
            'email',
            'phone',
            'school',
            'referral',
            'comments',
            'speciality'
        ]);

        $validator = new ApplicationValidator();
        if (! $validator->isValid($request)) {
            $_SESSION['errors'] = $validator->getErrors();
            $_SESSION['formData'] = $request;

            redirect('/', 400);
        }

        $action = new CreateApplicationAction();
        if ($action($request)) {
            // send email to applicant
            try {
                $mail = new Mail();
                $mail->to("blessdarahuba@gmail.com")
                    ->subject("Test Email")
                    ->message("Hello there, this is a test email.")
                    ->send();

                $_SESSION['success'] = 'Application submitted successfully.';
            } catch (Throwable $e) {
                $_SESSION['errors'] = [
                    'email' => 'Failed to send email. Please try again later.'
                ];
            } finally {
                redirect('/apply');
            }
        }
    }
}
