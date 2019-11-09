<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit466e07a215c4c1171bf7e2972bb1f24e
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
        ),
        'R' => 
        array (
            'Respect\\Validation\\' => 19,
        ),
        'A' => 
        array (
            'Arcanos\\Enigmas\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Respect\\Validation\\' => 
        array (
            0 => __DIR__ . '/..' . '/respect/validation/library',
        ),
        'Arcanos\\Enigmas\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'InterceptorRequest' => __DIR__ . '/../..' . '/config/InterceptorRequest.php',
        'Routes' => __DIR__ . '/../..' . '/config/routes.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit466e07a215c4c1171bf7e2972bb1f24e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit466e07a215c4c1171bf7e2972bb1f24e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit466e07a215c4c1171bf7e2972bb1f24e::$classMap;

        }, null, ClassLoader::class);
    }
}
