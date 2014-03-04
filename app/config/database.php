<?php

$config = [
    'fetch' => PDO::FETCH_CLASS,
    'default' => 'mysql',
    'migrations' => 'migrations',

    'connections' => [
        'mysql' => [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 's5',
            'username'  => 's5',
            'password'  => 's5',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]

    ]
];

$local_config_file = app_path().DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'.local.json';
if (file_exists($local_config_file)) {
    $config_local = json_decode(file_get_contents($local_config_file), true)['database'];
    $config = array_merge($config, $config_local);
}

return $config;