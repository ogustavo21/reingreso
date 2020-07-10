<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInited557045fd5bd4d1f32c79042c335b3c
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
            $loader->prefixLengthsPsr4 = ComposerStaticInited557045fd5bd4d1f32c79042c335b3c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInited557045fd5bd4d1f32c79042c335b3c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}