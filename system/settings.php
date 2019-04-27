<?php

    session_start();

    return [
        'website' => [
            'title'             => 'Website Title',
            'webmaster'         => 'Nom du Webmaster du Website',
            'extbase'           => '.php',
            'extview'           => '.pphp',
            'template'          => 'default',
            'template_css'      => '//localhost/assets/css/',
            'template_js'       => '//localhost/assets/js/',
            'template_image'    => '//localhost/assets/images',
        ],

        'settings' => [
            'displayErrorDetails'       => true,
            'addContentLengthHeader'    => false,
            'debug'                     => true,
            'maintenance'               => false,
            'staff'                     => [
                '127.0.0.1',
            ],
        ],
    ];