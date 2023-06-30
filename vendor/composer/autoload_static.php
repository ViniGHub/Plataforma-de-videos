<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbe94e89a53327ec694907170b079140f
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Alura\\Mvc\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Alura\\Mvc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbe94e89a53327ec694907170b079140f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbe94e89a53327ec694907170b079140f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbe94e89a53327ec694907170b079140f::$classMap;

        }, null, ClassLoader::class);
    }
}