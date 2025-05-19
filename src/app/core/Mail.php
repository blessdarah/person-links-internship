<?php

declare(strict_types=1);

namespace PersonLinks\Internship\app\core;

use PHPMailer\PHPMailer\PHPMailer;

/**
 * Class Mail
 * @package PersonLinks\Internship\app\core
 *
 * This class is responsible for sending emails.
 */
class Mail
{
    private ?string $template = null;
    private PHPMailer $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer();
        $this->mailer->isSMTP(true);
        $this->mailer->Host = $_ENV['MAIL_HOST']; // Set the SMTP server to send through
        $this->mailer->SMTPAuth = true; // Enable SMTP authentication
        $this->mailer->Username = $_ENV['MAIL_USER']; // SMTP username
        $this->mailer->Password = $_ENV['MAIL_PASSWORD']; // SMTP password
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $this->mailer->Port = $_ENV['MAIL_PORT']; // TCP port to connect to
    }

    public function asHtml()
    {
        $this->mailer->isHTML(true);
        return $this;
    }

    /*
     * Set the headers for the email
     * @param string $headers The headers for the email
     * @return void
     * @throws \InvalidArgumentException
     * */
    public function to(array|string $list): self
    {
        if (is_string($list)) {
            $this->mailer->addAddress($list);
            return $this;
        }
        if (!is_array($list)) {
            throw new \InvalidArgumentException("The list must be an array or a string");
        }

        foreach ($list as $name => $email) {
            $this->mailer->addAddress($email, $name);
        }
        return $this;
    }

    /*
    * Set the subject of the email
    *
    * @param string $subject The subject of the email
    * @return void
    * */
    public function subject(string $subject): self
    {
        $this->mailer->Subject = $subject;
        return $this;
    }

    public function message(string $message): self
    {
        $this->mailer->Body = $message;
        return $this;
    }

    /*
     * Set the template for the email
     * @param string $template The template for the email
     * @return void
     * */
    public function template(string $template): self
    {
        $this->template = $template;
        return $this;
    }

    public function send(): bool
    {
        // configure mail template if present
        if (file_exists(__DIR__ . "/../views/mail/{$this->template}.php")) {
            ob_start();
            include __DIR__ . "/../views/mail/{$this->template}.php";
            $this->mailer->Body = ob_get_clean();
        }
        // send the email
        if (!$this->mailer->send()) {
            // log error
            error_log("Mailer Error: {$this->mailer->ErrorInfo}");
            throw new \Exception("Could not send email");
        }
        return true;
    }
}
