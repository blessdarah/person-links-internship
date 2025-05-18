<?php

declare(strict_types=1);

namespace PersonLinks\Internship\controllers;

use PersonLinks\Internship\app\core\FormRequest;
use PersonLinks\Internship\app\core\View;
use PersonLinks\Internship\app\validators\PaymentValidator;

class PaymentController
{
    /**
     * Render Payment page
     * To allow users to pay
     *
     * @return string The rendered payment page
     */
    public function index()
    {
        $view = new View('pages/Payment', [
            'title' => 'Payment',
            'description' => 'Pay for your application.',
        ]);

        return $view->render();
    }

    public function create()
    {
        $request = FormRequest::only(['applicant_id', 'amount', 'phone', 'payment_method', 'description']);
        var_dump($request);
        die();

        $validator = new PaymentValidator();

        if (! $validator->isValid($request)) {
            $view = new View('pages/Payment', [
                'title' => 'Payment',
                'description' => 'Pay for your application.',
                'errors' => $validator->getErrors(),
            ]);

            return $view->render();
        }
    }
}
