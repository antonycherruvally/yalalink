<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit91aebfd690d78c36fc27523d9f57bc7f
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit91aebfd690d78c36fc27523d9f57bc7f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit91aebfd690d78c36fc27523d9f57bc7f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
