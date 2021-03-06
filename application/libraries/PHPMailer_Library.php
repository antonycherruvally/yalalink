<?php

Class PHPMailer_Library
{
    public function __construct()
    {
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load()
    {
        require_once('vendor/phpmailer/phpmailer/src/PHPMailer.php');
        require_once('vendor/phpmailer/phpmailer/src/SMTP.php');

        $objMail = new PHPMailer\PHPMailer\PHPMailer();
        return $objMail;
    }
}