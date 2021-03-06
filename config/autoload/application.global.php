<?php

return [
    'application' => [
        'title' => 'Phalcon Application',
        'doctype' => \Phalcon\Tag::HTML5,
    ],
    'assetsCache' => [
        'enabled' => true,
    ],
    'multilanguage' => [
        'enabled' => true,
        'languages' => [
            'en' => 'English',
            'ru' => 'Русский',
        ],
        'defaultLanguage' => 'en',
        'path' => DATA_PATH . '/language/',
        'languageCache' => [
            'enabled' => true,
            'lifetime' => 86400,
            'storage' => [
                'backend' => '\Phalcon\Cache\Backend\File',
                'frontend' => '\Phalcon\Cache\Frontend\Data',
                'options' => [
                    'key' => 'language',
                    'cacheDir' => DATA_PATH . '/cache/language/',
                ],
            ],
        ],
    ],
];
